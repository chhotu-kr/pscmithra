
<aside id="sidebar" class="sidebar">


 <ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('manage.exam')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


 @permission('add-post')
 <li class="nav-item">
 
  <a class="nav-link collapsed "  href="{{route('manage.exam')}}">
   <i class="bi bi-journal-text"></i><span>Exam</span>

   
   </a>
  
 </li>
 <li class="nav-item">
  <a class="nav-link collapsed" href="{{route('manage.subject')}}">
    <i class="bi bi-layout-text-window-reverse"></i><span>Subject</span>
  </a>
  
</li>
<li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('insert.category')}}">
    <i class="bi bi-bar-chart"></i><span>Category</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('manage.examination')}}">
    <i class="bi bi-bar-chart"></i><span>Examination</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('manage.quiz')}}">
    <i class="bi bi-bar-chart"></i><span>Question</span>
  </a>
</li>  
<li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('insert.language')}}">
    <i class="bi bi-bar-chart"></i><span>Language</span>
  </a>
</li>  
 
 @endpermission
 

 @permission('delete-post')
 
<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layout-text-window-reverse"></i><span>Quiz</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="{{route('quiz.category')}}">
        <i class="bi bi-circle"></i><span>Manage QuizCategory</span>
      </a>
    </li>
    <li>
      <a href="{{route('manage.course.quiz')}}">
        <i class="bi bi-circle"></i><span>Manage CourseQuiz</span>
      </a>
    </li>
    <li>
      <a href="{{route('manage.image')}}">
        <i class="bi bi-circle"></i><span>Manage BackgroundImage</span>
      </a>
    </li>

    <li>
      <a href="{{route('manage.page')}}">
        <i class="bi bi-circle"></i><span>Manage PageProduct</span>
      </a>
    </li>
   
   
      <a href="{{route('live.test')}}">
        <i class="bi bi-circle"></i><span>Manage LiveTest</span>
      </a>
    </li>
    <li>
      <a href="{{route('quiz.examination')}}">
        <i class="bi bi-circle"></i><span>Manage QuizExamination</span>
      </a>
    </li>
  </ul>
</li>
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
    <li>
      <a href="{{route('insert.index')}}">
        <i class="bi bi-circle"></i><span>Manage Author</span>
      </a>
    </li>
   
    <li>
      <a href="{{route('pdf.index')}}">
        <i class="bi bi-circle"></i><span>Manage Pdf</span>
      </a>
    </li>
    <li>
      <a href="{{route('cart.index')}}">
        <i class="bi bi-circle"></i><span>Manage Cart</span>
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
      <a class="nav-link collapsed"  href="{{route('manage.pdfsubs')}}">
        <i class="bi bi-circle"></i><span>Manage PdfSubscription</span>
      </a>
    </li>  
    <li class="nav-item">
      <a class="nav-link collapsed"  href="{{route('blog.category')}}">
        <i class="bi bi-circle"></i><span>Manage BlogCategory</span>
      </a>
    </li>  
    <li class="nav-item">
      <a class="nav-link collapsed"  href="{{route('blog.index')}}">
        <i class="bi bi-circle"></i><span>Manage Blog</span>
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
</li>
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
</li> 

 @endpermission


 @permission('add-question')
 <li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('insert.category')}}">
    <i class="bi bi-bar-chart"></i><span>Category</span>
  </a>
</li> 
 @endpermission
 @permission('edit-question')
 <li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('insert.language')}}">
    <i class="bi bi-bar-chart"></i><span>Language</span>
  </a>
</li> 
 @endpermission

 @permission('delete-question')
 <li class="nav-item">
  <a class="nav-link collapsed"  href="{{route('manage.examination')}}">
    <i class="bi bi-bar-chart"></i><span>Examination</span>
  </a>
</li>
 @endpermission
 @permission('view-question')
 <li>
  <a href="{{route('quiz.examination')}}">
    <i class="bi bi-circle"></i><span>Manage QuizExamination</span>
  </a>
</li>
 @endpermission
 @permission('add-subject')
 <li class="nav-item">
  <a class="nav-link collapsed" href="{{route('manage.subject')}}">
    <i class="bi bi-layout-text-window-reverse"></i><span>Subject</span>
  </a>
  
</li>
 @endpermission


 
 
  {{-- <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('manage.question')}}">
      <i class="bi bi-bar-chart"></i><span>Question</span>
    </a>
  </li>  --}}
  
 

 
 


 
 
 
 
{{-- 
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
      <li>
        <a href="{{route('insert.index')}}">
          <i class="bi bi-circle"></i><span>Manage Author</span>
        </a>
      </li>
     
      <li>
        <a href="{{route('pdf.index')}}">
          <i class="bi bi-circle"></i><span>Manage Pdf</span>
        </a>
      </li>
      <li>
        <a href="{{route('cart.index')}}">
          <i class="bi bi-circle"></i><span>Manage Cart</span>
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
        <a class="nav-link collapsed"  href="{{route('manage.pdfsubs')}}">
          <i class="bi bi-circle"></i><span>Manage PdfSubscription</span>
        </a>
      </li>  
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('blog.category')}}">
          <i class="bi bi-circle"></i><span>Manage BlogCategory</span>
        </a>
      </li>  
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('blog.index')}}">
          <i class="bi bi-circle"></i><span>Manage Blog</span>
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
  </li>  --}}
  {{-- <li class="nav-item">
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
  </li> --}}
  {{-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Quiz</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('quiz.category')}}">
          <i class="bi bi-circle"></i><span>Manage QuizCategory</span>
        </a>
      </li>
      <li>
        <a href="{{route('manage.course.quiz')}}">
          <i class="bi bi-circle"></i><span>Manage CourseQuiz</span>
        </a>
      </li>
      <li>
        <a href="{{route('manage.image')}}">
          <i class="bi bi-circle"></i><span>Manage BackgroundImage</span>
        </a>
      </li>

      <li>
        <a href="{{route('manage.page')}}">
          <i class="bi bi-circle"></i><span>Manage PageProduct</span>
        </a>
      </li>
     
     
        <a href="{{route('live.test')}}">
          <i class="bi bi-circle"></i><span>Manage LiveTest</span>
        </a>
      </li>
      <li>
        <a href="{{route('quiz.examination')}}">
          <i class="bi bi-circle"></i><span>Manage QuizExamination</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav --> --}}
</li>

</ul>  



  {{-- <ul class="sidebar-nav" id="sidebar-nav">
   
    @permission('edit-question')
    <li class="nav-item">
      <a class="nav-link collapsed"  href="{{route('insert.category')}}">
        <i class="bi bi-bar-chart"></i><span>Category</span>
      </a>
    </li> 
    
 
    <li class="nav-item">
      <a href="{{route('quiz.examination')}}" class="nav-link collapsed">
        <i class="bi bi-bar-chart"></i><span>Manage QuizExamination</span>
      </a>
    </li> 
    
  @endpermission  
    @role('author')
    <li class="nav-item">
      <a class="nav-link collapsed"  href="{{route('insert.book')}}">
        <i class="bi bi-circle"></i><span>Manage Book</span>
      </a>
    </li>  
    
 
    <li>
      <a href="{{route('insert.index')}}">
        <i class="bi bi-circle"></i><span>Manage Author</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed"  href="{{route('blog.category')}}">
        <i class="bi bi-circle"></i><span>Manage BlogCategory</span>
      </a>
    </li>  
    
  @endrole  
  </ul> --}}


</aside><!-- End Sidebar-->
  
    
