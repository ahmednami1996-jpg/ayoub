<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TagController extends Controller
{
    
    public function index(){
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
    
    $tags=Tag::orderBy('created_at', 'desc')->get();

     return view('backend.tag.view_tag',compact('tags'));
    }



    public function store(Request $request){
          if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
       
        $validation=$request->validate(["name"=>"required|unique:tags,name"]);
        $tag=new Tag();
        $tag->name=$request->name;
        $tag->save();
        $notification=array("message"=>"Le tag a été créé avec succès.","alert-type"=>"success");
         return redirect()->route('tag.view')->with($notification);
    }

    public function edit($id){
         if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
        
        try{
        $tag=Tag::findOrFail($id); 
        return view("backend.tag.edit_tag",compact('tag'));
        }catch(ModelNotFoundException $e){
            
        $notification = [
            'message' => 'Étiquette introuvable',
            'alert-type' => 'warning',
        ];
      
     
       return back()->with($notification);
}

       

    }

    public function update(Request $request,$id){
  if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
       $request->validate([
        'name' => [
            'required',
            Rule::unique('tags', 'name')->ignore($id),
        ],
    ]);
    
      try{ 
      $tag=Tag::findOrFail($id);
      $tag->name=$request->name;
      $tag->save();
      $notification=array("message"=>"Le tag a été mis à jour avec succès.","alert-type"=>"success");
      return redirect()->route("tag.edit",$id)->with($notification);

      }catch(ModelNotFoundException $e){
        $notification = [
            'message' => 'Étiquette introuvable. Échec de la mise à jour du tag. Veuillez réessayer.',
            'alert-type' => 'warning',
        ];
        return back()->with($notification);
      }
     
       



    }


    public function destroy($id){
         if(!auth()->user()->hasRole('admin')){
            $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);

        }
       try {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $notification = [
            'message' => 'Le tag a été supprimé avec succès.',
            'alert-type' => 'success',
        ];
        return redirect()->route('tag.view')->with($notification);

    } catch (ModelNotFoundException $e) {
        $notification = [
            'message' => 'Échec de la suppression du tag. Veuillez réessayer.',
            'alert-type' => 'warning',
        ];
        return back()->with($notification);
    }

    
      
    }

}
