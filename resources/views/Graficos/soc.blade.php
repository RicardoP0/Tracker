@extends('layouts.master')
@section('title')
    Grafico
@endsection
@section('content')
    <style>
        .legendbox {
            width: 200px;
            height: 500px;
            border: 3px solid #ffffff;
            padding: 25px;
            margin: 25px;
        }
        section {
            width: 80%;
            height: 200px;
            margin: 50px;/* original auto*/
            padding: 10px;
        }
        div#graph {
            margin-left: 10%;/*margen del grafico*/
            width: 70%;
            height: 1000px;
            float: left;
        }
        div#legend {
            margin-left: 40%;
            height: 500px;
            background: white;
        }

        * {
            /*box-sizing: border-box;*/
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 5px;
            height: 50px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            height: 30px;
            width: 70px;
            display: table;
            clear: both;
        }
    </style>
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


                    $( document ).ready(function() {
                        setTimeout(function(){
                            clearBox();
                            var option=$('#main_data_select').val();
                            var y = document.getElementsByClassName("node");
                            var x = document.getElementsByClassName("circle");
                            clearcant=x.length;
                            switch (option) {
                                case "nombre_carrera":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.nombre_carrera);
                                    });
                                    break;
                                case "universidad_carrera":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.universidad_carrera);
                                    });
                                    break;
                                case "nombre_tipo_empresa":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.nombre_tipo_empresa);
                                    });
                                    break;
                                case "nombre_rubro":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.nombre_rubro);
                                    });
                                    break;
                                case "postgrado_nombre":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.postgrado_nombre);
                                    });
                                    break;
                                case "nombre_cargo":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.postgrado_nombre);
                                    });
                                    break;
                                case "nombre_area":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.postgrado_nombre);
                                    });
                                    break;
                            }

                        },3000);
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

        <div class="row">
            <div class="column">
                <div id="graph" class="motionchart" style="width:800px; height:600px;"></div>
            </div>
            <div class="column">

                <div id="legend" class="legendbox">
                    <ul id="legendboxes">

                    </ul>
                </div>

            </div>
        </div>


        <!--<div id="graph" class="motionchart" style="width:800px; height:600px;"></div>
        <div id="legend" class="legendbox">
            <ul id="legendboxes">
                <div class="row">
                    <div class="column">
                        <svg width="30" height="15">
                            <rect id="text1" width="30" height="15" style="stroke-width:3;stroke:rgb(0,0,0)"/>
                        </svg>
                    </div>
                    <div class="column">
                        <p>Some text..</p>
                    </div>
                </div>
            </ul>
        </div>-->

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

        <script>
            var clearcant;
            $( document ).ready(function() {
                setTimeout(function(){
                    var y = document.getElementsByClassName("node");
                    var x = document.getElementsByClassName("circle");
                    clearcant=x.length;
                    Object.keys(x).forEach(function (key) {
                            createbox(x[key].getAttribute("style"),y[key].__data__.nombre_cargo);

                    });
                    //clearBox();
                },3000);
            });

            function clearBox() {
                var i;
                for (i = 0; i < clearcant; i++) {
                    $("#rec").remove();
                }
            };

            function createbox($rgb,$name) {
                $("#legendboxes").append("<div class=\"row\" id=\"rec\">\n" +
                    "                    <div class=\"column\">\n" +
                    "                        <svg width=\"30\" height=\"15\">\n" +
                    "                            <rect width=\"30\" height=\"15\" style=\""+$rgb+"stroke-width:3;stroke:rgb(0,0,0)\"/>\n" +
                    "                        </svg>\n" +
                    "                    </div>\n" +
                    "                    <div class=\"column\">\n" +
                    "                        <p>"+$name+"</p>\n" +
                    "                    </div>\n" +
                    "                </div>");
                /**
                 * $("#legendboxes").append("<svg width=\"30\" height=\"15\">\n" +
                 "                <rect id=\"text1\" width=\"30\" height=\"15\" style=\""+$rgb+"stroke-width:3;stroke:rgb(0,0,0)\" />\n" +
                 "            </svg><p style=\"float:right\">"+$name+"</p><br>");

                 <div class="row">
                 <div class="column">
                 <svg width="30" height="15">
                 <rect id="text1" width="30" height="15" style="stroke-width:3;stroke:rgb(0,0,0)"/>
                 </svg>
                 </div>
                 <div class="column">
                 <p>Some text..</p>
                 </div>
                 </div>
                 */
            };


        </script>

    </div>



    </body>
@endsection