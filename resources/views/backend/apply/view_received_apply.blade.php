@extends("layouts.admin_master")

@section("adminSection")

<!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Page des candidatures</h1>
<div class="row">




<div class="col-lg-12">
    <h4>Demandes</h4>
      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
               <th>Id</th>
<th>Nom de l’investisseur</th>
<th>Informations du projet</th>
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
             <td>{{$application->user->username}}</td>
             <td><a href="{{route('home.project',$application->project_id)}}">Visite</a>
                </td>
             <td>{{$application->message}}</td>
             <td>{{$application->amount}}</td>
             <td>
                {{$application->status=="accepted"  ? "accepté": ""}}
                {{$application->status=="pending"  ? "en attente": ""}}
                {{$application->status=="rejected"  ? "rejeté": ""}}
            </td>
             <td><a class="btn btn-primary" href="{{route('chat',$application->user_id)}}">chat</a></td>
            
             <td class="d-flex">
                @if($application->status !="accepted")
<form class="mx-2" action="{{route('apply.approve',$application->id)}}" method="post">
@csrf    
<input type="hidden" value="accepted" name="status">
<button class="btn btn-success" {{$application->status =="accepted" ?"disabled":""}}>accepter</button>
</form>
@endif
 @if($application->status !="rejected")
<form class="mx-2" action="{{route('apply.approve',$application->id)}}" method="post">
@csrf    
<input type="hidden" value="rejected" name="status">
<button class="btn btn-danger" {{$application->status == "rejected" ?"disabled":""}}>rejeter</button>
</form>
@endif
             </td>
        
           </tr>
               @endforeach
        </tbody>
    </table></div>
</div>
</div>

@endsection