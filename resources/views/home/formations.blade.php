@extends("layouts.home_master")

@section("homeSection")



<x-banner title="Formations" />



<!-- Section: Formations Grid -->
<section class="formation py-5">

    <!-- Cards Grid -->
    <div class="container">
        @if(isset($formations) && $formations->count()>0)

        <div class="row">
           @foreach($formations as $key => $formation)
            <!-- Card 1 -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm position-relative">
                    <img src="{{asset('storage/images/formations/'.$formation->picture)}}" class="card-img-top" alt="Projet {{$key}}">
                    <div class="card-image-overlay">
                         @if(filled($formation->mode) && isset($formation->mode))
                        <span class="badge-top">{{$formation->mode == 1 ? 'En ligne' : 'Présentiel'}}</span>
                        @endif
                        @if(filled($formation->duration) && isset($formation->duration))
                        <span class="badge-bottom">{{$formation->duration}}</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="info-row d-flex justify-content-between align-items-center mb-2">
                            <div class="views d-flex align-items-center gap-2">
                                <i class="bi bi-eye"></i>
                                <span>{{$formation->views ??"0" }} Vues</span>
                            </div>
                            <div class="duration d-flex align-items-center gap-2">
                                <i class="bi bi-clock"></i>
                                <span>{{$formation->created_time ??""}}</span>
                            </div>
                        </div>
                        <h5 class="card-title fw-bold">{{$formation->title ??""}}</h5>
                        <p class="category-text">{{$formation->category->name ??""}}</p>

                        <!-- Price + Button + Rating in ONE ROW -->
                        <div class="price-buy-row mt-3 d-flex justify-content-between align-items-center">
                            <div class="price-group">
                                <span class="price-now">{{'$'.$formation->cost ??""}}</span>
                                @if(filled($formation->reduction) && isset($formation->reduction))
                                <del>${{ $formation->reduction}}</del>
                                @endif
                            </div>
                            <div class="buy-rating-group d-flex flex-column align-items-end gap-1">
                                <div class="rating d-flex align-items-center gap-1">
                                    <span class="rating-num">{{$formation->rate}}</span>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <a href="{{route('home.formation',$formation->id)}}" target="_blank"  class="btn-buy text-decoration-none">Acheter</a>
                            </div>
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
                        {{ $formations->links('pagination::bootstrap-4') }}
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