@extends('layouts.app')

@section('main-content')

    @include('partials.message')

    @stack('content-above')

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <strong>{{ __(isset($titleHeading) ? $titleHeading : 'Home') }}</strong>
                <div class="mb-0">
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
