@extends("layouts.home_master")
@section("homeSection")
<section class="auth-section py-5 min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="auth-card">


                    <!-- Sign Up Form  -->
                    <div id="signUpForm">
                        <h2 class="text-center mb-4 fw-bold" style="color: #00adef;">S'inscrire</h2>

                        <form action="{{route('user.register')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                
                                    <label for="firstName" class="form-label fw-semibold"
                                        style="color: #00adef;">Nom</label>
                                    <input type="text" name="firstname" class="form-control" id="firstName"
                                        placeholder="Entrez votre Nom" required style="width: 200px;">
                                
                               
                            </div>
                            <div class="mb-3">
                                
                                    <label for="lastName" class="form-label fw-semibold"
                                        style="color: #00adef;">Prénom</label>
                                    <input type="text" name="lastname" class="form-control" id="lastName"
                                        placeholder="Entrez votre Prénom" required style="width: 200px;">
                               
                            </div>
                            <div class=" mb-3">
                                
                                    <label for="username" class="form-label fw-semibold"
                                        style="color: #00adef;">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Entrez votre username" required style="width: 200px;">
                                
                               
                            </div>


                            <div class="mb-3">
                                <label for="signUpEmail" class="form-label fw-semibold"
                                    style="color: #00adef;">Email</label>
                                <input type="email" name="email" class="form-control" id="signUpEmail"
                                    placeholder="Entrez votre email" required>
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="signUpPassword" class="form-label fw-semibold" style="color: #00adef;">Mot
                                    de passe</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" name="password" id="signUpPassword"
                                        placeholder="Entrez votre mot de passe" required>
                                    <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password"
                                        style="cursor: pointer; color: #999;"></i>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label fw-semibold"
                                    style="color: #00adef;">Confirmer votre mot de passe</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="confirmPassword" placeholder="Confirmez votre mot de passe" required>
                                    <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password"
                                        style="cursor: pointer; color: #999;"></i>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">S'inscrire</button>
                        </form>

                        <p class="text-center text-muted mb-0">Si vous avez déjà un compte, <a
                                href="{{route('user.login.view')}}" id="switchToSignIn"
                                class="text-primary fw-semibold text-decoration-none">se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
















@endsection