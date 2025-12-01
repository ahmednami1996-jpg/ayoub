@extends("layouts.home_master")

@section("homeSection")


<x-banner title="Subventions" />



<!-- Section: Subventions -->
<section class="subvention py-5">

    <!-- Cards Grid -->
    <div class="container">
        @if(isset($subventions) && $subventions->count()>0)
        <div class="row g-4">
            @foreach($subventions as $key =>$subvention)


            <!-- Card 1 -->
            <div class="col-12 col-lg-4">
                <div class="card h-100 shadow-sm p-3 d-flex flex-column">
                    <h5 class="fw-semibold mb-3 text-center">{{$subvention->title}}</h5>

                    <!-- Annuaire -->
                    <p><strong>Annuaire:</strong> <a
                            href="{{asset('storage/documents/subventions/'.$subvention->file_name)}}"
                            class="text-decoration-none">Fichier</a></p>

                    <!-- Critères d’éligibilité -->
                    <p><strong>Critères d’éligibilité:</strong></p>
                    <ul class="ps-3 mb-3" style="list-style-type: none;">
                        @foreach($subvention->eligibilities_array as $eligibility)
                        <li>{{"— ".$eligibility}} </li>
                        @endforeach

                    </ul>

                  

                    <!-- More details button -->
                    <div class="mt-auto">
                        <div class="d-flex gap-2 mt-auto align-items-center">
                            <!-- Location: Rabat, Maroc -->
                            <div class="d-flex align-items-center gap-1 text-muted small flex-shrink-0">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>{{Str::limit($subvention->city,10).", ".Str::limit($subvention->country,10)}}</span>
                            </div>

                            <!-- Button: Appliquer (same style as old Details) -->
                            <a href="{{route('home.subvention',$subvention->id)}}"
                                class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center gap-1 ms-auto">
                                Appliquer
                            </a>
                        </div>
                    </div>
                </div>
          



        </div>
        @endforeach
    </div>
    <div class="row justify-content-center text-center">
        <div class="col">
            <nav>
                <ul class="pagination justify-content-center  mt-4">
                    {{ $subventions->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <div class="alert alert-info">Aucune formation n’existe</div>
        </div>
    </div>
    @endif


    </div>
</section>




@endsection