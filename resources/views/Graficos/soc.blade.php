<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href={{asset("vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href={{asset("vendor/metisMenu/metisMenu.min.css")}} rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href={{asset("vendor/morrisjs/morris.css")}} rel="stylesheet">

    <!-- Custom Fonts -->
    <link href={{asset("vendor/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- MetisMenu CSS
    <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.3/metisMenu.css" rel="stylesheet">
    -->
    <!-- Custom CSS -->
    <link href={{asset("css/sb-admin-2.min.css")}} rel="stylesheet">

    <!-- Morris Charts CSS
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Custom Fonts
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 -->
    <script src={{asset("vendor/jquery/jquery.min.js")}}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{asset("vendor/bootstrap/js/bootstrap.min.js")}}></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src={{asset("vendor/metisMenu/metisMenu.min.js")}}></script>

    <!-- Morris Charts JavaScript -->
    <script src={{asset("vendor/raphael/raphael.min.js")}}></script>
    <script src={{asset("vendor/morrisjs/morris.min.js")}}></script>

    <!-- Custom Theme JavaScript -->
    <script src={{asset("js/sb-admin-2.min.js")}}></script>

    <!-- graph stylesheet -->
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
</head>


<body>

<div id="wrapper">
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            <a class="navbar-brand" href="{{url('graph')}}">Proyecto</a>
        </div>
        <ul class="navbar-nav navbar-top-links navbar-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('user/create') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{url('graph')}}><i class="fa fa-dashboard fa-fw"></i> Grafico</a>
                        <a href={{url('persona/'.Auth::user()->persona->id)}}><i class="fa fa-suitcase fa-fw"></i> Configuracion de perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>

    <div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Grafico</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
    <style>
        .legendbox {
            width: 100%;
            height: 100%;
            margin-left: 15%;
            border: 3px solid #ffffff;
        }
        /* Create columns for sections the summation must be 100% */
        .columnGraph {
            float: left;
            width: 50%;
            padding: 5px;
            /*height: 50px; /* Should be removed. Only for demonstration */
        }
        .columnLegend{
            float: left;
            width: 25%;
            padding: 5px;
        }
        .columnFilters{
            float: left;
            width: 23%;
            margin-left: 2%;
            padding: 5px;
        }
        /*this is the column for color box the legend*/
        .columnShort{
            float: left;
            width: 20%;
            /*padding: 5px;*/
        }
        /*this is the normal column for text of legend*/
        .column{
            float: left;
            width: 80%;
            /*padding: 5px;*/
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            height: 0px;
            /*width: 50px;*/
            display: table;
            clear: both;
        }
    </style>
    <style>
        .dropbtn {
            background-color: #e1e1e1;
            color: #000000;
            padding: 16px;
            font-size: 16px;
            width: 300px;
            border: none;
            cursor: pointer;
            border-style: solid;
            border-color: #000000;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #57bfff;
        }

        #myInput {
            border-box: box-sizing;
            /*background-image:  url("searchicon.png") ;*/
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        #myInput:focus {outline: 3px solid #ddd;}

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            /*position: absolute;*/
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {display: block;}
    </style>
    <body>
    <!-- Meta Needed to force IE out of Quirks mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--StyleSheets-->

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
                    main_data_key: main_data_key
                },
                success: function (data) {
                    dataArr = data;
                    console.log(data);
                    $('.motionchart').motionchart('destroy');

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
                                        createbox(x[key].getAttribute("style"),y[key].__data__.nombre_cargo);
                                    });
                                    break;
                                case "nombre_area":
                                    Object.keys(x).forEach(function (key) {
                                        createbox(x[key].getAttribute("style"),y[key].__data__.nombre_area);
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

    <style>
        * {
            box-sizing: border-box;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            border: 1px solid #ddd;
            margin-top: -1px; /* Prevent double borders */
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 14px;
            color: black;
            display: block;
            position: relative;
            width: 300px;
        }

        .closef {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 0%;
            padding: 12px 16px;
            transform: translate(0%, -50%);
        }

        .closef:hover {background: #bbb;}
    </style>


    <div id="content" align="center">
        Categoria
        <select id="main_data_select" >
            <option value="nombre_carrera" >Carrera</option>
            <option value="universidad_carrera">Universidad</option>
            <option value="nombre_tipo_empresa">Tipo Empresa</option>
            <option value="nombre_rubro">Rubro</option>
            <option value="postgrado_nombre">Tipo de postgrado</option>
            <option selected value="nombre_cargo">Nivel de cargo</option>
            <option value="nombre_area">Area</option>
        </select>
        <button onclick="change_data()">Seleccionar</button>

        <div class="row">
            <div class="columnFilters">
                <div class="row" id="fil">
                    <?php $vista=\App\DataView::all();
                    $carrera = $vista->groupBy('nombre_carrera')->keys();
                    $i=0;
                    ?>
                    <div class="row" id="selectedFilters">
                        <ul id="activeFilter">

                        </ul>
                    </div>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown')" class="dropbtn">Carrera</button>
                            <div id="myDropdown" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction('myInput','myDropdown')">
                                @foreach($carrera as $c)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$c}}" name="nombre_carrera" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$c}}</p>
                                        </div>
                                        <?php $i++?>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>


                    <?php $universidad = $vista->groupBy('universidad_carrera')->keys();?>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown2')" class="dropbtn">Universidad</button>
                            <div id="myDropdown2" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput2" onkeyup="filterFunction('myInput2','myDropdown2')">
                                @foreach($universidad as $u)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$u}}" name="universidad_carrera" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$u}}</p>
                                        </div>
                                        <?php $i++?>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>



                    <?php $postgrado = $vista->groupBy('postgrado_nombre')->keys();?>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown3')" class="dropbtn">Postgrado</button>
                            <div id="myDropdown3" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput3" onkeyup="filterFunction('myInput3','myDropdown3')">
                                @foreach($postgrado as $p)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$p}}"  name="postgrado_nombre" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$p}}</p>
                                        </div>
                                        <?php $i++?>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>

                    <?php $rubro = $vista->groupBy('nombre_rubro')->keys();?>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown4')" class="dropbtn">Rubro</button>
                            <div id="myDropdown4" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput4" onkeyup="filterFunction('myInput4','myDropdown4')">
                                @foreach($rubro as $r)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$r}}" name="nombre_rubro" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$r}}</p>
                                        </div>
                                        <?php $i++?>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>


                    <?php $tipoEmp = $vista->groupBy('nombre_tipo_empresa')->keys();
                    ?>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown5')" class="dropbtn">Tipo de empresa</button>
                            <div id="myDropdown5" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput5" onkeyup="filterFunction('myInput5','myDropdown5')">
                                @foreach($tipoEmp as $t)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$t}}" name="nombre_tipo_empresa" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$t}}</p>
                                        </div>
                                        <?php $i++?>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        <br>

                    <?php $cargo = $vista->groupBy('nombre_cargo')->keys();?>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown6')" class="dropbtn">Cargo</button>
                            <div id="myDropdown6" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput6" onkeyup="filterFunction('myInput6','myDropdown6')">
                                @foreach($cargo as $ca)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$ca}}" name="nombre_cargo" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$ca}}</p>
                                        </div>
                                        <?php $i++?>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        <br>


                    <?php $area = $vista->groupBy('nombre_area')->keys();?>

                    <div class="row">
                        <div class="dropdown">
                            <button onclick="myFunction('myDropdown7')" class="dropbtn">Area</button>
                            <div id="myDropdown7" class="dropdown-content">
                                <input type="text" placeholder="Search.." id="myInput7" onkeyup="filterFunction('myInput7','myDropdown7')">
                                @foreach($area as $a)
                                    <a>
                                        <div class="columnShort">
                                            <input type="checkbox" id="fil-{{$i}}" value="{{$a}}" name="nombre_area" onchange="setFilter()">
                                        </div>
                                        <div class="column">
                                            <p ALIGN="LEFT">{{$a}}</p>
                                        </div>
                                    </a>
                                    <?php $i++?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        <br>

                </div>
            </div>



            <script>
                function myFunction($drop) {
                    document.getElementById($drop).classList.toggle("show");
                }

                function filterFunction($myinput,$mydropdown) {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById($myinput);
                    filter = input.value.toUpperCase();
                    div = document.getElementById($mydropdown);

                    a = div.getElementsByTagName("a");
                    for (i = 0; i < a.length; i++) {
                        txtValue = a[i].textContent || a[i].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            a[i].style.display = "";
                        } else {
                            a[i].style.display = "none";
                        }
                    }
                }
            </script>


            <div class="columnGraph">
                <div id="graph" class="motionchart" style="width:800px; height:600px;"></div>
            </div>
            <div class="columnLegend">
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
            var closebtns = document.getElementsByClassName("closef");
            var $filtersArr;

            function setFilter() {

                $filtersArr=[];
                var i;
                var cant="<?php echo $i?>";
                debugger;
                clearFilter();

                var miniarray=[];
                for (i = 0; i < cant; i++) {
                    var aux=i+1;
                    if(aux!=cant){
                        if(document.getElementById("fil-"+i).getAttribute("name")==document.getElementById("fil-"+aux).getAttribute("name")){
                            if ($("#fil-"+i).is(':checked')) {
                                miniarray.push(document.getElementById("fil-"+i).value);
                                createFilter(document.getElementById("fil-"+i).value,"fil-"+i);
                            }
                        }else{
                            if ($("#fil-"+i).is(':checked')) {
                                miniarray.push(document.getElementById("fil-"+i).value);
                                createFilter(document.getElementById("fil-"+i).value,"fil-"+i);
                            }
                            if(miniarray.length != 0){
                                $filtersArr.push([document.getElementById("fil-"+i).getAttribute("name"),miniarray]);
                            }
                            miniarray=[];
                        }
                    }else{
                        if ($("#fil-"+i).is(':checked')) {
                            miniarray.push(document.getElementById("fil-"+i).value);
                            createFilter(document.getElementById("fil-"+i).value,"fil-"+i);
                        }
                        if(miniarray.length != 0){
                            $filtersArr.push([document.getElementById("fil-"+i).getAttribute("name"),miniarray]);
                        }
                        miniarray=[];
                    }

                }
                debugger;
                closer();
                filter();

            }


            function filter() {
                var main_data_key =$('#main_data_select').val();
                //debugger;
                $.ajax({
                    type: 'POST',
                    url: "{{url('/graph/json')}}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        main_data_key: main_data_key,
                        filters: $filtersArr
                    },
                    success: function (data) {
                        dataArr = data;
                        console.log(data);
                        $('.motionchart').motionchart('destroy');

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


                        $( document ).ready(function() {
                            //debugger;
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
                                            createbox(x[key].getAttribute("style"),y[key].__data__.nombre_cargo);
                                        });
                                        break;
                                    case "nombre_area":
                                        Object.keys(x).forEach(function (key) {
                                            createbox(x[key].getAttribute("style"),y[key].__data__.nombre_area);
                                        });
                                        break;
                                }

                            },3000);
                        });

                    }
                });

            };
        </script>

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
                    var k=0;
                    Object.keys(x).forEach(function (key) {
                            createbox(x[key].getAttribute("style"),y[key].__data__.nombre_cargo);
                            k++;
                    });
                    //clearBox();
                },3000);
            });

            function closer() {
                var closebtns = document.getElementsByClassName("closef");
                var f;

                for (f = 0; f < closebtns.length; f++) {
                    closebtns[f].addEventListener("click", function() {
                        this.parentElement.style.display = 'none';
                    });
                }
            }

            function clearFilter() {
                var i;
                for (i = 0; i < closebtns.length; i++) {
                    closebtns[i].parentElement.style.display = 'none';
                }
            }

            function removeFilter($id){
                debugger;
                document.getElementById($id).checked = false;
                setFilter();
            }

            function clearBox() {
                var i;
                //debugger;
                for (i = 0; i < clearcant; i++) {
                    $("#rec").remove();
                }
            };

            function createbox($rgb,$name) {
                $("#legendboxes").append("<div class=\"row\" id=\"rec\">\n" +
                    "                    <div class=\"columnShort\">\n" +
                    "                        <svg width=\"30\" height=\"15\">\n" +
                    "                            <rect width=\"30\" height=\"15\" style=\""+$rgb+"stroke-width:3;stroke:rgb(0,0,0)\"/>\n" +
                    "                        </svg>\n" +
                    "                    </div>\n" +
                    "                    <div class=\"column\">\n" +
                    "                        <p ALIGN=\"LEFT\">"+$name+"</p>\n" +
                    "                    </div>\n" +
                    "                </div>");
            };

            function createFilter($name,$id) {
                $("#activeFilter").append("<li>"+$name+"<span class=\"closef\" value=\""+$id+"\" onclick=\"removeFilter($(this).attr('value'))\">&times;</span></li>");
            };


        </script>

    </div>



    </body>
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->



</body>

</html>