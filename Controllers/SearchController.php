<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Club;
use App\Video;
use App\Competition;
use App\Tag;

class SearchController extends Controller
{
    function Search(Request $request,$clubName = null){
      $token = $request->input('token');
      if($token != null || $token != "" || $token != " ")
      {
        $mainPosts = Post::with('Tag')->latest()->take(5)->get();
        $sposts = Post::where('content', 'like', '%'. $token .'%')
                         ->orWhere('title', 'like', '%'. $token .'%')
                                ->with('Tag')
                                ->limit(3)->latest()->get();
        $svideos = Video::where('title', 'like', '%' . $token . '%')->with('Tag')->limit(3)->latest()->get();
        $stags = Tag::where('tagName', 'like' , '%' . $token . '%')->get();
        
        if(($club = Club::where('clubName',$clubName)->first()) == null){
            $club = new Club();
            $club->background = "background.jpg";
            $club->bar = "bar.jpg";
        }
        $comps = Competition::where('type',0)->get();
        return view('userViews.Search')->with('comps',$comps)->with('posts',$mainPosts)->with('sposts',$sposts)->with('svideos',$svideos)
            ->with('club',$club)->with('stags',$stags)->with('token',$token);
      }
        return back();
    
    }
    public function morePosts($token,$c){
        
        $sposts= Post::where('content', 'like', '%'. $token .'%')
                         ->orWhere('title', 'like', '%'. $token .'%')
                         ->with('Tag')
                         ->skip($c)->limit(3)->latest()->get();
            $div['data'] = "";
            $tags = "";
            $c = $c + count($sposts);
        if(count($sposts) > 0){
            foreach($sposts as $spost){
                    
                            foreach($spost->Tag as $tag){
                            $tags .="<a href='/More/".$tag->tagName."' class='post-cata'>".$tag->tagName."</a>";
                            }
                      $div['data'] .= "<div class='single-post-area style-2'><div class='row align-items-center flex-row-reverse'>
                            <div class='col-12 col-md-6'>
                               <a href='../ViewPost/".$spost->id."'>
                                  <div class='post-thumbnail'>
                            <img style='width: 100%; height:12rem;' src='".asset('uploads/post')."/".$spost->img."' alt=''>
                                    <span class='video-duration'>".$spost->created_at->toDateString()."</span>
                                  </div>
                                </a>   
                            </div>
                            <div class='col-12 col-md-6'>
                                 <div class='postContent container'> 
                                    <div class='row flex-row-reverse'>".$tags."</div>
                                    <div class='row flex-row-reverse'>
                                       <a href='../ViewPost/".$spost->id."' class='post-title'>".$spost->title."</a>
                                    </div>     
                                  </div>  
                            </div>

                        </div>
                    </div>
                    </div>";
                
    }
            $div['data'] .= "  <input type='hidden'' class='c'  value='".$c."'/>
        <div class='row justify-content-center''>
         <button type='button' class='btn btn-primary col-6 morePosts'>المزيد</button>
        </div>";
        }
        else{
        $div['data'] .="<div class='row justify-content-center'>
         <button type='button' class='btn btn-secondary col-6' disabled>لايوجد</button>
        </div>";
        }
    echo json_encode($div);
    exit;
}
    public function moreVideos($token,$c){
        $svideos= Video::where('title', 'like', '%' . $token . '%')
                         ->with('Tag')
                         ->skip($c)->limit(3)->latest()->get();
            $div['data'] = "";
            $tags = "";
            $c = $c+ count($svideos);
        if(count($svideos) > 0){
            foreach($svideos as $svideo){
                    
                            foreach($svideo->Tag as $tag){
                            $tags .="<a href='/More/".$tag->tagName."' class='post-cata'>".$tag->tagName."</a>";
                            }
                      $div['data'] .= "<div class='single-post-area style-2'><div class='row align-items-center flex-row-reverse'>
                            <div class='col-12 col-md-6'>
                               <a href='../ViewPost/".$svideo->id."'>
                                  <div class='post-thumbnail'>
                            <img style='width: 100%; height:12rem;' src='".asset('uploads/video')."/".$svideo->img."' alt=''>
                            <i class='fas fa-2x fa-play'></i>
                                    <span class='video-duration'>".$svideo->created_at->toDateString()."</span>
                                  </div>
                                </a>   
                            </div>
                            <div class='col-12 col-md-6'>
                                 <div class='postContent container'> 
                                    <div class='row flex-row-reverse'>".$tags."</div>
                                    <div class='row flex-row-reverse'>
                                       <a href='../ViewPost/".$svideo->id."' class='post-title'>".$svideo->title."</a>
                                    </div>     
                                  </div>  
                            </div>

                        </div>
                    </div>
                    </div>";
                
    }
            $div['data'] .= "  <input type='hidden'' class='c'  value='".$c."'/>
        <div class='row justify-content-center''>
         <button type='button' class='btn btn-primary col-6 moreVideos'>المزيد</button>
        </div>";
        }
        else{
        $div['data'] .="<div class='row justify-content-center'>
         <button type='button' class='btn btn-secondary col-6' disabled>لايوجد</button>
        </div>";
        }
    echo json_encode($div);
    exit;
}
    public function moreRelatedPosts($mainPostID,$c){
        $pc = new PostsController();
        $posts = $pc->RelatedPosts($mainPostID);
        $sposts = array_slice(array_slice($posts,$c),0,4);
        $div['data'] = "";
            $tags = "";
            $c = $c+ count($sposts);
         if(count($sposts) > 0){
            foreach($sposts as $spost)
            {
                
                    $tags ="";
                            foreach($spost->Tag as $tag){
                            $tags .="<a href='/More/".$tag->tagName."' class='post-cata'>".$tag->tagName."</a>";
                            }
                      $div['data'] .= "
                      <div class='col-12 col-md-6'>
                       <div class='single-post-area touch'>
                                <a href='../ViewPost/".$spost->id."'>
                                  <div class='post-thumbnail'>
                                        <img style='width: 100%; height:12rem;' src='".asset('uploads/post')."/".$spost->img."' alt=''>
                                        <span class='video-duration'>".$spost->created_at->toDateString()."</span>
                                  </div>
                                </a>   
                                <div class='postContent container'> 
                                    <div class='row flex-row-reverse'>".$tags."</div>
                                    <div class='row flex-row-reverse'>
                                       <a href='../ViewPost/".$spost->id."' class='post-title'>".$spost->title."</a>
                                    </div>     
                                </div>  
                     </div>
                    </div>";
                
        }
            $div['data'] .= " <div class='row justify-content-center col-12 bntDiv'>
            <input type='hidden'' class='c'  value='".$c."'/>
                                <input type='hidden'' class='mpid'  value='".$mainPostID."'/>
        <div class='row justify-content-center''>
         <button type='button' class='btn btn-primary col-12 moreRelatedPosts'>المزيد</button>
        </div>
        </div
        ";
        }   
        else{
        $div['data'] .="<div class='row justify-content-center col-12 bntDiv'><div class='row justify-content-center'>
         <button type='button' class='btn btn-secondary col-12' disabled>لايوجد</button>
        </div></div>";
        }
        
        echo json_encode($div);
    exit;
    }
    public function morexPosts($tagName,$c){
        $sposts= array();
        if($tagName != '0'){
            $tagId = Tag::select('id')->where('tagName',$tagName)->first();
            $postsIDs = DB::Table('tag_post')->where('Tag_id',$tagId->id)->get();

              $posts= collect();
            foreach($postsIDs as $pid)
            {
                $posts->push(Post::where('id',$pid->Post_id)->with('Tag')->first());
            }
            foreach($posts->sortBy('created_at')->reverse()->filter()->slice($c,8) as $post){
                array_push($sposts,$post);
            }  
          
        }
        else{
            $posts = Post::with('Tag')->latest()->skip($c)->take(8)->get();
            foreach($posts as $post){
                array_push($sposts,$post);
            } 
        }
            $div['data'] = "";
            $tags = "";
            $c = $c+ count($sposts);
         if(count($sposts) > 0){
            foreach(array_filter($sposts) as $spost)
            {
                
                    $tags ="";
                            foreach($spost->Tag as $tag){
                            $tags .="<a href='/More/".$tag->tagName."' class='post-cata'>".$tag->tagName."</a>";
                            }
                      $div['data'] .= "
                      <div class='col-12 col-md-6'>
                       <div class='single-post-area touch'>
                                <a href='../ViewPost/".$spost->id."'>
                                  <div class='post-thumbnail'>
                                        <img style='width: 100%; height:12rem;' src='".asset('uploads/post')."/".$spost->img."' alt=''>
                                        <span class='video-duration'>".$spost->created_at->toDateString()."</span>
                                  </div>
                                </a>   
                                <div class='postContent container'> 
                                    <div class='row flex-row-reverse'>".$tags."</div>
                                    <div class='row flex-row-reverse'>
                                       <a href='../ViewPost/".$spost->id."' class='post-title'>".$spost->title."</a>
                                    </div>     
                                </div>  
                     </div>
                    </div>";
                
            }
            $div['data'] .= " <div class='row justify-content-center col-12 bntDiv'>
            <input type='hidden'' class='c'  value='".$c."'/>
        <div class='row justify-content-center''>
         <button type='button' class='btn btn-primary col-12 morexPosts'>المزيد</button>
        </div>
        </div
        ";
        }   
         else{
        $div['data'] .="<div class='row justify-content-center col-12 bntDiv'><div class='row justify-content-center'>
         <button type='button' class='btn btn-secondary col-12' disabled>لايوجد</button>
        </div></div>";
        }
        
        echo json_encode($div);
    exit;
    }
}