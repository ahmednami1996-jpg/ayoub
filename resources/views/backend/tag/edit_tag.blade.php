@extends("layouts.admin_master")
@section("adminSection")


<div class="row">

<div class="col-md-6">

<h5>Modifier étiquette</h5>


<a href="{{route('tag.view')}}" class="text-primary">Voir tous les tags <i class="fas fa-angle-double-right"></i></a>
<form action="{{route('tag.update',$tag->id)}}" method="post" class="mt-3">

@csrf


<div class="form-group">
    <label for="role">Nom d'étiquette</label>
    <input type="text" value="{{$tag->name}}" name="name" class="form-control @error('name') is-invalid @enderror"/>
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