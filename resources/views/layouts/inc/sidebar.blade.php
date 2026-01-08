<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>      
                <li>
                    <ul>
                        <li class="">
                            <a href="{{ route('admin.dashboard') }}" class="active">
                                <i class="ti ti-layout-2"></i><span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                @if(auth()->guard('admin')->check())
                    <li>
                        <ul>
                            <li class="">
                                <a href="{{ route('admin.product.index')}}">
                                    <i class="ti ti-brand-airtable"></i><span>Products</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
