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

		<!-- UPLOAD NEW IMAGE SECTION - MANAGE ONLY BY ADMIN -->
		@auth
			@if (Auth::User()->role_id == 1)

				<div class="row" class="uploading-form-part">
					<form action="{{ route('gallery.file') }}" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
						<input type="file" name="file">
						<input type="text" name="title" class="form-control" placeholder="title of the picture" required>
						<input class="comment-submit" type="submit">
					</form>
				</div>

			@endif
		@endauth

	<br>
	<div class="clr"></div>

	<!-- DISPLAY IMAGES FOR GALLERY SECTION -->

	<div class="row" style="margin-top: 20px">
		<h1 class="post-title">Image Gallery</h1>
	</div>

	@foreach($gallery as $gal)
		<div class="row">
			<div class="spacer-line"></div>
			<p class="gallery-name">{{$gal->title}}</p>
			<img src="{{ asset('storage/gallery/'.$gal->image) }}" alt="{{ $gal->title }}" align="top" width="70%" class="gallery-photos"/>
		</div>
		<div class="clr"></div>
	@endforeach
    <br>
    <center>{{$gallery->links()}}</center>

    <br>

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

	@include('templates.footer')

</body>
<!-- SCRIPT SOCIAL LINKS -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
</html>
