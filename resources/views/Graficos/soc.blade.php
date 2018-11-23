@extends('layouts.master')

@section('content')
    <body>
    <!-- Meta Needed to force IE out of Quirks mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--StyleSheets-->
    <link href="http://socr.ucla.edu/htmls/HTML5/MotionChart/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="http://socr.ucla.edu/htmls/HTML5/MotionChart/css/jquery-ui-1.8.20.custom.css" rel="stylesheet">
    <link href="http://socr.ucla.edu/htmls/HTML5/MotionChart/css/jquery.handsontable.css" rel="stylesheet">
    <link href="http://socr.ucla.edu/htmls/HTML5/MotionChart/css/jquery.motionchart.css" rel="stylesheet">
    <link href="http://socr.ucla.edu/htmls/HTML5/MotionChart/css/jquery.contextMenu.css" rel="stylesheet">
    <!--Scripts-->
    <script src="http://socr.ucla.edu/htmls/HTML5/MotionChart/js/jquery-1.7.2.min.js"></script>
    <script src="http://socr.ucla.edu/htmls/HTML5/MotionChart/js/dependencies.min.js"></script>
    <script src="http://socr.ucla.edu/htmls/HTML5/MotionChart/js/bootstrap.js"></script>
    <script src="http://socr.ucla.edu/htmls/HTML5/MotionChart/js/jquery.handsontable.js"></script>
    <script src="http://socr.ucla.edu/htmls/HTML5/MotionChart/js/jquery.motionchart.js"></script>

    <script>
        var dataArr = @json($dataArr) ;
        console.log(dataArr);
        var data = [["index","fruit","time","sales","price","temperature","location"], [0,"Apples",570672000000,1000,300,44,"East"],[1,"Oranges",567993600000,1150,200,42,"West"],[2,"Bananas",581126400000,300,250,35,"West"],[3,"Apples",612662400000,1200,400,48,"East"],[4,"Oranges",612662400000,750,150,47,"West"],[5,"Bananas",612662400000,788,617,45,"West"]];
        console.log(data);

        function change_data() {
            var data_key =$('#data_select').val();
            $.ajax({
                type: 'POST',
                url: "{{url('/graph/json')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    data_key: data_key
                },
                success: function (data) {

                    switch(data_key){
                        case "area":
                            area_chart(data);
                            break;
                        case "nivel":
                            nivel_chart(data);
                    }

                }
            });

        }
        //dibuja grafico con respecto a area
        function area_chart(data) {
            console.log(data);
            $('.motionchart').motionchart('destroy');

            $('.motionchart').motionchart({
                title: "Motion Chart",
                'data': data,
                mappings: {key: 1, x: 1, y: 2,
                    size: 5,  color: 4, category: 0 },
                scalings: { x: 'linear', y: 'linear' },
                colorPalette: {"Blue-Red": {from: "rgb(100,150,255)", to: "rgb(200,255,100)"}},
                color: "Blue-Red",
                play: true,
                loop: false
            });
        }

        function nivel_chart(data) {
            $('.motionchart').motionchart('destroy');
            $('.motionchart').motionchart({
                title: "Motion Chart",
                'data': dataArr,
                mappings: {key: 2, x: 2, y: 3,
                    size: 5,  color: 4, category: 0 },
                scalings: { x: 'linear', y: 'linear' },
                colorPalette: {"Blue-Red": {from: "rgb(100,150,255)", to: "rgb(200,255,100)"}},
                color: "Blue-Red",
                play: true,
                loop: false
            });
        }
    </script>
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Dato principal</div>
            </div>
            <div class="panel-body" >
            <select id="data_select">
                <option value="nivel">Nivel de cargo</option>
                <option value="area">Area</option>
            </select>
                <button onclick="change_data()">Seleccionar</button>
            </div>
        </div>
    </div>

    <div id="content" align="center">
        <div class="motionchart" style="width:800px; height:600px;"></div>
        <script>

            // $('.motionchart').motionchart({
            //     title: "Motion Chart",
            //     'data': data,
            //     mappings: {key: 2, x: 4, y: 3,
            //         size: 5,  color: 1, category: 6 },
            //     scalings: { x: 'linear', y: 'linear' },
            //     colorPalette: {"Blue-Red": {from: "rgb(0,0,255)", to: "rgb(255,0,0)"}},
            //     color: "Red-Blue",
            //     play: true,
            //     loop: false
            // });
            //

            $('.motionchart').motionchart({
                title: "Motion Chart",
                'data': dataArr,
                mappings: {key: 2, x: 2, y: 3,
                    size: 5,  color: 4, category: 0 },
                scalings: { x: 'linear', y: 'linear' },
                colorPalette: {"Blue-Red": {from: "rgb(100,150,255)", to: "rgb(200,255,100)"}},
                color: "Blue-Red",
                play: true,
                loop: false
            });
        </script>
    </div>

    </body>
@endsection