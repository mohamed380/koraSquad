<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getTags()
    {
        $tags = tag::all();
        return  $tags;
    }
    public function AllTags(){
        return view('admin.AllTags')->with('tags',$this->getTags());
    }
    public function updateTag($id = null , $tagName = null){
        if(!($id == null) || !empty($tagName)){
            $message['data'] = "";
            if(Tag::find($id)->update(['tagName' => $tagName])){
                 $message['data'] = 'true';
            }else{
                $message['data'] = 'false';
            }
            echo json_encode($message);
        }
        exit;
    }
    public function deleteTag($id = null){
        if($id != null)
        {
            $message['data'] = "";
            if(Tag::find($id)->delete()){
                DB::Table('tag_video')->where('Tag_id',$id)->delete();
                DB::Table('tag_post')->where('Tag_id',$id)->delete();
                $message['data'] = 'true';
            }else{
                $message['data'] = 'false';
            }
            echo json_encode($message);
        }
        exit;
    }
    public function PostTags(id $id){
        $tags = DB::table('tags')->where('postID',$id)->get;
        return  $tags;
    }
    public function addTag(Request $request){
        $tag = new Tag();
        if(!empty($request->tagName)){
        if(empty(Tag::where("tagName",$request->tagName)->first())){
             $tag->tagName = $request->tagName;
            $tag->save(); 
        }
        }
        return redirect()->back()->with('success', ['your message,here']);
    }
}
