@extends("layouts.admin_master")
@section("adminSection")

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Page de Formation </h1>
<div class="row">

    <div class="col-12">

        <h5>Create formation</h5>



        <form action="{{route('formation.store')}}" method="post" enctype="multipart/form-data">

            @csrf
           <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-group text-center mx-auto">
                        <div class="text-center">
                            <img src="{{asset('storage/images/formations/no-image.png')}}" class="img img-responsive  mb-3"
                                alt=""  style="width:14rem;height:14rem" id="showImage">
                        </div>
                        <input type="file" class="form-control" name="picture" id="imageInput" />


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre de formation </label>
                        <input type="text" name="title" placeholder="Entrez le titre de formation"
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
                            <option value="" disabled selected>---toutes les Catégories---</option>
                            @foreach($categories as $key => $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provider">Fournisseur</label>
                        <input type="text" name="provider" placeholder="Entrez le fournisseur de formation"
                            class="form-control @error('provider') is-invalid @enderror" />
                        @error('provider')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" placeholder="Entrez le liens de formation"
                         class="form-control @error('url') is-invalid @enderror" />
                        @error('url')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="mode" class="form-label">Mode</label>
                    <select name="mode" class="form-control">
                        <option selected diabled>--- Les modes---</option>
                        <option class="online">En ligne</option>
                        <option class="inperson">Présentiel</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="duration">Durée</label>
                        <input type="text" name="duration"
                            class="form-control @error('duration') is-invalid @enderror" placeholder="Entrez la durée suivie de année | mois | heure. ex : 3 mois"/>
                        @error('duration')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="cost" class="form-label">Frais</label>
                    <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" placeholder="Entrez les frais de formation"/>
                     @error('cost')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                </div>
                 <div class="col-md-6">
                    <label for="reduction" class="form-label">Réduction</label>
                    <input type="text" class="form-control @error('reduction') is-invalid @enderror" name="reduction" placeholder="Entrez le réduction s'il existe"/>
                     @error('reduction')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                </div>
                
            </div>
            


            <div class="form-group mt-2">
                <button class="btn btn-success ">Ajouter</button>
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