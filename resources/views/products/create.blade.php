@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-outline-secondary btn-sm " href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="product_name" class="form-control" placeholder="Name">
                @if($errors->has('product_name'))
                    <p>{{ $errors->first('product_name') }}</p>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                @error('detail')
                    <div class=" ">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Image:</strong>
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                </div>
                @error('image')
                    <div class=" ">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12   mt-3">
            <div class="form-group">
                <strong>Category:</strong>
                <select class="form-select" aria-label="Disabled select example" name="category">
                    <option disabled="true" selected>Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <p>{{ $errors->first('category') }}</p>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

</form>
@endsection
