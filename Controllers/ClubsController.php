<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Club;
use App\clubdetails;
class ClubsController extends Controller
{
    public function AddClub(Request $request){
            $club = new Club();
            $bar =$request->file('bar');
            if(!empty($bar)){
                $extension = $bar->getClientOriginalExtension();
                $filename = time() . " . " . $extension;
                $bar->move('core/bars',$filename);
                $club->bar =$filename; 
            }
            $bg =$request->file('background');
            if(!empty($bg)){
                $extension = $bg->getClientOriginalExtension();
                $filename = time() . " . " . $extension;
                $bg->move('core/backgrounds',$filename);
                $club->background =$filename;
            }
            $bg =$request->file('logo');
            $extension = $bg->getClientOriginalExtension();
            $filename = time() . " . " . $extension;
            $bg->move('core/logos',$filename);
            $club->logo =$filename;
            $club->clubName = $request->clubName;
            $club->save();
             return redirect()->back()->with('success', ['your message,here']);
    }
    public function exist($name = null){
      $club = Club::where('clubName',$name)->first();
      if($club != null){
          return $club;
      }
        return null;
    }
    public function UpdateClubView(Request $r){
        if($r->input('clubName') != null){
            if(($c=$this->exist($r->input('clubName'))) != null){
                
                return view('admin.UpdateClubs')->with('club',$c);
            }
            return back();
        } 
        return back();
    }
    public function UpdateClub(Request $request,$id){
        $club = Club::find($id);
        $logo =""; $bg="" ; $bar = "";
        if($request->hasfile('background')){
            $file =$request->file('background');
            $extension = $file->getClientOriginalExtension();
            $bg = time() . " . " . $extension;
            $file->move('core/backgrounds/',$bg);
            $club->background = $bg;
        }
        if($request->hasfile('logo')){
            $file =$request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logo = time() . " . " . $extension;
            $file->move('core/logos/',$logo);
            $club->logo = $logo;
        }
        if($request->hasfile('bar')){
            $file =$request->file('bar');
            $extension = $file->getClientOriginalExtension();
            $bar = time() . " . " . $extension;
            $file->move('core/bars/',$bar);
            $club->logo = $bar;
        }
        $name=$request->input('name');
        if($logo == ""){
            $logo = $club->logo;
        }
        if($bg == ""){
            $bg = $club->background;
        }
        if($bar == ""){
            $bar = $club->bar;
        }
        if(($name = $request->input('name')) == null){
            $name = $club->clubName;
        }
         $club = Club::where('id',$id)->update(
            [
                'background' => $bg,    
                'bar' => $bar,
                'logo' => $logo,
                'clubName' => $name
            ]
        );
        return redirect()->route('KoraSquadAdminsRoute');
    
    }
    public function deleteClub($id){
     if($id != null){
      DB::Table('clubdetails')->where('Club_id',$id)->delete();
      DB::Table('matches')->where("FC_id",Club_id)->orWhere("SC_id",Club_id)->delete();
      Club::find($id)->delete();
         }
      return back();
        
  }
    public function getCompClubs($id = null){
        if($id != null){
            $respons = clubdetails::where('Competition_id',$id)->get()->pluck("Club");
            /*$clubs = collect();
            foreach($clubs as $club){
                $clubs->push($club->Club);
            }*/
            echo json_encode($respons);
            exit;
        }
    }
}
