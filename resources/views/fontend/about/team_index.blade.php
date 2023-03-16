@extends('layouts.master_home')
@section('home_content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Team</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Team</li>
                </ol>
            </div>

        </div>
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title aos-init aos-animate" data-aos="fade-up">
                    <h2>Our <strong>Team</strong></h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    @foreach ($teams as $item)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member aos-init aos-animate" data-aos="fade-up">
                            <div class="member-img">
                        <img src="{{ asset('image/team/'. $item->image) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $item->name }}</h4>
                                <span>{{ $item->designation }}</span>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach

                    

                    

                </div>

            </div>
        </section>


    </section>
@endsection
