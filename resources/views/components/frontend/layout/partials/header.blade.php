  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <img src="{{ asset('frontend/img/logo.png') }}" alt="" style="width:30px; height:40px" class="me-2">
      <h1 class="logo me-auto "><a href="index.html">IIT</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="" href="{{ route('homepage') }}">Home</a></li>
           
          
          <li class="dropdown"><a href="#"><span>Online Library</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
            
              <li><a href="{{ route('library-dashboard') }}">Dashboard</a></li>
              <li><a href="{{ route('get-book') }}">Get Book</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Faculty</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
            
              <li><a href="{{ route('teacher-list') }}">Teacher</a></li>
              <li><a href="{{ route('student-list') }}">Student</a></li>
            </ul>
          </li>
           
        


          <li><a href="{{ route('user.aboutus.index') }}">About Us</a></li>
          <li><a href="{{ route('user.event.index') }}">Event</a></li>
          <li><a href="{{ route('user.contactus.index') }}">Contact</a></li>
          <li><a href="{{ route('dashboard') }}">Admin</a></li>
        
        




 
       @if (auth()->user())
                 
           
                @auth
                
               
                 
    
        <li class="dropdown">
           
          <a href="#">
              <img src="{{asset('storage/profiles/'.auth()->user()->profile->image)}}" alt="profile"style="border-radius: 50%;width:35px;height:35px;" class="border"/>
            <span class="ms-2">{{auth()->user()->name}}</span> <i class="bi bi-chevron-down"></i>
          </a>
            <ul>
              <li><a href="{{ route('user.profile.index') }}">Profile</a></li>
              
             <li><form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                       {{ __('Log Out') }}
                  </a>
                </form>
                </li>
              
            </ul>
          </li>



                @endauth
             
               @else
               
             
  <a href="{{ route('login') }}" class="btn btn-outline-danger ms-3 shadow btn-sm p-1"><i class="fa-solid fa-right-to-bracket fa-shake me-2"></i>Login</a>

     @endif

           
              </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
 
      </nav><!-- .navbar -->
     












     

    </div>
  </header><!-- End Header -->
  