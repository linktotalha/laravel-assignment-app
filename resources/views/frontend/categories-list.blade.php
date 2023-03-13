@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cat)
                    <tr>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->desc}}</td>
                        <td>
                            <a href="{{url('category_products/'.$cat->id)}}">View Products</a>
                        </td>
                      </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
@endsection