@extends('admin/base')
@section('content')
    <main class="main" id="main">
      <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Add Role</div>
                    <div class="card-body">
                        <form action="{{route('update.role',$rol)}}" class="needs validation" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name Role</label>
                                <input type="text" name="name" class="form-control" value="{{$rol->name}}" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" required>
                            </div>
                            --}}
                            {{-- {{$data}} --}}
                            @foreach ($data as $key => $value)
                            <div class="m-2">
                           <h5 class="fw-bold">• {{ucfirst($key)}} </h5>
                           <div class="row">
                           @foreach ($value as $item)
                           <div class="col col-lg-2">
                           <div class="form-check form-switch">
                           <input class="form-check-input me-1 fw-bold" name="per[]" value="{{$item->id}}" type="checkbox"><h6 class="fw-bold"> {{ucfirst($item->name)}}</h6></input>
                           </div>
                           </div>
                           @endforeach
                           </div>
                           </div> 
                           @endforeach


                            <div class="mb-3">
                                <input type="submit" value="submit" class="btn btn-primary btn-lg float-end">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </main>
@endsection