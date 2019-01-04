@extends('frontend.layouts.master')
@section('title','YouthClub | Home')
@push('css')
@endpush
@section('content')
    <!-- technology -->
    <div class="technology">
        <div class="container">
            <div class="col-md-12 m-t-55">
                    <!-- technology-top -->

                            <blockquote class="blockquote text-center">
                                <p class="mb-0 center-block">Result not found</p>
                            </blockquote>



                        <div class="clearfix"></div>
                    <div class="mb-5 center-block text-center" style="margin-bottom: 200px">
                        <a class="btn btn-default text-center" href="{{route('home')}}"> Back to Home</a>

                    </div>

            </div>
            <!-- technology-right -->
            {{--<div class="col-md-3 technology-right mb-3">
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
                        <h4>Latest stories </h4>
                        <hr>
                        <div class="blog-grids" style="padding: 0">
                            @foreach($posts as $post)

                                <p class="border"><a class="border" href="">{{ str_limit($post->title,'28') }}</a> </p>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>
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

            </div>--}}
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
    </div>
    <div class="clearfix"></div>



@endsection
@push('js')

@endpush
