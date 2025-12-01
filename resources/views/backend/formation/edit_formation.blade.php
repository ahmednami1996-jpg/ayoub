@extends("layouts.admin_master")
@section("adminSection")

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Page de modification de formation</h1>
<div class="row">

    <div class="col-12">

        <h5>Modifier la formation</h5>
        <a href="{{route('formation.view')}}" class="text-primary">Voir toutes les formations<i
                class="fas fa-angle-double-right"></i></a>


        <form action="{{route('formation.update',$formation->id)}}" method="post" class="mt-3" enctype="multipart/form-data">

            @csrf
 <div class="row mb-3">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-group text-center mx-auto">
                        <div class="text-center">
                            <img src="{{asset('storage/images/formations/'.$formation->picture)}}" class="img img-responsive  mb-3"
                                alt=""  style="width:14rem;height:14rem" id="showImage">
                        </div>
                        <input type="file" class="form-control" name="picture" id="imageInput" />


                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre de la formation</label>
                        <input type="text" value="{{$formation->title}}" name="title"
                            class="form-control @error('title') is-invalid @enderror" />
                        @error('title')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Catégories</label>
                        <select name="category_id" id="" class="form-control w-md-25">
                            @foreach($categories as $key => $category)
                            <option value="{{$category->id }}"
                                {{$category->id== $formation->category_id ? "selected":''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provider">Fournisseur</label>
                        <input type="text" name="provider"  value="{{$formation->provider}}"
                            class="form-control @error('provider') is-invalid @enderror" />
                        @error('provider')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" value="{{$formation->url}}" class="form-control @error('url') is-invalid @enderror" />
                        @error('url')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mode" class="form-label">Mode</label>
                    <select name="mode" class="form-control">
                        
                        <option value="online" {{$formation->mode==1 ?"selected":" "}}>En ligne</option>
                        <option value="inperson" {{$formation->mode==0 ?"selected":" "}}>Présentiel</option>
                       

                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="duration">Durée</label>
                        <input type="text" name="duration" value="{{$formation->duration}}" class="form-control @error('duration') is-invalid @enderror"
                             />
                        @error('duration')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cost" class="form-label">Frais</label>
                    <input type="text" value="{{$formation->cost}}" class="form-control @error('cost') is-invalid @enderror" name="cost" />
                    @error('cost')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="reduction" class="form-label">Réduction</label>
                    <input type="text" value="{{$formation->reduction}}" class="form-control @error('reduction') is-invalid @enderror" name="reduction" />
                    @error('reduction')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>

            </div>
          <div class="row mb-3">
                <div class="col-md-6">
                    <label for="rate">évaluer</label>
                    <input type="number" name="rate" value="{{$formation->rate}}" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-success ">Modifier</button>
            </div>

        </form>
 <script>
            document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("imageInput");
    const showImage = document.getElementById("showImage");

    imageInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = function (event) {
            showImage.src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
});
        </script>


    </div>







</div>




@endsection