
<!--
 * Created by PhpStorm.
 * User: Naitsirc
 * Date: 05-11-2018
 * Time: 1:54
 TODO terminar y mejorar datos normal
-->

<style type="text/css">

    #otraArea {
        display: none;
    }

    #otraArea.show {
        display: block;
    }

</style>

@extends('layouts.master')

@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <div class="container">

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Historial laboral</div>
                </div>
                <div class="panel-body" >
                    <form method="post" action=".">
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />


                        <form  class="form-horizontal" method="post" >
                            <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                            <form action="form_sent.php" method="post">
                                <ul id="fieldList">

                                    <li>
                                        <div id="div_id_emp" class="form-group required">
                                            <label for="id_emp" class="control-label col-md-4  requiredField"> Empresa<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input name="emp[]" type="text" style="margin-bottom: 10px" />
                                            </div>
                                        </div>

                                        <div id="div_id_sede" class="form-group required">
                                            <label for="id_sede" class="control-label col-md-4  requiredField"> Tipo de empresa<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    @foreach( $tipoEmp as $emp)
                                                        <option value={{$emp->id}}> {{$emp->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div id="div_id_sede" class="form-group required">
                                            <label for="id_sede" class="control-label col-md-4  requiredField"> Nivel del cargo<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    <option value="Jefatura">Jefatura</option>
                                                    <option value="JefeU">Jefe de unidad de equipo</option>
                                                    <option value="Jefedepto">Jefe de departamento</option>
                                                    <option value="Generencia">Generencia</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="div_id_dates" class="form-group required">
                                            <label for="id_dates" class="control-label col-md-4  requiredField"> Fecha de inico<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input id="date" type="date" style="margin-bottom: 10px">
                                            </div>
                                        </div>

                                        <div id="div_id_datee" class="form-group required">
                                            <label for="id_datee" class="control-label col-md-4  requiredField"> Fecha de termino<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input id="date" type="date" style="margin-bottom: 10px">
                                            </div>
                                        </div>

                                        <div id="div_id_year_gra" class="form-group required">
                                            <label for="id_year_gra" class="control-label col-md-4  requiredField"> Sueldo<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input type="number" name="quantity" min="100000" max="9000000">
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                                <button id="addMore">Agregar otro nivel</button>
                                <br>

                            </form>

                        </form>

                    </form>

                    <form method="post" action=".">
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                        <form  class="form-horizontal" method="post" >
                            <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                            <form action="form_sent.php" method="post">
                                <ul id="fieldList2">
                                    <li>

                                        <div id="div_id_unip" class="form-group required">
                                            <label for="id_unip" class="control-label col-md-4  requiredField"> Area<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select id="area" style="margin-bottom: 10px">
                                                    @foreach( $area as $ar)
                                                        <option value={{$ar->id}}> {{$ar->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div id="otraArea" class="form-group required">
                                            <label for="id_emp" class="control-label col-md-4  requiredField"> Otro:<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input name="emp[]" type="text" style="margin-bottom: 10px" />
                                            </div>
                                        </div>

                                        <script>
                                            const source = document.querySelector("#area");
                                            const target = document.querySelector("#otraArea");

                                            const displayWhenSelected = (source, value, target) => {
                                                const selectedIndex = source.selectedIndex;
                                                const isSelected = source[selectedIndex].value === value;
                                                target.classList[isSelected
                                                    ? "add"
                                                    : "remove"
                                                    ]("show");
                                            };
                                            source.addEventListener("change", (evt) =>
                                                displayWhenSelected(source, "5", target)
                                            );
                                        </script>

                                        <div id="div_id_unip" class="form-group required">
                                            <label for="id_unip" class="control-label col-md-4  requiredField"> Rubro<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    @foreach( $rubro as $ru)
                                                        <option value={{$ru->id}}> {{$ru->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                                <br>
                            </form>

                        </form>

                    </form>

                </div>
            </div>

            <div class="form-group">
                <div class="aab controls col-md-4 "></div>
                <div class="controls col-md-8 ">
                    <input type="submit" name="Signup" value="Agregar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("#addMore").click(function(e) {
                e.preventDefault();
                $("#fieldList").append("<li>&nbsp;</li>");
                $("#fieldList").append("<li><div id=\"div_id_sede\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_sede\" class=\"control-label col-md-4  requiredField\"> Nivel del cargo<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <select style=\"margin-bottom: 10px\">\n" +
                    "                                                    <option value=\"Jefatura\">Jefatura</option>\n" +
                    "                                                    <option value=\"JefeU\">Jefe de unidad de equipo</option>\n" +
                    "                                                    <option value=\"Jefedepto\">Jefe de departamento</option>\n" +
                    "                                                    <option value=\"Generencia\">Generencia</option>\n" +
                    "                                                </select>\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "                                        <div id=\"div_id_dates\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_dates\" class=\"control-label col-md-4  requiredField\"> Fecha de inico<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <input id=\"date\" type=\"date\" style=\"margin-bottom: 10px\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "                                        <div id=\"div_id_datee\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_datee\" class=\"control-label col-md-4  requiredField\"> Fecha de termino<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <input id=\"date\" type=\"date\" style=\"margin-bottom: 10px\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "                                        <div id=\"div_id_year_gra\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_year_gra\" class=\"control-label col-md-4  requiredField\"> Sueldo<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <input type=\"number\" name=\"quantity\" min=\"100000\" max=\"9000000\">\n" +
                    "                                            </div>\n" +
                    "                                        </div></li>");
            });
        });
    </script>


@endsection