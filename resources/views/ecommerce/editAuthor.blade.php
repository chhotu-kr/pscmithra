@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-theme ps-2 text-secondary">Edit Author</h3>
                    <div class="card">
                        <div class="card-header">Edit Author</div>
                        <div class="card-body">
                            <form action="{{route('author.update',$author)}}" method="POST">
                                @csrf
                               
                             
                              <div class="mb-3">
                                  <label for="" class="h6">Author Name</label>
                                  <input type="text" name="name" class="form-control" value="{{$author->name}}" required>
                              </div>
                             
                                <div class="mb-3">
                                 <button type="submit" class="btn btn-outline-primary">Create</button>
                               </div>
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection