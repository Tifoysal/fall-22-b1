<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/orders')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Orders
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/users')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Users
                </a>
            </li>  <li class="nav-item">
                <a class="nav-link" href="{{route('user.create')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    New User
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/categories')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('product.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('brand.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Brands
                </a>
            </li>

        </ul>

    </div>
</nav>
