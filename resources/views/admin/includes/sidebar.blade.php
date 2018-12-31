<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('assets/backend')}}/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">

                        @role('Admin'))

                        <li><a href="{{route('users.index')}}"><i class="material-icons">person</i>User's</a></li>
                        @endrole
                        <li role="seperator" class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Sign Out
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                @role('Admin')
                <li>
                    <a href="{{route('tag.index')}}">
                        <i class="material-icons">tag</i>
                        <span>Tag</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('category.index')}}">
                        <i class="material-icons">apps</i>
                        <span>Category</span>
                    </a>
                </li>
                @endrole
                <li>
                    <a href="{{route('post.index')}}">
                        <i class="material-icons">library_books</i>
                        <span>Post</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 <a href="javascript:void(0);">Admin - World Travel Plan </a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>
