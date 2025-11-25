<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
 public function index(){
    
    $formations=Formation::all();

     return view('backend.formation.view_formation',compact('formations'));
    }
     public function showFormations(Request $request){
       
       
  $formations=Formation::whereNotIn('status', ['pending', 'rejected'])->orderBy('created_at','desc')->paginate(16);
  return view('home.formations',compact('formations'));
      
        
    }
   public function show($id){
    $formation=Formation::findOrFail($id);
    $formation->views = $formation->views + 1;
$formation->save();

    return redirect()->away($formation->url);
   }

    public function create(){

       $categories=Category::all();
        return view("backend.formation.create_formation",compact('categories'));
    }



    public function store(Request $request){
        $notification="";
        $validation=$request->validate(["title"=>"required","cost"=>"numeric|required","provider"=>"required","url"=>"required|unique:formations,url"]);
        $formation=new Formation();
        $formation->title=$request->title;
        $formation->provider=$request->provider;
        $formation->mode=$request->mode == "online" ?1:0 ;
        $formation->cost=$request->cost ;
        $formation->reduction=$request->reduction ?? null;
        $formation->duration=$request->duration?? 'undefined';
        $formation->category_id=$request->category_id ?? null;
        $formation->status=1;
        $formation->url=$request->url;
        if($request->hasFile('picture')){
         $file=$request->file("picture");
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('images/formations',$file_name,'public');
         $formation->picture=$file_name;
        }else{
            $formation->picture="no-image.png";

        }

        $formation->save();
        $notification=array("message"=>"La formation a été créée avec succès.","alert-type"=>"success");
         return redirect()->route('formation.view')->with($notification);
    }

    public function edit($id){
       
        
        try{
        $formation=Formation::findOrFail($id); 
        $categories=Category::all();
        return view("backend.formation.edit_formation",compact('formation','categories'));
        }catch(ModelNotFoundException $e){
            
        $notification = [
            'message' => 'formation introuvable',
            'alert-type' => 'warning',
        ];
      
     
       return redirect()->route("formation.view")->with($notification);
}

       

    }

    public function update(Request $request,$id){

       $request->validate([
        "title"=>"required","provider"=>"required","cost"=>"numeric|required",
        'url' => [
            'required',
            Rule::unique('formations', 'url')->ignore($id),
        ]
    ]);
    
      try{ 
      $formation=Formation::findOrFail($id);
     $formation->title=$request->title;
        $formation->provider=$request->provider;
       $formation->mode=$request->mode == "online" ?1:0 ;
        $formation->cost=$request->cost;
        $formation->reduction=$request->reduction;
        $formation->duration=$request->duration;
        $formation->category_id=$request->category_id;
        $formation->url=$request->url;
      
       if ($request->hasFile('picture')) {

    $file = $request->file('picture');
    $originalName = $file->getClientOriginalName();

    // Delete old image if it's not the default one AND it exists in storage
    if (
        $originalName !== "no-image.png" &&
        $formation->picture &&
        Storage::disk('public')->exists('images/formations/' . $formation->picture)
    ) {
        Storage::disk('public')->delete('images/formations/' . $formation->picture);
    }

    // Generate unique filename
    $uuid = (string) \Illuminate\Support\Str::uuid();
    $file_name = time() . '-' . $uuid . '.' . $file->getClientOriginalExtension();

    // Save new image
    $file->storeAs('images/formations', $file_name, 'public');

    // Update DB field
    $formation->picture = $file_name;
}
         
         
        
       

      $formation->save();
      $notification=array("message"=>"La formation a été mise à jour avec succès.","alert-type"=>"success");
      return redirect()->route('formation.view')->with($notification);

      }catch(ModelNotFoundException $e){
        $notification = [
            'message' => 'Échec de la mise à jour de la formation. Veuillez réessayer.',
            'alert-type' => 'error',
        ];
        return redirect()->route('formation.view')->with($notification);
      }
     
      



    }


    public function destroy($id){
       
       try {
        $formation = Formation::findOrFail($id);
        $formation->delete();

        $notification = [
            'message' => 'La formation a été supprimée avec succès.',
            'alert-type' => 'success',
        ];
 return redirect()->route('formation.view')->with($notification);
    } catch (ModelNotFoundException $e) {
        $notification = [
            'message' => 'Échec de la suppression de la formation. Veuillez réessayer.',
            'alert-type' => 'error',
        ];
        return redirect()->route('formation.view')->with($notification);
    }

   
      
    }

    public function changeStatus($id){
        try{
            $formation=Formation::findOrFail($id);
            $formation->status= !$formation->status;

            $formation->save();
             $notification = [
            'message' => 'Formation status changed successfully.',
            'alert-type' => 'info',
        ];
return redirect()->route('formation.view')->with($notification);

        }catch(ModelNotFoundException $e){
        $notification = [
            'message' => 'Formation status not changed',
            'alert-type' => 'error',
        ];return redirect()->route('formation.view')->with($notification);
        }
        

    }

}