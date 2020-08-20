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
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
   
    public function allPosts(){
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
            
            for($x=0; count($posts) <= 18; $x++)
            {
                if(($post = Post::with('Tag')->latest()->skip(count($posts))->take(1)->first())!=null){
                    array_push($posts,$post);
                }
                
            }
        }
        else
        {
            $nposts = Post::with('Tag')->orderBy('created_at','desc')->orderBy('rank','desc')->get();
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
        if($type != null and ($c != null || $n != null))
        {  
            if($type == 0 and $n != null)
            {       
                    $posts =  $this->getSpecificPosts($n->tagName);
                    $videos = $vc->getSpecificVideos($n->tagName);
                    $club->background = "background.jpg";
                    $club->bar = "bar.jpg";
                    $club->clubName = $n->tagName;
                
            }
            else if($type == 1 and $c != null)
                { 
                   
                    $posts = $this->getSpecificPosts($clubName);
                    $videos = $vc->getSpecificVideos($clubName);
                    $club = $c;
                }
        }
        else
        {
            $posts = $this->getSpecificPosts();
            $videos = $vc->getSpecificVideos();
            $club->background = "background.jpg";
            $club->bar = "bar.jpg";
            
        } 
        $comps = Competition::all();
        return view('userViews.welcome',['posts'=>$posts])->with('videos',$videos)->with('club',$club)->with('matches',$matchat)->with('national',$national)->with('comps',$comps);
    }
    public function RelatedPosts($id){
        $post = Post::where('id',$id)->with('Tag')->latest()->get()->first();
        $relatedPostsIDs = array();
        foreach($post->Tag as $tag){
            array_push($relatedPostsIDs,DB::Table('tag_post')->select('Post_id')->where([['Tag_id','=',$tag->id],['Post_id','<>',$post->id]])->get());
        }
            $relatedPostsIDsUnique = Collect();
            foreach($relatedPostsIDs as $col)
            {
                foreach($col as $item)
                {
                    $relatedPostsIDsUnique->push($item);
                }
            }
       
        $relatedPostsIDsUniuqe =$relatedPostsIDsUnique->unique('Post_id');
        
        $relatedPosts = array();        
        foreach($relatedPostsIDsUniuqe as $postid)
            {
                array_push($relatedPosts,Post::where('id',$postid->Post_id)->with('Tag')->get()->first()); 
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
        
        $post = Post::where('id',$id)->with('Tag')->latest()->get()->first();
        $relatedPosts = array_slice($this->RelatedPosts($id),0,4);
        $comps = Competition::all();
       return view('userViews.ViewPost')->with('MainPost',$post)->with('posts',$relatedPosts)->with('club',$club)->with('comps',$comps);
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
            $posts= array();
            foreach($postsIDs as $pid)
            {
                array_push($posts,Post::where('id',$pid->Post_id)->with('Tag')->first());
            }
            
        $posts = array_slice(collect($posts)->sortByDesc('created_at')->toArray(),0,8);
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
        $comps = Competition::all();
        
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
        foreach ($inputs as $postTagid ) {
            if(!empty($postTagid)){
                $tag = Tag::find($postTagid);
                $post->Tag()->attach($tag);
            }
            
        }
     
        // return view('Frontview.posts.index')->with('post',$post);
        return redirect()->route('KoraSquadAdminsRoute');
    }
    public function editPostView(int $id){
        $post = Post::where('id',$id)->with('Tag')->get()->first();
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
                $post->image = $image;
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
           else if(!in_array($tag->Tag_id,$request->tag)){
               dd(DB::Table('tag_post')->where([['Tag_id',$tag->Tag_id],['Post_id',$post->id]])->delete());
           }  
        }
        //to add new tags 
        $inputs = request('newtag');
        if(!is_null($inputs))
        {
            foreach ($inputs as $newTagid )
            {
                if(!empty($newTagid))
                {
                    if(($tag = Tag::find($newTagid)) != null)
                    {
                        $post->Tag()->attach($tag);
                    } 
                }
            }
       
        }
        if($postUpdate)
        {
           
            return redirect()->route('KoraSquadAdminsRoute');
        }
        return back()->withInput();
        }
    return redirect()->route('KoraSquadAdminsRoute');
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
