@extends('admin.base')
@section('content')
    @include('admin.side')
<main class="main" id="main">
<div class="container">
    <div class="row">
        <div class="col-12">
           <div class="card">
            <div class="card-header h4">Edit QuizQuestion</div>
            <div class="card-body">
                <form action="{{route('quizquestion.update',$quizquestion)}}" method="POST">
                    @csrf
                    {{-- @method('put') --}}
                       <div class="mb-3">
                          <label for="validationTooltip04" class="form-label">QuizExamination</label>
                          <select class="form-select" name="exam_id" id="validationTooltip04" required>
                            <option selected disabled value="0">Choose your quiexamination</option>
                            @foreach ($quizexam as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="validationTooltip04" class="form-label">Question</label>
                          <select class="form-select" name="question_id" id="validationTooltip04" value="{{$quizquestion->question}}" required>
                            <option selected disabled value="0">Choose your question</option>
                            @foreach ($secondquestion as $item)
                                <option value="{{$item->id}}">{{$item->question}}</option>
                            @endforeach
                          </select>
                      </div>
                    {{-- <div class="mb-3">
                      <label>SerialNo</label>
                      <input type="text" name="serialno" class="form-control" value="{{$examquestion->serialno}}" required>
                    </div> --}}
                    <input type="submit" value="Update" class="btn btn-primary w-100">
                     </form>
                </div>
           </div>
        </div>
    </div>
</div>
</main>
@endsection