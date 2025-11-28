 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark  text-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                             <hr class="mx-3" />
                            <div class="sb-sidenav-menu-heading">Services</div>
                             <a class="nav-link" href="{{route('admin.users.view')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Utilisateurs
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProjects" aria-expanded="false" aria-controls="collapseProjects">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Projects
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProjects" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('projects.view')}}">Voir tous les projets</a>
                                    <a class="nav-link" href="{{route('project.create')}}">Nouveau projet</a>
                                </nav>
                            </div>
                            <!-- investissements -->
                               <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInvest" aria-expanded="false" aria-controls="collapseInvest">
                                <div class="sb-nav-link-icon"><i class="fas fa-usd"></i></div>
                                Investissements
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseInvest" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('apply.received')}}">Demandes</a>
                                    <a class="nav-link" hhref="{{route('apply.sent')}}">Candidatures</a>
                                </nav>
                            </div>
                            <!-- chat -->
                              <a class="nav-link" href="{{route('chat.list')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sms"></i></div>
                                Chat
                            </a>
                            <!-- formations -->
                               <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFormations" aria-expanded="false" aria-controls="collapseFormations">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Formations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFormations" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('formation.view')}}">Voir tous les formations</a>
                                    <a class="nav-link" href="{{route('formation.create')}}">Nouveau formation</a>
                                </nav>

                            </div>
                            <!-- Subventions -->
                               <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSubventions" aria-expanded="false" aria-controls="collapseSubventions">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                               Subventions
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSubventions" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('subvention.view')}}">Voir tous les subventions</a>
                                    <a class="nav-link" href="{{route('subvention.create')}}">Nouveau subvention</a>
                                </nav>
                            </div>
                           
                             <a class="nav-link" href="{{route('category.view')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-large"></i></div>
                                Catégories
                            </a>
                           <a class="nav-link" href="{{route('tag.view')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                                Tags
                            </a>
                            <div class="sb-sidenav-menu-heading">Authorisations</div>
                            <a class="nav-link" href="{{route('role.view')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tag"></i></div>
                                Rôles
                            </a>
                            <hr  class="mx-3">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profil
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProfile" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('user.profile')}}">Voir Profil</a>
                                    <a class="nav-link" href="{{route('user.profile.edit')}}">Modifier Profil</a>
                                    <a class="nav-link" href="{{route('user.change.password.edit')}}">Changer mot de passe</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                   
                </nav>
            </div>