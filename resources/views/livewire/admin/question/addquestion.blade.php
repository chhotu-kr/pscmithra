<div>
    @foreach ($data as $index => $dataa)

<div class="row">
<div class="col-lg-2 position-relative"><label for="addbutton" class="form-label card-title">Language_id</label> 
        <select class="form-select" name="data[{{$index}}][lang]" wire:model="data.{{$index}}.lang" id ="lang{{$index}}"required>
            <option selected value="">Select Language</option>
            @foreach ($lang as $item)
            <option value="{{$item->id}}">{{$item->languagename}}</option>
            @endforeach

        </select>
    </div>
    <div class="col-lg col bottom "style="align-self: end;">
        <a wire:click="removeProduct({{$index}})" class="btn  btn-danger">Remove Question</a>
    </div>
</div>

    



  
    <div>
        <div wire:ignore>
            <h6 class="card-title">Question</h6>
            <textarea class="question" id="question{{$index}}" name="data[{{$index}}][question]" class="form-control" wire:model="data.{{$index}}.question"></textarea>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div wire:ignore class="col">
            <h6 class="card-title">Option 1</h6>
            <textarea class="opt" id="opt1{{$index}}" name="data[{{$index}}][opt1]" class="form-control" wire:model="data.{{$index}}.opt1"></textarea>
        </div>
        <div wire:ignore class="col">
            <h6 class="card-title">Option 2</h6>
            <textarea class="opt" id="opt2{{$index}}" name="data[{{$index}}][opt2]" class="form-control" wire:model="data.{{$index}}.opt2"></textarea>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div wire:ignore class="col">
            <h6 class="card-title">Option 3</h6>
            <textarea class="opt" id="opt3{{$index}}" name="data[{{$index}}][opt3]" class="form-control" wire:model="data.{{$index}}.opt3"></textarea>
        </div>
        <div wire:ignore class="col">
            <h6 class="card-title">Option 4</h6>
            <textarea class="opt" id="opt4{{$index}}" name="data[{{$index}}][opt4]" class="form-control" wire:model="data.{{$index}}.opt4"></textarea>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div wire:ignore class="col">
            <h6 class="card-title">Explanation</h6>
            <textarea class="opt" id="explain{{$index}}" name="data[{{$index}}][exp]" class="form-control" wire:model="data.{{$index}}.exp"></textarea>
        </div>
        <div wire:ignore class="col">
            <h6 class="card-title">Direction</h6>
            <textarea class="opt" id="direction{{$index}}" name="data[{{$index}}][dir]" class="form-control" wire:model="data.{{$index}}.dir"></textarea>
        </div>
    </div>


    @if($index==0)
    <script>
        tinymce.remove();
    </script>
    @endif


    <script>
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.question',
    relative_urls: false,
    min_height: 600,
    importcss_append: true,

    
    external_plugins: { tiny_mce_wiris: 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js' },
    
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough |tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry| fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',

    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };
  var editor_config_opt = {
    path_absolute : "/",
    selector: 'textarea.opt',
    relative_urls: false,
    min_height: 400,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };
  tinymce.init(editor_config);
  tinymce.init(editor_config_opt);
</script>
    @endforeach
    <a wire:click="add" class=" btn btn-primary">Add Question</a>
</div>