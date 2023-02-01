@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-start">
                <h2>Edit Product</h2>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-secondary btn-sm " href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                    @if($errors->has('detail'))
                        <p>{{ $errors->first('detail') }}</p>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price">
                    @if($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>
            </div>

            {{-- <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Image:</strong>
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                            @if($errors->has('image'))
                                <p>{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                </div>
            </div> --}}

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="from-group">
                    <strong>Category:</strong>
                    <select class="form-select" aria-label="Disabled select example" name="category">
                        <option disabled="true"  selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : ' '}}>
                                {{$category->category_name}}
                            </option>
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
