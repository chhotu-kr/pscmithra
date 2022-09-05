@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>

    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12 py-3">
          <a href="{{route('study.create')}}" class="btn btn-primary mb-3">Add StudyMetrial</a>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-theme">Manage Study</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">SmCategory</th>
                    <th scope="col">SmChapter</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                   @foreach ($study as $item)
                          <tr>
                              <td>{{$item->id}}</td>
                              <td>{!!$item->category->name!!}</td>
                              <td>{!!$item->subcategory->name!!}</td>
                              <td>{!!$item->content!!}</td>
                              <td>

                                <form action="{{route('study.destroy',[$item])}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="X" class="btn btn-outline-danger">
                                <a href="{{route('study.edit',[$item])}}" class="btn btn-outline-success">Edit</a>
                                </form>
                                 
                                
                                
                                  
                              </td>
                          </tr>
                      @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
  
            </div>
          </div>
  
        </div>
      </div>
    </section>
</main>
@endsection