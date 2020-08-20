<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Match;
use App\Club;
use App\Competition;
use App\Post;
use Carbon\Carbon;
class MatchesController extends Controller
{
    function find_closest($array, $date){
    //$count = 0;
    foreach($array as $day)
    {
        $interval[] = abs(strtotime($date) - strtotime($day[0]->date));
        
    }
    asort($interval);
    $closest = key($interval);
    return $closest;
}
    public function AddMatch(Request $request){
        
        $match = new Match();
        $match->location = $request->input('location');
        $match->date = (string) $request->input('date');
        $match->status = $request->input('status');
        $match->FCGoals = (integer)$request->input('FCG') ;
        $match->SCGoals = (integer)$request->input('SCG');
        $match->time = (string) $request->input('time');
        $match->FC_id = (integer) $request->fc;
        $match->SC_id = (integer) $request->sc;
        $match->Competition_id = (integer) $request->comp;
        $match->updated_at = Carbon::today();
        $match->save();
        return redirect()->back()->with('success', ['your message,here']);

    }
    public function getMatches(){
        $yd = Carbon::yesterday('EET')->toDateString();
        $nd = Carbon::today('EET')->toDateString();
        $td = Carbon::tomorrow('EET')->toDateString();
        $matches = Match::with('FC')->with('SC')->with('Competition')->get();
        $ydarr = array();
        $ndarr = array();
        $tdarr =  array();
        foreach($matches as $match)
        {
            if($match->date == $yd)
            {
                array_push($ydarr,$match);
            }
            else if($match->date == $nd)
            {
                array_push($ndarr,$match);
            }
            else if($match->date == $td)
            {
                array_push($tdarr,$match);
            }
        }
        $matchat =  array($tdarr,$ndarr,$ydarr);
        return $matchat;
    }
    public function UpdateMatchView($compid = null){
        $comps = Competition::select('id','compName')->get();
         $Comp = null;
        $m = array();
        if($compid == null)
        {
            $m = Match::with('FC')->with('SC')->with('Competition')->get();
           
        }else{
            
            $Comp = Competition::where('id',$compid)->first();
            $m = Match::where('Competition_id',$compid)->with('FC')->with('SC')->with('Competition')->get();  
        }
         
        return view('admin.AllMatches')->with('matches',$m)->with('comps',$comps)->with('Comp',$Comp);
    }
    public function UpdateMatch(Request $request,$id){
        $message['data'] = "false";
        if($id != null || $request != null){
           if(($Row = Match::where('id',$id)->first())!=null){
               $d= json_decode($request->arr);
              $match = Match::where('id',$id)->first()->update(
            [
                'FCGoals' => $d[5],
                'SCGoals' => $d[4],
                'status' => $d[3],
                'time' => $d[2],
                'date' => $d[1],
                'location' => $d[0]
            ]
        );
               $message['data'] = 'true';
           }        
        }
        echo json_encode($message);
        exit;
    }
    public function matches($compName = null,$clubName = null){
        $posts = Post::all()->take(5);
        $allMatches = $this->getMatches();
        $matches = array();
        $comp =null;
        if($compName != null)
        {
            $comp= Competition::where('compName',$compName)->first();
            $matches = Match::where('Competition_id',$comp->id)->with('FC')->with('SC')->with('Competition')->get()->groupBy('date');
        }
        else
        {
        $matches = Match::with('FC')->with('SC')->with('Competition')->get()->groupBy('date');
        }
        $club = new Club();
        if(!empty($clubName))
             {
                    $club = Club::where('clubName',$clubName)->get()->first();
                    //$matches = Match::where('FC_id',$club->id)->orWhere('SC_id',$club->id)->with('FC')->with('SC')->with('Competition')->get();
             }
        else
             {
                $club->background = "background.jpg";
                $club->bar = "bar.jpg";
             }
        
        $date =  Carbon::today()->toDateString();
        $comps = Competition::all();
        $key = 0;
        if(count($matches->sortKeysDesc()) > 0){
            $key = $this->find_closest($matches->sortKeysDesc(),$date);
        }
         return view('userViews.matches')->with('comps',$comps)->with('club',$club)->with('posts',$posts)->with('matches',$allMatches)->with('key',$key)->with('matchesGroups',$matches->sortKeysDesc())->with('today',$date)->with('comp',$comp);
        }
    public function deleteMatch($id = null){
        if($id != null){
            $message['data'] ="";
            if(Match::find($id)->delete()){
               $message['data'] = "true";
            }else{
                $message['data'] = "false";
            }
             echo json_encode($message);
        }
        exit;
    }
}
