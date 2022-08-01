@extends('user.footer')
@section('psc')
    
@endsection
@extends('user.dashboard')
@section('pscmithra')
<div class="education-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Blog Details</h1>
            </div>
            <ul class="education-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('view.home')}}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="{{asset('newlms/assets/images/about/shape-22.png')}}" alt="shape"></li>
        <li class="shape-2 scene"><img data-depth="2" src="{{asset('newlms/assets/images/about/shape-13.png')}}" alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="{{asset('newlms/assets/images/about/shape-15.png')}}" alt="shape"></li>
        <li class="shape-4"><img src="{{asset('newlms/assets/images/about/shape-22.png')}}" alt="shape"></li>
        <li class="shape-5 scene"><img data-depth="2" src="{{asset('newlms/assets/images/about/shape-07.png')}}" alt="shape"></li>
    </ul>
</div>

<section class="event-details-area education-section-gap">
            <div class="container">
                <div class="event-details">
                    <div class="main-thumbnail">
                        <img src="{{asset('newlms/assets/img/event-21.jpg')}}" alt="Event">
                    </div>
                    <div class="row row--30">
                        <div class="col-lg-12">
                            <div class="details-content">
                                <h3>Blog Title</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inc idid unt ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exerec tation ullamco laboris nis aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur magni dolores.</p>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam.</p>
                                <ul>
                                    <li>Aute irure dolor in reprehenderit</li>
                                    <li>Occaecat cupidatat non proident sunt in culpa</li>
                                    <li>Pariatur enim ipsam.</li>
                                </ul>
                                <h3>Event Location</h3>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam. </p>
                             
                            </div>
                        </div>
                      
                    </div>
                </div>
               
            </div>
        </section>
 
@endsection