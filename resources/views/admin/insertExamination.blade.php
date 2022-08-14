@extends('admin.base')
@section('content')
<main id="main" class="main">
  <div class="container">
    <div class="row">
      <div class="col-3">
        @include('admin.side')
      </div>
      <h6 class="text-theme h4 ps-2 text-danger">Add Examination</h6>
      <div class="col-12">
        <div class="card">
          <div class="card-header text-warning text-theme ps-2 shadow h5">Insert Examination Type</div>
          <div class="card-body">
            <form action="{{route('examination.store')}}" method="POST">
              @csrf
              <livewire:category.categories />

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="">Exam Name</label>
                    <input type="text" name="exam_name" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col">

                    <div class="mb-3">
                      <label for="">Right Marks</label>
                      <input type="number" step="any" name="rmarks" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg col">
                    <div class="mb-3">
                      <label for="">Wrong Marks</label>
                      <input type="number" step="any" name="wmarks" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg col">

                    <div class="mb-3">
                      <label for="">Marks</label>
                      <input type="number" step="any" name="marks" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class=" col">
                    <div class="mb-3">
                      <label for="">Number Of Question</label>
                      <input type="number" name="noQuestion" class="form-control" required>
                    </div>
                  </div>
                  <div class=" col">
                    <div class="mb-3">
                      <label for="">Time Duration(In Mints)</label>
                      <input type="number" name="time_duration" class="form-control" required>
                    </div>
                  </div>

                  <div class=" col">
                    <label for="">Select Language</label>
                    <div class = "col input-group"  required>



                      <select name="lang" class="ss"   id= "assaa"
                       placeholder="Select Language" multiple>
                        @foreach($lang as $value){
                        <option  value="{{$value->id}}">{{$value->languagename}}</option>
                        }
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>

               <div class="m-3 row">
                  <div class="form-check form-switch col-sm-auto">
                      <input class="form-check-input" type="checkbox" id="isFree" value="false" name="isfree" >
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
                <!-- <div
                       class="row">
                      


                       @if($lang->count() != 0)
                       <div class="form-check col">
                          <input class="form-check-input form-control" type="checkbox" id="langauge"  name="langauge[]" disabled required>
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div> 
@else
    <p>This is shown if its not 0</p>
@endif
</div> -->
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