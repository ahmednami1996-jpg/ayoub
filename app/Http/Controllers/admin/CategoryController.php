<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.category.view_category',compact('categories'));
    }

    
   
    public function store(Request $request)
    {
        
        $notification="";
        $validation=$request->validate(["name"=>"required|unique:categories,name"]);
   
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        $notification=array("message"=>"La catégorie a été créée avec succès.","alert-type"=>"success");
         return redirect()->route('category.view')->with($notification);


    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
 $category=Category::findOrFail($id);
 return view("backend.category.edit_category",compact("category"));
        }catch(ModelNotFoundException $e){
 $notification=array("message"=>"Catégorie introuvable","alert-type"=>"warning");
            return redirect()->route("category.view")->with($notification);
        }
       
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        
        'name' => [
            'required',
            Rule::unique('categories', 'name')->ignore($id),
        ]
    ]);

    try{
$category=Category::findOrFail($id);  
$category->name=$request->name;
        $category->save();  
      $notification=array("message"=>"La catégorie a été mise à jour avec succès.","alert-type"=>"success");
       
    }catch(ModelNotFoundException $e){
 
     $notification=array("message"=>"Échec de la mise à jour de la catégorie. Veuillez réessayer.","alert-type"=>"warning");
 
}
        
     return redirect()->route("category.view")->with($notification);  
      
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $category=Category::findOrFail($id); 
            $category->delete();
        $notification=array("message"=>"La catégorie a été supprimée avec succès.","alert-type"=>"info");

        }catch(ModelNotFoundException $e){
                    $notification=array("message"=>"Échec de la suppression de la catégorie. Veuillez réessayer.","alert-type"=>"");

        }
      
    
      return redirect()->route('category.view')->with($notification);

    }
}
