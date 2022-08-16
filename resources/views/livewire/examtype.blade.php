<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="col-md-12 position-relative">
        <label for="" class="form-label">Type</label>
        <select wire:model="examType" name="type" id="" class="form-select" required>
            <option value="">Select Type</option>
            <option value="live">Live</option>
            <option value="not">Not</option>
            
        </select>
        <div class="valid-tooltip">
            Looks good!
        </div>
    </div>
    {{-- {{$type}} --}}

    <div>
        @if(!empty($examType))
        @if($examType == 'live')
        {{-- <livewire:exam/> --}}
        {{-- @else --}}
        
                <h5 class="card-title">Select {{$examType}}</h5>
                <div class="table-responsive" style="white-space: nowrap;">

                    <!-- Table with stripped rows -->
                    <table class="datatable table" id ="exampl" style="width:100%">
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
                                <td>{{$value->exam_name}}</td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
          
                    <!-- End Table with stripped rows -->
                
        </div>


        
        <script>
    $(document).ready(function() {
    $('#exampl').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

        @endif
      
        @endif

    </div>
</div>
