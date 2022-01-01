@extends('admin.layouts.app')

@section('bodycontent')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h4 class="card-title">Food Menu Items</h4>
        </div>
        <div class="col-md-6">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Item
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
              <th> Food </th>
              <th> Title </th>
              <th> Price </th>
              <th> Description </th>
              <th> Created At </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($foodmenu as $key=>$item)
              <tr align="center">
                <td>{{ $key+1 }}</td>
                <td>
                  <img height="200" width="200" src="{{ asset('uploads/foodimages/'.$item->image) }}" >
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <a class="mdi mdi-tooltip-edit btn-inverse-success" href="{{ url('update_food/'.$item->id) }}">Edit</a>
                  <a class="btn-inverse-danger mdi mdi-delete float-end" href="{{ url('delete_food/'.$item->id) }}" onclick="return confirm('are you sure to delete! {{ $item->name }}')">Delete</a>
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
      <form class="forms-sample needs-validation" action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Food</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputName1">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('title'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Price" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('price'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Food Image</label>
            <input type="file" class="form-control" name="food_image" required>
            <div class="invalid-feedback">
              <span class="text-danger">@error('food_image'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="30" required></textarea>
            <div class="invalid-feedback">
              <span class="text-danger">@error('description'){{ $message }}@enderror</span>
            </div>
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