@extends('layouts.app')
@push('css')
<!-- Styles -->
<link href="{{ asset('plugins/grid-gallery/css/grid-gallery.min.css') }}" rel="stylesheet">
@endpush
@section('content')

<!-- ################# Slider Starts Here#######################--->

<div class="slider-detail">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('images/slider/slide-02.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class=" bounceInDown">Donate Blood & Save Lives</h5>
                    <p class=" bounceInLeft">Your blood donation can be the difference between life and death for
                        someone in need.</p>
                    <div class=" vbh">
                        <a href="{{route('consumer.hospitals')}}" class="btn btn-success  bounceInUp">Request Blood</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('images/slider/slide-03.jpg')}}" alt="Third slide">
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class=" bounceInDown">Donate Blood & Save Lives</h5>
                    <p class=" bounceInLeft">With just a small amount of your time, you can make a huge impact on
                        someone's life by donating blood.</p>
                    <div class=" vbh">
                        <a href="{{route('consumer.hospitals')}}" class="btn btn-success  bounceInUp">Request Blood</a>
                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</div>

<!--*************** About Us Starts Here ***************-->
<section id="about" class="contianer-fluid about-us">
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-6 text align-self-center">
                <h1>About Us</h1>
                <p>Blood is a user-friendly and intuitive mobile application designed to connect blood donors with
                    individuals and hospitals in need of blood transfusions. The app aims to streamline the blood
                    donation process, making it easier for people to find compatible donors and ensure that blood
                    supplies are readily available for those who need them. With its simple and efficient features,
                    Blood is an effective tool for saving lives and making a positive impact in the community.</p>
            </div>
            <div class="col-md-6 image">
                <img class="p-5" src="{{asset('images/about.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>



<!-- ################# Gallery Start Here #######################--->

<div id="gallery" class="gallery container-fluid">
    <div class="row session-title">
        <h2>Gallery</h2>
    </div>
    <div class="container">
        <div class="gallery-row row">
            <div id="gg-screen">
            </div>
            <div class="row row-cols-3 ">
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g1.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g2.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g3.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g4.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g6.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g7.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g8.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g9.jpg')}}">
                </div>
                <div class="p-5 col">
                    <img class="rounded" src="{{asset('images/gallery/g10.jpg')}}">
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- ################# Donation Process Start Here #######################--->

<section id="process" class="donation-care">
    <div class="container">
        <div class="row session-title">
            <h2>Donation Process</h2>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img class="rounded" src="{{asset('images/gallery/g1.jpg')}}" alt="">
                    <h4><b>1 - </b>Registration</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img class="rounded" src="{{asset('images/gallery/g2.jpg')}}" alt="">
                    <h4><b>2 - </b>Seeing</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img class="rounded" src="{{asset('images/gallery/g3.jpg')}}" alt="">
                    <h4><b>3 - </b>Donation</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img class="rounded" src="{{asset('images/gallery/g4.jpg')}}" alt="">
                    <h4><b>4 - </b>Saving Lives</h4>
                </div>
            </div>
        </div>


    </div>
</section>


<!--*************** Footer  Starts Here *************** -->
<footer id="contact" class="container-fluid">
    <div class="container">

        <div class="row content-ro">
            <div class="col-lg-4 col-md-12 footer-contact">
                <h2>Contact Informations</h2>
                <div class="address-row">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="detail">
                        <p>Wireless, Mohakhali, Dhaka</p>
                    </div>
                </div>
                <div class="address-row">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="detail">
                        <p>+8801712859699 <br> +8801686949277</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 footer-links">
                <div class="row no-margin mt-2">
                </div>
                <div class="row no-margin mt-1">
                </div>

            </div>
        </div>
        <div class="footer-copy">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <p>Copyright © | All right reserved.</p>
                </div>
                <div class="col-lg-4 col-md-6 socila-link">
                    <ul>
                        <li><a><i class="fab fa-github"></i></a></li>
                        <li><a><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a><i class="fab fa-twitter"></i></a></li>
                        <li><a><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection