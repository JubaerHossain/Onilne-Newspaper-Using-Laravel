@extends('frontend.layouts.master')
@section('title','YouthClub | Home')
@push('css')
    @endpush
@section('content')
<!-- technology -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <!-- technology-top -->
                <div class="tc-ch">

                    <div class="tch-img">
                        <a href="singlepage.html"><img src="{{asset('assets/frontend')}}/images/1.jpg" class="img-responsive" alt=""/></a>
                    </div>
                    <a class="blog blue" href="singlepage.html">Technology</a>
                    <h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="blog-poast-info">
                        <ul>
                            <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
                            <li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
                            <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                            <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                            <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- technology-top --
                <!-- technology-top -->
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right mb-3">
            <div class="blo-top">
                <div class="tech-btm">
                    <img src="{{asset('assets/frontend')}}/images/banner1.jpg" class="img-responsive" alt=""/>
                </div>
            </div>
            <div class="blo-top">
                <div class="tech-btm">
                    <h4>Sign up to our newsletter</h4>
                    <form action="{{route('subscribe.store')}}" method="post">
                        @csrf
                        <div class="name">
                           <input type="text" placeholder="Email"  name="email">
                        </div>
                        <div class="button">
                            <input type="submit" value="Subscribe">
                        </div>
                    </form>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4>Top stories of the week </h4>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="singlepage.html"><img src="{{asset('assets/frontend')}}/images/6.jpg" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="blog-grid-right">

                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>
<!-- technology -->
    @endsection
@push('js')

    @endpush
