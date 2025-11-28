@extends("layouts.admin_master")

@section("adminSection")

<div class="row">




<div class="col-lg-12 col-md-6">
    <h4>Liste des subventions</h4>
      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
<th>Titre</th>
<th>Organisation</th>
<th>Pays</th>
<th>Ville</th>
<th>Eligibilités</th>
<th>Annuaire</th>
<th>URL</th>
<th>Statut</th>
<th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subventions as $key => $subvention)
            <tr>
             <td>{{$key+1}}</td>
             <td>{{$subvention->title}}</td>
             <td>{{$subvention->organization}}</td>
             <td>{{$subvention->country}}</td>
             <td>{{$subvention->city}}</td>
             <td>
                <ul>
                @foreach($subvention->eligibilities_array as $el)

<li>{{$el}}</li>
                @endforeach</ul>
             </td>
             <td><a href="{{asset('storage/documents/subventions/'.$subvention->file_name)}}">Fichier</a></td>
             <td><a href="{{$subvention->url}}" target="_blank">
                URL</a></td>
             
             <td>
                <form action="{{route('subvention.change.status',$subvention->id)}}" method="post">
                    @csrf
                <button class="btn w-100 {{ $subvention->status==true ?'btn-danger':'btn-success'}}"> {{ $subvention->status == true ?"Désactiver" : "Activer" }}</button>
                </form>
             </td>
             <td class="text-center">
                <a href="{{route('subvention.edit',$subvention->id)}}" class="btn btn-success m-1"><i class="fas fa-edit"></i></a>
                <a href="{{route('subvention.destroy',$subvention->id)}}" id="delete" class="btn btn-danger m-1"><i class="fa fa-trash"></i></a>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table></div>
</div>
</div>
@endsection