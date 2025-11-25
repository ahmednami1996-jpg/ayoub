<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;
use Monarobase\CountryList\CountryListFacade as Countries;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UserController extends Controller
{
  protected $authService;
  
  

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
 

  
public function profile(){
   $user=auth()->user();
   return view("backend.user.view_profile",compact("user"));
   
}
   public function signUp(Request $request){

  $validated=$request->validate([
   'firstname'=>['required','string','max:255'],
   
   'lastname'=>['required','string','max:255'],
   'username'=>['required','string','max:255','unique:users,username'],
   'email'=>['required','string','email','max:255','unique:users,email'],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],


  ]);

 
  $validated['password']=Hash::make($validated['password']);
  $validated["picture"]= "no-image.png";
  $validated["is_online"]=1;

  
  event(new Registered($user=User::create($validated)));
  
 
 
   $role=Role::where("name","user")->get();
  
  $user->roles()->attach($role);

  Auth::login($user);
  return redirect()->route("user.profile.edit"); 

   }
   public function login(Request $request){
        $this->authService->login($request);
        auth()->user()->is_online=1;
        auth()->user()->save();
        return redirect()->route('user.profile.edit');

   }
  
   public function profileEdit(){
     try{

         $user=auth()->user();
         $countries = Countries::getList('en');
    unset($countries['IL']);
         
         return view('backend.user.edit_profile',compact('user','countries'));
      }catch(ModelNotFoundException $e){

        return view("notfound");
      }

   }
   public function profileUpdate(Request $request){
$user=auth()->user();
      $validated=$request->validate([
         "firstname"=>"required|string|max:255",
         "lastname"=>"required|string|max:255",
         "username"=>"required|string|max:255|unique:users,username,".$user->id,
         "email"=>"required|email|unique:users,email,".$user->id,
         

         "password"=>"required"]);
         
        if (! Hash::check($request->password, $user->password)) {
            $incorrect_password='The current password is incorrect.';
        return back()->with($incorrect_password);
        }
        try{
         $user=User::findOrFail($user->id);
      
         $user->firstname=$request->firstname;
         $user->lastname=$request->lastname;
         $user->email=$request->email;
         $user->username=$request->username;
         $user->gender=$request->gender;
        
         $user->address=$request->address;
         $user->country=$request->country;
         $user->city=$request->city;
         $user->occupation=$request->occupation;
       
         if($request->hasFile('picture')){
          $file=$request->file("picture");
           $originalName = $file->getClientOriginalName();
          if($originalName!="no-image.png" && Storage::disk('public')->exists('images/users/'.$user->picture)){
            Storage::disk('public')->delete('images/users/'.$user->picture);
        }
         $uuid = Str::uuid()->toString();
         $file_name=time().'-'.$uuid.'.'.$file->getClientOriginalExtension();
         $file->storeAs('images/users',$file_name,'public');
         $user->picture=$file_name;
          }
         
         
         $user->save();
         $notification="";
        
        return redirect()->route("user.profile.edit")->with($notification);
       }catch(ModelNotFoundException $e){
         return view("notfound");
       }

     


   }
   public function profileDestroy(){
      try{
        $auth=auth()->user();
         $user=User::findOrFail($auth->id);
         $user->delete();
      }catch(ModelNotFoundException $e){
        return view("notfound");

      }

   }
   public function changePasswordEdit(){
      $id=auth()->user()->id;
      return view("backend.user.change_password",compact('id'));
   }
   public function changePasswordUpdate(Request $request){


      $user=auth()->user();
      $request->validate(["current_password"=>"required|string",
      "password"=>"required|string|min:8|confirmed"]);

     
      if(! Hash::check($request->current_password, $user->password)) {
        $incorrect_password='The current password is incorrect.';
        return back()->width($incorrect_password);
    }
   $user->password=Hash::make($request->password);
   $user->save();
   $notification="";
   Auth::logout();
return redirect()->route("user.register.view");

   


   }


   public function logout(){
      
$user=auth()->user();
if($user){$user->is_online=0;
$user->save();}
Auth::logout();
request()->session()->invalidate();  
    request()->session()->regenerateToken();
return redirect()->route("home");
   }

   public function loginPage(){

return view("home.login");
   }
   public function registerPage(){
return view("home.register");

   }




}
