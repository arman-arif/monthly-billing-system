@extends('layouts.structure',['titleHeading'=>$title])

@push('action-btn')
    <a class="btn btn-sm btn-primary" href="{{ route('add-customer') }}">Add Customer</a>
@endpush

@push('stylesheet')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush

@section('content')
    <table class="table table-sm">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Username</th>
            <th>Package</th>
            <th>Connected</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
