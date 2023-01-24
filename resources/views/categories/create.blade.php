@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category</h2>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-outline-secondary btn-sm " href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Category Name:</strong>
                <input type="text" name="category_name" class="form-control" placeholder="Name">
                @if($errors->has('category_name'))
                    <p>{{ $errors->first('category_name') }}</p>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection
