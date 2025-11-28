@extends("layouts.home_master")

@section("homeSection")


 <x-banner title="A props" />




  <main>

    <!-- Section 1: Mission -->
    <section class="mission py-5">
      <div class="container">
        <div class="row align-items-center g-4">
          <!-- Text Left -->
          <div class="col-12 col-md-6">
            <h3 class="fw-bold mb-3">Notre mission</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae elit libero, a pharetra augue. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <!-- Image Right -->
          <div class="col-12 col-md-6">
            <img src="images/mission.png" class="img-fluid rounded" alt="Mission">
          </div>
        </div>
      </div>
    </section>
    




   <!-- Section 2: Équipe -->
<section class="team py-5">
  <div class="container">
    <!-- Section Title -->
    <h1 class="text-center mb-5">Our Team</h1>
    
    <div class="row g-4">
      <!-- Team Member 1 -->
      <div class="col-12 col-md-4">
        <div class="card text-center p-4">
          <img src="images/elon.jpg" class="profile-img mx-auto d-block" style="width:120px; height:120px;" alt="Luna Turner">
          <h3 class="fw-bold">Luna Turner</h3>
          <p class="text-uppercase text-muted">Founder</p>
          <div class="team-icons">
            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
            <a href="#"><i class="fas fa-envelope fa-lg"></i></a>
          </div>
        </div>
      </div>

      <!-- Team Member 2 -->
      <div class="col-12 col-md-4">
        <div class="card text-center p-4">
          <img src="images/elon.jpg" class="profile-img mx-auto d-block" style="width:120px; height:120px;" alt="Bryant Hall">
          <h3 class="fw-bold">Bryant Hall</h3>
          <p class="text-uppercase text-muted">Developer</p>
          <div class="team-icons">
            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
            <a href="#"><i class="fas fa-envelope fa-lg"></i></a>
          </div>
        </div>
      </div>

      <!-- Team Member 3 -->
      <div class="col-12 col-md-4">
        <div class="card text-center p-4">
          <img src="images/elon.jpg" class="profile-img mx-auto d-block" style="width:120px; height:120px;" alt="Hope Watkins">
          <h3 class="fw-bold">Hope Watkins</h3>
          <p class="text-uppercase text-muted">Designer</p>
          <div class="team-icons">
            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
            <a href="#"><i class="fas fa-envelope fa-lg"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
  



  

    <!-- Section 3: Partenaires -->  

    <section class="partners">
      <div class="partners-wrapper">
        <!-- TITLE -->
        <h2 class="partners-title">Nos partenaires</h2>
        
        <!-- LOGOS -->
        <div class="partners-container">
          <div class="partner-item">
            <img src="{{asset('storage/images/static/Google.png')}}" alt="Godrej">
          </div>
          <div class="partner-item">
            <img src="{{asset('storage/images/static/logo-oppo.png')}}" alt="Oppo">
          </div>
          <div class="partner-item">
            <img src="{{asset('storage/images/static/Microsoft.png')}}" alt="Coca-Cola">
          </div>
          <div class="partner-item">
            <img src="{{asset('storage/images/static/logo-paypal.png')}}" alt="Paypal">
          </div>
          <div class="partner-item">
            <img src="{{asset('storage/images/static/logo-philips.png')}}" alt="Philips">
          </div>
          <!-- Add more logos here -->
        </div>
      </div>
    </section>




  </main>





@endsection