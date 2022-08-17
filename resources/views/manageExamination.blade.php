@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
<div class="card">
    <div class="card-body">
        <livewire:category.categories/> 
        <livewire:examtype/> 
    </div>
</div>
    </main>
@endsection