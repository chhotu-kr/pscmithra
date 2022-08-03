@extends('user/footer')
@section('psc')
    
@endsection

@extends('user/dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Category</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Category Details</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{asset('newlms/assets/images/about/shape-22.png')}}" alt="shape"></li>
        <li class="shape-2 scene"><img data-depth="2" src="{{asset('newlms/assets/images/about/shape-13.png')}}" alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="{{asset('newlms/assets/images/about/shape-15.png')}}" alt="shape"></li>
        <li class="shape-4"><img src="{{asset('newlms/assets/images/about/shape-22.png" alt="shape')}}"></li>
        <li class="shape-5 scene"><img data-depth="2" src="{{asset('newlms/assets/images/about/shape-07.png')}}" alt="shape"></li>
    </ul>
</div>

<br>
<br>
<div class="blog-details-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-4">
                {{-- <div class="education-blog-sidebar">
                   
                    <div class="education-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categories</h4>
                            <div class="content">
                                <ul class="category-list">
                                    <li><a href="#">ESE & GATE EC</a></li>
                                    <li><a href="#">IAS</a></li>
                                    <li><a href="#">IAS Hindi</a></li>
                                    <li><a href="#">CAT & MBA</a></li>
                                    <li><a href="#">CTET & State TET Exams</a></li>
                                    <li><a href="#">PRT, TGT & PGT Exams</a></li>
                                    <li><a href="#">UGC NET & SET </a></li>
                                    <li><a href="#">CSIR NET & SET </a></li>
                                    <li><a href="">CLAT UG</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="education-blog-widget widget-action">
                        <div class="inner">
                            <h4 class="title">Get Online Courses From <span>Education</span></h4>
                            <span class="shape-line"><i class="icon-19"></i></span>
                            <p>Nostrud exer ciation laboris aliqup</p>
                            <a href="#" class="education-btn btn-medium">Start Now <i class="icon-4"></i></a>
                        </div>
                    </div>
                </div> --}}
                <livewire:form/>
            </div>

            {{-- <div class="col-lg-8">
                
                <div class="blog-details-content">
                    <div class="entry-content">
                        <h3 class="title">SSC & Railways Test Series 2022 - Online Mock Test</h3>
                        
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inc idid unt ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exerec tation ullamco laboris nis aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur magni dolores. </p>
                   

                    <div class="overflow-table-container">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><strong>Exam Name</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>SSC Mock Test Series</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>No. of aspirants attempted free SSC &amp; Railway Mock Tests</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">SSC CGL</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">SSC CGL Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>43029</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">SSC CHSL</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">SSC CHSL Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>26000+</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">RRB NTPC</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">RRB NTPC Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>73682</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">SSC Stenographer</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">SSC Steno Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>7000+</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">SSC CPO</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">SSC CPO Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>15643</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">Delhi Police Constable Exam</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">Delhi Police Constable Test Series</a></p>
                                    </td>
                                    <td>
                                        <p>33875</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">RRB Group D</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">RRB Group D Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>113876</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><a href="#" target="_blank">SSC MTS</a></p>
                                    </td>
                                    <td>
                                        <p><a class="" href="#" target="_blank">SSC MTS Mock Test</a></p>
                                    </td>
                                    <td>
                                        <p>5294</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                        <h3>Test Series Key Features</h3>
                        <ul>
                            <li>Full-length mock tests can be practised here.</li>
                            <li>A complete set is prepared by the expert faculty.</li>
                            <li>Every set contains the latest and updated pattern of questions.</li>
                            <li>Every question holds a detailed solution for more understanding.</li>
                            <li>You can practice mock test in Hindi as well as in the English language as per the nature of the exam.</li>
                        </ul>
                        <h3>List of Exam Categories for Mock Test Series</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  

                </div>

            </div> --}}
            
        </div>
    </div>
</div>

<div class="education-categorie-area categorie-area-3 education-section-gap bg-image bg-image--4" id="categories">
    <div class="container">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">Recommended Exams  <span class="color-primary"> Category</span></h2>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
            <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                    <div class="categorie-grid categorie-style-3 color-primary-style">
                        <div class="icon">
                            <i class="icon-9"></i>
                        </div>
                        <div class="content">
                            <h5 class="title">PO, Clerk, SO, Insurance</h5>
                        </div>
                    </div>
                </a>
                
            </div>
            <div class="col sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-secondary-style">
                    <div class="icon">
                        <i class="icon-10"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">Regulatory Bodies</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra04-style">
                    <div class="icon">
                        <i class="icon-11"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">SSC &amp; Railway</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-tertiary-style">
                    <div class="icon">
                        <i class="icon-12"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">GATE &amp; PSU CS</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra02-style">
                    <div class="icon">
                        <i class="icon-13"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE &amp; GATE EE</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra07-style">
                    <div class="icon design-pencil-icon">
                        <i class="icon-42"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE &amp; GATE EC</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra06-style">
                    <div class="icon">
                        <i class="icon-14"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE &amp; GATE ME</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra03-style">
                    <div class="icon laptop-icon">
                        <i class="icon-16"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">ESE &amp; GATE CE</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra01-style">
                    <div class="icon">
                        <i class="icon-17"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">Photography</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col sal-animate" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                <a href="category-details.php">
                <div class="categorie-grid categorie-style-3 color-extra05-style">
                    <div class="icon">
                        <i class="icon-43"></i>
                    </div>
                    <div class="content">
                        <h5 class="title">Music Class</h5>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
