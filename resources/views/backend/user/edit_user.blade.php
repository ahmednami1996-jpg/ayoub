@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

<div class="col-md-6">

<h5>Mettre à jour les rôles utilisateur</h5>



<form action="{{route('admin.user.update',$user->id)}}" method="post">

@csrf



<div class="form-group mb-3">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" value="{{$user->username}}" name="username" class="form-control @error('username') is-invalid @enderror" disable/>
    @error('username')
         <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="roles">Rôles</label>
    <select class="form-control @error('roles') is-invalid @enderror" id="roles" name="roles[]" multiple>
        @foreach($roles as $role)

             <option value="{{$role->id}}" {{$user->roles->contains("name",$role->name) ? 'selected' : ''}}>{{$role->name}}</option>
        @endforeach
       
    </select>
    @error('roles')
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