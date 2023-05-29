  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('register') }}">
              <i class="bi bi-circle"></i><span>User Registration</span>
            </a>
          </li>
          <li>
            <a href="{{ route('teachers.index') }}">
              <i class="bi bi-circle"></i><span>Teacher</span>
            </a>
          </li>
          <li>
            <a href="{{ route('students.index') }}">
              <i class="bi bi-circle"></i><span>Student</span>
            </a>
          </li>
          
        </ul>
      </li> --}}
      <!-- End Tables Nav -->

    
 

      

      {{-- <li class="nav-heading">Pages</li> --}}
     
      <!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Carousel</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('register')  }}">
          <i class="bi bi-person"></i>
          <span>User Registration</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('teachers.index') }}">
          <i class="bi bi-person"></i>
          <span>Teacher</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('students.index') }}">
          <i class="bi bi-person"></i>
          <span>Student</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('categories.index') }}">
          <i class="bi bi-person"></i>
          <span>Category</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('books.index') }}">
          <i class="bi bi-question-circle"></i>
          <span>Add Book</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
 <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Request Manage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav1">
          <li>
            <a href="{{ route('request.book.index') }}">
              <i class="bi bi-circle"></i><span>Book Request</span>
            </a>
          </li>
          <li>
            <a href="{{ route('approved.book.index') }}">
              <i class="bi bi-circle"></i><span>Book Approved</span>
            </a>
          </li>
          <li>
            <a href="{{ route('issue.book.index') }}">
              <i class="bi bi-circle"></i><span>Book Issue</span>
            </a>
          </li>
          <li>
            <a href="{{ route('return.book.index') }}">
              <i class="bi bi-circle"></i><span>Book Return</span>
            </a>
          </li>
          <li>
            <a href="{{ route('reissue.book.index') }}">
              <i class="bi bi-circle"></i><span>ReIssue</span>
            </a>
          </li>
          
        </ul>
      </li>
     
     
    </ul>

  </aside><!-- End Sidebar-->