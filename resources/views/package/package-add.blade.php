@extends('layouts.structure',['titleHeading'=>$title])

@push('content-below')
    @include('partials.error')
@endpush

@section('content')
    <form action="{{ route('add-package') }}" method="post">
        @csrf
        <div class="mb-3">
            <input class="form-control" type="text" name="title" id="title" placeholder="Package Title"
                   value="{{ old('title') }}" required>
        </div>

        <div class="row mb-sm-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input class="form-control" type="text" name="code" id="code" placeholder="Short Code"
                       value="{{ old('code') }}">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="input-group">
                    <input class="form-control input-group-prepend" type="text" name="speed" id="speed"
                           placeholder="Speed" required value="{{ old('speed') }}">
                    <span class="input-group-append input-group-text">Mbps</span>
                </div>
            </div>
        </div>

        <div class="row mb-sm-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="input-group">
                    <input class="form-control input-group-prepend" type="text" name="duration" id="duration"
                           placeholder="Duration" value="{{ old('duration') }}">
                    <span class="input-group-append input-group-text">Days</span>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="input-group">
                    <input class="form-control input-group-prepend" type="text" name="price" id="price"
                           placeholder="Price" required value="{{ old('price') }}">
                    <span class="input-group-append input-group-text">TK</span>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add</button>

    </form>
@endsection
