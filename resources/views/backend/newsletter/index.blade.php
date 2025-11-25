@extends("layouts.admin_master")

@section("adminSection")


<div class="row">

<div class="col-md-6">
<h4>Envouyer Newletter</h4>
<form action="{{route('newletter.sent')}}" method="post">
    @csrf
    <textarea name="message" class="form-control" rows="4"></textarea>
    <button class="btn btn-primary bt-3">Envoyer</button>
</form>
</div>
</div>


@endsection