<div>
    <div class="row mt-3"><div class="col">
    <label for="" class="">Subject</label>
    <select wire:model="subjectId" id="subject_id" name="subject_id" class=" form-select  mt-3" required>
        <option value="" >select</option>
        @foreach ($subject as $client)
            <option value="{{$client->id}}">{{$client->sub_name}}</option>
        @endforeach
        
    </select>
    </div>
    <div class="col">
    <label for="">Topic</label>
    <select wire:model="topic_id"  name="topic_id" id="ikkkkk"   class="form-control mt-3" required>
     <option value="">select</option>
        @foreach ($topics as $item)
            <option value="{{$item->id}}">{{$item->topic_name}}</option>
        @endforeach
    </select>
    </div></div>

    <div class="table-responsive" style="white-space: nowrap;">

        <!-- Table with stripped rows -->
        <table class="datatable table"  style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">RightAns</th>
                </tr>
            </thead>
            <tbody>

                @foreach($queslist as $value)
                <tr>
                    <td><input type='checkbox' value='{{$value->id}}' name='data' wire:model="questiontype"></td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->rightans}}</td>


                </tr>
                @endforeach

            </tbody>
        </table>

        <!-- End Table with stripped rows -->
    </div>
    {{-- <script>
         $(document).ready(function() {
    $('#exampl').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  }); --}}
    </script>
</div>
