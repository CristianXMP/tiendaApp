@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
          <h5 class="card-title text-form">Detalles de la venta</h5>
         <hr>
         <div class="container">
             <div class="row">
                 <div class="col-12 col-md-12 col-sm-12 ">
                    <p class="text-center mb-5">{{$sale->description}}</p>
                    <h2 class="text-center mb-4">Total venta</h2>
                        <h1 class="text-center">{{$total}}</h1>
                 </div>
             </div>
         </div>
      </div>
</div>

@endsection
@endsection
