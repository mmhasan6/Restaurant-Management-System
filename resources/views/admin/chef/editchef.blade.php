@extends('admin.layouts.app')

@section('bodycontent')
  <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <h1 class="card-title">Edit Food</h1>
    </div>
    <div class="col-md-6">
      <!-- Button trigger modal -->
      <a type="button" href="{{ url('chef') }}" class="btn btn-primary float-end">
        Go Back
      </a>
    </div>
  </div>
    <div class="card card-default">
      <form action="{{ url('update_chef/'.$data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $data->name }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $data->email }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Phone Number</label>
                  <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ $data->phone }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $data->address }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Profile Image</label>
                  <input type="file" class="form-control" name="profile_image" value="{{ $data->profile_image }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('profile_image'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Speciality</label>
                  <input type="text" class="form-control" name="speciality" placeholder="Speciality" value="{{ $data->speciality }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('speciality'){{ $message }}@enderror</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <img  src="{{ asset('uploads/chefimage/'.$data->image) }}" height="300" width="600" alt="">
              </div>
            </div>
          </div>
          {{-- End card body --}}
          <div class="card-footer">
              <button type="submit" class="btn btn-primary">SAVE UPDATE</button>
          </div> 
        </form> 
        {{-- End form --}}
    </div>           
</section>
<!--End Main content -->
@endsection