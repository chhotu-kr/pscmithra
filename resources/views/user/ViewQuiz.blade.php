@extends('user/dashboard')
@section('pscmithra')
    {{-- <livewire:user.quiz/>  --}}
 {{-- @livewire('user.quiz'); --}}

 <div class="main-home-slider">
  @foreach ($img as $item)
  <div class="item">
      {{-- <img src="{{asset('nassets\img\banner-images-1.jpg')}}"> --}}
      @livewire('imageview', ['image' => ['image' => $item->image,'w'=>'1732','h'=>'500px']], key($item->id))
  </div>
  @endforeach
  
</div>
    {{-- <div class="education-breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h1 class="title">Quizes</h1>
                </div>
                <ul class="education-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('view.home') }}">Home</a></li>
                    <li class="separator"><i class="icon-angle-right"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">Quizes</li>
                </ul>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1"><img src="{{ asset('nassets/images/about/shape-22.png" alt="shape') }}"></li>
            <li class="shape-2 scene"><img data-depth="2" src="{{ asset('nassets/images/about/shape-13.png') }}"
                    alt="shape"></li>
            <li class="shape-3 scene"><img data-depth="-2" src="{{ asset('nassets/images/about/shape-15.png') }}"
                    alt="shape"></li>
            <li class="shape-4"><img src="{{ asset('nassets/images/about/shape-22.png" alt="shape') }}"></li>
            <li class="shape-5 scene"><img data-depth="2" src="{{ asset('nassets/images/about/shape-07.png') }}"
                    alt="shape"></li>
        </ul>
    </div> --}}

    <div class="features-area-3">
        <div class="container">
            <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                <h2 class="title">Online Quizes <span class="color-primary">Series</span></h2>
            </div>
            <div class="features-grid-wrap">
                <div class="features-box features-style-3 color-primary-style edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject"
                            src="{{ asset('nassets/images/animated-svg-icons/scholarship-facility.svg') }}"
                            alt="animated icon">
                        <!-- <i class="icon-34"></i> -->
                    </div>
                    <div class="content">
                        <h4 class="title">Scholarship Facility</h4>
                        <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                    </div>
                </div>
                <div class="features-box features-style-3 color-secondary-style edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="{{ asset('nassets/images/animated-svg-icons/skilled-lecturers.svg') }}"
                            alt="animated icon">
                    </div>
                    <div class="content">
                        <h4 class="title">Skilled Lecturers</h4>
                        <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                    </div>
                </div>
                <div class="features-box features-style-3 color-extra02-style edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="{{ asset('nassets/images/animated-svg-icons/book-library.svg') }}"
                            alt="animated icon">
                        <!-- <i class="icon-36"></i> -->
                    </div>
                    <div class="content">
                        <h4 class="title">Book Library &amp; Store</h4>
                        <p>Lorem ipsum dolor sit amet cont adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image-4 " id="categories">
        <div class="container mb-5">
            <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                <h2 class="title">Select Your <span class="color-primary">Quizes Category</span></h2>
            </div>
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 p-5" style="margin-top: -50px">
                @foreach ($quizcat as $item)
                    <div class="col-md-2 col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                        <a href="{{ route('view.quizdetails', ['cat_id' => $item->id]) }}">
                            <div class="categorie-grid categorie-style-3 color-primary-style">
                                <div class="icon">
                                    <i class="icon-9"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach

            </div>
        </div>


        <div class="edu-gallery-area edu-section-gap">
            <div class="container mt-5">
                <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up"
                    data-sal-duration="800">
                    <h2 class="title">All <span class="color-primary">Quizes Series</span></h2>
                </div>
                <div class="isotope-wrapper">
                    <div class="isotop-button button-transparent isotop-filter">
                        <button data-filter="*" class="is-checked">
                            <span class="filter-text">All</span>
                        </button>
                        @foreach ($quizcat as $item)
                            <button data-filter=".ESEGATEEC">
                                <span class="filter-text">{{ $item->name }}</span>
                            </button>
                        @endforeach

                    </div>


                </div>
                <div class="isotope-list gallery-grid-wrap">
                  <div id="animated-thumbnials">
  
                   <div class="row g-5">
  
                     @foreach ($quizsubcat as $item)
                     <div class="col-lg-4 col-md-6 edu-gallery-grid isotope-item ESEGATEEC" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                       <div class="categorie-grid categorie-style-2 color-primary-style edublink-svg-animate">
                          <div class="icon">
                              <i class="icon-9"></i>
                          </div>
                          <div class="content">
                              <h5 class="title">{{$item->name}}</h5>
                          </div>
                       </div>
                     </div>
                     @endforeach
                   </div>
            </div>
        </div>
    </div>
@endsection



{{-- <style type="text/css">
    .quize-page {
        padding: 50px 0;
        position: relative;
    }
    .quize-page:before {
        content: '';
            position: absolute;
        width: 37%;
        height: 100%;
        background: #f0f0f0;
        z-index: -1;
        top: 0;
        right: 0;
    }
    #regForm {
      background-color: #ffffff;
          padding: 20px;
    }
    
    #regForm  h1 {
      text-align: left;  
      font-size: 22px;
    }
    
    
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    
    /* Hide all steps by default: */
    .tab {
      display: none;
      border: 1px solid #dbd6e0;
        padding: 10px;
        margin-bottom: 15px;
    }
    
    #prevBtn {
      background-color: #4c7bcd;
        border: 0;
        height: 50px;
        border-radius: 5px;
        color: #fff;
        padding: 0 20px;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    
    .quize-page [type="radio"]:checked+label:after {
          background-color: #4c7bcd;
        width: 100%;
        height: 100%;
        border-radius: 0;
        left: 0;
        top: 0;
        z-index: -1;
        color: #fff;
      
    }
    .quize-page input[type="radio"]~label::before {
        border: 1px solid #dcdfe0;
        border-radius: 50%;
        opacity: 0;
    }
    p.quition-para{
        color: #000;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .quize-page .tab .form-group label {
           width: 100%;
        position: relative;
        z-index: 1;
        padding: 5px 0 5px 10px;
        color: #fff;
        background: #787575;
    }
    .quize-page .tab .form-group {
        margin-bottom: 20px;
        border: 1px solid #d5cfcf;
        position: relative;
    }
    .quize-page .quition-no h5 {
    
    }
    .user-profile {
    display: flex;
    }
    .user-profile .left-user img {
        width: 90px;
        margin-right: 20px;
    }
    .user-attempt-question {
        padding-left: 20px;
    }
    .user-attempt-question .left-right h4 {
        margin: 0;
        margin-top: 18px;
    }
    .legent-section {
          margin-top: 20px;
    }
    .legent-section .answerd {
    
    }
    .legent-section .answerd .answer-box {
          display: flex;
        justify-content: space-between;
    }
    .legent-section .answerd .answer-box p {
      width: 49%;
        margin: 0;
        background: #4c7bcd;
        margin-bottom: 10px;
        padding: 6px;
        color: #fff;
        border-radius: 5px;
        text-align: center;
        position: relative;
    }
    .legent-section .answerd .answer-box p span {
      width: 30px;
        display: inline-block;
        position: absolute;
        left: 0;
        top: 0;
        height: 38px;
        line-height: 38px;
    }
    .quition-number-plate {
    
    }
    .quition-no-box-section {
      height: 185px;
        overflow: auto;
    }
    .quition-no-box-section span {
      background: #2196f3;
        width: 40px;
        display: inline-block;
        margin: 10px 20px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        color: #fff;
    }
    .four-btn {
      margin-top: 20px;
        border-top: 1px solid #dcd1d1;
        padding-top: 10px;
    }
    .four-btn a {
          width: 49%;
        border: 2px solid #00b0ff;
        margin-bottom: 10px;
        text-align: center;
        padding: 5px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        background: #0595d6;
    }
    </style>
    
    
    <div class="quize-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form id="regForm" action="/action_page.php">
                      <h1>Quizes </h1>
                      <!-- One "tab" for each step in the form: -->
                     @foreach ($sec as $item)
                     <div class="tab">
                      <div class="quition-no">
                          <h5>1/5</h5>
                      </div>
                      <p class="quition-para">{{$item->question}}</p>
                      <div class="form-group">
                        <input type="radio" id="1" class="vh" name="mca">
                        <label for="1">{{$item->option1}}</label>
                      </div>
                      <div class="form-group">
                        <input type="radio" id="2" class="vh" name="mca">
                        <label for="2">{{$item->option2}}</label>
                      </div>
                      <div class="form-group">
                        <input type="radio" id="3" class="vh" name="mca">
                        <label for="3">{{$item->option3}}</label>
                      </div>
                      <div class="form-group">
                        <input type="radio" id="4" class="vh" name="mca">
                        <label for="4">{{$item->option4}}</label>
                      </div>
                    </div>
                     @endforeach
    
                     
                      <div style="overflow:auto;">
                        <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button class="education-btn btn-medium" type="button" id="nextBtn" onclick="nextPrev(1)">Save & Next</button>
                        </div>
                      </div>
                      <!-- Circles which indicates the steps of the form: -->
                      <div style="text-align:center;margin-top:40px;display: none;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="user-attempt-question">
                        <div class="user-profile">
                            <div class="left-user">
                                <img src="{{asset('nassets/img/man-avatar-profile1.png')}}">
                            </div>
                            <div class="left-right">
                                <h4>Amit Kumar</h4>
                                <div class="time-section">
                                    <span>Time Left : <b>10: 59</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="legent-section">
                          <h4>Legend</h4>
                          <div class="answerd">
                            <div class="answer-box">
                              <p><span style="background: #3ca440;">5</span> Answered</p>
                              <p><span style="background: #d70b0b;">2</span> Not Answered</p>
                            </div>
                            <div class="answer-box">
                              <p><span style="background: #ff5722;">50</span> Marked</p>
                              <p><span style="background: #9e9e9e;">3</span> Not Visited</p>
                            </div>
                          </div>
                        </div>
    
                        <div class="quition-number-plate">
                          <h4>Your are Viewing LR Section Question Palltte:</h4>
                          <div class="quition-no-box-section">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                            <span>6</span>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                            <span>11</span>
                            <span>12</span>
                            <span>13</span>
                            <span>14</span>
                            <span>15</span>
                            <span>16</span>
                            <span>17</span>
                            <span>18</span>
                            <span>19</span>
                            <span>20</span>
                            <span>21</span>
                          </div>
                        </div>
                        <div class="four-btn"> 
                          <a href="">Question Paper</a>
                          <a href="">Instructions</a>
                          <a href="">Profile</a>
                          <a href="">Submit</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
  
    
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Save & Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script> --}}
