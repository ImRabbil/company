@extends('layouts.master_home')
@section('home_content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Testimonials</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Testimonials</li>
        </ol>
      </div>

    </div>
  </section>

  <section id="testimonials" class="testimonials section-bg">
    <div class="container">

      <div class="row">
        @foreach ($test as $item)

        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up">
          <div class="testimonial-item">
            <img src="{{ asset("image/testimonials/".$item->image) }}" class="testimonial-img" alt="">
            <h3>{{ $item->name }}</h3>
            <h4>{{ $item->designation }}</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              {{ $item->description }}
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div>
            
        @endforeach

        

        

        

        

        

      </div>

    </div>
  </section>
@endsection