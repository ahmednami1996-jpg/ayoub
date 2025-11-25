@extends("layouts.admin_master")

@section("adminSection")

<div class="row">




    <div class="col-lg-12 col-md-6">
        <h4>Liste des utilisateurs</h4>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Nom d'utilisateur</th>
                        <th>Photo</th>
                        <th>Rôles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->username}}</td>
                        <td>
                            <img src="{{  asset('storage/images/users/'.$user->picture) }}"
                                style="width:100%; height:100px" />
                        </td>
                        <td>
                            @foreach($user->roles as $key =>$role)
                            <span class="btn btn-secondary btn-rounded disabled mx-1">{{$role->name}}</span>

                            @endforeach
                        </td>






                        <td class="text-center">
                            <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-success m-1"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{route('admin.user.destroy',$user->id)}}" id="delete" class="btn btn-danger m-1"><i
                                    class="fa fa-trash"></i> </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection