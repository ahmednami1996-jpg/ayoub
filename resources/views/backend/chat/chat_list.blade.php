@extends("layouts.admin_master")


@section('adminSection')


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                list des chats
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @if($chats->count()>0)
                 
                    @foreach($chats as $chat)


                    <li class="list-group-item mb-1">
                        <a class=" d-flex align-items-center" href="{{route('chat',$chat->sender_id)}}">
                            <div class=" mr-3">
                                <img class="rounded-circle"
                                    src="{{asset('storage/images/users/'.$chat->sender->picture)}}" width="40px"
                                    height="40px" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="">
                                    {{$chat->message}}
                                </div>
                                <div class="small text-gray-500">{{$chat->created_time}}</div>
                            </div>
                        </a>
                    </li>

                    @endforeach
                    @else
                    <span class="text-danger">Aucune chat.</span>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>


@endsection