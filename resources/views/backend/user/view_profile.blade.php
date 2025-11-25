@extends("layouts.admin_master")
@section("adminSection")




<div class="profile-card row align-items-start my-3">
    <!-- Left Column -->
    <div class="col-md-3 text-center mr-2">
      <img src="{{asset('storage/images/users/'.auth()->user()->picture)}}" class="profile-img" alt="Profile Picture" style="width:14rem;height:14rem">
      <div class="mt-3 text-start">
       
        <div class="info-section">
          <h6>Rôles</h6>
          <div class="roles">
            @foreach(auth()->user()->roles as $role)
 <span class="badge badge-pill badge-primary p-3">{{$role->name}}</span>


            @endforeach
           
          
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="col-md-8">
      <div class="d-flex justify-content-between align-items-start">
        <div>
          <h3 class="mb-0">{{auth()->user()->firstname.' '.auth()->user()->lastname}}</h3>
          <p class="text-primary">{{auth()->user()->occupation}}</p>
          <p class="text-muted"><i class="bi bi-geo-alt"></i> {{auth()->user()->city}}, {{auth()->user()->country}}</p>
        </div>
        <a href="{{route('user.profile.edit')}}" class="btn btn-outline-secondary">Modifier Profile</a>
       
      </div>

     

   
      <ul class="nav nav-tabs mt-4">
       
        <li class="nav-item">
          <a class="nav-link active" href="#">à propos</a>
        </li>
      </ul>

      <div class="mt-4">
        <h6>information de contact</h6>
       
        <p><strong>Adresse:</strong> {{auth()->user()->address}}</p>
        <p><strong>E-mail:</strong> <a href="mailto:{{auth()->user()->email}}" class="text-decoration-none text-primary">{{auth()->user()->email}}</a></p>
        

        <h6 class="mt-4">information de base</h6>
        <p><strong>Date de naissance:</strong> June 5, 1992</p>
        <p><strong>Genre:</strong> {{auth()->user()->gender}}</p>
      </div>
    </div>
  </div>



@endsection