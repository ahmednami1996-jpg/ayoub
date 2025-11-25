@extends("layouts.home_master")

@section("homeSection")


 
<!-- Sign In / Sign Up Section -->
<section class="auth-section py-5 min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="auth-card">
            <!-- Sign In Form (Default) -->
            <div id="signInForm">
              <h2 class="text-center mb-4 fw-bold" style="color: #00adef;">Se connecter</h2>
              
              <form  action="{{route('user.login')}}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label fw-semibold" style="color: #00adef;">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrez votre email" required>
                   @error('email')
         <div class="invalid-feedback">{{$message}}</div>
    @enderror

                </div>
                
                <div class="mb-4">
                  <label for="password" class="form-label fw-semibold" style="color: #00adef;">Mot de passe</label>
                  <div class="position-relative">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Entrez votre mot de passe" required>
                    <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password" style="cursor: pointer; color: #999;"></i>
                    @error('password')
         <div class="invalid-feedback">{{$message}}</div>
    @enderror
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 mb-3">Se connecter</button>
              </form>
              
              <p class="text-center text-muted mb-0">Si vous êtes nouveau, <a href="{{route('user.register.view')}}" id="switchToSignUp" class="text-primary fw-semibold text-decoration-none">créez un compte</a></p>
            </div>
  
         
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection