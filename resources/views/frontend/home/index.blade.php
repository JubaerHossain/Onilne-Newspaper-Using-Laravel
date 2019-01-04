@extends('frontend.layouts.master')
@section('title','YouthClub | Home')
@push('css')
    @endpush
@section('content')
<!-- technology -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no mb-5">
                <!-- technology-top -->
                @foreach($posts as $post)
                    <div class="tc-ch">

                        <div class="tch-img">
                            <a href="{{ route('post.details',$post->slug) }}"><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" class="img-responsive" alt="{{$post->title}}"/></a>
                        </div>
                        @foreach($post->categories as $category)
                        <a class="blog blue" href="{{route('category.page',$category->slug)}}">{{ $category->name }}</a>
                        @endforeach
                        <h3><a href="{{ route('post.details',$post->slug) }}">{{$post->title}}</a></h3>
                        <p>{{ str_limit($post->body,'420') }}<a href="{{ route('post.details',$post->slug) }}"><strong class="red-text">read more</strong></a></p>


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
            @endforeach
            <!-- technology-top --
                <!-- technology-top -->
                <div class="mb-5 center-block" style="margin-bottom: 200px">
                    <button type="button" class="btn btn-success btn-lg center-block">Load more</button>

                </div>
            </div>

        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right mb-3">
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

        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>
<div class="clearfix"></div>



@endsection
@push('js')

    @endpush
