<meta charset="utf-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- css -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}" >
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.css') }}" >
<link href="{{asset('css/styles.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/circle.css')}}" />
<link href="{{asset('css/font.css')}}" rel='stylesheet' type="text/css" />
<link href="{{asset('css/awesomplete.css')}}" rel='stylesheet' type="text/css" />

<!-- script -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/lumino.glyphs.js')}}"></script>
<script src="{{asset('js/canvasjs.min.js')}}"></script>
<script src="{{asset('js/jquery.canvasjs.min.js')}}"></script>
<script src="{{asset('js/awesomplete.js')}}"></script>

<script type="text/javascript" src="{{asset('js/modernizr.custom.79639.js')}}"></script>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="dob"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>