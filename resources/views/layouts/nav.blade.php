    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="blog-nav-item active" href="#">Home</a>
          <a class="blog-nav-item" href="#">New features</a>
          <a class="blog-nav-item" href="#">Press</a>
          <a class="blog-nav-item" href="#">New hires</a>

          <!-- Check if user had loged in -->
          @if(Auth::check())

            <a class="blog-nav-item ml-auto" href="#">Welcome:&nbsp;{{ Auth::user()->name }}</a>

          @endif

        </nav>
      </div>
    </div>
