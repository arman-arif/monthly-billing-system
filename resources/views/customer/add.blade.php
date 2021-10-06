@extends('layouts.main',['titleHeading'=>$title])

@push('content-below')
  @include('partials.error')
@endpush

@push('stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">
@endpush

@section('content')
  <div class="row">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
      <form action="{{ route('add-customer') }}" method="POST">
        @csrf
        <div class="mb-3">
          <input class="form-control" type="text" name="name" id="name" placeholder="Full Name"
            value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
          <input class="form-control" type="text" name="username" id="username" placeholder="Username"
            value="{{ old('username') }}" required>
        </div>

        <div class="mb-3">
          <textarea class="form-control" name="description" id="description" rows="5"
            placeholder="Customer Description (Optional)">{{ old('description') }}</textarea>
        </div>

        <div class="row mb-sm-3">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <select name="package_id" id="package" class="form-control" required>
              <option value="">Select Package</option>
              @foreach ($packages as $package)
                <option value="{{ $package->id }}" {{ $package->id == old('id') ? 'selected' : '' }}>
                  {{ $package->title }} - <span class="text-muted">{{ $package->speed }} Mbps</span></option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input class="form-control" type="text" name="connection_date" id="connection_date" placeholder="dd-mm-yyyy" data-toggle="datepicker"
              value="{{ old('connection_date') }}" required>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add</button>
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
