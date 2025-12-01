@extends("layouts.home_master")

@section("homeSection")




<!-- Project Details Section -->
<section class="project-details py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <div class="project-card bg-white shadow-lg rounded-3 p-4">

                
                   @php
    $hasApplied = $project->applications->where('user_id', auth()->id())->isNotEmpty();
@endphp

@if($hasApplied)
    {{-- User already applied --}}
    <div class="d-flex justify-content-end">
        <a href="{{ route('apply.edit', $project->id) }}" class="btn btn-success px-5">
            Modifier la demande
        </a>
    </div>
@else
    {{-- User has NOT applied and is not the owner --}}
    @if(auth()->id() != $project->user_id)
        <div class="d-flex justify-content-end">
            <a href="{{ route('apply.create', $project->id) }}" class="btn btn-primary px-5">
                Investir
            </a>
        </div>
    @endif
@endif

                   
                   

                    <h1 class="text-center fw-bold mb-4" style="color: #00adef;">T{{$project->title ?? "aucun titre"}}
                    </h1>

                    <!-- Image -->
                    <div class="text-center mb-4">
                        <img src="{{asset('storage/images/projects/'.$project->picture)}}" alt="Produit 1"
                            class="img-fluid rounded" style="max-width: 400px; height: auto;">
                    </div>

                    <!-- Categorie -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-1">Catégorie</h5>
                        <p class="text-muted mb-0">{{$prodject->category->name ?? "aucune catégorie"}}</p>
                    </div>

                    <!-- Resume -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Résumé</h5>
                        <p class="text-muted">
                            {{$project->resume}}
                        </p>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Description</h5>
                        <p class="text-muted">
                            {{$project->description}}
                        </p>
                    </div>

                    <!-- Marché -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Marché</h5>
                        <p class="text-muted">
                            {{$project->market}}
                        </p>
                    </div>

                    <!-- Traction (KPI) – 2x2 on mobile/tablet, 4x1 on desktop -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Traction (KPI)</h5>
                        <div class="row text-center g-3">
                            <div class="col-sm-6 col-lg-3">
                                <h4 class="fw-bold text-primary">{{$project->kpi_users}}</h4>
                                <p class="text-muted mb-0">Utilisateurs actifs</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <h4 class="fw-bold text-primary">{{$project->monthly_growth_p}}%</h4>
                                <p class="text-muted mb-0">Croissance mensuelle</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <h4 class="fw-bold text-primary">{{$project->annual_revenue}}</h4>
                                <p class="text-muted mb-0">Revenus annuels</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <h4 class="fw-bold text-primary">{{$project->retention_rate_p}}%</h4>
                                <p class="text-muted mb-0">Taux de rétention</p>
                            </div>
                        </div>
                    </div>

                    <!-- Business Model -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Business Model</h5>
                        <a href="{{asset('storage/documents/projects/'.$project->business_model)}}" download
                            class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-file-earmark-pdf"></i> Fichier
                        </a>
                    </div>

                    <!-- Montant d'investissement -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Montant d'investissement</h5>
                        <p class="text-primary fw-bold fs-4">${{$project->budget}}</p>
                    </div>

                    <!-- Type d'investissement -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Type d'investissement</h5>
                        <p class="text-muted">{{$project->investment_type}}</p>
                    </div>

                    <!-- Documents -->
                    <div class="mb-4">
                        <h5 class="fw-semibold text-muted mb-2">Documents</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($project->documents as $key =>$doc)
                            <a href="{{asset('storage/documents/projects/'.$doc->file_name)}}"
                                class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-file-earmark-pdf"></i> Fichier {{$key}}
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection