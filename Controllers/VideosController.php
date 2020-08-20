<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Video;
use App\Tag;
use App\Post;
use App\Club;
use App\Competition;

class VideosController extends Controller
{
       public function __construct()
    {
        
    }
     public function UploadVideo(Request $request){
        $video = new Video();
        $tag = new Tag();
        if($request->hasfile('image')){
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/video/',$filename);
            $video->img =$filename;
        }else{
            return $request;
            $post->img = '';
        }
        $video->frame = $request->input('frame');
        $video->title = $request->input('title');
        $video->save();
        $inputs = request('tag');
       foreach ($inputs as $VideoTagid ) {
            if(!empty($VideoTagid)){
                $tag = Tag::find($VideoTagid);
                $video->Tag()->attach($tag);
            }
            
        }
     
        // return view('Frontview.posts.index')->with('post',$post);
        return redirect()->route('KoraSquadAdminsRoute');
    }
     public function getSpecificVideos($tagName = null){
        $videos = array();
         
        if($tagName != null)
        {
            $tagId = Tag::select('id')->where('tagName',$tagName)->first();
            $VideosIDs = DB::Table('tag_video')->where('Tag_id',$tagId->id)->get();
            foreach($VideosIDs as $vid)
            {
                array_push($videos,Video::where('id',$vid->Video_id)->with('Tag')->first());
            }
            for($x=0 ;count($videos) <= 5 ; $x++){
                array_push($videos,Video::with('Tag')->skip(count($videos))->take(1)->get()->first());
            }
        }
        else{
            $nvideos = Video::with('Tag')->latest()->take(5)->get();
            foreach($nvideos as $video){
                array_push($videos,$video);
            }
            }
        
        return array_slice(array_filter($videos),0,5);
    }
     public function ViewViedo($id = null){
        if($id != null){
            $mainV = Video::where('id',$id)->with('Tag')->first();
            $relatedVideosIDs = array();
            foreach($mainV->Tag as $tag){
                array_push($relatedVideosIDs,DB::Table('tag_video')->select('Video_id')->where([['Tag_id','=',$tag->id],['Video_id','<>',$mainV->id]])->get());
            }
                $relatedVideosIDsUnique = Collect();
                foreach($relatedVideosIDs as $col)
                {
                    foreach($col as $item)
                    {
                        $relatedVideosIDsUnique->push($item);
                    }
                }

            $relatedVideosIDsUnique =$relatedVideosIDsUnique->unique('Video_id');

            $relatedVideos = array();        
            foreach($relatedVideosIDsUnique as $videoid)
                {
                    array_push($relatedVideos,Video::where('id',$videoid->Video_id)->with('Tag')->get()->first()); 
                }
        $posts = Post::latest()->get()->take(5);
        $club = new Club();
        $club->background = "background.jpg";
        $club->bar = "bar.jpg";
        $comps = Competition::where('type',0)->get();
        return view('userViews.ViewVideo')->with('comps',$comps)->with('MainVideo',$mainV)->with('posts',$posts)->with('club',$club)->with('videos',$relatedVideos);

        }
        return Redirect()->back();
    }
     public function MoreVideos($name = null){
         $c  = new Competition();
         if($name != null){
             $c = Competition::where('compName',$name)->first();
             if($c == null)
             {
                 return back()->withInput();
             }
         }
         else
         {
            $c->background = "background.jpg";
            $c->bar = "bar.jpg";
         }
         $pc = new PostsController();
         
         $posts = $pc->getSpecificPosts();
         $videos = $this->getSpecificVideos($name);
         $comps = Competition::where('type',0)->get();
         return view('userViews.Videos')->with('comps',$comps)->with('videos',$videos)->with('posts',$posts)->with('comp',$c)->with('club',$c);
     }
}
