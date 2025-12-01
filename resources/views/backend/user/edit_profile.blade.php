@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

    <div class="col-12">

        <h5>Modifer votre profil</h5>



        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-group text-center mx-auto">
                        <div class="text-center">
                            <img src="{{asset('storage/images/users/'.auth()->user()->picture)}}" class="img img-responsive  mb-3"
                                alt=""  style="width:14rem;height:14rem" id="showImage">
                        </div>
                        <input type="file" class="form-control" name="picture" id="imageInput" />


                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" value="{{$user->firstname}}" name="firstname"
                            class="form-control @error('firstname') is-invalid @enderror" />
                        @error('firstname')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" value="{{$user->lastname}}" name="lastname"
                            class="form-control @error('lastname') is-invalid @enderror" />
                        @error('lastname')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" value="{{$user->username}}" name="username"
                            class="form-control @error('username') is-invalid @enderror" />
                        @error('username')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" value="{{$user->email}}" name="email"
                            class="form-control @error('email') is-invalid @enderror" />
                        @error('email')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gender" class="form-label">Genre</label>
                    <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                    @if($user->gender==null)
                    <option value="" disabled selected>-- sélectionner genre --</option>
                    @endif
                    <option value="male" {{$user->gender=="male" ? "selected" :""}}>Male</option>
                        <option value="female" {{$user->gender=="female" ? "selected" :""}}>Female</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label for="occupation" class="form-label">Profession</label>
                    <input type="text" name="occupation" value="{{$user->occupation}}" class="form-control @error('occupation') is-invalid @enderror">
                    @error('occupation')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row  align-items-center">
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="country">Pays</label>
                        <select name="country" class="form-control @error('country') is-invalid @enderror" id="country">
                             @if(!isset($user->country) && !filled($user->country))
                    <option value="" disabled selected>-- Tous les pays --</option>
                    @endif
                            @foreach($countries as $code => $name)
                            <option value="{{$name}}" {{$user->country==$name ?"selected":""}}>{{$name}}</option>

                            @endforeach
                        </select>
                        @error('country')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">Ville</label>
                        <input type="text" name="city" value="{{$user->city}}"
                            class="form-control @error('city') is-invalid @enderror">
                        @error('city')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" name="address" placeholder="Enter your address" value="{{$user->address}}"
                            class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
            </div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                @error('password')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
    </div>
</div>
            



            <div class="form-group">
                <button class="btn btn-success ">Modifier</button>
            </div>

        </form>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById("imageInput");
            const showImage = document.getElementById("showImage");

            imageInput.addEventListener("change", function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(event) {
                    showImage.src = event.target.result;
                };

                reader.readAsDataURL(file);
            });
        });
        </script>
    </div>







</div>




@endsection