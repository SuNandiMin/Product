@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-outline-secondary btn-sm " href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 m-4">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <h2> Product Detail::</h2>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $product->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Details:</strong>
                                {{ $product->detail }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <img src="/images/{{ $product->image}}" alt="" width="50">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
