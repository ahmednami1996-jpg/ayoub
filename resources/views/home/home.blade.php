@extends("layouts.home_master")

@section("homeSection")


  



 
  <!-- Hero Section -->
  <section id="banner_parallax" class="slide_banner1" style="background-image:url('{{asset('storage/images/static/slide1.png')}}')" >
    <div class="container">
       <div class="row">
          <div class="col-md-6 hero-grid">
             <div class="full">
                <div class="slide_cont">
                   <h2>Familiarize Your Creative Application</h2>
                   <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium..!</p>
                   <div class="full slide_bt"> <a class="white_bt bt_main" href="{{route('home.projects')}}">Découvrir les projets</a> </div>
                   <div class="full slide_bt"> <a class="white_bt bt_main" href="{{route('project.create')}}">Publier un projet</a> </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 hero-grid">
             <div class="full">
                <div class="slide_pc_img wow fadeInRight" data-wow-delay="1s" data-wow-duration="2s"> <img src="{{asset('storage/images/static/pc-banner.png')}}" alt="#" /> </div>
             </div>
          </div>
       </div>
    </div>
 </section>
  


    

<!-- counter -->
<!-- Counter Section -->
<section id="counter-section" class="counter-section py-5" style="background: url({{asset('storage/images/static/bg-2.png')}}) no-repeat center center fixed;">
  <div class="container">
    <div class="counter-row justify-content-center align-items-center">
      
      <!-- Card 1 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">724</div>
          <div class="counter-label">Projets financés</div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">508</div>
          <div class="counter-label">Investisseurs inscrits</div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">436</div>
          <div class="counter-label">Partenariats établis</div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-6 col-md-3 mb-4">
        <div class="counter-card text-center">
          <div class="counter-number">120</div>
          <div class="counter-label">Échanges réalisés</div>
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
        <a href="#formations" class="hero-btn blue-btn">Discover More</a>
      </div>

      <!-- Right Image Column -->
      <div class="col-md-6 text-center">
        <img src="{{asset('storage/images/static/about.png')}}" alt="About" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>




<!-- ========== Nos formations ========== -->
<section class="course py-5 bg-light">
  <div class="container">
    
    <!-- Section Title -->
    <div class="row mb-4">
      <div class="col-lg-8 mx-auto text-center">
        <h1 class="display-5 fw-bold mb-2">Nos formations</h1>
        <p class="lead text-muted">
          Développez vos compétences, progressez avec confiance et avancez vers la réussite.
        </p>
      </div>
    </div>
    
    <!-- 3 Cards with grey background -->
    <div class="row g-4 g-md-5">
      
      <!-- Card 1 -->
      <div class="col-12 col-md-4">
        <div class="text-center px-4 py-4 bg-grey rounded-4 shadow-sm" style="min-height: 260px;">
          <div class="icon-box mb-4">
            <i class="bi bi-coin fs-1 text-primary"></i>
          </div>
          <h3 class="h4 fw-bold">Économie</h3>
          <p class="text-muted">
            Découvrez les principes essentiels de l’économie moderne et leur application dans le monde réel. 
          </p>
        </div>
      </div>
      
      <!-- Card 2 -->
      <div class="col-12 col-md-4">
        <div class="text-center px-4 py-4 bg-grey rounded-4 shadow-sm" style="min-height: 260px;">
          <div class="icon-box mb-4">
            <i class="bi bi-graph-up-arrow fs-1 text-primary"></i>
          </div>
          <h3 class="h4 fw-bold">Business</h3>
          <p class="text-muted">
            Apprenez les stratégies clés pour lancer, gérer et développer des entreprises performantes.
          </p>
        </div>
      </div>
      
      <!-- Card 3 -->
      <div class="col-12 col-md-4">
        <div class="text-center px-4 py-4 bg-grey rounded-4 shadow-sm" style="min-height: 260px;">
          <div class="icon-box mb-4">
            <i class="bi bi-bar-chart-line fs-1 text-primary"></i>
          </div>
          <h3 class="h4 fw-bold">Finance</h3>
          <p class="text-muted">
            Maîtrisez les outils financiers pour optimiser vos investissements et gérer efficacement vos ressources.
          </p>
        </div>
      </div>
      
    </div>
  </div>
</section>






<!-- Section: Formations Grid -->
<section class="formation py-5" id="fomrations" style="background: radial-gradient(#fff, #00adef)">
  <!-- Title -->
  <div class="container mb-5">
    <h2 class="text-center fw-bold display-5">Découvrez nos formations les plus demandées</h2>
  </div>

  <!-- Cards Grid -->
  <div class="container">
    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm position-relative">
          <img src="images/compta.png" class="card-img-top" alt="Projet 1">
          <div class="card-image-overlay">
            <span class="badge-top">En ligne</span>
            <span class="badge-bottom">3 mois</span>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="info-row d-flex justify-content-between align-items-center mb-2">
              <div class="views d-flex align-items-center gap-2">
                <i class="bi bi-eye"></i>
                <span>35k Vues</span>
              </div>
              <div class="duration d-flex align-items-center gap-2">
                <i class="bi bi-clock"></i>
                <span>6 hr 07 min</span>
              </div>
            </div>
            <h5 class="card-title fw-bold">Titre formation 1</h5>
            <p class="category-text">Développement Web</p>
          
            <!-- Price + Button + Rating in ONE ROW -->
            <div class="price-buy-row mt-3 d-flex justify-content-between align-items-center">
              <div class="price-group">
                <span class="price-now">$19.00</span>
                <del>$35.00</del>
              </div>
              <div class="buy-rating-group d-flex flex-column align-items-end gap-1">
                <div class="rating d-flex align-items-center gap-1">
                  <span class="rating-num">4.7</span>
                  <i class="bi bi-star-fill"></i>
                </div>
                <button class="btn-buy">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm position-relative">
          <img src="images/analyse.png" class="card-img-top" alt="Projet 2">
          <div class="card-image-overlay">
            <span class="badge-top">En ligne</span>
            <span class="badge-bottom">3 mois</span>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="info-row d-flex justify-content-between align-items-center mb-2">
              <div class="views d-flex align-items-center gap-2">
                <i class="bi bi-eye"></i>
                <span>35k Vues</span>
              </div>
              <div class="duration d-flex align-items-center gap-2">
                <i class="bi bi-clock"></i>
                <span>6 hr 07 min</span>
              </div>
            </div>
            <h5 class="card-title fw-bold">Titre formation 2</h5>
            <p class="category-text">Développement Web</p>
          
            <!-- Price + Button + Rating in ONE ROW -->
            <div class="price-buy-row mt-3 d-flex justify-content-between align-items-center">
              <div class="price-group">
                <span class="price-now">$19.00</span>
                <del>$35.00</del>
              </div>
              <div class="buy-rating-group d-flex flex-column align-items-end gap-1">
                <div class="rating d-flex align-items-center gap-1">
                  <span class="rating-num">4.7</span>
                  <i class="bi bi-star-fill"></i>
                </div>
                <button class="btn-buy">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm position-relative">
          <img src="images/digitalmarketing.png" class="card-img-top" alt="Projet 3">
          <div class="card-image-overlay">
            <span class="badge-top">En ligne</span>
            <span class="badge-bottom">3 mois</span>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="info-row d-flex justify-content-between align-items-center mb-2">
              <div class="views d-flex align-items-center gap-2">
                <i class="bi bi-eye"></i>
                <span>35k Vues</span>
              </div>
              <div class="duration d-flex align-items-center gap-2">
                <i class="bi bi-clock"></i>
                <span>6 hr 07 min</span>
              </div>
            </div>
            <h5 class="card-title fw-bold">Titre formation 3</h5>
            <p class="category-text">Développement Web</p>
          
            <!-- Price + Button + Rating in ONE ROW -->
            <div class="price-buy-row mt-3 d-flex justify-content-between align-items-center">
              <div class="price-group">
                <span class="price-now">$19.00</span>
                <del>$35.00</del>
              </div>
              <div class="buy-rating-group d-flex flex-column align-items-end gap-1">
                <div class="rating d-flex align-items-center gap-1">
                  <span class="rating-num">4.7</span>
                  <i class="bi bi-star-fill"></i>
                </div>
                <button class="btn-buy">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  <!-- More formations Button -->
  <div class="text-center mt-4">
      <button class="btn btn-primary btn-lg">Plus de formations</button>
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
        <a href="#" class="btn btn-primary btn-lg">Plus de subventions</a>
      </div>    
  </div>
</section>




  <!-------- Contact - Call To Action -------->
<section class="cta" style=" background-image: linear-gradient(rgba(0,0,0,0.7),  rgba(0,0,0,0.7)), url({{asset('storage/images/static/banner2.jpg')}});">
  <h1>Entrons en contact pour créer des<br>opportunités ensemble ! </h1>          
  <a href="{{route('home.contact')}}" class="hero-btn">CONTACTEZ-NOUS</a>
</section>
  





@endsection