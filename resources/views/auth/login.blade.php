
@include('templates.header')
<body style="background-image: url('img/loginbg1.jpg')" id="for-login">
    <div class="hearder-strip">
        <div class="row">
            <a href="{{ url('/') }}" title="Portal Media"><div class="h-article-logo fl">Portal Media</div></a>
            <div class="h-content-right fr">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::User()->role_id == 1)
                            <a href="#" class="sign-up fr" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="uname">{{ Auth::user()->name }}</span> {{ __('Logout') }}</a>
                            <a href="{{ url('/admin') }}" class="sign-in fr">Write Article</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a href="#" class="sign-up fr" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="uname">{{ Auth::user()->name }}</span> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="sign-up fr">Sign Up</a>
                        <a href="{{ route('login') }}" class="sign-in fr">Sign In</a>
                    @endauth
                @endif
            </div>
            <div class="clr"></div>
        </div>
    </div>

    <!-- Login Form  -->
    <div class="login-box">
        <p class="form-lbl-logreg">Hi! Welcome back.</p>
        <form method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>
                @if ($errors->has('email'))
                    <span class="form-err-new">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                @if ($errors->has('password'))
                    <span class="form-err-new">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <label class="rem-log">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>

            <button class="login-but-new" type="submit">
                Login
            </button>

            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a> -->
            <div class="spacer-line"></div>

            <a class="login-with-ggl" href="{{ url('login/google') }}">
               Login with google account
           </a>
        </form>
    </div>

</body>
