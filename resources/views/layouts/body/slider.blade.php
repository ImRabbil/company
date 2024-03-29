<!-- ======= Hero Section ======= -->
@php
    $slider = DB::table('sliders')->get();
@endphp

<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner" role="listbox">

            @foreach ($slider as  $row)
                <div class="carousel-item  @if($loop->first) active @endif"
                    style="background-image: url({{ asset('image/slider/' . $row->image) }});">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>{{ $row->title }}</span></h2>
                            <p>{{ $row->description }}</p>
                            <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                        </div>
                    </div>
                </div>
            @endforeach

            


        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->
