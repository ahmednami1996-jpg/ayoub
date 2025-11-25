<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
  public function adminDataAnalytics(){

    $user=User::count();
    $project=Project::count();
    $subventions=Subvention::count();
    $formations=Formation::count();
    $projects_approved=Project::where('')->count();
    $projects_rejected=Project::count();
    $projects_pending=Project::count();
    $projects_views=Project::count();
    $subventions_views=Project::count();
    $formations_views=Project::count();




  }

}
