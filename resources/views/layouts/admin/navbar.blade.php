<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                {{-- <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a> --}}
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('images/default_profile.jpg') }}" class="avatar img-fluid rounded me-1" alt="{{Auth::user()->name}}" />
                        <span class="text-dark">{{Auth::user()->name}}</span>
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="avatar img-fluid rounded me-1" alt="{{Auth::user()->name}}" />
                        <span class="text-dark">{{Auth::user()->name}}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a></li>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>
