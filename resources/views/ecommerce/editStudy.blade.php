@extends('admin.base')
@section('content')
    <main class="main" id="main">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    @include('admin.side')
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Edit StudyMetrial</div>
                        <div class="card-body">
                            <form action="{{route('study.update',$study->id)}}" class="row g-3 needs-validation" method="post" novalidate>
                          
                                @csrf
                                @method('put')
                                <div class=" position-relative">
                                  <label for="validationTooltip04" class="form-label">StudyMetrial</label>
                                  <select class="form-select" name="study_material_id" id="validationTooltip04" required>
                                    <option selected disabled value="0">Select StydyMetrial</option>
                                    @foreach ($smcy as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-tooltip">
                                    Please select a valid id.
                                  </div>
                                </div>
                                <div class=" position-relative">
                                  <label for="validationTooltip04" class="form-label">SmCategory</label>
                                  <select class="form-select" name="sm_categories_id" id="validationTooltip04" required>
                                    <option selected disabled value="0">Select SmCategory</option>
                                    @foreach ($smc as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-tooltip">
                                    Please select a valid id.
                                  </div>
                                </div>
                                <div class=" position-relative">
                                  <label for="validationTooltip04" class="form-label">SmChapter</label>
                                  <select class="form-select" name="sm_chapters_id" id="validationTooltip04" required>
                                    <option selected disabled value="0">Select Smchapter</option>
                                    @foreach ($smc as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-tooltip">
                                    Please select a valid smchapter.
                                  </div>
                                </div>
                                <div class=" position-relative">
                                  <label for="validationTooltip05" class="form-label">Content</label>
                                  <input type="text" class="form-control" name="content" id="validationTooltip05" value="{{$study->content}}" required>
                                  <div class="invalid-tooltip">
                                    Please provide a valid content.
                                  </div>
                                </div>
                                <div class=" position-relative">
                                  <label for="validationTooltip05" class="form-label">Title</label>
                                  <input type="text" class="form-control" name="title" id="validationTooltip05" value="{{$study->study->title}}" required>
                                  <div class="invalid-tooltip">
                                    Please provide a valid title.
                                  </div>
                                </div>
                                <div class=" position-relative">
                                  <label for="validationTooltip05" class="form-label">Description</label>
                                  <input type="text" class="form-control" name="description" id="validationTooltip05" value="{{$study->study->description}}" required>
                                  <div class="invalid-tooltip">
                                    Please provide a valid description.
                                  </div>
                                </div>
                                <div class="col-12">
                                  <button class="btn btn-primary w-100" type="submit">Create</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </main>
@endsection