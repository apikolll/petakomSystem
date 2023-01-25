
@extends('layout.master')

<title>Petakom | Dashboard</title>
<link rel="shortcut icon" href="bootstrap1/assets/images/logo/logo.png" type="image/svg" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in as a committee!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
