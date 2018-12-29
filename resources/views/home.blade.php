@extends('layouts.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    @foreach($messages as $message)
                        {{-- Put a message component here --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
