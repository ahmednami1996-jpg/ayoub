<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Subvention;
use App\Models\Formation;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{

    public function index(){
        $projectsCount=Project::count();
        $usersCount=User::count();
        $subventionsCount=Subvention::count();
        $formationsCount=Formation::count();
       
       
        $formations=Formation::limit(3)->get();
        return view("home.home",compact('formations',
        'projectsCount','usersCount','formationsCount','subventionsCount'));
    }



    public function showContactPage(){
        return view("home.contact");
    }
     public function showAboutPage(){
        return view("home.about");
    }

    public function contactUs(Request $request){
      $moderatorEmail = env('MODERATOR_EMAIL');
        $request->merge(array_map('trim', $request->all()));
        $validated =$request->validate(["name"=>"required","email"=>"required|email",
        "subject"=>"required","message"=>"required"]);
      

        Mail::to($moderatorEmail)->send(new ContactMail($validated));
$notification="";
        return back()->with($notifications);

    }
}
