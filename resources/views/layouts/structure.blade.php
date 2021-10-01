@extends('layouts.app')

@section('main-content')
    <div class="card">
        <div class="card-header">
            {{ __(isset($titleHeading) ? $titleHeading : 'Home') }}
        </div>

        <div class="card-body">
            @yield('content')
        </div>
    </div>
@endsection
