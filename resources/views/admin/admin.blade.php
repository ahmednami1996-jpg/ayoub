@extends("layouts.admin_master")
@section("adminSection")

<p>{{auth()->user()->id}}</p>

@endsection