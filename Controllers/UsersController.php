<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\Tag;
use App\User;

class UsersController extends Controller
{
    public function ListUsers(){
        $users = User::where("type",1)->get();
        return view('admin.listUsers')->with('users',$users);
    }
     public function AddUser(Request $r){
        $user = new User();
        $user->name = $r->input('name');
        $user->email = $r->input('email');
        $user->password = Hash::make($r->input('password'));
        $user->type = 1;
        $user->save();
        return back();
    }
}
