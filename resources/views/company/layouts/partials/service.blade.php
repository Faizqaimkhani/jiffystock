@section('service_css')
<style>
.ck-editor__editable_inline {
    min-height: 400px;
}
#output {
  max-width: 100px;
  max-height: 100px;
}
.upload-btn-wrapper {
  position: relative;
  top: 10px;
  overflow: hidden;
  display: inline-block;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
@endsection


@section('ckEditor')
<script defer>
const editor = ClassicEditor.create( document.querySelector( '#html_data' ) )
  .then( editor => {
      console.log( editor );
  } )
  .catch( error => {
      console.error( error );
  } );
  editor.resize( '100%', '350', true )


</script>
@endsection
<script type="text/javascript">
var loadFile = function(event) {
   var output = document.getElementById('output');
   output.src = URL.createObjectURL(event.target.files[0]);
   output.onload = function() {
     URL.revokeObjectURL(output.src) // free memory
   }
 };
</script>
