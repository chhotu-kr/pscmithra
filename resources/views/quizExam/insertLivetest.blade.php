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
          <div class="card-header text-warning text-theme ps-2 shadow h5">Insert Live Test</div>
          <div class="card-body">
            <form action="{{route('livetest.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="">Exam_name</label>
                <input type="text" name="exam_name" class="form-control" required>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="mb-3">
                    <label for="">RightMarks</label>
                    <input type="number" name="rightmarks" class="form-control" required>
                  </div>
                </div>
                <div class="col-4">
                  <div class="mb-3">
                    <label for="">WrongMarks</label>
                    <input type="number" name="wrongmarks" class="form-control" required>
                  </div>
                </div>
                <div class="col-4">
                  <div class="mb-3">
                    <label for="">Marks</label>
                    <input type="number" name="marks" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col">
                  <div class="mb-3">
                    <label for="">Test Start Date </label>
                    <!-- //  <input type="number" name="time_duration" class="form-control" required> -->

                    <input class="date form-control" type="date" name="sdate">

                  </div>
                </div>


                <div class="col">
                  <div class="mb-3">
                    <label for="">Test Start Time</label>
                    <!-- //  <input type="number" name="time_duration" class="form-control" required> -->

                    <input class="date form-control" type="time" name="stime">

                  </div>
                </div>

              </div>



              <div class="row">

                <div class="col">
                  <div class="mb-3">
                    <label for="">Test End Date </label>
                    <!-- //  <input type="number" name="time_duration" class="form-control" required> -->

                    <input class="date form-control" type="date" name="edate">

                  </div>
                </div>


                <div class="col">
                  <div class="mb-3">
                    <label for="">Test End Time</label>
                    <!-- //  <input type="number" name="time_duration" class="form-control" required> -->

                    <input class="date form-control" type="time" name="etime">

                  </div>
                </div>

              </div>



              <div class="row">


                <div class="col">
                  <div class="mb-3">
                    <label for="">No Of Question</label>
                    <input type="number" name="noquizques" class="form-control" required>
                  </div>
                </div>
                <div class=" col">
                  <label for="">Select Language</label>
                  <div class="col input-group" required>



                    <select name="lang" class="ss" id="assaa" placeholder="Select Language" multiple>
                      @foreach($lang as $value){
                      <option value="{{$value->id}}">{{$value->languagename}}</option>
                      }
                      @endforeach
                    </select>
                  </div>
                </div>

              </div>

              <div class="m-3 row">
                <div class="form-check form-switch col-sm-auto">
                  <input class="form-check-input" type="checkbox" id="isFree" value="false" name="isFree">
                  <label class="form-check-label" for="checkbox1">Is Free</label>
                </div>



              </div>
          </div>

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
<script type="text/javascript">
  $('.date').datepicker({

    format: 'mm-dd-yyyy'

  });
</script>
@endsection