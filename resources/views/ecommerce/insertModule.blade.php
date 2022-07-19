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
                    <div class="card-header">Insert Modules</div>
                    <div class="card-body">
                        <form action="{{route('module.store')}}" method="POST">
                            @csrf
                        <div class="mb-3">
                            <label>Course_id</label>
                            <select name="course_id" id="" class="form-select" required>
                                <option value="0">Select Course</option>
                                @foreach ($course as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Type</label>
                            <select name="type" id="" class="form-select">
                                <option value="0">Select Type</option>
                                <option value="voice">voice</option>
                                <option value="text">text</option>
                                <option value="test">test</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label>Url</label>
                            <input type="text" name="url" class="form-control" required>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success mb-3" id="divv">Hide</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-dark text-white mb-3" id="sonu">Show</button>
                            </div>
                        </div> --}}
                        {{-- <div class="mb-3" id="ac">
                            <label>Text</label>
                            <textarea name="text" id="validationTooltip01" cols="30" rows="5" class="tinymce-editor form-control"></textarea>
                        </div> --}}
                        {{-- <div class="mb-3" id="bc">
                            <label>QuizId</label>
                            <input type="text" name="quiz_id" class="form-control" required>
                        </div> --}}
                        <div class="mb-3">
                            <label>Is_Free</label>
                            <select name="isfree" id="" class="form-select">
                                <option value="0">IsFree</option>
                                <option value="true">true</option>
                                <option value="false">false</option>
                              
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Index</label>
                            <input type="text" name="index" class="form-control" required>
                        </div>
                       
                        <div class="mb-3">
                            <input type="submit" value="Create" class="btn btn-primary w-100">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <script>
    $(document).ready(function(){
      $("#divv").click(function(){
        $("#ac,#bc,#asc,#asd").hide();
      });
      
      $("#sonu").click(function(){
        $("#ac,#bc,#asc,#asd").show();
       
       
      });
    });
    </script>   --}}
@endsection

