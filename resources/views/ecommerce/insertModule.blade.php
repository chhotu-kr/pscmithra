@extends('admin.base')
@section('content')
@include('admin.side')
<main id="main" class="main">
    <div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header ps-2 h4">Insert Module</div>
            <div class="card-body">
                <form action="{{ route('module.store') }}" class="row g-3" method="POST" enctype="multipart/form-data" novalidate>

                    @csrf
                    <input type="number" name="course_id" hidden value = "{{$id}}">
                    <div class="row">
                        <div class="col ">
                            <label for="validationTooltip01">Index</label>
                            <input type="number" name="index" class="form-control" id="validationTooltip01">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col">
                            <label for="validationTooltip02">Module Name</label>
                            <input type="text"  class="form-control" id="validationTooltip02" name="name">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="col">
                            <label for="validationTooltip055">Module Time(in Mints)</label>
                            <input type="number"  class="form-control" id="validationTooltip055" name="time">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                       
                        <div class="form-check form-switch col  ">
                            <input class="form-check-input" type="checkbox" id="isFree" value="false" name="isfree">
                            <label class="form-check-label" for="checkbox1">Is Free</label>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

    @livewire('admin.course.coursetype')
    <div class=" col  ">
                        <label for="validationTooltip05" class="form-label">Description</label>
                        <textarea class="editor" id="validationTooltip05" name="description" class="form-control" required></textarea>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    


                    <button type="submit" class="btn btn-primary w-100" > Create</button>
    </form>

</div>
</div>
</div>

    </div>
</main>
<script>
    $("#isFree").on('change', function() {
        if ($(this).is(':checked')) {
            $(this).attr('value', 'true');
        } else {
            $(this).attr('value', 'false');
        }

    });

    VirtualSelect.init({
        ele: '.ss',
        search: false,
        required: true
    });
    document.querySelector('#assaa').validate();
</script>
@endsection

