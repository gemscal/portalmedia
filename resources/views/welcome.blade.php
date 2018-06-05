
@include('templates.header')

<body>
    <div class="hearder-strip">
        <div class="row">
            <a href="{{ url('/') }}" title="Portal Media"><div class="h-article-logo fl">Portal Media</div></a>
            <div class="h-content-right fr">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::User()->role_id == 1)
                            <a href="#" class="sign-up fr" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="uname">{{ Auth::user()->name }}</span> {{ __('Logout') }}</a>
                            <a href="{{ route('gallery.file') }}" class="sign-in fr">Gallery</a>
                            <a href="{{ url('/admin') }}" class="sign-in fr">Write Article</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a href="#" class="sign-up fr" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="uname">{{ Auth::user()->name }}</span> {{ __('Logout') }}</a>
                            <a href="{{ route('gallery.file') }}" class="sign-in fr">Gallery</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="sign-up fr">Sign Up</a>
                        <a href="{{ route('login') }}" class="sign-in fr">Sign In</a>
                        <a href="{{ route('gallery.file') }}" class="sign-in fr">Gallery</a>

                    @endauth
                @endif
            </div>
            <div class="clr"></div>
        </div>
        </div>

    <div class="row">
        <div class="col span_3_of_5 key-visual">

        </div>

        @foreach($pages as $page)
             <div class="col span_2_of_5">
                 <p class="featured-article">Featured Article</p>
                 <a href="{{ route('page') }}" class="article-title">{{ $page->title }}</a>
                 <p class="article-content">{!! $page->excerpt !!}</p>
                 <p class="article-writer">{{ $page->user->name }}</p>
                 <p class="article-date">{{ $page->created_at->diffForHumans() }}</p>
             </div>
         @endforeach

        <div class="clr"></div>
    </div>

    <div class="row">
        <div class="spacer-line"></div>
        <span class="featured-article">Article Feed</span>
        <div class="clr"></div>
        <div class="spacer"></div>
        @foreach ($posts as $post)
        <div>
            <div class="col span_1_of_3 lft-mar">
                <a href="{{ route('post',$post->slug) }}" class="article-title">{{ $post->title }}
                <p class="article-writer">{{ $post->user->name }} <span class="article-date">&#8226; {{ $post->created_at->diffForHumans() }}</span></p>
                <p class="article-content">{{ $post->excerpt }} <br /><span style="color: #002e8a;"> read more...</span></p>
                </a>
            </div>
        </div>
        @endforeach

    </div>
    <div class="clr"></div>
    <center>
        {{ $posts->links() }}
    </center>

    <!-- SOCIAL LINKS -->
    <div class="row">
        <div id="social-links">
            <center>
                <p class="ss-share" style="margin-top: 30px">Share us on:</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u=http://portalmedia.mtics.net" class="social-button ss-facebook" id="">Facebook</a>
                <a href="https://twitter.com/intent/tweet?text=Blog Trends&amp;url=http://portalmedia.mtics.net" class="social-button ss-twitter" id="">Twitter</a>
                <a href="https://plus.google.com/share?url=http://portalmedia.mtics.net" class="social-button ss-googleplus" id="">Google Plus</a>
            </center>
        </div>
    </div>

    <!-- remove part for social media -->
    <!-- <span class="fa fa-facebook-official"></span>
    <span class="fa fa-twitter"></span>
    <span class="fa fa-google-plus"></span> -->

@include('templates.footer')

</body>


<!-- SCRIPT SOCIAL LINKS -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>

</html>
