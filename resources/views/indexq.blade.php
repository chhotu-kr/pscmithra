@extends('admin.base')
@section('content')
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
          <input type="hidden" name="_token" id="file-1" value="{{csrf_token()}}">
          <div class="form-control">
            <input type="file" name="bannerimage" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
          </div>
        </div>
    </div>
</div>
<script>
    $('#file-1').fileinput({
        theme:'fa',
        uploadUrl:"/image-submit",
        uploadExtraData:function(){
            return{
                _token:$("input[name='_token']").val()
            };
        },
        allowedFileExtensions:['jpg','png','gif'],
        overwriteInitial:false,
        maxFileSize:2000,
        maxFileNum:8,
        slugCallback:function(filename){
           return filename.replace('(','_').replace(']','_');
        }
    });
</script>
@endsection