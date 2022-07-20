
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('manage.exam')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed "  href="{{route('manage.exam')}}">
          <i class="bi bi-journal-text"></i><span>Exam</span>
        </a>
       
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('manage.subject')}}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Subject</span>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
        </ul>
      </li><!-- End Tables Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('manage.topic')}}">
          <i class="bi bi-bar-chart"></i><span>Topic</span>
        </a>
        
     
        
      </li><!-- End Tables Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('manage.question')}}">
          <i class="bi bi-bar-chart"></i><span>Question</span>
        </a>
      </li>  --}}
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('manage.quiz')}}">
          <i class="bi bi-bar-chart"></i><span>Question</span>
        </a>
      </li> 
     
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('insert.category')}}">
          <i class="bi bi-bar-chart"></i><span>Category</span>
        </a>
      </li> 
      {{-- <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('insert.subcategory')}}">
          <i class="bi bi-bar-chart"></i><span>SubCategory</span>
        </a> --}}
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('insert.language')}}">
          <i class="bi bi-bar-chart"></i><span>Language</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('manage.examination')}}">
          <i class="bi bi-bar-chart"></i><span>Examination</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('examquestion.index')}}">
          <i class="bi bi-bar-chart"></i><span>ExamQuestion</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Ecommerce</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('membership.index')}}">
              <i class="bi bi-circle"></i><span>Manage Membership</span>
            </a>
          </li>
          <li>
            <a href="{{route('course.index')}}">
              <i class="bi bi-circle"></i><span>Manage Course</span>
            </a>
          </li>
          {{-- <li>
            <a href="{{route('manage.module')}}">
              <i class="bi bi-circle"></i><span>Manage Module</span>
            </a>
          </li> --}}
          <li>
            <a href="{{route('pdf.index')}}">
              <i class="bi bi-circle"></i><span>Manage Pdf</span>
            </a>
          </li>
          <li>
            <a href="{{route('product.index')}}">
              <i class="bi bi-circle"></i><span>Manage Product</span>
            </a>
          </li>
          <li>
            <a href="{{route('address.index')}}">
              <i class="bi bi-circle"></i><span>Manage Address</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('screenshot.index')}}">
              <i class="bi bi-circle"></i><span>Manage Screenshot</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('coupon.index')}}">
              <i class="bi bi-circle"></i><span>Manage Coupon</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('study.index')}}">
              <i class="bi bi-circle"></i><span>Manage StudyMetrial</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('insert.book')}}">
              <i class="bi bi-circle"></i><span>Manage Book</span>
            </a>
          </li>  
          
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('insertmetrial.create')}}">
              <i class="bi bi-circle"></i><span>Manage StudyMetrialCategory</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{route('insertchapter.create')}}">
              <i class="bi bi-circle"></i><span>Manage StudyMetrialChapter</span>
            </a>
          </li>  
          
        </ul>
      </li><!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('manage.role')}}">
              <i class="bi bi-circle"></i><span>Manage Role</span>
            </a>
          </li>
          <li>
            <a href="{{route('get.admin')}}">
              <i class="bi bi-circle"></i><span>Manage Admin</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Charts Nav -->

      

     
  </aside><!-- End Sidebar-->
  
    
