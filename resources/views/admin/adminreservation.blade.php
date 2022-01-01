@extends('admin.layouts.app')

@section('bodycontent')
  
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h4 class="card-title">Food Menu Items</h4>
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
              <th> Name </th>
              <th> Email </th>
              <th> Phone Number </th>
              <th> Guests </th>
              <th> Date </th>
              <th> Time </th>
              <th> Message </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservation as $key=>$item)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->guest }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->time }}</td>
                <td>{{ $item->message }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection