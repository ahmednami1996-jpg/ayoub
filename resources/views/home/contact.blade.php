@extends("layouts.home_master")

@section("homeSection")


<x-banner title="Contact" />




<!-------- contact us -------->
<section class="location">

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105885.06230928747!2d-6.927302927544011!3d33.96919901243712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!5e0!3m2!1sfr!2sma!4v1636636604870!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</section>

<section class="contact-us">
  <div class="row">
      <div class="contact-col">
          <div>
              <i class="bi bi-house"></i>
              <span>
                  <h5>XYZ Road, ABC Building</h5>
                  <p>Bangalore, Karna, IN</p>
              </span>
          </div>
          <div>
              <i class="bi bi-telephone"></i>
              <span>
                  <h5>+1 01838289382</h5>
                  <p>Monday to saturday, 10AM to 6PM </p>
              </span>
          </div>
          <div>
              <i class="bi bi-envelope"></i>
              <span>
                  <h5>info@university.com</h5>
                  <p>Email us your query </p>
              </span>
          </div>
      </div>
      <div class="contact-col">

          <form action="{{route('home.contactUs')}}" method="post">
            @csrf
              <input type="text" name="name" placeholder="Entrez votre nom" required>
              <input type="email" name="email" placeholder="Entrez votre Email" required>
              <input type="text" name="subject" placeholder="Entrez votre message" required>
              <textarea rows="8" name="message" placeholder="Message" required></textarea>
              <button type="submit" class="hero-btn">Envoyer Email</button>
          </form>

      </div>
  </div>
</section>






@endsection