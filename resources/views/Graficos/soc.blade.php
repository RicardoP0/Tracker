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
        dataArr.unshift(["index","nombre_nivel_cargo","nivel_cargo","fecha_inicio","sueldo","area","avg_nivel_cargo"]) ;
        var data = [["index","fruit","time","sales","price","temperature","location"], [0,"Apples",570672000000,1000,300,44,"East"],[1,"Oranges",567993600000,1150,200,42,"West"],[2,"Bananas",581126400000,300,250,35,"West"],[3,"Apples",612662400000,1200,400,48,"East"],[4,"Oranges",612662400000,750,150,47,"West"],[5,"Bananas",612662400000,788,617,45,"West"]];

    </script>
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
                mappings: {key: 3, x: 3, y: 6,
                    size: 6,  color: 2, category: 1 },
                scalings: { x: 'linear', y: 'linear' },
                colorPalette: {"Blue-Red": {from: "rgb(0,0,255)", to: "rgb(255,0,0)"}},
                color: "Red-Blue",
                play: true,
                loop: false
            });
        </script>
    </div>
    </body>
@endsection