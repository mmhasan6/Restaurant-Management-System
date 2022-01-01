@extends('admin.layouts.app')

@section('bodycontent')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Users</h4>
       {{-- showing success messange --}}
       @if (session('status'))
        <h5 class="alert alert-success">{{ session('status') }}</h5>
       @endif
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> User </th>
              <th> Name </th>
              <th> Email </th>
              <th> Created At </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key=>$item)
              <tr>
                <td>{{ $key+1 }}</td>
                <td><img class="img-xs rounded-circle" src="admin/assets/images/faces/face15.jpg" alt=""></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <button class="mdi mdi-tooltip-edit btn-inverse-success">Edit</button>
                  @if ($item->usertype == "0")
                    <a class="btn-inverse-danger mdi mdi-delete float-end" href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('are you sure to delete! {{ $item->name }}')">Delete</a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection