@extends('layouts.app')

@section('main-content')

    @include('partials.message')

    @stack('content-above')

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <strong>{{ __(isset($titleHeading) ? $titleHeading : 'Home') }}</strong>
                <div>
                    @stack('action-btn')
                </div>
            </div>
        </div>

        <div class="card-body">
            @yield('content')
        </div>
    </div>

    @stack('content-below')
@endsection
