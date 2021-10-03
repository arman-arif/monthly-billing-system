@extends('layouts.structure',['titleHeading'=>$title])

@push('action-btn')
    <a class="btn btn-sm btn-primary" href="{{ route('add-package') }}">Add Package</a>
@endpush

@push('stylesheet')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush

@section('content')
    <table class="table table-sm">
        <thead>
        <tr>
            {{--<th>S/N</th>--}}
            <th>Package</th>
            <th>Code</th>
            <th>Speed</th>
            <th>Duration</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($packages as $package)
            <tr>
                {{--<td>{{ 1 }}</td>--}}
                <td>{{ $package->title }}</td>
                <td>{{ Str::upper($package->code) }}</td>
                <td>{{ $package->speed }} Mbps</td>
                <td>{{ $package->duration }} Days</td>
                <td>{{ $package->price }} TK</td>
                <td>
                    <form action="{{ route('delete-package', $package->id) }}" method="post">
                        @method('DELETE') @csrf
                        <button class="btn btn-sm" type="submit" value=""><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    <div class="pt-4">
                        No package added yet
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
