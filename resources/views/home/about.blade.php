
@extends("layouts.home_master")

@section("homeSection")


 <x-banner title="A propos" />




  <main>

    <!-- Section 1: Mission -->
    <section class="mission py-5">
      <div class="container">
        <div class="row align-items-center g-4">
          <!-- Text Left -->
          <div class="col-12 col-md-6">
            <h3 class="fw-bold mb-3">Notre mission</h3>
            <p>Connecter les porteurs de projets aux investisseurs, faciliter la croissance des idées innovantes et créer un écosystème dynamique où l’entrepreneuriat et le financement se rencontrent pour générer un impact réel et durable.</p>
          </div>
          <!-- Image Right -->
          <div class="col-12 col-md-6">
            <img src="{{asset('storage/images/static/mission.png')}}" class="img-fluid rounded" alt="Mission">
          </div>
        </div>
      </div>
    </section>
    




   <!-- Section 2: Équipe -->
<section class="team py-5">
  <div class="container">
    <!-- Section Title -->
    <h1 class="text-center mb-5">Equipe</h1>
    
    <div class="row g-4">
      <!-- Team Member 1 -->
      <div class="col-12 col-md-4">
        <div class="card text-center p-4">
          <img src="{{asset('storage/images/static/elon.jpg')}}" class="profile-img mx-auto d-block" style="width:120px; height:120px;" alt="Luna Turner">
          <h3 class="fw-bold">Luna Turner</h3>
          <p class="text-uppercase text-muted">Fondateur</p>
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
          <img src="{{asset('storage/images/static/elon.jpg')}}" class="profile-img mx-auto d-block" style="width:120px; height:120px;" alt="Bryant Hall">
          <h3 class="fw-bold">Bryant Hall</h3>
          <p class="text-uppercase text-muted">Développeur</p>
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
          <img src="{{asset('storage/images/static/elon.jpg')}}" class="profile-img mx-auto d-block" style="width:120px; height:120px;" alt="Hope Watkins">
          <h3 class="fw-bold">Hope Watkins</h3>
          <p class="text-uppercase text-muted">Comptable</p>
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
