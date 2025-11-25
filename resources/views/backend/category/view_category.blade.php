@extends("layouts.admin_master")

@section("adminSection")

<div class="row">

<div class="col-md-6">
<h4>
    Créer catégorie
</h4>
<form method="POST" action="{{route('category.store')}}">
@csrf
<div class="form-group">
<label for="category">Nom de catégorie</label>
<input type="text" placeholder="Entrez le nom de la catégorie" name="name" class="form-control @error('name') is-invalid @enderror" />
 @error('name')
         <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
<div >
<button type="submit" class="btn btn-primary">Ajouter</button>
</div>


</form>
</div>


<div class="col-md-6">
    <h4>Liste des catégories</h4>
    <table class="table table-hover">
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
             <td>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success"><i class="fas fa-edit"></i>  </a>
                <a id="delete" href="{{route('category.destroy',$category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection