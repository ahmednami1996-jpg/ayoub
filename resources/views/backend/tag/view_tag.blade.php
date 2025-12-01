@extends("layouts.admin_master")

@section("adminSection")

<div class="row">

<div class="col-md-6">
<h4>
   Créer étiquette
</h4>
<form method="POST" action="{{route('tag.store')}}">
@csrf
<div class="form-group mb-3">
<label for="tag">Nom d'étiquette</label>
<input type="text" placeholder="Entrez le nom de l'étiquette" name="name" class="form-control @error('name') is-invalid @enderror" />
@error('name')
         <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
<div >
<button type="submit" class="btn btn-primary">Ajouter étiquette</button>
</div>


</form>
</div>


<div class="col-md-6">
    <h4>Liste des étiquettes</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $key => $tag)
            <tr>
             <td>{{$key+1}}</td>
             <td>{{$tag->name}}</td>
             <td>
                <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-success"><i class="fas fa-edit"></i> </a>
                <a href="{{route('tag.destroy',$tag->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection