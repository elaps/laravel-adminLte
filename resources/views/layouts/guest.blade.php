@extends('layouts.empty')
@section('content')
    <body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h1 class="mb-0 text-center"> {{$title}} </h1>
            </div>
            <div class="card-body login-card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script>

    </script>
    </body>
@endsection

