<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

  <!-- Header -->
  
    
    
  <header class="border-bottom">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
        <img src="{{asset('storage/logo.png')}}" alt="Logo" height="40" class="mr-2">
      </a>

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
              aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse justify-content-center" id="mainNav">

        <ul class="navbar-nav mb-2 mb-lg-0 ml-lg-4">
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-semibold" href="{{route('home.about')}}">À propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-semibold" href="{{route('home.projects')}}">Projets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-semibold" href="{{route('home.formations')}}">Formations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-semibold" href="{{route('home.subventions')}}">Subventions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-semibold" href="{{route('home.contact')}}">Contact</a>
          </li>
        </ul>

        <!-- Right Buttons -->
        <div class="ml-auto d-flex flex-column flex-lg-row align-items-lg-center">

        @guest
          <!-- Sign In / Sign Up -->
          <a id="auth-btn" href="{{route('user.login.view')}}" class="btn btn-primary mb-2 mb-lg-0 mr-lg-2 text-center">Sign In / Sign Up</a>
@endguest
          <!-- Profile Dropdown -->
           @auth
 <div id="profile-info" class="dropdown mx-auto mx-lg-0">
            <button class="btn btn-light d-flex align-items-center" type="button" id="profileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="border:1px solid rgba(0,0,0,0.2); border-radius:50px; padding:2px 10px;">
              <img src="{{asset('storage/images/users/'.auth()->user()->picture)}}" alt="Profile" class="rounded-circle mr-2" width="35" height="35">
              <span>{{auth()->user()->username}}</span>
            </button>

            <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{route('user.profile')}}">Profil</a>
              <a class="dropdown-item" href="{{route('admin.dashboard')}}">Table de bord</a>
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="{{route('user.logout')}}">Logout</a>
            </div>
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
        <img src="logo.png" alt="Logo" class="logo">
        <p>lorem ipsum lorem ipsum.</p>
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
        <form action="route('admin.newsletter')" class="newsletter-form" method="post">
          @csrf
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