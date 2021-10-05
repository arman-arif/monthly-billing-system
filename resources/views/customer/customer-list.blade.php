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
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->package->title }} <span class="text-muted">({{ $customer->package->speed }} Mbps)</span></td>
                    <td>{{ $customer->connection_date }}</td>
                    <td>
                        <a href="{{ route('edit-customer') }}"></a>
                        <a href="{{ route('delete-customer', $customer->id) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No customer added yet</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
