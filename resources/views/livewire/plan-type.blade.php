<div>
    <div class="col-md-12 position-relative">
        <label for="" class="form-label">Type</label>
        <select wire:model="planType" name="type" id="" class="form-select" required>
            <option value="">Select Type</option>
            <option value="book">Book</option>
            <option value="course">Course</option>
            <option value="pdf">Pdf</option>
            <option value="plan">Plan</option>
            <option value="ebook">Ebook</option>
        </select>
        <div class="valid-tooltip">
            Looks good!
        </div>
    </div>
    {{$type}}
    <div>
        @if(!empty($planType))
        @if($planType == 'plan')
        <livewire:exam/>
        @else
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Select {{$planType}}</h5>
                <div class="table-responsive" style="white-space: nowrap;">

                    <!-- Table with stripped rows -->
                    <table id="with" class="datatable table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($list as $value)
                            <tr>
                                <td><input type='checkbox' value='{{$value->id}}' name='data'></td>
                                <td>{{$value->id}}</td>
                                <td>{{$value->bookname}}</td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
              <script>
                      $(document).ready(function () {
  $('#withNot').DataTable({
      scrollX:false
  });
  $('#with').DataTable({
      scrollX:true
  });
});
              </script>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>







        @endif
        @endif

    </div>
</div>