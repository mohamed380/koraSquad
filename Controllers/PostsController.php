<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Video;
use App\Tag;
use App\Match;
use App\Club;
use App\Competition;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
   /* public function editImage($posts){
       foreach($posts as $post){
            $temp = $post->img;
            $split = explode(" . ",$temp);
            $post->img= $split[0].'.'.$split[1];
            $post->save();
        }
        //dd(scandir('uploads/post/'));
        foreach(scandir('uploads/post/') as $file)
        {
            $temp = $file;
             $split = explode(" . ",$temp);
            if(count($split)==2)
            {
                 $temp= $split[0].'.'.$split[1];
                
                 Storage::move(base_path('uploads\post/'.$file),$temp);  
            } 
        }
    }*/
    public function allPosts($writer = null){
        if($writer != null){
             
        return view("admin.allPosts")->with("posts",Post::where('publisherID',$writer)->latest()->get());
        }
        
        return view("admin.allPosts")->with("posts",Post::latest()->get());
    }
    public function getSpecificPosts($tagName = null){
        $posts = array();
        if($tagName != null)
        {
            $tagId = Tag::select('id')->where('tagName',$tagName)->first();
            $postsIDs = DB::Table('tag_post')->where('Tag_id',$tagId->id)->get();
            $temp = collect();
            foreach($postsIDs as $pid)
            {
                if(($post = Post::where('id',$pid->Post_id)->with('Tag')->first())!= null)
                {
                   $temp->push($post);
                }
            }
            foreach($temp->sortByDesc('created_at')->sortByDesc('rank')->sortByDesc('created_at') as $post){
                    array_push($posts,$post);
                }
            
            for($x=0; count($posts) <= 40; $x++)
            {
                if(($post = Post::with('Tag')->latest()->skip(count($posts))->take(1)->first())!=null){
                    array_push($posts,$post);
                }
                
            }
        }
        else
        {
            $nposts = Post::with('Tag')->orderBy('created_at','desc')->orderBy('rank','desc')->get()->take(40);
            foreach($nposts as $post){
              if($post != null){
                    array_push($posts,$post);
              }
            }
        }
      
        return $posts;
        
    }
    public function KoraSquadAdminsRoute(){
        $tags = Tag::all();
        $competitions = Competition::all();
        $clubs = Club::all();
        return view('admin.KoraSquadAdminsRoute')->with('tags',$tags)->with('clubs',$clubs)->with('competition',$competitions);
    }
    public function aboutUs(){
        $club= new Club();
        $club->background = "background.jpg";
        $club->bar = "bar.jpg";
        $comps = Competition::where('type',0)->get();
        $posts = $this->getSpecificPosts();
        return view('userViews.aboutUs')->with('club',$club)->with('comps',$comps)->with('posts',$posts);
    }
    public function privacy(){
        $club= new Club();
        $club->background = "background.jpg";
        $club->bar = "bar.jpg";
        $comps = Competition::where('type',0)->get();
        $posts = $this->getSpecificPosts();
        return view('userViews.privacy')->with('club',$club)->with('comps',$comps)->with('posts',$posts);
    }
    public function contcat(){
        $club= new Club();
        $club->background = "background.jpg";
        $club->bar = "bar.jpg";
        $comps = Competition::where('type',0)->get();
        $posts = $this->getSpecificPosts();
        return view('userViews.ContactUs')->with('club',$club)->with('comps',$comps)->with('posts',$posts);
    }
    public function Main($type = null,$clubName = null){
        $tags = new Tag();
        $club = new Club();
        $videos = new Video();
        $cont = new MatchesController();
        $matchat = $cont->getMatches();
        $national = null;
        $c = Club::where('clubName',$clubName)->first();
        $n = Tag::where('tagName',$clubName)->first();
        $vc = new VideosController();
        
        if(!empty($type) and (!empty($c) || !empty($n)))
        {  
            if($type == 0 and $n != null)
            {       
                    $posts =  $this->getSpecificPosts($n->tagName);
                    
                    $videos = $vc->getSpecificVideos($n->tagName);
                    $club->background = "background.jpg";
                    $club->bar = "bar.jpg";
                    $club->clubName = $n->tagName;
                
            }
            else if($type == 1 and !empty($c))
                { 
                    $posts = $this->getSpecificPosts($clubName);
                    $videos = $vc->getSpecificVideos($clubName);
                    $club = $c;
                }
            else
                {
                return redirect()->back();
                }
        }
        else
        {
            $posts = $this->getSpecificPosts();
            $videos = $vc->getSpecificVideos();
            $club->background = "background.jpg";
            $club->bar = "bar.jpg";
            
        } 
        
        $comps = Competition::where('type',0)->get();
        return view('userViews.welcome',['posts'=>$posts])->with('videos',$videos)->with('club',$club)->with('matches',$matchat)->with('national',$national)->with('comps',$comps);
    }
    public function RelatedPosts($id){
        $post = Post::where('id',$id)->with('Tag')->latest()->get()->first();
        $relatedPostsIDs = collect();
        foreach($post->Tag as $tag){
            $relatedPostsIDs->push(DB::Table('tag_post')->select('Post_id')->where([['Tag_id','=',$tag->id],['Post_id','<>',$post->id]])->latest()->get());
        }
            $relatedPostsIDsUnique = Collect();
            foreach($relatedPostsIDs->sortBy('created_at')->reverse() as $col)
            {
                foreach($col as $item)
                {
                    $relatedPostsIDsUnique->push($item);
                }
            }
       
        $relatedPostsIDsUniuqe =$relatedPostsIDsUnique->unique('Post_id');
        
        $relatedPosts = array();        
        foreach($relatedPostsIDsUniuqe->sortBy('created_at')->reverse() as $postid)
            {
                array_push($relatedPosts,Post::where('id',$postid->Post_id)->with('Tag')->with('User')->get()->first()); 
            }
        return array_filter($relatedPosts);
    }
    public function ViewPost(int $id,$clubName =null){
        if($clubName != null){
            if(($club = Club::where("clubName",$clubName)->first()) == null){
                    $club = new Club();
                    $club->background = "background.jpg";
                    $club->bar = "bar.jpg";
            }
        }else{
            $club = new Club();
            $club->background = "background.jpg";
            $club->bar = "bar.jpg";
        }
        $posts = $this->getSpecificPosts();
        $post = Post::where('id',$id)->with(array('User'=>function($query){
                $query->select('id','name');
            }))->with('Tag')->latest()->get()->first();
        $relatedPosts = array_slice($this->RelatedPosts($id),0,4);
        $comps = Competition::where('type',0)->get();
        
       return view('userViews.ViewPost')->with('MainPost',$post)->with('posts',$posts)->with('Relatedposts',$relatedPosts)->with('club',$club)->with('comps',$comps);
        }
    public function More($tagName = null,$comp = null,$clubName = null){
        $posts = array();
        $Comp = null;
        if($comp != null){
            $Comp = Competition::where('compName', $tagName)->first();
        }
        if($tagName != null){
         $tagId = Tag::select('id')->where('tagName',$tagName)->first();
            $postsIDs = DB::Table('tag_post')->where('Tag_id',$tagId->id)->get();
            $sposts= collect();
            foreach($postsIDs as $pid)
            {
                $sposts->push(Post::where('id',$pid->Post_id)->with('Tag')->first());
            }
            foreach($sposts->sortBy('created_at')->reverse()->filter()->slice(0,8) as $post){
                array_push($posts,$post);
            }  
            
       
            
        }else{
            $posts = array_slice($this->getSpecificPosts(),0,8);
        }
        if(empty($clubName)){
            
            if(($club = Club::where("clubName",$tagName)->first()) == null){
                $club = new Club();
            $club->background = "background.jpg";
            $club->bar = "bar.jpg";
        }}else{
            $club = new Club();
            $club = Club::where('clubName',$clubName)->first(); 
        }
        $comps = Competition::where('type',0)->get();
        
       return view('userViews.More')->with('posts',array_filter($posts))->with('comps',$comps)->with('comp',$Comp)->with('MainTag',$tagName)->with('club',$club);
        }
    public function store(Request $request){
        $post = new Post();
        $tag = new Tag();
       
        $post->content = $request->input('content');
        $post->title = $request->input('title');
        $post->publisherID = (integer)$request->input('id');

        if($request->hasfile('image')){
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . " . " . $extension;
            $file->move('uploads/post/',$filename);
            $post->img =$filename;
        }else{
            return $request;
            $post->img = '';
        }
        $post->rank=10;
        $post->save();
        $inputs = request('tag');
        foreach (array_unique($inputs) as $postTagid ) {
            if(!empty($postTagid)){
                $tag = Tag::find($postTagid);
                $post->Tag()->attach($tag);
            }
            
        }
     
        // return view('Frontview.posts.index')->with('post',$post);
        return redirect()->route('KoraSquadAdminsRoute');
    }
    public function editPostView(int $id){
        $post = Post::where('id',$id)->get()->first();
      //  $postTags = DB::Table("tag_post")->where("Post_id",$post->id)->with("Tag")->get();
        $tags = Tag::all();
        return view('admin.UpdatePost')->with('post', $post)->with('tags',$tags);
    }
    public function update(Request $request,$id = null){
        if(($post = Post::where('id',$id)->with('Tag')->get()->first()) != null){
            $image = "";
            
            if($request->hasfile('image'))
            {
                $file =$request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = time() . " . " . $extension;
                $file->move('uploads/post/',$image);
                $oldImg =  'uploads/post/'.$post->img;
                File::delete($oldImg);
                $post->img = $image;
            }else
            {
                 $image = $post->img;
            }
        

        $postUpdate = Post::where('id',$id)->get()->first()
        ->update([
            'content'   => $request->input('content'),
            'title' => $request->input('title'),
            'img'    => $image,
            'rank' => $request->input('rank')
        ]);
         
        //to remove deleted tags from database
        $tags= DB::Table('tag_post')->where('Post_id',$id)->get();
        foreach($tags as $tag){
           if(is_null($request->tag)){
                DB::Table('tag_post')->where([['Tag_id',$tag->Tag_id],['Post_id',$post->id]])->delete();
           }
            
         if(!in_array($tag->Tag_id,$request->tag)){
             
               DB::Table('tag_post')->where([['Tag_id',$tag->Tag_id],['Post_id',$post->id]])->delete();
           }  
        }
         $tags= DB::Table('tag_post')->select("id")->where('Post_id',$id)->get()->toArray();   
        //to add new tags 
        $inputs = request('newtag');
        if(!is_null($inputs))
        {
            foreach (array_unique($inputs) as $newTagid )
            {
                if((!empty($newTagid)) and !(in_array($newTagid,$tags)) and (($tag = Tag::find($newTagid)) != null))
                {
                        $post->Tag()->attach($tag);
                }
            }
       
        }
        if($postUpdate)
        {
           
            return redirect()->route('allPosts');
        }
        return back()->withInput();
        }
    return redirect()->route('allPosts');
}
    public function deletePost($id = null){
        if($id != null){
            $message['data'] = "";
            if(Post::find($id)->delete())
            {
                $message['data'] = "true";
            }
            else{
                $message['data'] = "flase";
            }
             echo json_encode($message);
        }
        exit;
    }
}
