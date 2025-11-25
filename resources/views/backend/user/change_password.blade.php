@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

<div class="col-md-6">

<h5>Changer le mot de passe</h5>



<form action="{{route('user.change.password.update')}}" method="post">

@csrf


<div class="form-group">
    <label for="currentPassword">Mot de passe actuel</label>
    <input type="password"  name="current_password" class="form-control @error('current_password') is-invalid @enderror"/>
    @error('current_password')
         <span class="invalid-feedback">{{$message}}</span>
    @enderror

</div>
<div class="form-group">
    <label for="password">Nouveau mot de passe</label>
    <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror"/>
    @error('password')
         <span class="invalid-feedback">{{$message}}</span>
    @enderror

</div>
<div class="form-group">
    <label for="confirmPassword">Confirmer le mot de passe</label>
    <input type="password"  name="password_confirmation" class="form-control @error('password') is-invalid @enderror"/>

</div>
<div class="form-group">
    <button class="btn btn-success ">changer le mot de passe</button>
</div>

</form>



</div>







</div>




@endsection