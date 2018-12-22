@extends('layouts.master')
@section('title')
    Grafico
@endsection
@section('content')
    <body>
    <!-- Meta Needed to force IE out of Quirks mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--StyleSheets-->
    <link href={{asset("vendor/MotionChart/css/bootstrap/bootstrap.min.css")}} rel="stylesheet">
    <link href="http://socr.ucla.edu/htmls/HTML5/MotionChart/css/jquery-ui-1.8.20.custom.css" rel="stylesheet">
    <link href={{asset("vendor/MotionChart/css/jquery.handsontable.css")}} rel="stylesheet">
    <link href={{asset("vendor/MotionChart/css/jquery.motionchart.css")}} rel="stylesheet">
    <link href={{asset("vendor/MotionChart/css/jquery.contextMenu.css")}} rel="stylesheet">
    <!--Scripts-->
    <script src={{asset("vendor/MotionChart/js/jquery-1.7.2.min.js")}}></script>
    <script src={{asset("vendor/MotionChart/js/dependencies.min.js")}}></script>
    <script src={{asset("vendor/MotionChart/js/custom-bootstrap.js")}}></script>
    <script src={{asset("vendor/MotionChart/js/jquery.handsontable.js")}}></script>
    <script src={{asset("vendor/MotionChart/js/jquery.motionchart.js")}}></script>
    <script>
        var dataArr = @json($dataArr) ;

        function change_data() {
            var main_data_key =$('#main_data_select').val();
            tempAlert("Cargando datos",5000);
            $.ajax({
                type: 'POST',
                url: "{{url('/graph/json')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    main_data_key: main_data_key,
                },
                success: function (data) {

                    $('.motionchart').motionchart('destroy');

                    $('.motionchart').motionchart({
                        title: "Motion Chart",
                        'data': data,
                        mappings: {key: 0, x: 4, y: 2,
                            size: 3,  color: 1, category: 1 },
                        scalings: { x: 'linear', y: 'linear' },
                        colorPalette: {"Blue-Red": {from: "rgb(100,150,255)", to: "rgb(200,255,100)"}},
                        color: "Blue-Red",
                        play: true,
                        loop: true
                    });

                }
            });

        }

        function tempAlert(msg,duration)
        {
            var el = document.createElement("div");
            el.setAttribute("style","position:absolute;top:50%;left:55%;background-color:white;");
            el.innerHTML = msg;
            setTimeout(function(){
                el.parentNode.removeChild(el);
            },duration);
            document.body.appendChild(el);
        }
    </script>
    {{--<div class="container">--}}
        {{--<div class="panel panel-info">--}}
            {{--<div class="panel-heading">--}}
                {{--<div class="panel-title">Dato principal</div>--}}
            {{--</div>--}}
            {{--<div class="panel-body" >--}}
            {{--<select id="main_data_select" >--}}
                {{--<option value="nombre_carrera" >Carrera</option>--}}
                {{--<option value="universidad_carrera">Universidad</option>--}}
                {{--<option value="nombre_tipo_empresa">Tipo Empresa</option>--}}
                {{--<option value="nombre_rubro">Rubro</option>--}}
                {{--<option value="postgrado_nombre">Tipo de postgrado</option>--}}
                {{--<option value="nombre_cargo">Nivel de cargo</option>--}}
                {{--<option value="nombre_area">Area</option>--}}
            {{--</select>--}}
            {{--<select id="color_data_select">--}}
                {{--<option value="nombre_carrera">Carrera</option>--}}
                {{--<option value="universidad_carrera">Universidad</option>--}}
                {{--<option value="nombre_tipo_empresa">Tipo Empresa</option>--}}
                {{--<option value="nombre_rubro">Rubro</option>--}}
                {{--<option value="postgrado_nombre">Tipo de postgrado</option>--}}
                {{--<option value="nombre_cargo">Nivel de cargo</option>--}}
                {{--<option value="nombre_area">Area</option>--}}
            {{--</select>--}}
                {{--<button onclick="change_data()">Seleccionar</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div id="content" align="center">
        Categoria
        <select id="main_data_select" >
            <option value="nombre_carrera" >Carrera</option>
            <option value="universidad_carrera">Universidad</option>
            <option value="nombre_tipo_empresa">Tipo Empresa</option>
            <option value="nombre_rubro">Rubro</option>
            <option value="postgrado_nombre">Tipo de postgrado</option>
            <option value="nombre_cargo">Nivel de cargo</option>
            <option value="nombre_area">Area</option>
        </select>
        <button onclick="change_data()">Seleccionar</button>
        <div class="motionchart" style="width:800px; height:600px;"></div>
        <script>
            $('.motionchart').motionchart({
                title: "Motion Chart",
                'data': dataArr,
                mappings: {key: 0, x: 4, y: 2,
                    size: 3,  color: 1, category: 1 },
                scalings: { x: 'linear', y: 'linear' },
                colorPalette: {"Blue-Red": {from: "rgb(100,150,255)", to: "rgb(200,255,100)"}},
                color: "Blue-Red",
                play: true,
                loop: true
            });
        </script>
    </div>


    </body>
@endsection