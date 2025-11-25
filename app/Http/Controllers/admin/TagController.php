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
    
    $tags=Tag::all();

     return view('backend.tag.view_tag',compact('tags'));
    }



    public function store(Request $request){
       
        $validation=$request->validate(["name"=>"required|unique:tags,name"]);
        $tag=new Tag();
        $tag->name=$request->name;
        $tag->save();
        $notification=array("message"=>"Le tag a été créé avec succès.","alert-type"=>"success");
         return redirect()->route('tag.view')->with($notification);
    }

    public function edit($id){
       
        
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
