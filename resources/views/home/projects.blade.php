@extends("layouts.home_master")

@section("homeSection")

<x-banner title="Mes projets" />





<!-- Section: Projets Grid -->
<section class="projet py-5">

  




    <div class="container-fluid ">
        <!--  -->
        <div class="row justify-content-center">
            <div class="col-md-3 "  >
               <div class="card shadow-sm mb-4" >
    <div class="card-header bg-primary text-white py-2">
        <h6 class="mb-0">Filtrer Projets</h6>
    </div>

    <div class="card-body p-3">
        <form method="GET" action="{{ route('home.projects') }}">

          
            <div class="form-group">
                <label for="search">recherche</label>
                <input type="text" name="search" id="search" 
                       value="{{ request('search') }}" 
                       class="form-control form-control-sm"
                       placeholder="Search by title or keywords">
            </div>

           <div class="row">
            <div class="col-md-6">  <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select name="category_id" id="category_id" class="form-control form-control-sm">
                    <option value="">-- Toutes les catégories --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" 
                            {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div></div>
            <div class="col-md-6"> <div class="form-group">
                <label for="investment_type">Type d'investissement</label>
                <select name="investment_type" id="investment_type" class="form-control form-control-sm">
                    <option value="">-- Tous les types --</option>
                    
                        <option value="financial" {{request('investment_type')== "financial" ? "selected" :""}}>Investissement financier</option>
                        <option value="materiel" {{request('investment_type')== "material" ? "selected" :""}}>Investissement matériel</option>
                        <option value="immaterial" {{request('investment_type')== "immaterial" ? "selected" :""}}>Investissement immatériel</option>
                        <option value="human" {{request('investment_type')== "human" ? "selected" :""}}>Investissement humain</option>
                        <option value="technology" {{request('investment_type')== "technology" ? "selected" :""}}>Investissement technologique</option>
                        <option value="commercial" {{request('investment_type')== "commercial" ? "selected" :""}}>Investissement commercial</option>
                        <option value="operational" {{request('investment_type')== "operational" ? "selected" :""}}>Investissement opérationnel</option>
                        <option value="strategic" {{request('investment_type')== "strategic" ? "selected" :""}}>Investissement stratégique</option>
                </select>
            </div></div>
           </div>
          
<div class="row">
    <div class="col-md-6">
           <div class="form-group">
                <label for="country">Pays</label>
                <select name="country" id="country" class="form-control form-control-sm">
                    <option value="">-- Tous les pays --</option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}" 
                            {{ request('country') == $country ? 'selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="col-md-6"><div class="form-group">
                <label for="city">Ville</label>
                <input type="text" name="city" id="city"
                       value="{{ request('city') }}" 
                       class="form-control form-control-sm"
                       placeholder="City">
            </div></div>
</div>
           
           

          
         

            
            

         
            <div class="form-group">
                <label for="sort">Trier par</label>
                <select name="sort" id="sort" class="form-control form-control-sm">
                    <option value="">par défaut</option>
                    <option value="new" {{ request('sort')=='new' ? 'selected' : '' }}>plus récent</option>
                    <option value="old" {{ request('sort')=='old' ? 'selected' : '' }}>plus ancien</option>
                </select>
            </div>

            <button class="btn btn-primary btn-sm btn-block" type="submit">
                Appliquer
            </button>

            <a href="{{ route('home.projects') }}" class="btn btn-secondary btn-sm btn-block mt-2">
                Réinitialiser
            </a>
        </form>
    </div>
</div>


            </div>
            <div class="col-md-8">
                <div class="row">
                    @if(isset($projects) && $projects->count()>0)


                    @foreach($projects as $key =>$project)

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{asset('storage/images/projects/'.$project->picture)}}" class="card-img-top" alt="Produit 5">
                            <div class="card-body d-flex flex-column">

                                <div class="tags mb-2 d-flex flex-wrap gap-1">
                                    @foreach($project->tags as $tag)
                                    <span class="tag">{{$tag->name}}</span>
                                    @endforeach

                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title mb-1 fw-bold">{{$project->title}}</h5>
                                        <div class="views d-flex align-items-center gap-2">
                                            <i class="bi bi-eye"></i>
                                            <span>
                                                {{ $project->views >= 1000 ? number_format($project->views / 1000, 1) . 'K' : $project->views }}
                                                Vues
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                        <p class="text-muted mb-0 small">
                                            @foreach($categories as $category)
                                            {{$category->id == $project->category_id ? $category->name:""}}
                                            @endforeach
                                        </p>
                                        <div class="d-flex align-items-center gap-1 text-muted small">
                                            <i class="bi bi-geo-alt-fill"></i>
                                            <span>{{$project->city.', '.$project->country}}</span>
                                        </div>
                                    </div>
                                    <div class="business-model d-flex align-items-center gap-2 mt-2">
                                        <span class="text-muted small">Business Model:</span>
                                        <a href="{{asset('storage/doc/projects/'.$project->business_model)}}" download
                                            class="text-primary small fw-medium d-flex align-items-center gap-1 text-decoration-none">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                            fichier
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price-group">
                                        <span class="fw-bold fs-5">${{$project->budget_formatted}}</span>
                                        <p class="text-muted mb-0 small mt-1">{{$project->investment_type}}</p>
                                    </div>
                                    <a href="{{route('home.project',$project->id)}}"
                                        class="btn btn-outline-primary btn-sm">View
                                        Projet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



                    @endif

                </div>
                <div class="row">
                    @if(isset($projects) && $projects->count()>0)

                    <div class="mt-4 d-flex justify-content-center">
                        <div>{{$projects->links('pagination::bootstrap-4')}}</div>
                    </div>

                    @else
                    <div class="alert alert-danger w-100">
                        Aucun projet n’existe
                    </div>

                    @endif

                </div>
            </div>



        </div>

</section>








@endsection