@extends('layouts.main',['titleHeading'=>$title])

@push('content-below')
  @include('partials.error')
@endpush

@push('stylesheet')

<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">
@endpush

@section('content')
  <div class="row">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
      <form action="{{ route('update-customer') }}" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{ $customer->id }}">
        <div class="mb-3">
          <input class="form-control" type="text" name="name" id="name" placeholder="Full Name"
            value="{{ old('name') ? old('name') : $customer->name }}" required>
        </div>

        <div class="mb-3">
          <input class="form-control" type="text" name="username" id="username" placeholder="Username"
            value="{{ old('username') ? old('username') : $customer->username }}" required>
        </div>

        <div class="mb-3">
          <textarea class="form-control" name="description" id="description" rows="5"
            placeholder="Customer Description (Optional)">{{ old('description') ? old('description') : $customer->description }}</textarea>
        </div>

        <div class="row mb-sm-3">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select name="package_id" id="package" class="form-control" required>
              <option value="">Select Package</option>
              @foreach ($packages as $package)
                <option value="{{ $package->id }}" {{ (($package->id == old('id')) || ($package->id == $customer->package->id)) ? 'selected' : '' }}>
                  {{ $package->title }} - <span class="text-muted">{{ $package->speed }} Mbps</span></option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <input class="form-control input-group-prepend" type="text" name="connection_date" id="connection_date" placeholder="dd-mm-yyyy" data-toggle="datepicker"
              value="{{ old('connection_date') ? old('connection_date') : $customer->connection_date }}" required>

              <span class="input-group-append input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save Update</button>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
  <script>
    $('[data-toggle=datepicker]').datepicker({
      format: 'dd-mm-yyyy',
    });
  </script>
@endsection
