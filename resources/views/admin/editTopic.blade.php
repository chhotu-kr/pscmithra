@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme ps-2 h4">Edit Topic</h6>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit Topic</div>
               
                <div class="card-body">
                    <form action="{{route('topic.Update',$topic)}}" method="POST">
                        @csrf
                       
                        <div class="mb-3">
                          <label for="">TopicName</label>
                          <input type="text" name="topic_name" class="form-control" value="{{ $topic->topic_name}}" required>
                      </div>
                      <div class="mb-3">
                        <label for="">SubjectName</label>
                        <select name="subject_id" id="" class="form-select" required>
                        <option value="0">Select Subject</option>
                        @foreach ($subject as $new)
                        <option value="{{ $new->id }}"
                            @if ($new->id==$topic->subject_id)
                                selected="selected"
                            @endif
                          >{{ $new->sub_name}}</option>
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