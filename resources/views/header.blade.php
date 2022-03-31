<nav class="navbar navbar-expand-lg navigation-wrap">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="logo" /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <img src="img/menu.png" />
          </button>
          <!-- logged in -->
          @if(Illuminate\Support\Facades\Auth::check())
          {
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="display">Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout">Logout</a>
                </li>
              </ul>
            </div>
          }
          <!--not logged in -->
          @else
          {
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="signup">Signup</a>
                </li>
              </ul>
            </div>
          }
          @endif
        </div>
      </nav>