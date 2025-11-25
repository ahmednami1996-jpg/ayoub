<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Project;
class ApplicationController extends Controller
{
    public function showSentApplications(){
        $applications=Application::where("user_id",auth()->id())->get();
        return view("backend.apply.view_sent_apply",compact('applications'));
    }
    public function showReceivedApplications(){
       $applications = Application::whereHas('project', function($q){
        $q->where('user_id', auth()->id());
    })->get();
return view("backend.apply.view_received_apply",compact('applications'));
    }

    public function create($id){
        $project=Project::find($id);
        if(auth()->id() != $project->user_id){

return view('backend.apply.create_apply',compact('id'));
        }else{
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"error");
            return back()->with($notification);
        }
        
    }
    public function apply(Request $request,$id)
{
    $request->validate([
        'amount' => 'nullable|numeric',
        'message' => 'nullable|string',
    ]);

    $application = Application::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'project_id' => $id,
        ],
        [
            'amount' => $request->amount,
            'message' => $request->message,
            'status' => 'pending',
        ]
    );
$notification=array("message"=>"Votre candidature a été envoyée avec succès.","alert-type"=>"success");
    return redirect()->back()->with($notification);
}

public function edit($id){
    $application=Application::findOrFail($id);
     if(auth()->id()==$application->user_id){
        
       return view("backend.apply.edit_apply",compact("application"));
    }else{
        $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"error");
            return back()->with($notification);
       
    }
    
}
public function update (Request $request,$id){
     $request->validate([
        'amount' => 'nullable|numeric',
        'message' => 'nullable|string',
    ]);
     $application=Application::findOrFail($id);
     if(auth()->id()==$application->user_id){
     $application->amount=$request->amount;
     $application->message=$request->message;
     $application->save();
     $notification=array("message"=>"Votre candidature a été mise à jour avec succès.","alert-type"=>"success");
    return redirect()->back()->with($notification);
    
    }
     else{
         $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"error");
            return back()->with($notification);
     }
}

public function changeStatus(Request $request,$id){

    $application=Application::findOrFail($id);
    if(auth()->id()==$application->project->user_id){
        if($request->status==="accepted"){
            $application->project->is_taken=1;
        }
  $application->status=$request->status;
  
  $application->save();
     $notification=array("message"=>"Statut modifier avec succès.","alert-type"=>"success");
    return redirect()->back()->with($notification);
    }else{
        $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"error");
            return back()->with($notification);
    }
  
}






}
