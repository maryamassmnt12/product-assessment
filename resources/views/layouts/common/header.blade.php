<div class="header">
    <div class="header-left active">
        <a href="" class="logo logo-normal">
           {{ auth()->guard('customer')->check() ? 'Customer' : 'Admin' }} Panel
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <a href="index.html" class="logo-small">
                <img src="{{asset('assets/img/logo-n.png')}}" alt="Logo">
            </a>
        </a>
    </div>
   <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    @if(session()->has('error'))
        <div class="alert alert-danger fade-msg">{{ session()->get('error') }}</div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success fade-msg">{{ session()->get('success') }}</div>
    @endif
    <div class="header-user">
        <ul class="nav user-menu">
            <li class="nav-item nav-search-inputs me-auto">
               Dashboard
            </li>

            <li class="nav-item dropdown has-arrow main-drop">
                <a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
                    <span class="user-info">
                        <span class="user-letter">
                            <img src="{{asset('assets/img/avatar-02.jpg')}}" alt="Profile">
                        </span>
                        <span class="badge badge-success rounded-pill"></span>
                    </span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <div class="profilename">
                        @if(auth()->guard('customer')->check())
                            <a class="dropdown-item">{{ auth('customer')->user()->name }}</a>
                            <a class="dropdown-item" href="{{ route('customer.logout') }}">
                                <i class="ti ti-lock"></i> Logout
                            </a>
                        @elseif(auth()->guard('admin')->check())
                            <a class="dropdown-item">{{ auth('admin')->user()->name }}</a>
                            <a class="dropdown-item" id="logout" href="{{ route('admin.logout') }}">
                                <i class="ti ti-lock"></i> Logout
                            </a>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
