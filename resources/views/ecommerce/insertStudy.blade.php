@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
           
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <span class="text-theme ps-2 fw-bold text-info h4">Add StudyMetrial</span>
                  </div>
                  <div class="card-body">
                    <form action="{{route('study.store')}}" class="row g-3 needs-validation" method="post" novalidate>
                          
                      @csrf
                      <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid title.
                        </div>
                      </div>
                      <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">Sm_Categories_Id</label>
                        <select class="form-select" name="sm_categories_id" id="validationTooltip04" required>
                          <option selected disabled value="0">Select SmCategory</option>
                          @foreach ($studymetrialcategory as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid id.
                        </div>
                      </div>
                      <div class=" position-relative">
                        <label for="validationTooltip04" class="form-label">Sm_Chapters_Id</label>
                        <select class="form-select" name="sm_chapters_id" id="validationTooltip04" required>
                          <option selected disabled value="0">Select SmChapter</option>
                          @foreach ($studymetrialchapter as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid subcategory.
                        </div>
                      </div>
                      <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">Content</label>
                       
                        <textarea class="editor" id="validationTooltip05" name="content" class="form-control" required></textarea>
                       
                        
                        <div class="invalid-tooltip">
                          Please provide a valid content.
                        </div>
                      </div>
                      <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="validationTooltip05" required>
                        <div class="invalid-tooltip">
                          Please provide a valid title.
                        </div>
                      </div>
                      {{-- <div class=" position-relative">
                        <label for="validationTooltip05" class="form-label">Description</label>

                        <textarea class="editor" id="validationTooltip05" name="description" class="form-control" required></textarea>
  
                        <div class="invalid-tooltip">
                          Please provide a valid description.
                        </div>
                      </div> --}}
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