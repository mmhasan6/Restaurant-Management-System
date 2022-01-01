@extends('layouts.usersapp')

@section('foodmenu')
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
      <div class="col-lg-12">
        <div class="owl-menu-item owl-carousel">
          
          @foreach ($foodmenu as $item)
            <div class="item">  
              <div class='card' style="background: url('/uploads/foodimages/{{ $item->image }}')">
                <div class="price"><h6>{{ $item->price }}</h6></div>
                <div class='info'>
                  <h1 class='title'>{{ $item->title }}</h1>
                  <p class='description'>{{ $item->description }}</p>
                  <div class="main-text-button">
                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
</section>
@endsection

@section('chefarea')
<section class="section" id="chefs">
  <div class="container">
      <div class="row">
          <div class="text-center col-lg-4 offset-lg-4">
              <div class="section-heading">
                  <h6>Our Chefs</h6>
                  <h2>We offer the best ingredients for you</h2>
              </div>
          </div>
      </div>
      
      <div class="row">
        @foreach ($chef as $data)
          <div class="col-lg-4">
            <div class="chef-item">
              <div class="thumb">
                <div class="overlay"></div>
                <ul class="social-icons">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <img src="{{ asset('uploads/chefimage/'.$data->image) }}" alt="Chef #1">
              </div>
                <div class="down-content">
                  <h4>{{ $data->name }}</h4>
                  <span>{{ $data->speciality }}</span>
                </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
</section>
@endsection