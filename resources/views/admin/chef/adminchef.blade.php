@extends('admin.layouts.app')

@section('bodycontent')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h4 class="card-title">Chefs</h4>
        </div>
        <div class="col-md-6">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Register New Item
          </button>
        </div>
      </div>
      
      
      {{-- showing success messange --}}
      @if (session('status'))
        <h5 class="alert alert-success">{{ session('status') }}</h5>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Chef </th>
              <th> Name </th>
              <th> Email </th>
              <th> Number </th>
              <th> Address </th>
              <th> Speciality </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($showchef as $key=>$item)
              <tr align="center">
                <td>{{ $key+1 }}</td>
                <td>
                  <img height="200" width="200" src="{{ asset('uploads/chefimage/'.$item->image) }}" >
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->speciality }}</td>
                <td>
                  <a class="mdi mdi-tooltip-edit btn-inverse-success" href="{{ url('update_chef/'.$item->id) }}">Edit</a>
                  <a class="btn-inverse-danger mdi mdi-delete float-end" href="{{ url('delete_chef/'.$item->id) }}" onclick="return confirm('are you sure to delete! {{ $item->name }}')">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Add new Foods modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="forms-sample needs-validation" action="{{ url('/uploadchef') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register New Chef</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Phone Number</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('address'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Profile Image</label>
            <input type="file" class="form-control" name="profile_image" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('profile_image'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Speciality</label>
            <input type="text" class="form-control" name="speciality" placeholder="Speciality" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('speciality'){{ $message }}@enderror</span>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
@endsection