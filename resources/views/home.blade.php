@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>


            </div>
        </div>
    </div> --}}
    <div>
        @if (auth()->user() && auth()->user()->is_admin==1 )
            <div>
                <div  class="d-flex justify-content-center">
                    <h1>You are already Login.!!!</h1>
                </div>
                <div  class="d-flex justify-content-center">
                    <h2>You can update whatever you want!!!</h2>
                </div>
            </div>
        @elseif (auth()->user())
            <div>
                <div  class="d-flex justify-content-center">
                    <h1>You are already Login.!!!</h1>
                </div>
                <div  class="d-flex justify-content-center">
                    <h2>You can update your products!!!</h2>
                </div>
            </div>
        @else
            <div>
                <div  class="d-flex justify-content-center">
                    <h1>If you have already account, Login Please!</h1>
                </div>
                <div  class="d-flex justify-content-center">
                    <h1>If you don't have, register first!</h1>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
