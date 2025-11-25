@extends("layouts.admin_master")

@section("adminSection")


  <div class="row">
    <div class="col-12">
          <section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Postulez pour le projet</h3>
            </div>

        </div>
        <div class="row">
<div class="col-12">
    <form  action="{{route('apply',$id)}}" method="post">
        @csrf
       <div class="form-group">
        <label for="amount" class="form-label">Montant</label>
        <input type="number" name="amount" class="form-control" id="" placeholder="Entrez votre Montant">
       </div>
        <div class="form-group">
        <label for="message" class="form-label">Message</label>
        <textarea  name="message" class="form-control" id=""></textarea>
       </div>
        <div class="form-group">
        <button class="btn btn-primary">Appliquer</button>
       </div>

    </form>
</div>
        </div>
    </div>
  </section>

    </div>
  </div>
  








@endsection