@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

    <div class="col-lg-12 col-md-6">

        <h5>Ajouter projet</h5>



        <form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-group text-center mx-auto">
                        <div class="text-center">
                            <img src="{{asset('storage/images/projects/no-image.png')}}"
                                class="img img-responsive  mb-3" alt="" style="width:14rem;height:14rem" id="showImage">
                        </div>
                        <input type="file" class="form-control" name="picture" id="imageInput" />


                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="title" class="form-label">Titre de projet</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        placeholder="Entrezle title de projet">
                    @error('title')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Catégories</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">


                        <option value="" diabled selected>--- Catégories ---</option>
                        @foreach($categories as $key => $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror


                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="resume">Résumé</label>
                        <textarea class="form-control @error('resume') is-invalid @enderror" name="resume" id=""
                            cols="3" rows="3" vertical></textarea>
                        @error('resume')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <label for="market" class="form-label">Marché</label>
                    <textarea class="form-control @error('market') is-invalid @enderror" name="market" id="" cols="3"
                        rows="3" vertical></textarea>
                    @error('market')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="budget" class="form-label">Montant d'investissement</label>
                    <input type="number" class="form-control @error('budget') is-invalid @enderror" id="budget"
                        name="budget">
                    @error('budget')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                  <div class="col-md-6">
                    <label for="annual_revenue" class="form-label">Revenus annuels</label>
                    <input type="number" class="form-control @error('annual_revenue') is-invalid @enderror" id="budget"
                        name="annual_revenue" >
                    @error('annual_revenue')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>

              


            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Tags</label>
                    <select name="tags_id[]" id="tags" class="form-control @error('tags_id') is-invalid @enderror"
                        multiple>



                        @foreach($tags as $key => $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>

                        @endforeach
                    </select>
                    @error('tags_id')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror


                </div>
                  <div class="col-md-6">
                    <label for="investment_type" class="form-label">Type d'investissement</label>
                    <select class="form-control @error('investment_type') is-invalid @enderror" id="investment_type"
                        name="investment_type">
                        <option value="">-- All Types --</option>
                        <option value="financial">Investissement financier</option>
                        <option value="materiel">Investissement matériel</option>
                        <option value="immateriel">Investissement immatériel</option>
                        <option value="human">Investissement humain</option>
                        <option value="technology">Investissement technologique</option>
                        <option value="commercial">Investissement commercial</option>
                        <option value="operational">Investissement opérationnel</option>
                        <option value="strategic">Investissement stratégique</option>
                    </select>
                    @error('investment_type')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
              

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="kpi_users" class="form-label">Utilisateurs actifs</label>
                    <input type="number" class="form-control @error('kpi_users') is-invalid @enderror" id="kpi_users"
                        name="kpi_users" placeholder="Enter KPI users">
                    @error('kpi_users')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="monthly_growth_p" class="form-label">Croissance mensuelle</label>
                    <input type="number"  min="0" max="100"
                        class="form-control @error('monthly_growth_p') is-invalid @enderror" id="monthly_growth_p"
                        name="monthly_growth_p" placeholder="Entrer Croissance mensuelle percentage">
                    @error('monthly_growth_pr')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">

                <div class="col-md-6">
                    <label for="retention_rate_p" class="form-label">Taux de rétention</label>
                    <input type="number"  min="0" max="100"
                        class="form-control @error('retention_rate_p') is-invalid @enderror" id="retention_rate_p"
                        name="retention_rate_p" placeholder="Entrer Taux de rétention">
                    @error('retention_rate_p')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" placeholder="Entrez la description">
                    @error('description')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="business_model" class="form-label">Modèle d'affaires</label>
                    <input type="file" class="form-control @error('business_model') is-invalid @enderror"
                        name="business_model">
                    @error('business_model')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="documents" class="form-label">Documents</label>
                    <input type="file" class="form-control @error('documents.*') is-invalid @enderror" id="document"
                        name="documents[]" multiple>
                    @error('documents.*')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-success ">Ajouter</button>
            </div>

        </form>



    </div>


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



@endsection