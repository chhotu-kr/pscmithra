@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme ps-2 h4">PageProduct</h6>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit PageProduct</div>
               
                <div class="card-body">
                    <form action="{{route('page.update',$page)}}" method="POST">
                        @csrf
                       
                        <div class="mb-3">
                          <label for="">PageName</label>
                          <input type="text" name="pagename" class="form-control" value="{{ $page->pagename}}" required>
                      </div>
                      <div class="mb-3">
                        <label for="">ProductName</label>
                        <select name="products_id" id="" class="form-select" required>
                        <option value="0">Select product</option>
                        @foreach ($page as $new)
                        <option value="{{ $new->id }}"
                            @if ($new->id==$page->products_id)
                                selected="selected"
                            @endif
                          >{{ $new->name}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                       <button type="submit" class="btn btn-primary w-100">Update</button>
                     
                      </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection