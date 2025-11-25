 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
         <img class="img img-responsive" src="{{asset('storage/logo.png')}}" style="width:5rem"/>
        </div>
        <div class="sidebar-brand-text mx-3">
         
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
       Services
      </div>
  <!-- Nav Item - Projects Collapse Menu -->
  @if(auth()->user()->hasRole('admin'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.users.view')}}">
          <i class="fas fa-users"></i>
          <span>Utilisateurs</span></a>
      </li>
      @endif
      <!-- Nav Item - Projects Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjects" aria-expanded="true" aria-controls="collapseProjects">
         <i class="fas fa-tasks"></i>
          <span>Projets</span>
        </a>
        <div id="collapseProjects" class="collapse" aria-labelledby="headingProjects" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('projects.view')}}">Voir tous les projets</a>
            <a class="collapse-item" href="{{route('project.create')}}">Nouveau projet</a>
          </div>
        </div>
      </li>
          <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvestments" aria-expanded="true" aria-controls="collapseInvestments">
           <i class="fas fa-hand-holding-usd"></i>
          <span>Investissements</span>
        </a>
        <div id="collapseInvestments" class="collapse" aria-labelledby="headingInvestments" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('apply.received')}}">Demandes</a>
            <a class="collapse-item" href="{{route('apply.sent')}}">Candidatures</a>
          </div>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('chat.list')}}">
          <i class="fas fa-sms"></i>
          <span>Chat</span></a>
      </li>
       <!-- Nav Item - Formations Collapse Menu -->
        @if(auth()->user()->hasRole('admin'))
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFormations" aria-expanded="true" aria-controls="collapseFormations">
          <i class="fas fa-chalkboard-teacher"></i> 
          <span>Formations</span>
        </a>
        <div id="collapseFormations" class="collapse" aria-labelledby="headingFormations" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('formation.view')}}">Voir tous les formations</a>
            <a class="collapse-item" href="{{route('formation.create')}}">Nouveau formation</a>
          </div>
        </div>
      </li>
       <!-- Nav Item - subventions Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubventions" aria-expanded="true" aria-controls="collapseSubventions">
           <i class="fas fa-hand-holding-usd"></i>
          <span>Subventions</span>
        </a>
        <div id="collapseSubventions" class="collapse" aria-labelledby="headingSubventions" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('subvention.view')}}">Voir tous les subventions</a>
            <a class="collapse-item" href="{{route('subvention.create')}}">Nouveau subvention</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Categories Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('category.view')}}">
          <i class="fas fa-th-large"></i>
          <span>Catégories</span></a>
      </li>
       <!-- Nav Item - tags Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('tag.view')}}">
          <i class="fas fa-tags"></i>
          <span>Tags</span></a>
      </li>
     

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Authorisations
      </div>

      <!-- Nav Item - Roles Collapse Menu -->
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('role.view')}}">
          <i class="fas fa-user-tag"></i>
          <span>Rôles</span></a>
      </li>
      </li>
      @endif
      <!-- Divider -->
      <hr class="sidebar-divider">
    <!-- Nav Item - subventions Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
          <i class="fas fa-user"></i>
          <span>Profil</span>
        </a>
        <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('user.profile')}}">Voir Profil</a>
            <a class="collapse-item" href="{{route('user.profile.edit')}}">Modifier Profil</a>
            <a class="collapse-item" href="{{route('user.change.password.edit')}}">Changer mot de passe</a>
          </div>
        </div>
      </li>
        
      </li>

     


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>