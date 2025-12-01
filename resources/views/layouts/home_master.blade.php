<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])   
   

</head>
<body>

  <!-- Header -->
  
    
     <!-- ========== NEW CLEAN HEADER ========== -->
<header class="border-bottom shadow-sm bg-white sticky-top">
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <!-- Logo Left -->
      <a class="navbar-brand" href="{{route('home')}}">
        <img src="{{asset('storage/logo.png')}}" alt="Logo" height="45">
      </a>

      <!-- Hamburger Button (mobile only) -->
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Center Links + Right Button -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto gap-lg-3">
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.about')}}">À propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.projects')}}">Projets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.formations')}}">Formations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.subventions')}}">Subventions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.contact')}}">Contact</a>
          </li>
        </ul>

        <!-- Right Side: Auth Button + Profile Dropdown -->
        <div class="d-flex align-items-center gap-3">
          <!-- Sign In / Sign Up Button -->
           @guest
        
            <a href="{{route('user.login.view')}}" id="auth-btn" class="btn text-white text-decoration-none">Sign In / Sign Up</a>
        
          @endguest

          <!-- Profile Dropdown (shown when logged in) -->
           @auth
          <div id="profile-info" class="dropdown" >
            <button class="btn btn-light d-flex align-items-center gap-2 border rounded-pill px-3 py-2" 
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img id="profile-pic" src="{{asset('storage/images/users/'.auth()->user()->picture)}}" alt="Profile" class="rounded-circle" width="36" height="36">
              <span id="profile-name" class="fw-medium">{{auth()->user()->username}}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
              <li><a class="dropdown-item" href="{{route('user.profile')}}">Profile</a></li>
              <li><a class="dropdown-item" href="{{route('user.profile')}}">Table de bord</a></li>
             
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="{{route('user.logout')}}">Logout</a></li>
            </ul>
          </div>
          @endauth
        </div>
      </div>

    </div>
  </nav>
</header>



@yield("homeSection")

   <!-- footer -->
  <footer class="site-footer">
    <div class="footer-container">
      
      <!-- LEFT: Logo + Social -->
      <div class="left-col">
        <img src="{{asset('storage/logo.png')}}" alt="Logo" class="logo">
        <p>Créer, Investir, Réussir Ensemble.</p>
        <div class="social-media">
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="rights-text">© 2025 - Tous droits réservés.</p>
      </div>
  
      <!-- MIDDLE: Links -->
      <div class="mid-col">
        <h1>Liens rapides</h1>
        <div class="border"></div>
        <ul>
          <li><a href="{{route('home.about')}}">A propos</a></li>
          <li><a href="{{route('home.projects')}}">Projets</a></li>
          <li><a href="{{route('home.formations')}}">Formations</a></li>
          <li><a href="{{route('home.subventions')}}">Subventions</a></li>
          <li><a href="{{route('home.contact')}}">Contact</a></li>
        </ul>
      </div>
  
      <!-- RIGHT: Newsletter -->
      <div class="right-col">
        <h1>Newsletter</h1>
        <div class="border"></div>
        <p>Entrez votre email pour recevoir nos actualités.</p>
        <form class="newsletter-form">
          <input type="email" class="txtb" placeholder="Entrez votre email" required>
          <button type="submit" class="btn">S’abonner</button>
        </form>
      </div>
  
    </div>
  </footer>

  
<script>
   document.addEventListener("DOMContentLoaded", function() {
    @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
   })

</script>
  

</body>
</html>