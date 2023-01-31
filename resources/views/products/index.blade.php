@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center">
                <h2>
                <a href="{{route('products.index')}}" class="btn btn-primary">Products</a>
                </h2>
            </div>
            {{-- <div class="d-flex justify-content-start">
                <a class="btn btn-outline-secondary " href="{{ url('/') }}">Home</a>
            </div> --}}
            <div class="d-flex justify-content-end">
                <form action="" class="">
                    <div class="input-group">
                        <input name="search" type="search" class="form-control rounded" placeholder="search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
            </div>
            <div class="justify-content-start mb-2">
                <div class="mt-2 mb-2 ml-3">
                    <a class="btn btn-secondary btn-sm" href="{{ route('products.create') }}"> Create New Product</a>
                </div>
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
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Details</th>
            <th>Category</th>
            <th>Owner</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $key=>$product)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$product->id}}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{$product->category->category_name ?? 'Plz choose category' }}</td>
            <td>{{ $product->user->name ?? 'This item doesn\'t have'}}</td>
            <td> <img src="/images/{{ $product->image}}" alt="" width="50"></td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $products->appends(Request::except('page'))->links() }}
    </div>
@endsection
