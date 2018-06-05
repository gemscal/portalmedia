

@include('templates.header')

<body>
    <div class="hearder-strip">
        <div class="row">
            <a href="{{ url('/') }}" title="Portal Media"><div class="h-article-logo fl">Portal Media</div></a>
            <div class="h-content-right fr">
                @if (Route::has('login'))
                    @auth
                        <a href="#" class="sign-up fr" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="uname">{{ Auth::user()->name }}</span> {{ __('Logout') }}</a>
                        <a href="#" class="sign-in fr">Write Article</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="sign-up fr">Sign Up</a>
                        <a href="{{ route('login') }}" class="sign-in fr">Sign In</a>
                    @endauth
                @endif
            </div>
            <div class="clr"></div>
        </div>
    </div>

    <div class="row">
        <div class="comment-success" style="margin-top: 20%">
            You are Successfully Registered! Please verify your email. &#x1F60A;
        </div>
    </div>
</body>
