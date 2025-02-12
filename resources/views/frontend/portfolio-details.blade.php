@extends('frontend.layouts.layout')
@section('content')
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">Portfolio Details</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio-Area-Start -->
    <section class="portfolio-details section-padding" id="portfolio-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="head-title">{{$portfolio->title}}</h2>
                    <figure class="image-block">
                        <img src="{{asset($portfolio->image)}}" alt="" class="img-fix">
                    </figure>
                    <div class="portflio-info">
                        <div class="single-info">
                            <h4 class="title">Client</h4>
                            <p>{{$portfolio->client}}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Date</h4>
                            <p>{{date('d M, Y',strtotime($portfolio->created_at))}}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Website</h4>
                            <p><a href="{{$portfolio->website}}">{{$portfolio->website}}</a></p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Category</h4>
                            <p>{{$portfolio->category->name}}</p>
                        </div>
                    </div>
                    <div class="description">
                        {!! $portfolio->description !!}
                        <ul class="gallery">
                            <li><img src="images/gallery-1.jpg" alt="" class="img-fluid w-100"></li>
                            <li><img src="images/gallery-2.jpg" alt="" class="img-fluid w-100"></li>
                        </ul>
                        <h3>Process Story</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta et veniam omnis,
                            voluptatem qui dolorem nulla provident totam saepe, odit quibusdam dignissimos tempora
                            autem ut illo obcaecati ducimus sint repudiandae! Hic eos nam aperiam fugit?
                            Perspiciatis explicabo ab harum. Sed ducimus veniam voluptatibus qui ea, atque sint eum
                            quae molestiae quod officiis, at enim ab necessitatibus laborum! Dolores necessitatibus
                            a earum perspiciatis ut consectetur corrupti omnis cum fugit, explicabo dolorem
                            similique deleniti inventore natus! Quaerat sit soluta enim at reiciendis?.</p>
                        <ul class="dots-list">
                            <li>First refinement become it over a may an that harmonic every away.</li>
                            <li>Clarinet she or here, separated hides. With work a and so pay different chooses
                                answer.</li>
                            <li>Never analyzed the of boss's films death, heaven cache name any judgment, all.</li>
                        </ul>
                        <p>Hic eos nam aperiam fugit? Perspiciatis explicabo ab harum. Sed ducimus veniam
                            voluptatibus qui ea, atque sint eum quae molestiae quod officiis, at enim ab
                            necessitatibus laborum! Dolores necessitatibus a earum perspiciatis ut consectetur
                            corrupti omnis cum fugit, explicabo dolorem similique deleniti inventore natus! Quaerat
                            sit soluta .</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo animi libero suscipit
                            praesentium perferendis possimus, ex dicta eius ea soluta sunt. Sapiente nulla,
                            consequuntur ipsam saepe ad numquam blanditiis fugiat animi. Harum fugit incidunt
                            nostrum eligendi doloremque vero possimus illum consequuntur quae sint officia
                            repudiandae porro maxime cupiditate dolor magnam totam sit natus id neque quod.
                            Molestias illo repudiandae laudantium illum perspiciatis nisi quasi amet corrupti
                            .</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-Area-End -->

    <!-- Quote-Area-Start -->
    <section class="quote-area section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="quote-box">
                        <div class="row ">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="quote-content">
                                    <h3 class="title">Your Journey Today</h3>
                                    <div class="desc">
                                        <p>Still top of and the drops. What don't issued character god, no ports,
                                            credit question.</p>
                                    </div>
                                    <a href="#" class="button-orange mouse-dir">Get Started <span
                                            class="dir-part"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Quote-Area-End -->
@endsection
