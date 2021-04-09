@extends('admin.master')
@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <td><img src="{{ asset('storage/' . $product->image) }}" width="150" height="150" alt=""></td>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-title">{{ $product->price }}</h5>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Update</a>
                        <a href="{{route('products.delete',$product->id)}}" class="btn btn-primary"
                           onclick="return confirm('Are you sure delete user: {{ $product->name }}')">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
