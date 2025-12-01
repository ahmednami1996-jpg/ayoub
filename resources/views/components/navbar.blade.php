@php
    use App\Services\ConversationsService;
    $service = app(ConversationsService::class);
    $conversations = $service->getConversations(3);
@endphp
 <nav class="sb-topnav navbar navbar-expand  " >
            <!-- Navbar Brand-->
            <a class="navbar-brand py-1 text-center " href="{{route('home')}}" id="adminLogo" >
                <img src="{{asset('storage/logo-bright.png')}}" style="width:150px;height:50px;" alt="">
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 mx-3 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('home')}}">
                        <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>  
                        Accueil
                        </a></li>
                        <li><a class="dropdown-item" href="{{route('user.profile')}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="{{route('user.profile.edit')}}">
                           <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                           Paramètres</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item"href="{{route('user.logout')}}" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


          

            
             
            
             