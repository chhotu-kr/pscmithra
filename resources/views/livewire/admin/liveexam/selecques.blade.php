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
    <select wire:model="topicId"  name="topic_id" id="ikkkkk"   class="form-control mt-3" required>
     <option value="">select</option>
        @foreach ($topics as $item)
            <option value="{{$item->id}}">{{$item->topic_name}}</option>
        @endforeach
    </select>
    </div></div>


 <div class="table-responsive" style="white-space: nowrap;">
                    <!-- Table with stripped rows -->
                    <table id="with"  class = "datatable table" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Checkbox</th>
                  <th scope="col">Id</th>
                 
                  <th scope="col">Name</th>
                  <th scope="col"> Language</th>
                 
                  
                </tr>
              </thead>
              <tbody  id="tablebody">
              @if(!empty($questions))
              @foreach($questions as $item)


              <tr>
              <td><input type='checkbox' value='{{$item->id}}' name='data[]'></td>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
@foreach($item->secondquestion as $value)
{{
    $value->language->languagename ." , "
}}
@endforeach
</td>
              </tr>
              @endforeach
              @endif
                  </tbody>
            </table>
</div>

<!-- <script>
$(document).ready(function () {
  
  $('#with').DataTable({
      scrollX:true
  });
});


</script> -->


</div>

