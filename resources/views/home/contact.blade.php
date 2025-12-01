@extends("layouts.home_master")

@section("homeSection")


<x-banner title="Contact" />




<!-------- contact us -------->


<section class="contact-us">
  <div class="row">
      <div class="contact-col">
          <div>
              <i class="bi bi-house"></i>
              <span>
                  <h5>Rue XYZ, Immeuble ABC</h5>
                  <p>Rabat, Maroc</p>
              </span>
          </div>
          <div>
              <i class="bi bi-telephone"></i>
              <span>
                  <h5>+212 01838289382</h5>
                  <p>Du lundi au samedi, 10h à 18h </p>
              </span>
          </div>
          <div>
              <i class="bi bi-envelope"></i>
              <span>
                  <h5>info@finlink.com</h5>
                  <p>Envoyez-nous votre demande </p>
              </span>
          </div>
      </div>
      <div class="contact-col">

          <form action="{{route('home.contactUs')}}" method="post">
            @csrf
              <input type="text" name="name" placeholder="Entrez votre nom" required>
              <input type="email" name="email" placeholder="Entrez votre e-mail" required>
              <input type="text" name="password" placeholder="Entrez votre sujet" required>
              <textarea rows="8" name="message" placeholder="Message" required></textarea>
              <button type="submit" class="hero-btn">Envoyer le message</button>
          </form>

      </div>
  </div>
</section>






@endsection