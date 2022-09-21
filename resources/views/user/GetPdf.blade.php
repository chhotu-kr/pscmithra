@extends('user/dashboard')
@section('pscmithra')
<div class="seller-dashboard-page">
    
<div class="container-fluid">
    <div class="row">
        <div class=" mb-lg-0 mb-3 col-lg-2 order-0">
             @include('user.profile.sidebar') 

        </div>
        <div class="col-lg-10 order-lg-last order-1 ">
            @livewire('user.get-pdf')
        </div>
    </div>
</div>
</div>
@endsection