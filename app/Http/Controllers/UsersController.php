<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Projects;
use Illuminate\Support\Facades\Auth;
use App\Levels;


class UsersController extends Controller
{
    //

    public function statistics($proj_id) {
        
        if( Auth::user()->projects()->find($proj_id)){
            if (Auth::user()->projects()->find($proj_id)->pivot->level_id==2){

                $current_project = Projects::find($proj_id);
                $users = Projects::find($proj_id)->users()->get();
                
                return view('users/statistics', compact('users', 'current_project'));
            }
        }
        else{
            return ('No Access');
        }
    }
    public function show_users_projects($proj_id) {


        if( Auth::user()->projects()->find($proj_id)){
             if (Auth::user()->projects()->find($proj_id)->pivot->level_id==2){

                $current_project = Projects::find($proj_id);
                $levels = Levels::get();
                $users = User::get();

                return view('users/permissions', compact('users', 'current_project', 'levels'));
            }
        }
        else{
            return ('No Access');
        }

    }
    public function attach_user_project(Request $request) {
        
        $proj_id= $request->input('project_id');
        if( Auth::user()->projects()->find($proj_id)){
            if (Auth::user()->projects()->find($proj_id)->pivot->level_id==2){


                $user_id = $request->input('user_id');
                User::find($user_id)->projects()->attach($proj_id,['level_id' => 0]);
                $message = "User Attached to Project";
                return  $message;
            }
        }
        else{
            return ('No Access');
        }

    }
    public function detach_user_project(Request $request) {

        $proj_id= $request->input('project_id');
        if( Auth::user()->projects()->find($proj_id)){
            if (Auth::user()->projects()->find($proj_id)->pivot->level_id==2){


                $user_id = $request->input('user_id');
                User::find($user_id)->projects()->detach($proj_id);
                $message = "User Detached from Project";
                return  $message;
            }
        }
        else{
            return ('No Access');
        }

    }
}
