@extends("layouts.admin_master")

@section("adminSection")

<div class="row bg-white p-3">

    <div class="col-md-6 mb-3">
        <h4>
            Créer catégorie
        </h4>
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="form-group mb-3">
                <label for="category" class="form-label">Nom de catégorie</label>
                <input type="text" placeholder="Entrez le nom de la catégorie" name="name"
                    class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-25">Ajouter</button>
            </div>


        </form>
    </div>


    <div class="col-md-6">
        <h4>Liste des catégories</h4>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-success mx-2"><i
                                    class="fas fa-edit"></i> </a>
                            <a id="delete" href="{{route('category.destroy',$category->id)}}" class="btn btn-danger mx-2"><i
                                    class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection