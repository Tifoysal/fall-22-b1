<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">



            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            @if(checkHasPermission(auth()->user()->role_id,'admin.orders'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.orders')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Orders
                </a>
            </li>
            @endif

            @if(checkHasPermission(auth()->user()->role_id,'admin.users'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
            @endif




            @if(checkHasPermission(auth()->user()->role_id,'category.list'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('category.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>
            @endif
            @if(checkHasPermission(auth()->user()->role_id,'product.list'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('product.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Products
                </a>
            </li>
        @endif
            @if(checkHasPermission(auth()->user()->role_id,'brand.list'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('brand.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Brands
                </a>
            </li>
            @endif


                <li class="nav-item">
                <a class="nav-link" href="{{route('roles.index')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Roles
                </a>
            </li>

            @if(checkHasPermission(auth()->user()->role_id,'permission.list'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('permission.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                   Permissions
                </a>
            </li>
            @endif

            @if(checkHasPermission(auth()->user()->role_id,'order.report'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('order.report')}}">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Report
                    </a>
                </li>
                @endif

        </ul>

    </div>
</nav>
