@extends('layouts.main',['titleHeading'=>$title])

@push('action-btn')
  <a class="btn btn-sm btn-primary" href="{{ route('add-customer') }}">Add Customer</a>
@endpush

@push('stylesheet')
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
          <td>{{ $customer->package->title }} <span class="text-muted">({{ $customer->package->speed }}
              Mbps)</span></td>
          <td>{{ $customer->connection_date }}</td>
          <td class="text-right">
            <a href="{{ route('edit-customer', $customer->id) }}" class="mr-2"><i
                class="fa fa-pencil-square-o"></i></a>
            <a href="javascript:;" class="text-danger" data-action="delete"
              data-href="{{ route('delete-customer', $customer->id) }}"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">No customer added yet</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  <script>
    const custAction = document.querySelectorAll('[data-action=delete]');
    custAction.forEach(element => {
      element.addEventListener('click', function() {
        const _deleteForm = document.createElement('form');
        _deleteForm.action = this.dataset.href;
        _deleteForm.method = "POST";
        const _csrfToken = document.createElement('input');
        _csrfToken.name = "_token";
        _csrfToken.type = "hidden";
        _csrfToken.value = "{{ csrf_token() }}";
        _deleteForm.appendChild(_csrfToken);
        const _method = document.createElement('input');
        _method.name = "_method";
        _method.type = "hidden";
        _method.value = "DELETE";
        _deleteForm.appendChild(_method);
        this.insertAdjacentElement("afterend", _deleteForm);

        _deleteForm.submit();
      });
    });
  </script>
@endsection
