@extends('layouts.master_home')
@section('home_content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Blog Single</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li>Blog Single</li>
        </ol>
      </div>

    </div>
  </section>
  <section id="blog" class="blog">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img">
              <img src="{{ asset('image/blog/'. $blog->image) }}" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html">{{ $blog->title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {{ $blog->short_description }}
              </p>

              {!! $blog->long_description !!}

            </div>

          

          </article><!-- End blog entry -->

         

         

              </div><!-- End comment reply #1-->

            </div><!-- End comment #2-->


          


       

           

      </div>

    </div>
  </section>

  @endsection