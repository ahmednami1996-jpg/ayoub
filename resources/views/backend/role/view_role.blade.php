@extends("layouts.admin_master")

@section("adminSection")

<div class="row">

<div class="col-md-6">
<h4>
   Créer rôle
</h4>
<form method="POST" action="{{route('role.store')}}">
@csrf
<div class="form-group">
<label for="role">Nom de rôle</label>
<input type="text" placeholder="Entrez le nom du rôle" name="name" class="form-control @error('name') is-invalid @enderror" />
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
    <h4>Liste des rôles</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $key => $role)
            <tr>
             <td>{{$key+1}}</td>
             <td>{{$role->name}}</td>
             <td>
                <a href="{{route('role.edit',$role->id)}}" class="btn btn-success"><i class="fas fa-edit"></i> </a>
                <a href="{{route('role.destroy',$role->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection