@extends('layouts.main',['titleHeading'=>$title])

@push('action-btn')
  <a class="btn btn-sm btn-primary" href="{{ route('add-package') }}">Add Package</a>
@endpush

@push('stylesheet')
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush

@section('content')
  <table class="table table-sm">
    <thead>
      <tr>
        {{-- <th>S/N</th> --}}
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
          <td>{{ $package->title }}</td>
          <td>{{ $package->code }}</td>
          <td>{{ $package->speed }} Mbps</td>
          <td>{{ $package->duration }} Days</td>
          <td>{{ $package->price }} TK</td>
          <td class="text-right">
              <a class="text-danger" type="submit" data-href="{{ route('delete-package', $package->id) }}"
                data-action="delete"><i class="fa fa-trash-o" title="Delete"></i></a>
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
