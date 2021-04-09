@extends('admin.master')
@section('page_title')
    Tao moi san pham
@endsection
@section('content')
    {{--    @include('layouts.core.navbar')--}}

    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') border-danger  @enderror">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control @error('description') border-danger  @enderror">
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group col col-md-6">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control @error('price') border-danger  @enderror">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group col col-md-6">
                        <label>Category</label>
                        <select class="custom-select @error('category_id') border-danger  @enderror" name="category_id">
                            <option selected>Choose...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group col col-md-4">
                        <label>Image</label> <br>
                        <input type="file" accept="image/*" onchange="loadFile(event)" name="image">
                    </div>
                    <div class="form-group col col-md-4">
                        <img id="output" style="height: 100px"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>


