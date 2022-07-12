@extends('admin/base')
@section('content')
<div class="container" style="margin-top: 10%">
    <form action="{{route('submit.check')}}" method="post">
        @csrf
        <th><input class="" name="exam" value="1" ></th>
        <table>
            <tr>
            <th> check</th>
                <th>name</th>
                <th>exam</th>
                <th>question</th>
            </tr>
            <tr>
               
                <th><input type="checkbox" class="" name="az[]" value="1"></th>
                <td>mock</td>
                <td>test</td>
                <td>this is mango</td>
            </tr>

            <tr>
               
                <th><input type="checkbox" class="" name="az[]" value="2"></th>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
              </tr>
              <tr>
               
                <th><input type="checkbox" class="" name="az[]" value="3"></th>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
              </tr>
        </table>
        <input type="submit">
        </form>
        
</div>
    
@endsection