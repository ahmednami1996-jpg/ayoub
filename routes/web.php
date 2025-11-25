<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FormationController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SubventionController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\admin\LocationController;
/*------------------ public routes -------------------*/
Route::middleware(['guest'])->group(function () {
Route::get('/',function(){return view("layouts.home_master");});
Route::get("/logout",[UserController::class,'logout'])->name("user.logout");
Route::get("/login-page",[UserController::class,'loginPage'])->name("user.login.view");
Route::get("/register-page",[UserController::class,'registerPage'])->name("user.register.view");
Route::post("/login",[UserController::class,'login'])->name("user.login");
Route::post("/register",[UserController::class,'signUp'])->name("user.register");
});

Route::get("/home",[HomeController::class,'index'])->name("home");
Route::get("/contact",[HomeController::class,'showContactPage'])->name("home.contact");
Route::post("/contact/send",[HomeController::class,'contactUs'])->name("home.contactUs");
Route::get("/apropos",[HomeController::class,'showAboutPage'])->name("home.about");
Route::get("/projects",[ProjectController::class,'showProjects'])->name("home.projects");
Route::get("/project/{id}",[ProjectController::class,'show'])->name("home.project");
Route::get("/subventions",[SubventionController::class,'showSubventions'])->name("home.subventions");
Route::get("/subvention/{id}",[SubventionController::class,'show'])->name("home.subvention");
Route::get("/formation/{id}",[FormationController::class,'show'])->name("home.formation");
Route::get("/formations",[FormationController::class,'showFormations'])->name("home.formations");

/**   -------------------- logout route --------------------*/
Route::middleware('auth')->group(function(){
    Route::prefix('user')->group(function () {
        Route::get("/project/{id}/apply",[ApplicationController::class,'create'])->name("apply.create");

 Route::get("/applications/sent", [ApplicationController::class,'showSentApplications'])
        ->name("apply.sent");

   
    Route::get("/applications/received", [ApplicationController::class,'showReceivedApplications'])
        ->name("apply.received"); 

   
    Route::get("/application/{id}/edit", [ApplicationController::class,'edit'])
        ->name("apply.edit");

    Route::post("/application/{id}/update", [ApplicationController::class,'update'])
        ->name("apply.update");

    Route::post("/application/{id}/change-status", [ApplicationController::class,'changeStatus'])
        ->name("apply.approve");
        Route::post("/project/{id}/apply", [ApplicationController::class,'apply'])->name('apply');
        Route::get("/chatlist",[ChatController::class,'chatList'])->name("chat.list");
Route::get('/chat/{receiverId}', [ChatController::class, 'chat'])->name('chat');
Route::post('/chat/{receiverId}/send', [ChatController::class, 'sendMessage']);

  
});
    Route::get("/logout", [UserController::class,'logout'])->name("user.logout");
});


/**  ------------------------Admin routes -------------------*/

Route::middleware(['auth','role:admin'])->prefix("admin")->group(function(){

// dashboard route    
Route::get('/dashboard', fn() => view('admin.admin'))->name("admin.dashboard");

// category routes
Route::get("/categories/view",[CategoryController::class,"index"])->name('category.view');
Route::post("/categories/store",[CategoryController::class,"store"])->name('category.store');
Route::get("/categories/{id}/edit",[CategoryController::class,"edit"])->name('category.edit');
Route::post("/categories/{id}/update",[CategoryController::class,"update"])->name('category.update');
Route::get("/categories/{id}/delete",[CategoryController::class,"destroy"])->name('category.destroy');

// role routes
Route::get("/roles/view",[RoleController::class,"index"])->name('role.view');
Route::post("/roles/store",[RoleController::class,"store"])->name('role.store');
Route::get("/roles/{id}/edit",[RoleController::class,"edit"])->name('role.edit');
Route::post("/roles/{id}/update",[RoleController::class,"update"])->name('role.update');
Route::get("/roles/{id}/delete",[RoleController::class,"destroy"])->name('role.destroy');

// tag routes
Route::get("/tags/view",[TagController::class,"index"])->name('tag.view');
Route::post("/tags/store",[TagController::class,"store"])->name('tag.store');
Route::get("/tags/{id}/edit",[TagController::class,"edit"])->name('tag.edit');
Route::post("/tags/{id}/update",[TagController::class,"update"])->name('tag.update');
Route::get("/tags/{id}/delete",[TagController::class,"destroy"])->name('tag.destroy');

// subvention routes

Route::get("/subventions/view",[SubventionController::class,"index"])->name('subvention.view');
Route::post("/subventions/store",[SubventionController::class,"store"])->name('subvention.store');
Route::get("/subventions/create",[SubventionController::class,"create"])->name('subvention.create');
Route::get("/subventions/{id}/edit",[SubventionController::class,"edit"])->name('subvention.edit');
Route::post("/subventions/{id}/update",[SubventionController::class,"update"])->name('subvention.update');
Route::get("/subventions/{id}/delete",[SubventionController::class,"destroy"])->name('subvention.destroy');
Route::post("/subventions/{id}/change-status",[SubventionController::class,"changeStatus"])->name('subvention.change.status');

// formation routes

Route::get("/formations/view",[FormationController::class,"index"])->name('formation.view');
Route::post("/formations/store",[FormationController::class,"store"])->name('formation.store');
Route::get("/formations/create",[FormationController::class,"create"])->name('formation.create');
Route::get("/formations/{id}/edit",[FormationController::class,"edit"])->name('formation.edit');
Route::post("/formations/{id}/update",[FormationController::class,"update"])->name('formation.update');
Route::get("/formations/{id}/delete",[FormationController::class,"destroy"])->name('formation.destroy');
Route::post("/formations/{id}/change-status",[FormationController::class,"changeStatus"])->name('formation.change.status');

// projects routes

Route::post("/projects/{id}/change-status",[ProjectController::class,"changeStatus"])->name('project.change.status');
Route::post("/projects/{id}/change-taken",[ProjectController::class,"changeTaken"])->name('project.change.taken');




//  users route

Route::get("/users/view/",[AdminController::class,'allUsers'])->name('admin.users.view');
Route::get("/users/{id}/edit",[AdminController::class,'adminEditUser'])->name('admin.user.edit');
Route::post("/users/{id}/update",[AdminController::class,'adminUpdateUser'])->name('admin.user.update');
Route::get("/users/{id}/delete",[AdminController::class,'adminDestroyUser'])->name('admin.user.destroy');


});
Route::get("/projects/create",[ProjectController::class,"create"])->name('project.create');
Route::middleware(['auth'])->prefix("admin")->group(function(){
    // dashboard route    
Route::get('/dashboard', fn() => view('admin.admin'))->name("admin.dashboard");
Route::get("/projects/view",[ProjectController::class,"index"])->name('projects.view');


Route::post("/projects/store",[ProjectController::class,"store"])->name('project.store');
Route::get("/projects/{id}/edit",[ProjectController::class,"edit"])->name('project.edit');
Route::post("/projects/{id}/update",[ProjectController::class,"update"])->name('project.update');
Route::get("/projects/{id}/delete",[ProjectController::class,"destroy"])->name('project.destroy');});
/** --------------------- user routes -------------- */
Route::middleware(['auth','role:user,admin'])->group(function (){
Route::prefix('user')->group(function () {
// chat route

// user route
Route::get("/profile",[UserController::class,'profile'])->name('user.profile');
Route::get("/profile/edit",[UserController::class,'profileEdit'])->name('user.profile.edit');
Route::post("/profile/update",[UserController::class,'profileUpdate'])->name('user.profile.update');
Route::post("/profile/delete",[UserController::class,'profileDestroy'])->name('user.profile.destroy');
Route::get("/change-password",[UserController::class,'changePasswordEdit'])->name('user.change.password.edit');
Route::post("/change-password/update",[UserController::class,'changePasswordUpdate'])->name('user.change.password.update');

//apply routes

//   

    
   

});}
);


