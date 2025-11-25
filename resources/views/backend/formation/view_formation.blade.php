@extends("layouts.admin_master")

@section("adminSection")
<!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Page de Formation</h1>
<div class="row">




<div class="col-lg-12 col-md-6">
    <h4>Liste des formations</h4>
     <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>ID</th>
<th>Titre</th>
<th>Catégorie</th>
<th>Fournisseur</th>
<th>URL</th>
<th>Coût</th>
<th>Réduction</th>
<th>Mode</th>
<th>Durée</th>
<th>Vues</th>
<th>Statut</th>
<th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($formations as $key => $formation)
            <tr>
             <td>{{$key+1}}</td>
             <td>{{$formation->title}}</td>
             <td>{{$formation->category->name ?? "Pas de catégorie"}}</td>
             <td>{{$formation->provider}}</td>
             <td>
               <a href="{{$formation->url}}" target="_blank">URL</a> </td>
            
                <td>{{$formation->cost}}</td>
                <td>{{$formation->reduction}}</td>
                <td>{{$formation->mode == 1 ?"En ligne":"présentiel"}}</td>
                <td>{{$formation->duration}}</td>
                <td>{{$formation->views}}</td>
               <td>  <form action="{{route('formation.change.status',$formation->id)}}" method="post">
                    @csrf
                <button class="btn {{ $formation->status==1 ?'btn-danger':'btn-success'}}"> {{ $formation->status==1  ?"Désactiver" :"Activer" }}</button>
                </form>
             </td>
             <td class="text-center">
                <a href="{{route('formation.edit',$formation->id)}}" class="btn btn-success m-1"><i class="fas fa-edit"></i></a>
                <a href="{{route('formation.destroy',$formation->id)}}" id="delete" class="btn btn-danger m-1"><i class="fa fa-trash"></i></a>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table></div>
</div>
</div>
@endsection