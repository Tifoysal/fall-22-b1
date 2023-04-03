
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">{{__('Support')}}</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">

                <select class="form-control" name="language" id="" onchange="location = this.value;">
                    <option @if(session()->get('loc')=='en') selected @endif  value="{{route('switch.lang','en')}}">EN</option>
                    <option  @if(session()->get('loc')=='bn') selected @endif  value="{{route('switch.lang','bn')}}">BN</option>
                    <option  @if(session()->get('loc')=='ko') selected @endif  value="{{route('switch.lang','ko')}}">KO</option>

                </select>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>

        @if(session()->has('message'))

            <p class="alert alert-success">{{session()->get('message')}}</p>
          @endif
        <div class="col-lg-6 col-6 text-left">
            <form action="{{route('user.search')}}" >
                <div class="input-group">
                    <input name="search_key" type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{session()->has('cart') ? count(session()->get('cart')) : 0}}</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->
