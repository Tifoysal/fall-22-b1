<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="{{url('/backend/css/login.css')}}">


<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png" id="icon" alt="User Icon" />
        </div>

        @if(session()->has('message'))
            <p class="alert alert-danger">{{session()->get('message')}}</p>
        @endif

        <!-- Login Form -->
        <form action="{{route('do.login')}}" method="post">
            @csrf
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="Enter Email">
            <input type="password" id="password" class=" form-control fadeIn third" name="password" placeholder="Enter Password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Password -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
