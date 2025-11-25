@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

<div class="col-md-6">

<h5>Modifier rôle</h5>

<a href="{{route('role.view')}}" class="text-primary">Voir tous les rôles <i class="fas fa-angle-double-right"></i></a>

<form action="{{route('role.update',$role->id)}}" method="post" class="mt-3">

@csrf


<div class="form-group">
    <label for="role">Nom de rôle</label>
    <input type="text" value="{{$role->name}}" name="name" class="form-control @error('name') is-invalid @enderror"/>
    @error('name')
         <span class="invalid-feedback">{{$message}}</span>
    @enderror

</div>
<div class="form-group">
    <button class="btn btn-success ">Modifier</button>
</div>

</form>



</div>







</div>




@endsection