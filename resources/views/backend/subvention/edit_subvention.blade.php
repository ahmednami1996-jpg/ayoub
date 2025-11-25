@extends("layouts.admin_master")
@section("adminSection")


<h1 class="h3 mb-4 text-gray-800">Page des Subventions</h1>
<div class="row">

    <div class="col-12">

        <h5>Modifier la subvention</h5>


        <a href="{{route('subvention.view')}}" class="text-primary">Voir toutes les subventions <i
                class="fas fa-angle-double-right"></i></a>

        <form action="{{route('subvention.update',$subvention->id)}}" method="post" class="mt-3"
            enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre de la subvention</label>
                        <input type="text" name="title" value="{{$subvention->title}}"
                            class="form-control @error('title') is-invalid @enderror" />
                        @error('title')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="organization">Organisation</label>
                        <input type="text" name="organization" value="{{$subvention->organization}}"
                            class="form-control @error('organization') is-invalid @enderror" />
                        @error('organization')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Nom du pays</label>
                        <select name="country" class="form-control w-md-25 @error('country') is-invalid @enderror"
                            id="country">

                            @foreach($countries as $code => $name)
                            <option value="{{$name}}" {{$subvention->country == $name ? 'selected':''}}>{{$name}}
                            </option>

                            @endforeach
                        </select>
                        @error('country')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Nom de la ville</label>
                        <input type="text" class="form-control" name="city"
                            value="{{$subvention->city}} @error('city') is-invalid @enderror">
                        @error('city')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" value="{{$subvention->url}}"
                            class="form-control @error('url') is-invalid @enderror" />
                        @error('url')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    
                        <div class="form-group">
                            <label for="organization">Annuaire</label>
                            <div class="d-flex">
                                <input type="file" name="file"
                                    class="form-control  @error('file') is-invalid @enderror" />
                                <a href="{{asset('storage/documents/subventions/'.$subvention->file_name)}}"
                                    class="btn btn-outline-primary mx-3 w-50">Old file</a>
                                @error('file')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                   

                </div>
            </div>




            <div class="row mb-3">
                <div class="col-6">
                    <label for="Eligibilities" class="form-label">Eligibilités</label>
                    <textarea name="eligibilities" id="" class="form-control" rows="5">{{ old('eligibilities', trim(implode("\n", $subvention->eligibilities_array))) }}</textarea>

                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success ">Modifier</button>
            </div>

        </form>



    </div>







</div>




@endsection