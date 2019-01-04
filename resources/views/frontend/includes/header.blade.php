
<!--start-main-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="{{route('home')}}"><h1>YOUTH CLUB</h1></a>
            </div>
            <div class="search">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="social">
                <ul>
                    <li><a href="#" class="facebook"> </a></li>
                    <li><a href="#" class="facebook twitter"> </a></li>
                    <li><a href="#" class="facebook chrome"> </a></li>
                    <li><a href="#" class="facebook in"> </a></li>
                    <li><a href="#" class="facebook beh"> </a></li>
                    <li><a href="#" class="facebook vem"> </a></li>
                    <li><a href="#" class="facebook yout"> </a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!--head-bottom-->
    <div class="head-bottom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="{{route('home')}}">Home</a></li>
                    @foreach($categories as $category)
                    <li><a href="{{route('category.page',$category->slug)}}">{{$category->name}}</a></li>
                        @endforeach
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </div>
    <!--head-bottom-->
</div>
<!-- banner -->
