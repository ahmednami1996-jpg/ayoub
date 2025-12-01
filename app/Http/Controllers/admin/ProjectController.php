<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Monarobase\CountryList\CountryListFacade as Countries;
class ProjectController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $user=auth()->user();
        if($user->hasRole("admin")){
          $projects=Project::orderBy('created_at', 'desc')->get();
        }else{
           $projects=Project::where("user_id",$user->id)->orderBy('created_at', 'desc')->get();  
        }
       

        return view("backend.project.view_project",compact('projects'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
              $countries = Countries::getList('en');
    unset($countries['IL']);
            $categories=Category::all();
        $tags=Tag::all();
        return view("backend.project.create_project",compact('categories','tags','countries')); 
        }else{
            return redirect()->route('user.login.view');
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["title"=>"required",
        "resume"=>"required|max:300","budget"=>"required|numeric",
        "documents.*"=>"required|file|max:100000"]);
        
       $project=new Project();
       $project->title=$request->title;
       $project->description=$request->description;
       $project->resume=$request->resume;
       $project->budget=$request->budget;
       $project->market=$request->market;
       $project->investment_type=$request->investment_type;
       $project->kpi_users=$request->kpi_users;
       $project->monthly_growth_p=$request->monthly_growth_p;
       $project->annual_revenue=$request->annual_revenue;
       $project->retention_rate_p=$request->retention_rate_p;
       $project->is_taken=0;
       $project->category_id=$request->category_id;
       $project->country=$request->country;
       $project->city=$request->city;
       
       $project->user_id=auth()->user()->id;
       
       $project->status="pending";



       // upload business model
        if($request->hasFile('business_model')){
         $file=$request->file("business_model");
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('documents/projects',$file_name,'public');
         $project->business_model=$file_name;
        }

       
       // upload and save image
      if($request->hasFile('picture')){
         $file=$request->file("picture");
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('images/projects',$file_name,'public');
         $project->picture=$file_name;
        }else{
            $project->picture="default-profile.png";

        }
       $project->save();
       // upload and save files
        $project->tags()->sync($request->tags_id);
       if($request->hasFile("documents")){

        foreach($request->file('documents') as $file){
        
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         echo $file_name."</br>";
         $file->storeAs('documents/projects',$file_name,'public');
         $project->documents()->create([
                'file_name' => $file_name
            ]);
        }
       }
   




       $notification=array("message"=>"Le projet a été créé avec succès.","alert-type"=>"success");
         return redirect()->route('projects.view')->with($notification);


    
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
       try{
        $project=Project::findOrFail($id);
      

    if (($project->status == "pending" || $project->status == "rejected") 
        && !auth()->user()->hasRole('admin')) {

        $notification = [
            "message" => "Vous ne pouvez pas accéder à cette page",
            "alert-type" => "warning"
        ];
        
        return redirect()->back()->with($notification);

    } else {
        $categories = Category::all();
        $project->views=$project->views+1;
        return view("home.single_project", compact("project", "categories"));
    }
       }catch(ModelNotFoundException $e){
       
        $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);
       }
    }
public function showProjects(Request $request){
 $query = Project::query();

// Filter projects where status is not pending
$query->whereNotIn('status',['rejected', 'pending']);

// Combine search filters with OR
if ($request->search) {
    $search = $request->search;
    $query->where(function($q) use ($search) {
        $q->where('title', 'LIKE', "%{$search}%")
          ->orWhere('description', 'LIKE', "%{$search}%")
          ->orWhereHas('tags', function($q2) use ($search) {
              $q2->where('name', 'LIKE', "%{$search}%");
          });
    });
}

// Category filter
if ($request->category_id) {
    $query->orWhere('category_id', $request->category_id);
}

// Investment type
if ($request->investment_type) {
    $query->orWhere('investment_type', $request->investment_type);
}

// Country
if ($request->country) {
    $query->orWhere('country', $request->country);
}

// City
if ($request->city) {
    $query->orWhere('city', 'LIKE', "%{$request->city}%");
}

// Sorting
if ($request->sort == 'new') {
    $query->orderBy('created_at', 'desc');
} elseif ($request->sort == 'old') {
    $query->orderBy('created_at', 'asc');
}

$projects = $query->paginate(16)->withQueryString();

$countries = Countries::getList('en');
unset($countries['IL']);
$categories = Category::all();

return view('home.projects', compact('projects', 'categories', 'countries'));

}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
          try{
             $countries = Countries::getList('en');
    unset($countries['IL']);
        $project=Project::findOrFail($id);
        $categories=Category::all();
        $tags=Tag::all();
       
            return view("backend.project.edit_project",compact("project","tags","categories","countries"));
       
      
       }catch(ModelNotFoundException $e){
       
        $notification=array("message"=>"vous ne pouvez pas accéder à cette page","alert-type"=>"warning");
         return redirect()->back()->with($notification);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        

       try{
         $project=Project::findOrFail($id);
       $project->title=$request->title;
       $project->description=$request->description;
       $project->resume=$request->resume;
       $project->budget=$request->budget;
       $project->market=$request->market;
        $project->country=$request->country;
       $project->city=$request->city;
      
       $project->investment_type=$request->investment_type;
       $project->kpi_users=$request->kpi_users;
        $project->monthly_growth_p=$request->monthly_growth_p;
       $project->annual_revenue=$request->annual_revenue;
       $project->retention_rate_p=$request->retention_rate_p;
       
       $project->category_id=$request->category_id;
       
       if($request->hasFile('business_model')){
          $file=$request->file("business_model");
           
          if(Storage::disk('public')->exists('documents/projects/'.$project->business_model)){
            Storage::disk('public')->delete('documents/projects/'.$project->business_model);
        }
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('documents/projects',$file_name,'public');
         $project->business_model=$file_name;
          }




       
       if($request->hasFile('picture')){
          $file=$request->file("picture");
           $originalName = $file->getClientOriginalName();
          if($originalName!="no-image.png" && Storage::disk('public')->exists('images/projects/'.$project->picture)){
            Storage::disk('public')->delete('images/projects/'.$project->picture);
        }
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('images/projects',$file_name,'public');
         $project->picture=$file_name;
          }
       $project->save();
 $project->tags()->sync($request->tags_id);
       // upload and save files
        
      $keepIds = $request->old_documents ?? [];

    // 3️⃣ Delete all OLD documents that are not in keepIds
    $project->documents()
        ->whereNotIn('id', $keepIds)
        ->get()
        ->each(function ($doc) {

            // Delete file from storage
            Storage::disk('public')->delete('documents/projects/'.$doc->filename);

            // Delete DB record
            $doc->delete();
        });

    // 4️⃣ Add NEW documents (if uploaded)
    if ($request->hasFile('documents')) {
        foreach ($request->file('documents') as $file) {

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('documents/projects', $filename, 'public');

            // Save in database
            $project->documents()->create([
                'file_name' => $filename
            ]);
        }
    }




       $notification=array("message"=>"Le projet a été mis à jour avec succès.","alert-type"=>"success");
         return redirect()->route('projects.view')->with($notification);
       }catch(ModelNotFoundException $e){
         $notification=array("message"=>"Échec de la mise à jour du projet. Veuillez réessayer.","alert-type"=>"error");
         return redirect()->route('projects.view')->with($notification);
       }
      
      
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
       
       try {
        $project = Project::findOrFail($id);
        $project->delete();

        $notification = [
            'message' => 'Le projet a été supprimé avec succès.',
            'alert-type' => 'success',
        ];
 return redirect()->route('projects.view')->with($notification);
    } catch (ModelNotFoundException $e) {
          $notification = [
            'message' => 'Échec de la suppression du projet. Veuillez réessayer.',
            'alert-type' => 'error',
        ];
 return redirect()->route('projects.view')->with($notification);
       
    }

   
      
    }

   public function changeStatus(Request $request,$id){
   $request->validate(["status"=>"required"]);
   try{
    $project=Project::findOrFail($id);
    $project->status=$request->status;
    $project->save();
    $notification=array("message"=>"statut a changé avec succès.","alert-type"=>"success");
    return redirect()->route('projects.view')->with($notification);
   }catch(ModelNotFoundException $e){
      $notification = [
            'message' => 'vous ne pouvez pas accéder à cette page',
            'alert-type' => 'error',
        ];
 return redirect()->route('projects.view')->with($notification);
   }
   }


    public function changeTaken(Request $request,$id){
   $request->validate(["is_taken"=>"required"]);
   try{
    $project=Project::findOrFail($id);
    if($project->user()->id == auth()->id){
     $project->is_taken=!$project->is_taken; 
     $project->save();
     $notification=array("message"=>"statut a changé avec succès.","alert-type"=>"success");
    return redirect()->route('projects.view')->with($notification);
    }else{
       $notification = [
            'message' => 'vous ne pouvez pas accéder à cette page',
            'alert-type' => 'error',
        ];
 return redirect()->route('projects.view')->with($notification);
    }
   
   
   }catch(ModelNotFoundException $e){
     $notification = [
            'message' => 'vous ne pouvez pas accéder à cette page',
            'alert-type' => 'warning',
        ];
 return redirect()->route('projects.view')->with($notification);
   }
   }


  




}