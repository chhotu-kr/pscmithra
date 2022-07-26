@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme h4 ps-2 text-danger">Edit QuizExamination</h6>
            <div class="col-12">
               <div class="card">
                   <div class="card-header text-warning text-theme ps-2 shadow h5">Edit QuizExamination Type</div>
                   <div class="card-body">
                    <form action="{{route('quizexamination.update',$quiz_exami)}}" method="POST">
                        @csrf
                       
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">QuizCategory</label>
                            <select class="form-select" name="quiz_categories_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select Quizcategory</option>
                              @foreach ($quizcat as $item)
                              <option value="{{ $item->id }}"
                                @if ($item->id==$quiz_exami->quiz_categories_id)
                                    selected="selected"
                                @endif
                              >{{ $item->name}}</option>
                          @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid QuizCategory.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">QuizSubCategory</label>
                            <select class="form-select" name="quiz_subcategories_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select Quizsubcategory</option>
                              @foreach ($quizsub as $item)
                              <option value="{{ $item->id }}"
                                @if ($item->id==$quiz_exami->quiz_sub_categories_id)
                                    selected="selected"
                                @endif
                              >{{ $item->name}}</option>
                          @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid quizSubcategory.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">QuizChapter</label>
                            <select class="form-select" name="quiz_chapters_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select Quizchapter</option>
                              @foreach ($quizchapt as $item)
                              <option value="{{ $item->id }}"
                                @if ($item->id==$quiz_exami->quiz_chapters_id)
                                    selected="selected"
                                @endif
                              >{{ $item->name}}</option>
                          @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid quizChapter.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">QuizTopic</label>
                            <select class="form-select" name="quiz_topics_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select Quiztopic</option>
                              @foreach ($quiztopic as $item)
                              <option value="{{ $item->id }}"
                                @if ($item->id==$quiz_exami->quiz_topics_id)
                                    selected="selected"
                                @endif
                              >{{ $item->name}}</option>
                          @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid quizTopic.
                            </div>
                        </div>
                     
                        <div class="mb-3">
                            <label for="">Exam_name</label>
                            <input type="text" name="exam_name" class="form-control" value="{{$quiz_exami->exam_name}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">RightMarks</label>
                            <input type="text" name="rightmarks" class="form-control" value="{{$quiz_exami->rightmarks}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">WrongMarks</label>
                            <input type="text" name="wrongmarks" class="form-control" value="{{$quiz_exami->wrongmarks}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">TimeDuration(In Minute)</label>
                            <input type="text" name="time_duration" class="form-control" value="{{$quiz_exami->time_duration}}" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100">Update</button>
                        </div>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</main>
@endsection