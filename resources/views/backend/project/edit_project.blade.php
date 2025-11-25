@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

    <div class="col-12">

        <h5>Modifier projet</h5>



        <form action="{{route('project.update',$project->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-group text-center mx-auto">
                        <div class="text-center">
                            <img src="{{asset('storage/images/projects/'.$project->picture)}}"
                                class="img img-responsive  mb-3" alt="" style="width:14rem;height:14rem" id="showImage">
                        </div>
                        <input type="file" class="form-control" name="picture" id="imageInput" />


                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="title" class="form-label">Titre de projet</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}"
                        >
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Catégories</label>
                    <select name="category_id" class="form-control">


                       
                        @foreach($categories as $key => $category)
                        <option value="{{$category->id}}" {{$category->id == $project->category_id ?"selected":""}}>{{$category->name}}</option>

                        @endforeach
                    </select>


                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="resume">Résumé</label>
                        <textarea name="resume" class="form-control" id="" cols="3" rows="3" vertical>{{$project->resume}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="market">Marché</label>
                        <textarea name="market" class="form-control" id="" cols="3" rows="3" vertical>{{$project->market}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="budget" class="form-label">Montant d'investissement</label>
                    <input type="number" class="form-control @error('budget') is-invalid @enderror"
                        value="{{$project->budget}}" id="budget" name="budget">
                    @error('budget')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="annual_revenue" class="form-label">Revenu annuel</label>
                    <input type="number" class="form-control @error('annual_revenue') is-invalid @enderror"
                        value="{{$project->annual_revenue}}" id="budget" name="annual_revenue"
                        >
                    @error('annual_revenue')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>




            </div>
            <!-- to do later -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Tags</label>
                    <select name="tags_id[]" id="tags" class="form-control @error('tags_id') is-invalid @enderror"
                        multiple>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $project->tags->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
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

                        <option value="financier" {{$project->investment_type =="financier" ?"selected":"" }}>
                            Investissement financier</option>
                        <option value="materiel" {{$project->investment_type =="materiel" ?"selected":"" }}>
                            Investissement matériel</option>
                        <option value="immatériel" {{$project->investment_type =="immatériel" ?"selected":"" }}>
                            Investissement immatériel</option>
                        <option value="humain" {{$project->investment_type =="humain" ?"selected":"" }}>Investissement
                            humain</option>
                        <option value="technologique" {{$project->investment_type =="technologique" ?"selected":"" }}>
                            Investissement technologique</option>
                        <option value="commercial" {{$project->investment_type =="commercial" ?"selected":"" }}>
                            Investissement commercial</option>
                        <option value="opérationnel" {{$project->investment_type =="opérationnel" ?"selected":"" }}>
                            Investissement opérationnel</option>
                        <option value="stratégique" {{$project->investment_type =="stratégique" ?"selected":"" }}>
                            Investissement stratégique</option>
                    </select>
                    @error('investment_type')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>


            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="kpi_users" class="form-label">Utilisateurs actifs</label>
                    <input type="number" class="form-control @error('kpi_users') is-invalid @enderror"
                        value="{{$project->kpi_users}}" id="kpi_users" name="kpi_users" >
                    @error('kpi_users')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="monthly_growth_p" class="form-label">Croissance mensuelle</label>
                    <input type="number" min="0" max="100" value="{{$project->monthly_growth_p}}"
                        class="form-control @error('monthly_growth_p') is-invalid @enderror" id="monthly_growth_p"
                        name="monthly_growth_p">
                    @error('monthly_growth_pr')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">

                <div class="col-md-6">
                    <label for="retention_rate_p" class="form-label">Taux de rétention</label>
                    <input type="number" min="0" max="100" value="{{$project->retention_rate_p}}"
                        class="form-control @error('retention_rate_p') is-invalid @enderror" id="retention_rate_p"
                        name="retention_rate_p" >
                    @error('retention_rate_p')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" value="{{$project->description}}"
                        class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description">
                    @error('description')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="business_model" class="form-label">Modèle d'affaires</label>
                    <div class="d-flex justify-content-between">
                        <input type="file" class="form-control @error('business_model') is-invalid @enderror"
                            name="business_model">
                        @error('business_model')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        <a href="{{asset('storage/documents/projects/'.$project->business_model)}}"
                            class="btn btn-outline-primary mx-3">Fichier</a>
                    </div>

                </div>


                <div class="col-md-6 col-12">

                   <div class="row">
                    <div class="col-md-12 col-lg-6"> <div class="mb-3">
                        <label class="form-label">Anciens documents</label>
                        <div id="oldDocumentsWrapper">

                            @foreach($project->documents as $key => $doc)
                            <div class="doc d-flex align-items-center mb-2" data-doc-id="{{ $doc->id }}">

                                {{-- File link --}}
                                <a href="{{ asset('storage/documents/' . $doc->filename) }}" target="_blank"
                                    class="btn btn-outline-primary w-100 mx-3">
                                    Document {{ $key + 1 }}
                                </a>

                                {{-- Delete button --}}
                               
                                <button type="button" class="btn btn-danger  delete-old-doc">
                                    <i class="fa fa-trash"></i>
                                </button>

                                {{-- Hidden input (sent only if not removed by JS) --}}
                                <input type="hidden" name="old_documents[]" value="{{ $doc->id }}">
                            </div>
                            @endforeach

                        </div>
                    </div>
</div>
                    <div class="col-md-12 col-lg-6"> {{-- Upload New Documents --}}
                    <div class="mb-3">
                        <label for="newDocuments">Nouveaux Documents</label>
                        <input type="file" class="form-control @error('documents.*') is-invalid @enderror"
                            id="newDocuments" name="documents[]" multiple>

                        @error('documents.*')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
</div>
                   </div>
                   
                   
                </div>

            </div>







            <div class="form-group">
                <button class="btn btn-success ">Modifier</button>
            </div>

        </form>



    </div>


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

        document.querySelectorAll(".delete-old-doc").forEach(btn => {
        btn.addEventListener("click", function () {

            const docDiv = this.closest(".doc");

            // Remove the whole block
            docDiv.remove();
        });
    });
    });
    </script>




</div>




@endsection