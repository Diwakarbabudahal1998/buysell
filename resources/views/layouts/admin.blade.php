@section('css')
<link rel="stylesheet" href="{{asset('theme/style.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">

@stop

@section('js')
<script src="{{asset('js/dropzone.min.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

<!-- <script src="{{asset('js/jquery.selectric.js')}}"></script> -->
<!-- <script>
    $(function() {
  $('select').selectric();
});
    </script> -->
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea.description',
        width: 900,
        height: 300
    });
</script>
<script>



@stop