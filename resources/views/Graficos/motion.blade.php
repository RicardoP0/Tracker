@extends('layouts.master')

@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages:["motionchart"]});
        google.charts.setOnLoadCallback(drawChart);
        var chartData;
        var motChart;
        var personas = {!! $personas !!};
        var empresas = {!! $empresas !!};
        var areas = {!! $areas !!};
        var cargos = {!! $cargos !!};

        function drawChart() {
            window.chartData = new google.visualization.DataTable();
            window.chartData.addColumn('string', 'Fruit');
            window.chartData.addColumn('date', 'Date');
            window.chartData.addColumn('number', 'Sales');
            window.chartData.addColumn('number', 'Expenses');
            window.chartData.addColumn('string', 'Location');
            window.chartData.addRows([
                ['Apples',  new Date (1988,0,1), 1000, 300, 'East'],
                ['Oranges', new Date (1988,0,1), 1150, 200, 'West'],
                ['Bananas', new Date (1988,0,1), 300,  250, 'West'],
                ['Apples',  new Date (1988,6,1), 1200, 400, 'East'],
                ['Oranges', new Date (1989,6,1), 750,  150, 'West'],
                ['Bananas', new Date (1989,6,1), 788,  617, 'East'],

            ]);

            window.motChart = new google.visualization.MotionChart(document.getElementById('chart_div'));

            window.motChart.draw(window.chartData, {width: 600, height:300});
        }
        function drawChart3() {
            var personData = new google.visualization.DataTable();
            personData.addColumn('string', 'Areas');
            personData.addColumn('date', 'Date');
            personData.addColumn('number', 'Sueldo');
            personData.addColumn('string', 'Location');
            var rows = [];
            for(var i=0;i<window.cargos.length;++i) {
                for (var j = 0; j < window.areas.length; ++j) {
                    if (window.cargos[i].area_id == window.areas[j].id) {
                        rows.push([window.areas[j].nombre,
                            new Date(window.cargos[i].fecha_inicio),
                            window.cargos[i].sueldo, "Testx"]);
                        rows.push([window.areas[j].nombre,
                            new Date(window.cargos[i].fecha_termino),
                            window.cargos[i].sueldo, "Testy"]);
                    }

                }
            }
            personData.addRows(rows);
            window.motChart.draw(personData);
        }

        function graphCol(){
            var main_col = $('#main-col').val();
            var selected = [];
            checkVal(main_col,selected);
            $('#col-checkboxes input:checked').each(function() {
                checkVal($(this).attr('name'),selected);
            });

            var chartData = new google.visualization.DataTable();
            for(var i=0;i<selected.length;++i){
                chartData.addColumns(selected[i][0],selected[i][1]);
            }


        }
        function checkVal(val,arr){
            switch (val) {
                case "persona":
                    arr.push(['string','Persona']);
                    break;
                case "area":
                    arr.push(['string','Area']);
                    break;
                case "sueldo":
                    arr.push(['number','Sueldo']);
                    break;
            }
        }

    </script>

    <body>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Atributos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                Columna principal
                <select id="main-col" name="main-col">
                    <option value="persona">Persona</option>
                    <option value="area">Area</option>
                    <option value="nivel-cargo">Nivel cargo</option>
                </select>
                <br>

                <div id="col-checkboxes">
                    Columnas secundarias
                    <input id="chkbx_0" type="checkbox" name="persona"/>Persona
                    <input id="chkbx_1" type="checkbox" name="area" />Area
                    <input id="chkbx_2" type="checkbox" name="nivel-cargo" />Nivel cargo
                    <input id="chkbx_3" type="checkbox" name="sueldo"/>Sueldo
                </div>
                <button onclick="graphCol()">Graficar</button>
                <button onclick="drawChart3()">test</button>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <div id="chart_div" style="width: 600px; height: 300px;"></div>

    </body>

@endsection