@extends('admin.base')
@section('content')
    <main class="main" id="main">
        @include('admin.side')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-theme ps-2 text-secondary">Edit Examination</div>
                        <div class="card-body">
                            <form action="{{route('examination.update',$examination)}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="validationTooltip04" class="form-label">Exam_id</label>
                                    <select class="form-select" name="exam_id" id="validationTooltip04" required>
                                      <option selected disabled value="0">Choose your exam</option>
                                      @foreach ($exam as $item)
                                      <option value="{{ $item->id }}"
                                        @if ($item->id==$examination->exam_id)
                                            selected="selected"
                                        @endif
                                      >{{ $item->examname}}</option>
                                      @endforeach
                                    </select>
            
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="validationTooltip04" class="form-label">Category_id</label>
                                    <select class="form-select" name="category_id" id="validationTooltip04" required>
                                      <option selected disabled value="0">Select category</option>
                                      @foreach ($category as $item)
                                      <option value="{{ $item->id }}"
                                        @if ($item->id==$examination->category_id)
                                            selected="selected"
                                        @endif
                                      >{{ $item->category}}</option>
                                  @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                      Please select a valid Category.
                                    </div>
                                  </div>
                                <div class="mb-3">
                                    <label for="validationTooltip04" class="form-label">SubCategory_id</label>
                                    <select class="form-select" name="subcategory_id" id="validationTooltip04" required>
                                      <option selected disabled value="0">Select subcategory</option>
                                      @foreach ($subcategory as $item)
                                      <option value="{{ $item->id }}"
                                        @if ($item->id==$examination->subcategory_id)
                                            selected="selected"
                                        @endif
                                      >{{ $item->subcategory}}</option>
                                  @endforeach
                                    </select>
                                    <div class="invalid-tooltip">
                                      Please select a valid Subcategory.
                                    </div>
                                  </div>
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
                                <div class="mb-3">
                                    <label for="">StartAt</label>
                                    <input type="text" name="startat" class="form-control" value="{{$examination->startat}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">Exam_name</label>
                                    <input type="text" name="exam_name" class="form-control" value="{{$examination->exam_name}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">RightMarks</label>
                                    <input type="text" name="rightmarks" class="form-control" value="{{$examination->rightmarks}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">WrongMarks</label>
                                    <input type="text" name="wrongmarks" class="form-control" value="{{$examination->wrongmarks}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">TimeDuration</label>
                                    <input type="text" name="time_duration" class="form-control" value="{{$examination->time_duration}}" required>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-outline-primary w-100">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection