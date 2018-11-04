
/**
 * Created by PhpStorm.
 * User: Laptop
 * Date: 04-11-2018
 * Time: 16:21
 */

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
                                        <select>
                                            <option value="ICCI">ICCI</option>
                                            <option value="ICI">ICI</option>
                                            <option value="IZI">IZI</option>
                                            <option value="PIZI" selected>PIZI</option>
                                        </select>
                                    </li>
                                </ul>
                                <button id="addMore">Agregar otra carrera</button>
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
                                        <input name="name[]" type="text" placeholder="Nombre" />
                                    </li>
                                    <li>
                                        <input name="phone[]" type="text" placeholder="Tipo" />
                                    </li>
                                    <li>
                                        <input id="year" type="year">
                                    </li>
                                </ul>
                                <button id="addMore2">Add more fields</button>
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
            $("#addMore").click(function(e) {
                e.preventDefault();
                $("#fieldList").append("<li>&nbsp;</li>");
                $("#fieldList").append("<li><select>\n" +
                    "  <option value=\"ICCI\">ICCI</option>\n" +
                    "  <option value=\"ICI\">ICI</option>\n" +
                    "  <option value=\"IZI\">IZI</option>\n" +
                    "  <option value=\"PIZI\" selected>PIZI</option>\n" +
                    "</select></li>");
            });
        });
    </script>

    <script>
        $(function() {
            $("#addMore2").click(function(e) {
                e.preventDefault();
                $("#fieldList2").append("<li>&nbsp;</li>");
                $("#fieldList2").append("<li><input name=\"name[]\" type=\"text\" placeholder=\"Nombre\" /></li>");
                $("#fieldList2").append("<li><input name=\"year[]\" type=\"text\" placeholder=\"Año\" /></li>");
                $("#fieldList2").append("<li><input id=\"year\" type=\"year\"></li>");
            });
        });
    </script>

@endsection