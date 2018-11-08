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
        function drawChart2() {

            window.chartData.addRows([
                ['adssa',  new Date (1998,0,1), 10500, 3400, 'East'],
                ['dfgdf', new Date (1999,6,1), 7858,  6417, 'West']
            ]);

            window.motChart.draw(window.chartData);

        }

        function drawChart3() {
            var personData = new google.visualization.DataTable();
            personData.addColumn('string', 'Areas');
            personData.addColumn('date', 'Date');
            personData.addColumn('number', 'Sueldo');
            personData.addColumn('string', 'Location');
            var rows = [];
            /*
            rows.push([window.areas[0].nombre,
                new Date(2000,0,2),
                2000]);
            rows.push([window.areas[0].nombre,
                new Date(2001,0,2),
                4000]);

            rows.push([window.areas[0].nombre,
                new Date(2002,0,2),
                2000]);
            rows.push([window.areas[1].nombre,
                new Date(2000,0,2),
                5000]);

            rows.push([window.areas[1].nombre,
                new Date(2001,0,2),
                3000]);
            rows.push([window.areas[2].nombre,
                new Date(2000,0,2),
                1000]);

            rows.push([window.areas[0].nombre,
                new Date(2002,0,2),
                5000]);

*/
            for(var i=0;i<window.cargos.length;++i){
                for(var j=0;j<window.areas.length;++j){
                    if(window.cargos[i].area_id == window.areas[j].id ){
                        rows.push([window.areas[j].nombre,
                            new Date(window.cargos[i].fecha_inicio),
                            window.cargos[i].sueldo,"West"]);
                        rows.push([window.areas[j].nombre,
                            new Date(window.cargos[i].fecha_termino),
                            window.cargos[i].sueldo,"East"]);
                    }

                }
            }

            personData.addRows(rows);

            window.motChart.draw(personData);

        }

        console.log(areas[0]);
    </script>

    <body>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                Columna principal
                <select id="main-col" name="main-col">
                    <option value="persona">Persona</option>
                    <option value="area">Area</option>
                    <option value="nivel-cargo">Persona</option>
                </select>
                Columnas secundarias
                <div id="col-checkboxes">
                    <input id="chkbx_0" type="checkbox" name="ersona" checked="checked" />Option 1
                    <input id="chkbx_1" type="checkbox" name="c_n_1" />Option 2
                    <input id="chkbx_2" type="checkbox" name="c_n_2" />Option 3
                    <input id="chkbx_3" type="checkbox" name="c_n_3" checked="checked" />Option 4
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <div id="chart_div" style="width: 600px; height: 300px;"></div>
    <button onclick="drawChart3()">test</button>
    </body>

@endsection