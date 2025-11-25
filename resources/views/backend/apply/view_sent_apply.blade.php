@extends("layouts.admin_master")

@section("adminSection")

<!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Page des candidature</h1>
<div class="row">




<div class="col-lg-12 col-md-6">
    <h4>Mes candidatures</h4>
      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
<th>Nom de l’innovateur</th>
<th>Informations sur le projet</th>
<th>Message</th>
<th>Montant</th>
<th>Statut</th>
<th>Réponse</th>
<th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($applications as $application)
            <tr>
             <td>{{$application->id}}</td>
             <td>{{$application->project->user->username}}</td>
            <td><a href="{{route('home.project',$application->project_id)}}">Visite</a>
                </td>
             <td>{{$application->message}}</td>
             <td>{{$application->amount}}</td>
             <td>{{$application->status}}</td>
             <td class="text-center">
<a href="{{route('chat',$application->project->user->id)}}" class="btn btn-primary">Message</a>

             </td>
             <td>
<a class="btn btn-success m-1" href="{{route('apply.edit',$application->id)}}"><i class="fas fa-edit"></i></a>
             </td>
            
           </tr>
               @endforeach
        </tbody>
    </table>
</div></div>
</div>

@endsection