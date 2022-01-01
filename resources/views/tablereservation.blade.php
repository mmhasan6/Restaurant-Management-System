<div class="col-lg-6">
  <div class="contact-form">
      <form id="contact" action="{{ url('/reservation') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-12">
              <h4>Table Reservation</h4>
          </div>
          <div class="col-lg-6 col-sm-12">
            <fieldset>
              <input name="name" type="text" id="name" placeholder="Your Name*" required="">
            </fieldset>
            <div class="invalid-feedback">
              <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <fieldset>
            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
          </fieldset>
          <div class="invalid-feedback">
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
          </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <fieldset>
              <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
            </fieldset>
            <div class="invalid-feedback">
              <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <input type="number" name="guest" placeholder="Number of Guest">
            <div class="invalid-feedback">
              <span class="text-danger">@error('guest'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-lg-6">
              <div id="filterDate2">    
                <div class="input-group date" data-date-format="dd/mm/yyyy">
                  <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                  <div class="input-group-addon" >
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
              </div>
              <div class="invalid-feedback">
                <span class="text-danger">@error('date'){{ $message }}@enderror</span>
              </div>   
          </div>
          <div class="col-md-6 col-sm-12">
            <input type="time" name="time">
            <div class="invalid-feedback">
              <span class="text-danger">@error('time'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-lg-12">
            <fieldset>
              <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
            </fieldset>
            <div class="invalid-feedback">
              <span class="text-danger">@error('message'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-lg-12">
            <fieldset>
              <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
            </fieldset>
          </div>
        </div>
      </form>
  </div>
</div>