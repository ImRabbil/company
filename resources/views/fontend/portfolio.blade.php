@extends('layouts.master_home')

@section('home_content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Portfolio</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Portfolio</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">

          

            <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up"
                style="position: relative; height: 4330.62px;">

                

                @foreach ($multi as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset( $item->image) }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="{{ asset( $item->image) }}"
                                data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                @endforeach

               

                

                

                

                

                

            </div>

        </div>
    </section>
@endsection
