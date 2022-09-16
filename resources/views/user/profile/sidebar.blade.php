<style>
    .border-left{
  border-left: 2px solid var(--primary) !important;
}
.viewButtonshow2 {
    background: black;
    padding: 10px;
    display: inline-block;
    width: 130px;
    color: #fff;
    margin: 0 auto 10px 0;
    text-align: center;
}
.viewButtonshow4 {
    background: black;
    padding: 10px;
    display: inline-block;
    width: 130px;
    color: #fff;
    margin: 0 auto 10px 0;
    text-align: center;
}
.seller-dashboard-page {
        background: #f5f9fa;
    z-index: 1;
    padding: 20px 0;
    position: relative;
    border-bottom: 1px solid #cac3c3;
}
.nav-tabs.list .nav-item .nav-link {
        color: #fff !important;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    background-color: transparent;
}
.nav-tabs.list .nav-item .nav-link.active, .nav-tabs.list .nav-item .nav-link.address {
    font-weight: 700;
    color: #ffffff !important;
    background: #FF9400;
    padding-left: 10px;
    border-radius: 30px;
    margin: 0;
}
.nav-tabs.list .nav-item {
    padding: 0;
    border: 0 !important;
    margin-bottom: 5px;
}
.nav-tabs.list .nav-item .nav-link .fa {
    margin-right: 10px;
}
.seller-dashboard-page:before {
    content:'';
    background: #4c7bcd;
    position: absolute;
    width: 17%;
    height: 100%;
    z-index: -1;
    top: 0;
    border-bottom: 1px solid #eff1f5;
}
.widget-dashboard h2 {
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    margin: 0;
}
.sidebar{
      left: 0;
    z-index: 100;
  
    height: 100%;
}

.overlay{
  background-color: rgb(0 0 0 / 45%);
  z-index: 99;
}
.account-logout #logout-dropdown {
    background: black;
}
.account-logout #logout-dropdown span{
    display: block;
    padding: 10px;
    background: black;
    color: #fff;
}
.account-logout .dropdown-menu.show {
    display: block;
  
    width: 100%;
    background: white;
    margin: 0;
}
.account-logout .dropdown-item {
        font-size: 16px;
}
.bg-gradient-danger {
    background: -webkit-gradient(linear,left top,right top,from(#ffbf96),to(#fe7096));
    background: linear-gradient(90deg,#ffbf96,#fe7096);
}
.bg-gradient-info {
    background: -webkit-gradient(linear,left top,right top,from(#90caf9),color-stop(99%,#047edf));
    background: linear-gradient(90deg,#90caf9,#047edf 99%);
}
.bg-gradient-success {
    background: -webkit-gradient(linear,left top,right top,from(#84d9d2),to(#07cdae));
    background: linear-gradient(90deg,#84d9d2,#07cdae);
}
.card .card-body {
    padding: 2.5rem;
}
.card .card-body h4,
.card .card-body h2,
.card .card-body h6 {
    color:#fff;
}
.card.card-img-holder .card-img-absolute {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
}
.font-weight-normal {
    font-weight: 400!important;
}
.list-group-item {
    font-size: 18px;
}
/* sidebar for small screens */
@media screen and (max-width: 767px){
  
  .sidebar{
    max-width: 18rem;
    transform : translateX(-100%);
    transition : transform 0.4s ease-out;
  }
  
  .sidebar.active{
    transform : translateX(0);
  }
  
}
.nav-profile-image {
    width: 44px;
    height: 44px;
}
.nav-profile-image img {
    border: 1px solid #cdc7c7;
    border-radius: 30px;
}
.nav-profile-text {
    display: flex;
    flex-direction: column;
    margin-left: 1rem;
}
.btn-two {
    margin-bottom: 25px;
}
.btn-two a {
    background: black;
    padding: 10px;
    display: inline-block;
    color: #fff;
}
.table.table-downloads tbody td, .table.table-order tbody td {
    vertical-align: middle;
    border: 1px solid #e1d8d8;
}
.hh-grayBox {

	margin-bottom: 20px;
	padding: 35px;
  margin-top: 20px;
}
.pt45{padding-top:45px;}
.order-tracking{
	text-align: center;
	width: 24.33%;
	position: relative;
	display: block;
}
.order-tracking .is-complete{
	display: block;
	position: relative;
	border-radius: 50%;
	height: 30px;
	width: 30px;
	border: 0px solid #AFAFAF;
	background-color: #f7be16;
	margin: 0 auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
	z-index: 2;
}
.order-tracking .is-complete:after {
	display: block;
	position: absolute;
	content: '';
	height: 14px;
	width: 7px;
	top: -2px;
	bottom: 0;
	left: 5px;
	margin: auto 0;
	border: 0px solid #AFAFAF;
	border-width: 0px 2px 2px 0;
	transform: rotate(45deg);
	opacity: 0;
}
.order-tracking.completed .is-complete{
	border-color: #27aa80;
	border-width: 0px;
	background-color: #27aa80;
}
.order-tracking.completed .is-complete:after {
	border-color: #fff;
	border-width: 0px 3px 3px 0;
	width: 7px;
	left: 11px;
	opacity: 1;
}
.order-tracking p {
	color: #A4A4A4;
	font-size: 16px;
	margin-top: 8px;
	margin-bottom: 0;
	line-height: 20px;
}
.order-tracking p span{font-size: 14px;}
.order-tracking.completed p{color: #000;}
.order-tracking::before {
	content: '';
	display: block;
	height: 3px;
	width: calc(100% - 40px);
	background-color: #f7be16;
	top: 13px;
	position: absolute;
	left: calc(-50% + 20px);
	z-index: 0;
}
.order-tracking:first-child:before{display: none;}
.order-tracking.completed:before{background-color: #27aa80;}

.tab-main .nav-tabs {
    position: relative;
}
/*.tab-main .nav-tabs > li:hover:after,
.tab-main .nav-tabs .active:after{
    content: "";
    border-top: 10px solid #dc005a;
    border-left: 9px solid transparent;
    border-right: 9px solid transparent;
    position: absolute;
    top:41px;
    right: 38%;
}*/
.tab-main .nav-tabs > li > a{
    border-radius: 0px;
    background: #272d33;
    padding:10px 20px ;
    color:#fff;
}
.tab-main .nav-tabs > li > a:hover{
    border-color:transparent;
    background: #ff9400;
    transition:0.3s ease;
}
.tab-main .nav-tabs > li.active > a,
.tab-main .nav-tabs > li.active > a:focus,
.tab-main .nav-tabs > li.active > a:hover{
    background:#ff9400;
    color:#fff;
}
.tab-main .tab-content > .tab-pane{
    border: 1px solid #c4c4c4;
    border-top: 0px none;
    padding: 20px;
    line-height: 22px;
}
.info-stats4 {
    background: #f7f7f7;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    border-bottom: 1px solid #e0e3e8;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    flex-direction: row;
    padding: 1rem;
    height: 115px;
    margin-bottom: 80px;
    justify-content: space-between;
    margin-top: 30px;
}
.info-stats4 .info-icon {
    height: 60px;
    width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    text-align: center;
    background: #ffffff;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    box-shadow: 0 0 2px #e5e9ec;
    border-bottom: 1px solid #eeeeee;
}
.info-stats4 .info-icon i {
    font-size: 1.5rem;
    color: #FF9400;
}
.info-stats4 .sale-num h3 {
    margin: 0;
}
.info-stats4 .sale-num p {
    margin: 0;
    padding: 0;
    font-size: 16px;
    color: #888888;
}
.order-table-container {
    box-shadow: 0 0 10px #e9e9e9;
    padding: 10px;
    border-radius: 10px;
}
.highcharts-exporting-group,
.highcharts-title {
    display:none;
}
.fa-rupee:before, .fa-inr:before {
    content: "\f156";
}
.nav-tabs {
    border-bottom: none;
}
.info-stats5 {
    background: linear-gradient(to right, #4C7BCD, #01509D,#012E72);
}
.info-stats5 .sale-num h3 {
    color: #fff;
}
.info-stats5 .sale-num p {
    color: #fff;
}
.goodafternoon {
        display: flex;
    margin-bottom: 20px;
    border-bottom: 1px solid #fdfdfd;
    padding-bottom: 10px;
    
}
.goodafternoon img {
    width: 60px;
    border: 1px solid #717171;
    border-radius: 50px;
    height: 60px;
    margin-right: 20px;
}
.goodafternoon p {
    margin: 0;
    color: #fff;
    padding-top: 9px;
    line-height: 25px;
}
.goodafternoon p a {
    color: #fff;
}
.order-lg-last {
    height: 725px;
    overflow: auto;
}
@media only screen and (max-width: 360px){
    .tab-main .nav-tabs > li > a{
        padding: 10px;
    }
}
select.form-control:not([size]):not([multiple]) {
    height: 5rem;
}
.left-side-user {
    border: 1px solid #e3dede;
    padding: 10px;
}
 .container-form-box {
  
 }
 .tabSection {
        padding: 0 25px 25px;
    
 }

  .tabSection h3 {
      font-size:22px;
  }
   .tabSection input {
     font-size: 14px;
    height: 40px;
    border-radius: 5px;
    margin-bottom: 20px;
   }
   .tabSection select {
     font-size: 14px;
    height: 40px !important;
    border-radius: 5px;
    margin-bottom: 20px;
    border: none;
    padding: 0.375rem 2.75rem !important;
    color: #767676;
   }
    .tabSection label {
        
    }
    .btn-main {
        display: flex;
        justify-content: space-around;
     }
      .btn-main .button {
         width: 100%;
        text-align: center;
        padding: 10px;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
     }
   
     .btn-main .next{
             background: #3f51b5;
     }
    
     .otpfild {
         position:relative;
     }
     .otpfild a {
        position: absolute;
        top: 0;
        right: 0;
        background: black;
        padding: 7px;
        color: #fff;
     }
</style>

<div class="goodafternoon">
    <img src="{{asset('nassets/img/man-avatar-profile1.png')}}">
    <p> <span>Welcome to <br> david</span></p>
</div>
<div class="sidebar widget widget-dashboard">
<h2 class="text-uppercase"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</h2>
<ul class="nav nav-tabs list flex-column mb-0" role="tablist">
	<li class="nav-item">
		<a class="nav-link" href="dashboard.php"><i class="fa fa-eye"></i> Overview</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="history.php"><i class="fa fa-eye"></i> History</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{route('user.profile')}}"><i class="fa fa-eye"></i> Profile</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="plan.php"><i class="fa fa-eye"></i> Plan</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{route('view.test')}}"><i class="fa fa-eye"></i> Sessional PDF</a>
       
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{route('view.course')}}"><i class="fa fa-eye"></i> Course</a>
	</li>
    

</ul>

</div>