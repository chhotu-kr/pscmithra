<html>
    <head>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    </head>
    <body>
    <button type="button" onclick="BrowseServer('image');">Pick Image</button>
<input type="text" id="image"/>
 <script type="text/javascript">
  // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
 // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
 var urlobj;

 function BrowseServer(obj)
 {
      urlobj = obj;
      OpenServerBrowser(
      '/laravel-filemanager?type=Images&CKEditor=description&CKEditorFuncNum=1&langCode=en',
      screen.width * 0.7,
      screen.height * 0.7 ) ;
 }

 function OpenServerBrowser( url, width, height )
 {
      var iLeft = (screen.width - width) / 2 ;
      var iTop = (screen.height - height) / 2 ;
      var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
      sOptions += ",width=" + width ;
      sOptions += ",height=" + height ;
      sOptions += ",left=" + iLeft ;
      sOptions += ",top=" + iTop ;
      var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
 }

 function SetUrl( url, width, height, alt )
 {
      document.getElementById(urlobj).value = url ;
      oWindow = null;
 }
 </script>
    </body>
</html>