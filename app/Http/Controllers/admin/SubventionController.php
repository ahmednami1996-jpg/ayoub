<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subvention;
use Illuminate\Validation\Rule;
use Monarobase\CountryList\CountryListFacade as Countries;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class SubventionController extends Controller
{
    
 public function index(){
    
    $subventions=Subvention::all();

     return view('backend.subvention.view_subvention',compact('subventions'));
    }
    public function showSubventions(Request $request){
         
  $subventions=Subvention::whereNotIn('status', ['pending', 'rejected'])->orderBy('created_at','desc')->paginate(16);
 
     
        return view('home.subventions',compact('subventions'));
        
    }
public function create(){
     $countries = Countries::getList('en');
    unset($countries['IL']);
    return view("backend.subvention.create_subvention",compact('countries'));
}
public function show($id){
    $subvention=Subvention::findOrFail($id);
    $subvention->views = $subvention->views + 1;
$subvention->save();

    return redirect()->away($subvention->url);
   }


    public function store(Request $request){
       
        $request->validate(["file"=>"required",
        "title"=>"required",
        "country"=>"required",
        "eligibilities"=>"required",
        "organization"=>"required",
        "url"=>"required|unique:subventions,url"]);
        $subvention=new Subvention();
        $subvention->title=$request->title;
        $subvention->organization=$request->organization;
        $subvention->country=$request->country;
        $subvention->city=$request->city;
        $subvention->eligibilities=$request->eligibilities;
        $subvention->status=1;
        $subvention->url=$request->url;
        
        if($request->hasFile("file")){
             $file=$request->file("file");
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('documents/subventions',$file_name,'public');
            $subvention->file_name=$file_name;

        }
        $subvention->save();
        $notification=array("message"=>"Subvention créée avec succès.","alert-type"=>"success");
         return redirect()->route('subvention.view')->with($notification);
    }

    public function edit($id){
       
        
        try{
        $subvention=Subvention::findOrFail($id); 
        $countries = Countries::getList('en');
    unset($countries['IL']);
        return view("backend.subvention.edit_subvention",compact('subvention','countries'));
        }catch(ModelNotFoundException $e){
            
        $notification = [
            'message' => 'Subvention non trouvée',
            'alert-type' => 'warning',
        ];
      
     
       return redirect()->route("subvention.view")->with($notification);
}

       

    }

    public function update(Request $request,$id){

       $request->validate([
        "title"=>"required","eligibilities"=>"required","country"=>"required","organization"=>"required",
        'url' => [
            'required',
            Rule::unique('subventions', 'url')->ignore($id),
        ]
    ]);
    
      try{ 
      $subvention=Subvention::findOrFail($id);
      $subvention->title=$request->title;
      $subvention->organization=$request->organization;
      $subvention->country=$request->country;
       $subvention->city=$request->city;
        $subvention->eligibilities=$request->eligibilities;
      $subvention->url=$request->url;
       if($request->hasFile("file")){
            if($subvention->file_name && Storage::disk('public')->exists('documents/subventions/'.$subvention->name)){
                Storage::disk('public')->delete('documents/subventions/'.$subvention->name);
            }
            $file=$request->file("file");
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('documents/subventions',$file_name,'public');
        
            $subvention->file_name=$file_name;

        }
      $subvention->save();
      $notification=array("message"=>"Subvention Mise à jour avec succès","alert-type"=>"success");
return redirect()->route("subvention.view")->with($notification);
      }catch(ModelNotFoundException $e){
        $notification = [
            'message' => 'Subvention non trouvée, mise à jour a échoué',
            'alert-type' => 'error',
        ]; 
        return redirect()->route("subvention.view")->with($notification);
      }
     
      



    }


    public function destroy($id){
       
       try {
        $subvention = Subvention::findOrFail($id);
        $subvention->delete();

        $notification = [
            'message' => 'Subvention supprimée avec succès.',
            'alert-type' => 'success',
        ];
        return redirect()->route('subvention.view')->with($notification);

    } catch (ModelNotFoundException $e) {
        $notification = [
            'message' => 'Subvention non trouvée, suppression échouée.',
            'alert-type' => 'error',
        ];
        return redirect()->route("subvention.view")->with($notification);
    }

    
      
    }

    public function changeStatus($id){
        try{
            $subvention=Subvention::findOrFail($id);
            $subvention->status= !$subvention->status;
            $subvention->save();
             $notification = [
            'message' => 'Le statut de la subvention a été modifié avec succès.',
            'alert-type' => 'success',
        ];
return redirect()->route('subvention.view')->with($notification);

        }catch(ModelNotFoundException $e){
        $notification = [
            'message' => 'Le statut de la subvention n’a pas changé',
            'alert-type' => 'warning',
        ];
        return redirect()->route('subvention.view')->with($notification);
        }
        

    }
    

}
