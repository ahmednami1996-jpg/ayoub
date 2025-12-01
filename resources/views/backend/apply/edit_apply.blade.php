@extends("layouts.admin_master")

@section("adminSection")


  
  


 
        <div class="row">
            <div class="col-12">
                <h3>Modifier la candidature</h3>
            </div>

        </div>
        <div class="row">
<div class="col-6">
    <form class="" action="{{route('apply.update',$application->id)}}" method="post">
        @csrf
       <div class="form-group mb-3">
        <label for="amount" class="form-label">Montant</label>
        <input type="number" name="amount" value="{{$application->amount}}" class="form-control" id="">
       </div>
        <div class="form-group mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea  name="message" class="form-control" id="">{{$application->message}}</textarea>
       </div>
        <div class="form-group">
        <button class="btn btn-primary">Modifier</button>
       </div>

    </form>
</div>
        </div>
   





@endsection