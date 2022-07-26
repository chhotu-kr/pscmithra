@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <h6 class="text-theme h4 ps-2 text-danger">Add QuizExamination</h6>
            <div class="col-12">
               <div class="card">
                   <div class="card-header text-warning text-theme ps-2 shadow h5">Insert QuizExamination Type</div>
                   <div class="card-body">
                    <form action="{{route('quizexamination.store')}}" method="POST">
                        @csrf
                       <livewire:quiz-categories/>
                        {{-- <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">QuizCategory</label>
                            <select class="form-select" name="quiz_categories_id" id="validationTooltip04" required>
                              <option selected disabled value="0">Select Quizcategory</option>
                              @foreach ($quizcat as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
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
                              <option value="{{$item->id}}">{{$item->name}}</option>
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
                              <option value="{{$item->id}}">{{$item->name}}</option>
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
                              <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid quizTopic.
                            </div>
                        </div> --}}
                          
                        {{-- <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">Question</label>
                            <select class="form-select" name="question" id="validationTooltip04" required>
                              <option selected disabled value="0">Select Question</option>
                              @foreach ($secondquestion as $item)
                              <option value="{{$item->id}}">{{$item->question}}</option>
                          @endforeach
                            </select>
                            <div class="invalid-tooltip">
                              Please select a valid ExamName.
                            </div>
                          </div> --}}
                        {{-- <div class="mb-3">
                            <label for="">StartAt</label>
                            <input type="text" name="startat" class="form-control" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="">Exam_name</label>
                            <input type="text" name="exam_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">RightMarks</label>
                            <input type="text" name="rightmarks" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">WrongMarks</label>
                            <input type="text" name="wrongmarks" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">TimeDuration(In Minute)</label>
                            <input type="text" name="time_duration" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100">Create</button>
                        </div>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</main>
@endsection