@extends('layouts.frontend')

@section('content')
<div><h3>Products</h3></div>
    <div>
        @foreach ($cat_pro as $pro)
        <div class="card p-4" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Name: {{$pro->name}}</h5>
              <p class="card-text">Price: ${{$pro->price}}</p>
              <a href="{{url('product-detail-page/'.$pro->id)}}" class="btn btn-primary">View Details</a>
            </div>
          </div>
        @endforeach
    </div>
@endsection