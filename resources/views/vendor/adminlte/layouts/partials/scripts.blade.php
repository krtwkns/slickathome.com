<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->

<!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  -->
<!-- <script src="{{asset('/js/jquery.mockjax.js')}}" type="text/javascript"></script> -->
<!-- <script src="{{asset('/js/countries.js')}}" type="text/javascript"></script> -->
<!-- <script src="{{asset('/js/demo.js')}}" type="text/javascript"></script> -->
<script src="{{asset('/js/app.js') }}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

