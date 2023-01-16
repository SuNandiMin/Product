@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 mb-3  ">
        <div class="d-flex justify-content-center ">
            <a href="/categories" class="btn btn-primary">
            Categories
            </a>
        </div>
        <div class="d-flex justify-content-start ">
                <a class="btn btn-outline-secondary btn-sm " href="{{ route('products.index') }}">Product</a>
        </div>
        <div class="d-flex justify-content-end  ">
            <a class="btn btn-secondary btn-sm " href="{{ route('categories.create') }}"> Create New Category</a>
        </div>

    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Category Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $key=>$category)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$category->id}}</td>
            <td>{{ $category->category_name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {{$categories->links()}}
    </div>

@endsection
