    <!-- Post Content -->

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

    <!-- Post Article  -->
    <article>
        <div class="row">

            <h1 class="post-title">{{ $post->title }}</h1>
            <p class="post-date">Created at {{ $post->created_at->diffForHumans() }} by <span class="post-creator">{{ $post->user->name }}</span></p>
            <div class="post-content">
                {!! htmlspecialchars_decode($post->body) !!}
            </div>
            <div class="spacer-line"></div>
        </div>

        <!-- Comments  -->
        <div class="row">
            <p class="post-comment">&#x1F4AC; Comments ({{ $post->comments()->count() }}) </p>
            <br />
            @foreach($post->comments as $comment)
                <p class="comment-user">{{ $comment->name }} <span class="comment-dot">&#8226; </span><span class="comment-date">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</span></p>
                <div class="comment-content">
                    {{ $comment->comment }}
                </div>
                <br />
                <br />
            @endforeach
        </div>

        <!-- Add Comments  -->
        <div class="row">
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                {{ csrf_field() }}

                <!-- Alert Message -->
                <!-- Bulgar/Rude/Cursing -->
                @if(Session::has('warning'))
                <div class="comment-error">
                    {{ Session::get('warning') }} &#x1F644;
                </div>

                <!-- Comment added successfully -->
                @elseif(Session::has('success'))
                <div class="comment-success">
                    {{ Session::get('success') }} &#x1F60A;
                </div>
                @endif

                <!-- Commend adding form -->
                <textarea name="comment" rows="4" cols="50" placeholder="comments" required></textarea><br><br>
                <button class="comment-submit" type="submit">Add Comment</button>
            </form>
        </div>
        <div class="clr"></div>
    </article>


    <!-- SOCIAL LINKS -->
    <div class="row">
        <div id="social-links">
            <center>
                <p class="ss-share">Share us on:</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u=http://portalmedia.mtics.net" class="social-button ss-facebook" id="">Facebook</a>
                <a href="https://twitter.com/intent/tweet?text=Blog Trends&amp;url=http://portalmedia.mtics.net" class="social-button ss-twitter" id="">Twitter</a>
                <a href="https://plus.google.com/share?url=http://portalmedia.mtics.net" class="social-button ss-googleplus" id="">Google Plus</a>
            </center>
        </div>
    </div>

<!-- FOOTER -->
@include('templates.footer')

<!-- SCRIPT SOCIAL LINKS -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
</body>
