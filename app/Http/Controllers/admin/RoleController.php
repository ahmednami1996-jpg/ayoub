<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class RoleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
        $roles=Role::orderBy('created_at', 'desc')->get();
        return view('backend.role.view_role',compact('roles'));
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
        $notification="";
        $validation=$request->validate(["name"=>"required|unique:roles,name"]);
      

        $role=new Role();
        $role->name=$request->name;
        $role->save();
        $notification=array("message"=>"Le rôle a été créé avec succès.","alert-type"=>"success");
         return redirect()->route('role.view')->with($notification);


    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }


        try{
            $role=Role::findOrFail($id);
return view("backend.role.edit_role",compact("role"));
        }catch(ModelNotFoundException $e ){
            $notification=array("message"=>"Rôle non trouvé","alert-type"=>"info");
            return redirect()->route("role.view")->with($notification);
        }
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
        $request->validate([
        'name' => [
            'required',
            Rule::unique('roles', 'name')->ignore($id),
        ],
    ]);
        
        

  try{
         $role=Role::findOrFail($id); 
        
         $role->name=$request->name;
        $role->save();
        $notification=array("message"=>"Le rôle a été mis à jour avec succès.","alert-type"=>"success");

       
        }catch(ModelNotFoundException $e){
        $notification=array("message"=>"Échec de la mise à jour du rôle. Veuillez réessayer.","alert-type"=>"info");

        }
return redirect()->route("role.view")->with($notification);
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
        try{
         $role=Role::findOrFail($id); 
         $role->delete();
         $notification=array("message"=>"Le rôle a été supprimé avec succès.","alert-type"=>"info");  
        }catch(ModelNotFoundException $e){
        $notification=array("message"=>"Échec de la suppression du rôle. Veuillez réessayer.","alert-type"=>"warn");
        }
      
    
      return redirect()->route('role.view')->with($notification);

    }
}