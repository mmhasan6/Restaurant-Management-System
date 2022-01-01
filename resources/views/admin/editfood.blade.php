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
      <a type="button" href="{{ url('foodmenu') }}" class="btn btn-primary float-end">
        Go Back
      </a>
    </div>
  </div>
    <div class="card card-default">
      <form action="{{ url('update_food/'.$data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputName1">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $data->title }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Price</label>
                  <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $data->price }}" required>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Food Image</label>
                  <input type="file" class="form-control" name="food_image" value="{{ $data->image }}">
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('food_image'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Description</label>
                  <textarea name="description" class="form-control" cols="30" rows="30" required>{{ $data->description }}</textarea>
                  <div class="invalid-feedback">
                    <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <img  src="{{ asset('uploads/foodimages/'.$data->image) }}" height="300" width="600" alt="">
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