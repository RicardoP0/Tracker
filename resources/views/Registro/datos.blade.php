
<!--
 * Created by PhpStorm.
 * User: Laptop
 * Date: 04-11-2018
 * Time: 16:21
-->

@extends('layouts.master')

@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <div class="container">

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Historial academico</div>
                </div>
                <div class="panel-body" >
                    <form method="post" action=".">
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                        <h3>Carrera</h3>

                        <form  class="form-horizontal" method="post" >
                            <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                            <form action="form_sent.php" method="post">
                                <ul id="fieldList">

                                    <li>
                                        <div id="div_id_career" class="form-group required">
                                            <label for="id_career" class="control-label col-md-4  requiredField"> Carrera<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    <option value="ICCI">ICCI</option>
                                                    <option value="ICI">ICI</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div id="div_id_year_in" class="form-group required">
                                            <label for="id_year_in" class="control-label col-md-4  requiredField"> Año de ingreso<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input type="number" placeholder="YYYY" min="1940" max="2018" style="margin-bottom: 10px">
                                            </div>
                                        </div>

                                        <div id="div_id_year_out" class="form-group required">
                                            <label for="id_year_out" class="control-label col-md-4  requiredField"> Año de egreso<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input type="number" placeholder="YYYY" min="1940" max="2100" style="margin-bottom: 10px">
                                            </div>
                                        </div>

                                        <div id="div_id_year_gra" class="form-group required">
                                            <label for="id_year_gra" class="control-label col-md-4  requiredField"> Año de titulación<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input type="number" placeholder="YYYY" min="1940" max="2100" style="margin-bottom: 10px">
                                            </div>
                                        </div>

                                        <div id="div_id_sede" class="form-group required">
                                            <label for="id_sede" class="control-label col-md-4  requiredField"> Tipo de tesis<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    <option value="Proyecto">Proyecto</option>
                                                    <option value="Investigacion">Investigacion</option>
                                                    <option value="Capstone">Capstone</option>
                                                    <option value="Trabajo">Trabajo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="div_id_sede" class="form-group required">
                                            <label for="id_sede" class="control-label col-md-4  requiredField"> Sede<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    <option value="Antofagasta">Antofagasta</option>
                                                    <option value="Coquimbo">Coquimbo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <br>
                            </form>

                        </form>

                    </form>

                    <form method="post" action=".">
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                        <h3>Postgrado</h3>

                        <form  class="form-horizontal" method="post" >
                            <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                            <form action="form_sent.php" method="post">
                                <ul id="fieldList2">
                                    <li>
                                        <div id="div_id_namep" class="form-group required">
                                            <label for="id_namep" class="control-label col-md-4  requiredField"> Nombre<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input name="name[]" type="text" style="margin-bottom: 10px" />
                                            </div>
                                        </div>

                                        <div id="div_id_type" class="form-group required">
                                            <label for="id_type" class="control-label col-md-4  requiredField"> Tipo<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input name="type[]" type="text" style="margin-bottom: 10px"/>
                                            </div>
                                        </div>

                                        <div id="div_id_yearp" class="form-group required">
                                            <label for="id_yearp" class="control-label col-md-4  requiredField"> Año<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <input type="number" placeholder="YYYY" min="1940" max="2100" style="margin-bottom: 10px">
                                            </div>
                                        </div>

                                        <div id="div_id_unip" class="form-group required">
                                            <label for="id_unip" class="control-label col-md-4  requiredField"> Universidad<span class="asteriskField">*</span> </label>
                                            <div class="controls col-md-8 ">
                                                <select style="margin-bottom: 10px">
                                                    @foreach( $universidades as $uni)
                                                        <option value={{$uni->id}}> {{$uni->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <button id="addMore2">Agregar otro postgrado</button>
                                <br>
                            </form>



                            <div class="form-group">
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8 ">
                                    <input type="submit" name="Signup" value="Guardar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                </div>
                            </div>

                        </form>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("#addMore2").click(function(e) {
                e.preventDefault();
                $("#fieldList2").append("<li>&nbsp;</li>");
                $("#fieldList2").append("<li><div id=\"div_id_namep\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_namep\" class=\"control-label col-md-4  requiredField\"> Nombre<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <input name=\"name[]\" type=\"text\" style=\"margin-bottom: 10px\" />\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "                                        <div id=\"div_id_type\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_type\" class=\"control-label col-md-4  requiredField\"> Tipo<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <input name=\"type[]\" type=\"text\" style=\"margin-bottom: 10px\"/>\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "                                        <div id=\"div_id_yearp\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_yearp\" class=\"control-label col-md-4  requiredField\"> Año<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <input type=\"number\" placeholder=\"YYYY\" min=\"1940\" max=\"2100\" style=\"margin-bottom: 10px\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "                                        <div id=\"div_id_unip\" class=\"form-group required\">\n" +
                    "                                            <label for=\"id_unip\" class=\"control-label col-md-4  requiredField\"> Universidad<span class=\"asteriskField\">*</span> </label>\n" +
                    "                                            <div class=\"controls col-md-8 \">\n" +
                    "                                                <select style=\"margin-bottom: 10px\">\n" +
                    "                                                    @foreach( $universidades as $uni)\n" +
                    "                                                        <option value={{$uni->id}}> {{$uni->nombre}}</option>\n" +
                    "                                                    @endforeach\n" +
                    "                                                </select>\n" +
                    "                                            </div>\n" +
                    "                                        </div></li>");
            });
        });
    </script>

@endsection