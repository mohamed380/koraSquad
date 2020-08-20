<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Competition;
use App\clubdetails;
use App\Post;
use App\Viedo;
use App\Tag;
use Redirect;
use App\Match;
class CompetitionsController extends Controller
{
    public function Competation($CompName = null){
        if($CompName != null)
        {
            $comp = Competition::where('compName',$CompName)->first();
            if(!empty($comp)){
                $videosController = new VideosController();
                $videos = $videosController->getSpecificVideos($CompName);
                $pc = new PostsController();
                $posts = $pc->getSpecificPosts($CompName);
            }else{
            return Redirect::back();
            }
        }
        $comps = Competition::where('type',0)->get();
        return view('userViews.Competition')->with('posts',$posts)->with('comps',$comps)->with('club',$comp)->with('videos',$videos);
    }
    public function CompOrder($CompName = null){
        if(($comp = Competition::where('compName',$CompName)->first()) != null){
        $postsController = new PostsController();
        $posts = $postsController->getSpecificPosts();
        $compOrder = clubdetails::where('Competition_id',$comp->id)->with('Club')->orderBy('points','desc')->get();
        $comps = Competition::where('type',0)->get();
        $arr = array();
        foreach($compOrder as $m){
            if($m->club == null){
                array_push($arr,$m);
            }
        }
        return view('userViews.CompOrder')->with('comps',$comps)->with('club',$comp)->with('posts',$posts)->with('compOrder',$compOrder);
        }
           return back();
    }
    public function AddComp(Request $request){
        $comp = new Competition();
        if( (($comp->compName = $request->compName) != null) ||(($bg =$request->file('logo')) != null))
        {
            $bar =$request->file('bar');
            if(!empty($bar)){
                $extension = $bar->getClientOriginalExtension();
                $filename = time() . " . " . $extension;
                $bar->move('core/bars',$filename);
                $comp->bar =$filename; 
            }
            $bg =$request->file('background');
            if(!empty($bg)){
                $extension = $bg->getClientOriginalExtension();
                $filename = time() . " . " . $extension;
                $bg->move('core/backgrounds',$filename);
                $comp->background =$filename;
            }
            $bg =$request->file('logo');
            $extension = $bg->getClientOriginalExtension();
            $filename = time() . " . " . $extension;
            $bg->move('core/logos',$filename);
            $comp->logo =$filename;
            $comp->timestamps = false;
            $comp->save();
            $tag = new Tag();
            if(($tagx = Tag::where('tagName',$request->compName)->first())==null){
                $tag->tagName =  $request->compName;
                $tag->save();
            }
            
            return back();
        }
        return back();
    }
    public function UpdateCompView(Request $requst){
       if( ($comp = Competition::where('id',$requst->comp)->first() ) != null ){
        $compOrder = clubdetails::where('Competition_id',$requst->comp)->with('Club')->orderBy('points','desc')->get();
         return view('admin.CompUpdate')->with('compOrder',$compOrder)->with('club',$comp);
       }
        return back();
  
    }
    public function UpdateCompLogo(Request $request,$id = null){
        if($id != null){
            $comp = Competition::find($id)->first();
            if(($logo = $request->file('logo'))!=null ){
                $extension = $logo->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $logo->move('core/logos',$filename);
                $temp = $comp->logo;
                $comp->logo = $filename;
                Competition::where('id',$id)->update(['logo' => $filename]);
                File::delete('core/logos/'.$temp);
               
                      }
              
        }
    return back();
        
    }
    public function UpdateCompName(Request $request,$id = null){
        if($id != null and (($name = $request->input('compName')) != null )){
                Competition::where('id',$id)->update(['compName' => $name ]);               
                    
        }
    return back();
        
    }
    public function UpdateClubDetails($Rowid,Request $request){
        $message['data'] = "false";
        if($Rowid != null || $request != null){
           if(($Row = clubdetails::where('id',$Rowid)->first()->with('Competition')->first())!=null){
               $d= json_decode($request->arr);
               
               $clubDetails = clubdetails::where('id',$Rowid)->update
                   ([
                    'played' => $d[8],    
                    'in' => $d[7],
                    'out' => $d[6],
                    'win' => $d[5],
                    'defeat' =>$d[4],
                    'draw' => $d[3],
                    'outgoals' => $d[2],
                    'ingoals' => $d[1],
                    'points' => $d[0]
                    ]);
             
               $message['data'] = 'true';
           }        
        }
        echo json_encode($message);
        exit;
    }
    public function AddClubToComp(Request $request){
        if($request->club != null || $request->comp != null){
            //to check if that club was added to this competition or no
            if((clubdetails::where([['Club_id',$request->club],['Competition_id',$request->comp]])->first()) == null){
                $club = new clubdetails();
                $club->Club_id = $request->club;
                $club->Competition_id =$request->comp;
                $club->save();
                return back();
            }
          
        }
        return back();
    }
    public function deleteCompClub($id = null){
        $message['data'] = "false";
        if($id != null){
            if(($row = clubdetails::find($id)) != null){
                clubdetails::find($id)->delete();
                DB::Table('matches')->where("FC_id",$row->Club_id)->orWhere("SC_id",$row->Club_id)->where("Competition_id",$row->Competition_id)->delete();
                $message['data'] = "true";
            }
        }
        echo json_encode($message);
        exit;
        
    }
    public function deleteComp($id = null){
        if($id != null){
            clubdetails::where("Competition_id",$id)->delete();
            Match::where("Competition_id",$id)->delete();
            Competition::find($id)->delete();
            
            return  redirect()->route('KoraSquadAdminsRoute');    
        }
        return back();
    }
}
