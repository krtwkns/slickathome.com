<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
<script src="{{asset('/js/jquery-1.8.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/jquery.mockjax.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/jquery.autocomplete.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/countries.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/demo.js')}}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
