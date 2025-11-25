@extends("layouts.home_master")

@section("homeSection")


  <!-- Hero Section -->
  <section id="banner_parallax" class="slide_banner1"  style="background-image: url('{{ asset('storage/images/static/slide1.png') }}')">
    <div class="container">
       <div class="row">
          <div class="col-md-6">
             <div class="full">
                <div class="slide_cont">
                   <h2>Familiarize Your Creative Application</h2>
                   <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium..!</p>
                   <div class="full slide_bt"> <a class="white_bt bt_main" href="{{route('home.projects')}}">Découvrir les projets</a> </div>
                   <div class="full slide_bt"> <a class="white_bt bt_main" href="{{route('project.create')}}">Publier un projet</a> </div>
                </div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="full">
                <div class="slide_pc_img wow fadeInRight" data-wow-delay="1s" data-wow-duration="2s"> <img src="{{ asset('storage/images/static/pc-banner.png')}}" alt="#" /> </div>
             </div>
          </div>
       </div>
    </div>
 </section>
  


    

<!-- counter -->
<!-- Counter Section -->
<section id="counter-section" class="counter-section py-5" style="background-image: url('{{ asset('storage/images/static/bg-2.png') }}')">
  <div class="container">
    <div class="counter-row justify-content-center align-items-center">
      
      <!-- Card 1 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">{{$usersCount}}</div>
          <div class="counter-label">Utilisateurs</div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">{{$projectsCount}}</div>
          <div class="counter-label">Projets</div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">{{$subventionsCount}}</div>
          <div class="counter-label">Subvention</div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">{{$formationsCount}}</div>
          <div class="counter-label">Formation</div>
        </div>
      </div>

    </div>
  </div>
</section>






<!-- about us -->
<section class="about-us-2 py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Text Column -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h1>Learn With Us, Grow With <br> Confidence</h1>
        <p>
          We provide high-quality education and training programs designed to
          help you achieve your goals. Join thousands of learners who trust our
          expertise and commitment to excellence.
        </p>
        <a href="#" class="hero-btn blue-btn">Discover More</a>
      </div>

      <!-- Right Image Column -->
      <div class="col-md-6 text-center">
        <img src="{{asset('storage/images/static/about.png')}}" alt="About" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>




<!-------- Courses -------->
<section class="course py-5">
  <div class="container text-center">
      <h1>Nos formations</h1>
      <p>Lorem ipsum dolor isit amet, consecteteur adipiscing elit.</p>

      <div class="row mt-4">
          <div class="col-md-4 mb-4">
              <div class="course-col">
                <div class="icon" style="background-color:#fff; color:#00adef;">
                  <i class="fa fa-chart-line fa-2x"></i>
                </div>
                  <h3>Intermediate</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                  sed do eiusmod tempor. Ut enim ad exercitation ullamco laboris 
                  purus Donec sit.</p>
              </div>
          </div>
          <div class="col-md-4 mb-4">
              <div class="course-col">
                <div class="icon" style="background-color:#fff; color:#00adef;">
                  <i class="fa fa-briefcase fa-2x"></i>
              </div>
                  <h3>Degree</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                  sed do eiusmod tempor. Ut enim ad exercitation ullamco laboris 
                  purus Donec sit.</p>
              </div>
          </div>
          <div class="col-md-4 mb-4">
              <div class="course-col">
                <div class="icon" style="background-color:#fff; color:#00adef;">
                  <i class="fa fa-coins fa-2x"></i>
              </div>
                  <h3>Post Graduation</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                  sed do eiusmod tempor. Ut enim ad exercitation ullamco laboris 
                  purus Donec sit.</p>
              </div>
          </div>
      </div>
  </div>
</section>





<!-- Section: Formations Grid -->
<section class="formation py-5" style="background: radial-gradient(#fff, #00adef)">
  <!-- Title -->
  <div class="container mb-5">
    <h2 class="text-center fw-bold display-5">Découvrez nos formations les plus demandées</h2>
  </div>

  <!-- Cards Grid -->
  <div class="container">
    <div class="row g-4">

      @foreach($formations as $key => $formation)
        <div class="col-12 col-md-4">
          <div class="card h-100 shadow-sm position-relative">
            <img src="{{asset('storage/images/formations/'.$formation->picture)}}" class="card-img-top" alt="Projet {{$key}}">
            <div class="card-image-overlay">
                @if(filled($formation->mode) && isset($formation->mode))
              <span class="badge-top">{{$formation->mode == 1 ? 'En ligne' : 'Présentiel'}}</span>
              @endif
               @if(filled($formation->duration) && isset($formation->duration))
              <span class="badge-bottom">{{$formation->duration ??""}}</span>
               @endif
            </div>
            <div class="card-body d-flex flex-column">
              <div class="info-row d-flex justify-content-between align-items-center mb-2">
                <div class="views d-flex align-items-center gap-2">
                  <i class="bi bi-eye"></i>
                  <span>{{$formation->views ." "}} Vues</span>
                </div>
                <div class="duration d-flex align-items-center gap-2">
                  <i class="bi bi-clock"></i>
                  <span>{{$formation->create_time ??""}}</span>
                </div>
              </div>
              <h5 class="card-title fw-bold">{{$formation->title ??""}}</h5>
              <p class="category-text">{{$formation->category->name ??""}}</p>
            
              <!-- Price + Button + Rating in ONE ROW -->
              <div class="price-buy-row mt-3 d-flex justify-content-between align-items-center">
                <div class="price-group">
                  <span class="price-now">{{'$'.$formation->cost ??""}}</span>
                 @if(filled($formation->reduction))
    <span class="price-old">${{ $formation->reduction }}</span>
@endif
                </div>
                <div class="buy-rating-group d-flex flex-column align-items-end gap-1">
                  <!-- <div class="rating d-flex align-items-center gap-1">
                    <span id="likeNumber" class="rating-num">{{$formation->like}}</span>
                    
                    <i id="like" class="far fa-heart"></i>
                  </div> -->
                  <a href="{{route('home.formation',$formation->id)}}" target="_blank" class="btn-buy">Acheter</a>
                </div>
              </div>
            </div>
          </div>
        </div>
       @endforeach

    

    </div>

  <!-- More formations Button -->
  <div class="text-center mt-4">
      <a href="{{route('home.formations')}}" class="btn btn-primary btn-lg">Plus de formations</a>
  </div>

  </div>
</section>





<!-------- Subventions -------->
<section class="campus py-5">
  <div class="container text-center">
      <h1>Nos subventions</h1>
      <p>Lorem ipsum dolor isit amet, consecteteur adipiscing elit.</p>

      <div class="row mt-4">
          <div class="col-md-4 mb-4">
              <div class="campus-col">
                  <img src="{{asset('storage/images/static/london.png')}}" class="img-fluid">
                  <div class="layer">
                      <h3>MAROC</h3>
                  </div>
              </div>
          </div>
          <div class="col-md-4 mb-4">
              <div class="campus-col">
                  <img src="{{asset('storage/images/static/newyork.png')}}" class="img-fluid">
                  <div class="layer">
                      <h3>FRANCE</h3>
                  </div>
              </div>
          </div>
          <div class="col-md-4 mb-4">
              <div class="campus-col">
                  <img src="{{asset('storage/images/static/washington.png')}}" class="img-fluid">
                  <div class="layer">
                      <h3>ESPAGNE</h3>
                  </div>
              </div>
          </div>
      </div>
      <div class="text-center">
        <a href="{{route('home.subventions')}}" class="btn btn-primary btn-lg">Plus de subventions</a>
      </div>    
  </div>
</section>




  <!-------- Contact - Call To Action -------->
<section class="cta" style=" background-image: linear-gradient(rgba(0,0,0,0.7),  rgba(0,0,0,0.7)), url('{{ asset('storage/images/static/banner2.jpg') }}')">
  <h1>Entrons en contact pour créer des<br>opportunités ensemble ! </h1>          
  <a href="{{route('home.contact')}}" class="hero-btn">CONTACTEZ-NOUS</a>
</section>
  



@endsection