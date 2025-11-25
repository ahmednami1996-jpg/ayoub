<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function allUsers(){

         $users=User::all();
    return view("backend.user.view_user",compact("users"));
    }

    public function adminEditUser($id){
      $user=User::findOrFail($id);

  $roles=Role::all();
      return view("backend.user.edit_user",compact("user",'roles'));

    }
    public function adminUpdateUser(Request $request ,$id){
      $request->validate(["roles"=>"required"]);
      $user=User::findOrFail($id);
      $roles=$request->roles;
      $user->roles()->sync($roles);
      return redirect()->route("admin.users.view");

    }
      public function adminDestroyUser($id){

        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route("admin.users.view");

    }


   
}
