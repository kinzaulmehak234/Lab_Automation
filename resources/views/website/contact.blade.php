@extends('layouts.website_main')
@section('main-section')
<!-- contact section -->
@if(session('success'))
     <div class="alert alert-primary">
        {{session('success')}}
     </div>
@endif
<section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="heading_container">
            <h2>
              Contact Us
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="form_container">
            <form action="{{url('/contact')}}"  method="post">
            @csrf
              <div>
                <input type="text" placeholder="Your Name"  name="name" required/>
              </div>
              <div>
              <input id="phone" name="phone" class="no-arrow" value="" type="number" placeholder="Phone Number" required>
              </div>
              <div>
                <input type="email" placeholder="Email" name="email" required/>
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" name="message" required/>
              </div>
              <div class="btn_box">
                <button type="submit">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->
@endsection