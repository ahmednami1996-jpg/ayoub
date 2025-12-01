@extends("layouts.admin_master")
@section("adminSection")

 <h1 class="h3 mb-4 text-gray-800">Page des Subventions</h1>
<div class="row">

<div class="col-12">

<h5>Créer une subvention</h5>


        <form action="{{route('subvention.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row mb-3">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="title">Titre de la subvention</label>
                        <input type="text" name="title" placeholder="Entrez le titre de la subvention" class="form-control @error('title') is-invalid @enderror" />
                        @error('title')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="organization">Organisation</label>
                        <input type="text" name="organization" placeholder="Entrez l'organisation de la subvention"
                            class="form-control @error('organization') is-invalid @enderror" />
                        @error('organization')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Pays</label>
                        <select name="country" class="form-control w-md-25 @error('country') is-invalid @enderror" id="country">
                            <option value="" disable selected>--- tous les pays ---</option>
                            @foreach($countries as $code => $name)
                            <option value="{{$name}}">{{$name}}</option>

                            @endforeach
                        </select>
                        @error('country')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Ville</label>
                        <input type="text" name="city" placeholder="Entrez la ville de la subvention" placeholder="Enter your city @error('city') is-invalid @enderror" class="form-control">
                        @error('city')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url"  placeholder="Entrez le lien de la subvention"
                        class="form-control @error('url') is-invalid @enderror" />
                        @error('url')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="organization">Annuaire</label>
                        <input type="file" name="file" id="annuaire"
                         class="form-control @error('file') is-invalid @enderror" />
                       
                        @error('file')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    
                    <label for="eligibilities">Eligibilités</label>
                    <textarea name="eligibilities" id="eligibilities" class="form-control" row="4" placeholder="Entrez les eligibilités une par ligne"></textarea>
                </div>
            </div>



            <div class="form-group">
                <button class="btn btn-success ">Ajouter</button>
            </div>

        </form>
    


    </div>







</div>




@endsection