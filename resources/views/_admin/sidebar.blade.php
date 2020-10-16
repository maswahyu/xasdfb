<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('magic/home') }}" class="brand-link">
        <img src="/dist/img/logo.png" alt="Admin" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{!! url('magic/home') !!}" class="nav-link {!! classActiveSegment(2, 'home') !!}">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('contact/list') }}" class="nav-link {!! classActiveSegment(2, 'list') !!}">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>
                            Contact Us <span class="badge badge-warning right" id="unread">0</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/member') }}" class="nav-link {!! classActiveSegment(2, 'member') !!}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Member
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/news') }}" class="nav-link {!! classActiveSegment(2, 'news') !!}">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/category') }}" class="nav-link {!! classActiveSegment(2, 'category') !!}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {!! classActivePath(2,'gallery') !!}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-image"></i>
                        <p>
                           Gallery
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('magic/gallery') }}?type=photo" class="nav-link {{ (Request::query('type') == 'photo') ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Photo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('magic/gallery') }}?type=video" class="nav-link {{ (Request::query('type') == 'video') ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Video</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/album') }}" class="nav-link {!! classActiveSegment(2, 'album') !!}">
                        <i class="nav-icon fa fa-folder"></i>
                        <p>
                            Album
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/bannerwifi') }}" class="nav-link {!! classActiveSegment(2, 'bannerwifi') !!}">
                        <i class="nav-icon fa fa-file-image"></i>
                        <p>
                            Banner Wifi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/stickybanner') }}" class="nav-link {!! classActiveSegment(2, 'stickybanner') !!}">
                        <i class="nav-icon fa fa-file-image"></i>
                        <p>
                            Sticky Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/slide') }}" class="nav-link {!! classActiveSegment(2, 'slide') !!}">
                        <i class="nav-icon fa fa-sliders-h"></i>
                        <p>
                            Slide
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/event') }}" class="nav-link {!! classActiveSegment(2, 'event') !!}">
                        <i class="nav-icon fa fa-calendar-week"></i>
                        <p>
                            Event
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/eventstream') }}" class="nav-link {!! classActiveSegment(2, 'eventstream') !!}">
                        <i class="nav-icon fa fa-calendar-week"></i>
                        <p>
                            Event Streaming
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/tag') }}" class="nav-link {!! classActiveSegment(2, 'tag') !!}">
                        <i class="nav-icon fa fa-hashtag"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('magic/filemanager') }}" class="nav-link {!! classActiveSegment(2, 'manager') !!}">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            File Manager
                        </p>
                    </a>
                </li>
                @if(auth()->guard('admin')->user()->usertype == "admin")
                <li class="nav-header">ADMIN NAVIGATION</li>
                <li class="nav-item">
                    <a href="{{ url('magic/users') }}" class="nav-link {!! classActiveSegment(2, 'users') !!}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {!! classActivePath(1,'site') !!} {!! classActivePath(2, ['link', 'prize']) !!}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Settings
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('site.settings') }}" class="nav-link {!! classActiveSegment(2, 'settings') !!}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('site/website') }}" class="nav-link {!! classActiveSegment(2, 'website') !!}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('magic/link') }}" class="nav-link {!! classActiveSegment(2, 'link') !!}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Link</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('magic/prize') }}" class="nav-link {!! classActiveSegment(2, 'prize') !!}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Prize</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
