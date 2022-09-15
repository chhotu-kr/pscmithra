<div>


  <div class="col ">
    <label>Type</label>
    <select wire:model="typp" name="typp" class="form-control">
      <option value="">select</option>
      <option value="voice">Voice</option>
      <option value="text">Text</option>
      <option value="quiz">Quiz</option>
      <option value="video">Video</option>
    </select>
  </div>

  {{$typp}}

  @if($typp=="voice")
  <div class="col">
    <label>Url</label>
    <input type="file" accept=".mp3,audio/*" name = "url" class="form-control" >
    
  </div>
  @elseif ($typp=="video")
  <div class="col">
    <label>Url</label>
    <input type="file" accept="video/*" name = "url" class="form-control" >
  </div>
  @elseif ($typp=="quiz")
  <table id="with" class="table datatable">
    <thead>
      <tr>
        <th scope="col">Checkbox</th>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($quiz as $vale)
      <tr>
        <td><input type='checkbox' value='{{$vale->id}}' name='data[]'></td>
        <td>{{$vale->id}}</td>
        <td>{{$vale->CQname}}</td>
      <tr>
        @endforeach
    </tbody>
  </table>


  @endif
</div>
<script>
$(document).ready(function () {

  $('#with').DataTable({
      scrollX:true
  });
});
</script>