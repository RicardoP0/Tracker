
<!--
 * Created by PhpStorm.
 * User: Naitsirc
 * Date: 04-11-2018
 * Time: 16:06
-->

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
    .tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-vlcj{font-family:serif !important;;border-color:#000000;text-align:left;vertical-align:top}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .btn {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        background-color: RoyalBlue;
    }
</style>

@extends('layouts.master')
@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <div class="container">

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Configuracion de perfil</div>
                </div>
                <div class="panel-body" >
                    <form  class="form-horizontal" method="post">

                        <!--preguntas-->
                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField">Nombre<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" placeholder="Cargar nombre" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div id="div_id_rut" class="form-group required">
                            <label for="id_rut" class="control-label col-md-4  requiredField"> Rut<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <label class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> cargar rut<span class="asteriskField">*</span> </label>
                            </div>
                        </div>

                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <label class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> cargar email<span class="asteriskField">*</span> </label>
                            </div>
                        </div>

                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Genero<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> genero<span class="asteriskField">*</span> </label>
                            </div>
                        </div>


                        <div id="div_id_date" class="form-group required">
                            <label for="id_date" class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> fecha de nacimiento<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input id="date" type="date" style="margin-bottom: 10px">
                            </div>
                        </div>

                        <div id="div_id_sede" class="form-group required">
                            <label for="id_sede" class="control-label col-md-4  requiredField"> Situacion laboral actual<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <select style="margin-bottom: 10px">
                                    <option value="TrabajoD">Trabajo dependiente</option>
                                    <option value="TrabajoI">Trabajo independiente</option>
                                    <option value="Desempleado">Desempleado</option>
                                </select>
                            </div>
                        </div>

                        <h3>Historial academico</h3>


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
                                        <input type="number" placeholder="YYYY" min="1980" max="2018" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div id="div_id_year_out" class="form-group required">
                                    <label for="id_year_out" class="control-label col-md-4  requiredField"> Año de egreso<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input type="number" placeholder="YYYY" min="1980" max="2100" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div id="div_id_year_gra" class="form-group required">
                                    <label for="id_year_gra" class="control-label col-md-4  requiredField"> Año de titulación<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input type="number" placeholder="YYYY" min="1980" max="2100" style="margin-bottom: 10px">
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
                            </li>
                        </ul>

                        <!---tabla-->


                        <div id="postGrados" class="table-editable">

                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modAdd">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>

                            <span class="table-add float-right mb-3 mr-2">
                                <a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                            </span>
                            <table class="tg" id="table">

                                <tr>
                                    <th class="tg-73oq">Nombre</th>
                                    <th class="tg-73oq">Tipo<br></th>
                                    <th class="tg-73oq">Universidad</th>
                                    <th class="tg-73oq">Fecha de obtención</th>
                                    <th class="tg-73oq"></th>
                                </tr>
                                <tr>
                                @foreach( $post as $p)
                                    <tr>
                                        <td class="tg-73oq">{{$p->nombre}}</td>
                                        <td class="tg-73oq">{{$p->tipo->nombre}}</td>
                                        <td class="tg-73oq">{{$p->universidad->nombre}}</td>
                                        <td class="tg-73oq">{{$p->fecha_obtencion}}</td>
                                        <td class="tg-vlcj">
                                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button>

                                            <span class="table-remove">
                                            <button type="button" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                    <tr class="hide">
                                        <td class="tg-73oq">
                                            <p id="inName"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inTipo"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inUni"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inDate"></p>
                                        </td>
                                        <td class="tg-vlcj">
                                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button>

                                            <span class="table-remove">
                                            <button type="button" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                    </span>
                                        </td>
                                    </tr>
                            </table>
                        </div>

                        <br>
                        <br>

                        <!---modal---->
                        <div class="modal fade addNewInputs" id="modAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Add new form</h4>
                                        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputName">Nombre</label>
                                            <input type="text" id="inputName" class="form-control validate" style="margin-bottom: 10px">
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputTip">Tipo</label>
                                        <div class="md-form mb-5">
                                            <select id="inputTipo" style="margin-bottom: 10px">
                                                @foreach($tipo as $t)
                                                    <option value={{$t->id}}> {{$t->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Universidad</label>
                                        <div class="md-form mb-5">
                                            <select id="inputUni" style="margin-bottom: 10px">
                                                @foreach($universidades as $uni)
                                                    <option value={{$uni->id}}> {{$uni->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Fecha de obtencion</label>
                                            <input type="date" id="inputDate" class="form-control" placeholder="Select Date">
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                        <span class="table-add float-right mb-3 mr-2">
                                            <button class="btn btn-outline-primary btn-block buttonAdd" data-dismiss="modal">Agregar
                                                <i class="glyphicon glyphicon-ok"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade modalEditClass" id="modEdit" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Edit form</h4>
                                        <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <input type="text" id="formNameEdit" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="formNameEdit">Name</label>
                                        </div>

                                        <div class="md-form mb-5">
                                            <input type="text" id="formPositionEdit" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="formPositionEdit">Position</label>
                                        </div>

                                        <div class="md-form mb-5">
                                            <input type="text" id="formOfficeEdit" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="formOfficeEdit">Office</label>
                                        </div>

                                        <div class="md-form mb-5">
                                            <input type="text" id="formAgeEdit" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="formAgeEdit">Age</label>
                                        </div>

                                        <div class="md-form mb-5">
                                            <input type="text" id="formDateEdit" class="form-control datepicker">
                                            <label data-error="wrong" data-success="right" for="formDateEdit">Date</label>
                                        </div>

                                        <div class="md-form mb-5">
                                            <input type="text" id="formSalaryEdit" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="formSalaryEdit">Salary</label>
                                        </div>


                                    </div>
                                    <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                        <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Edit
                                            form
                                            <i class="fa fa-paper-plane-o ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var $TABLE = $('#postGrados');
                            var $BTN = $('#export-btn');
                            var $EXPORT = $('#export');

                            $('.table-add').click(function () {
                                var iName = $('#inputName').val();
                                var iTipo = $("#inputTipo option:selected").text();
                                var iUni = $("#inputUni option:selected").text();
                                var iDat = $('#inputDate').val();
                                document.getElementById("inName").innerHTML=iName;
                                document.getElementById("inTipo").innerHTML=iTipo;
                                document.getElementById("inUni").innerHTML=iUni;
                                document.getElementById("inDate").innerHTML=iDat;

                                var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
                                $TABLE.find('table').append($clone);
                            });


                            $('.table-remove').click(function () {
                                var result = confirm("Esta seguro de eliminarlo?");
                                if (result) {
                                    //Logic to delete the item
                                    $(this).parents('tr').detach();
                                }

                            });
                            // A few jQuery helpers for exporting only
                            jQuery.fn.pop = [].pop;
                            jQuery.fn.shift = [].shift;

                            $BTN.click(function () {
                                var $rows = $TABLE.find('tr:not(:hidden)');
                                var headers = [];
                                var data = [];

                                // Get the headers (add special header logic here)
                                $($rows.shift()).find('th:not(:empty)').each(function () {
                                    headers.push($(this).text().toLowerCase());
                                });

                                // Turn all existing rows into a loopable array
                                $rows.each(function () {
                                    var $td = $(this).find('td');
                                    var h = {};

                                    // Use the headers from earlier to name our hash keys
                                    headers.forEach(function (header, i) {
                                        h[header] = $td.eq(i).text();
                                    });

                                    data.push(h);
                                });

                                // Output the result
                                $EXPORT.text(JSON.stringify(data));
                            });
                        </script>




                        <h3>Historial Laboral</h3>


                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Guardar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection