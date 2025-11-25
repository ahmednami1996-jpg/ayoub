@extends("layouts.admin_master")

@section("adminSection")

<div class="row">




<div class="col-lg-12 col-md-6">
   <h4>Liste des projets</h4>
      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
<th>Propriétaire</th>
<th>Titre</th>
<th>Résumé</th>
<th>Disponible</th>
<th>Statut</th>
<th>Image</th>
<th>Documents</th>
<th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $key => $project)
            <tr>
             <td>{{$project->id}}</td>
             <td>{{$project->user->username}}</td>
             <td>{{$project->title}}</td>
             <td>{{$project->resume}}</td>
             <td>{{!$project->is_taken ? 'Disponible' :'Déjà pris'}}</td>
  <td>
                
             <div class="d-flex">

           @if(auth()->user()->hasRole("admin"))   
             <form action="{{route('project.change.status',$project->id)}}" method="post">
                    @csrf
                    <input type="hidden" value="pending" name="status">
                <button class="btn btn-secondary btn-circle mx-2 {{ $project->status=='pending' ? 'disabled' :''}}" {{ $project->status=="pending" ? "disabled" :""}}> <i class="fa fa-clock"></i> </button>
            </form> 
               <form action="{{route('project.change.status',$project->id)}}" method="post">
                    @csrf
                    <input type="hidden" value="approved" name="status">
                <button class="btn btn-success btn-circle mx-2 {{ $project->status=='approved' ? 'disabled' :''}}" {{ $project->status=="approved" ? "disabled" :""}}> <i class="fas fa-check"></i> </button>
            </form> 
               <form action="{{route('project.change.status',$project->id)}}" method="post">
                    @csrf
                    <input type="hidden" value="rejected" name="status">
                <button class="btn btn-danger btn-circle mx-2 {{ $project->status=='rejected' ? 'disabled' :''}}" {{ $project->status=="rejected" ? "disabled" :""}}> <i class="fa fa-ban"></i> </button>
            </form> 
            @else
            {{ $project->status=='rejected' ? "Rejeté":""}}
            {{ $project->status=='pending' ? "En attente":""}}
            {{ $project->status=='approved' ? "Accepté":""}}
            @endif
            </div> 

             </td>
             <td><img src="{{asset('storage/images/projects/'.$project->picture)}}" style="width:100%;height:100px" alt=""></td>
            
             <td>
                   @if($project->documents()->count() >0)
                    @foreach($project->documents  as  $doc)
                    <div class="badge">
                        <a href="{{asset('storage/documents/projects/'.$doc->file_name)}}">{{"Doc ".$doc->id}}</a>

                    </div>
                    @endforeach
                    @else
 {{"No Document"}}
                    @endif
                </td>
           
             <td>
                <a href="{{route('project.edit',$project->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="{{route('project.destroy',$project->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i> </a>
                <a href="{{route('home.project',$project->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> </a>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table></div>
</div>
</div>
@endsection