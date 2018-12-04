
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

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-11 col-md-offset-0 col-sm-8 col-sm-offset-2">
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
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" value="{{$nombre}}" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div id="div_id_rut" class="form-group required">
                            <label for="id_rut" class="control-label col-md-4  requiredField"> Rut<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <label class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> {{$rut}}<span class="asteriskField">*</span> </label>
                            </div>
                        </div>

                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <label class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> {{$email}}<span class="asteriskField">*</span> </label>
                            </div>
                        </div>

                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Genero<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> {{$genero}}<span class="asteriskField">*</span> </label>
                            </div>
                        </div>


                        <div id="div_id_date" class="form-group required">
                            <label for="id_date" class="control-label col-md-4  requiredField" style="margin-bottom: 10px"> Fecha de nacimiento<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input id="date" type="date" value="{{$fecha_nacimiento}}" style="margin-bottom: 10px">
                            </div>
                        </div>

                        <div id="div_id_sede" class="form-group required">
                            <label for="id_sede" class="control-label col-md-4  requiredField"> Situacion laboral actual<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">


                                <select style="margin-bottom: 10px">
                                    <option value="trabajo dependiente" <?php if($situacion == "trabajo dependiente") echo('selected');?> >Trabajo dependiente</option>
                                    <option value="trabajo independiente"  <?php if($situacion == 'trabajo independiente') echo('selected');?> >Trabajo independiente</option>
                                    <option value="desempleado" <?php if($situacion == "desempleado") echo('selected');?> >Desempleado</option>
                                </select>
                            </div>
                        </div>

                        <h3>Historial academico</h3>


                        <div id="fieldList">

                                <div id="div_id_career" class="form-group required">
                                    <label for="id_career" class="control-label col-md-4  requiredField"> Carrera<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <select style="margin-bottom: 10px">
                                            <option value="ICCI">ICCI</option>
                                            <option value="ICI">ICI</option>
                                        </select>
                                    </div>
                                </div>

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

                        </div>

                        <!---tabla-->


                        <div id="postGrados" class="table-editable">

                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modAdd">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>

                            <table class="tg" id="table">

                                <tr>
                                    <th class="tg-73oq">Nombre</th>
                                    <th class="tg-73oq">Tipo<br></th>
                                    <th class="tg-73oq">Universidad</th>
                                    <th class="tg-73oq">Fecha de obtención</th>
                                    <th class="tg-73oq"></th>
                                </tr>
                                <tr>
                                @foreach( $postgrados as $p)
                                    <tr>
                                        <td class="tg-73oq">{{$p->nombre}}</td>
                                        <td class="tg-73oq">{{$p->tipo->nombre}}</td>
                                        <td class="tg-73oq">{{$p->universidad->nombre}}</td>
                                        <td class="tg-73oq">{{$p->fecha_obtencion}}</td>
                                        <td class="tg-vlcj">

                                            <span class="table-edit">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                            <span class="table-remove">
                                            <button type="button" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                        </td>
                                    </tr>
                                @endforeach
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

                                            <span class="table-edit">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

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
                        <div method="post" action="/Postgrado" class="modal fade addNewInputs" id="modAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Agregar Postgrado</h4>
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
                                                <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                                @foreach($tipo as $t)
                                                    <option value={{$t->id}}> {{$t->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Universidad</label>
                                        <div class="md-form mb-5">
                                            <select id="inputUni" style="margin-bottom: 10px">
                                                <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                                @foreach($universidades as $uni)
                                                    <option value={{$uni->id}}> {{$uni->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Fecha de obtencion</label>
                                            <input type="date" id="inputDate" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">


                                        <span class="table-add float-right mb-3 mr-2">
                                            <button type="submit" class="btn btn-outline-primary btn-block buttonAdd" data-dismiss="modal">Agregar
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
                                        <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Editar Postgrado</h4>
                                        <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="formNameEdit">Nombre</label>
                                            <input type="text" id="NameEdit" class="form-control validate">
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputTip">Tipo</label>
                                        <div class="md-form mb-5">
                                            <select id="inputTipoe" style="margin-bottom: 10px">

                                                @foreach($tipo as $t)
                                                    <option value={{$t->id}}> {{$t->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Universidad</label>
                                        <div class="md-form mb-5">
                                            <select id="inputUnie" style="margin-bottom: 10px">
                                                <!--<option disabled selected value> -- Seleccionar una opcion -- </option>-->
                                                @foreach($universidades as $uni)
                                                    <option value={{$uni->id}}> {{$uni->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Fecha de obtencion</label>
                                            <input type="date" id="inputDateE" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                        </div>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                        <span class="table-editm1 float-right mb-3 mr-2">
                                            <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Aceptar
                                                <i class="fa fa-paper-plane-o ml-1"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>

                            var $TABLE = $('#postGrados');
                            var $BTN = $('#export-btn');
                            var $EXPORT = $('#export');
                            var tipo = {!! $tipo !!};
                            var uni={!! $universidades !!};
                            var pos;

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
                                $('#modAdd').val($('#inputName').val(""));
                                $('#modAdd').val($('#inputTipo').val(0));
                                $('#modAdd').val($('#inputUni').val(0));
                                $('#modAdd').val($('#inputDate').val("dd-mm-aaaa"));
                            });

                            $('.table-edit').click(function(){

                                var eName=$(this).parents('tr').find('td:first').children().html();
                                var eTipo=$(this).parents('tr').find('td:nth-child(2)').children().html();
                                var eUni=$(this).parents('tr').find('td:nth-child(3)').children().html();
                                var eDat=$(this).parents('tr').find('td:nth-child(4)').children().html();
                                var aux = $.trim(eName);
                                $('#modEdit').val($('#NameEdit').val(aux));
                                aux = $.trim(eTipo);
                                for($i=0;$i<window.tipo.length;$i++){
                                    if(tipo[$i].nombre == aux){
                                        $('#modEdit').val($('#inputTipoe').val(tipo[$i].id));
                                        break;
                                    }
                                }
                                aux = $.trim(eUni);
                                for($i=0;$i<window.uni.length;$i++){
                                    if(uni[$i].nombre == aux){
                                        $('#modEdit').val($('#inputUnie').val(uni[$i].id));
                                        break;
                                    }
                                }
                                $('#modEdit').val($('#inputDateE').val(eDat));
                                pos=this;

                            });

                            $('.table-editm1').click(function(){
                                $(pos).parents('tr').find('td:first').text($('#NameEdit').val());
                                $(pos).parents('tr').find('td:nth-child(2)').text($('#inputTipoe option:selected').text());
                                $(pos).parents('tr').find('td:nth-child(3)').text($('#inputUnie option:selected').text());
                                $(pos).parents('tr').find('td:nth-child(4)').text($('#inputDateE').val());
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

                        <!--tabla tabrajos-->

                        <div id="laboral" class="table-editable">

                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modAdd2">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            <!-- tabla por defecto sufijo d-->
                            <table class="tg" id="table2">
                                <tr>
                                    <th class="tg-73oq">Empresa</th>
                                    <th class="tg-73oq">Tipo de Empresa<br></th>
                                    <th class="tg-73oq">NIvel del cargo</th>
                                    <th class="tg-73oq">Fecha de inicio</th>
                                    <th class="tg-73oq">Fecha de termino</th>
                                    <th class="tg-73oq">Sueldo</th>
                                    <th class="tg-73oq">Area</th>
                                    <th class="tg-73oq">Rubro</th>
                                    <th class="tg-73oq"></th>
                                </tr>
                                <tr>
                                @foreach( $empresas as $e)
                                    <tr>
                                        <td class="tg-73oq">
                                            <p id="inNameTd">{{$e->nombre}}</p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inTipoTd">{{$e->tipo_empresa->nombre}}</p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inLvld"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inDateSd"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inDateEd"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inSald"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="Aread"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="Rubrod"></p>
                                        </td>
                                        <td class="tg-vlcj">

                                            <span class="table-edit2">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit2">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                            <span class="table-remove2">
                                            <button type="button" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                        </td>
                                    </tr>
                                @endforeach
                                    <!--tabla clonable-->
                                    <tr class="hide" id="tn">
                                        <td class="tg-73oq">
                                            <p id="inNameT"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inTipoT"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inLvl"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inDateS"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inDateE"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="inSal"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="Area"></p>
                                        </td>
                                        <td class="tg-73oq">
                                            <p id="Rubro"></p>
                                        </td>
                                        <td class="tg-vlcj">

                                            <span class="table-edit2">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit2">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                            <span class="table-remove2">
                                                <button type="button" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                            </table>
                        </div>


                        <!---modal---->
                        <div method="post" action="/Empresa" class="modal fade addNewInputs" id="modAdd2" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Agregar nuevo trabajo</h4>
                                        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputName">Empresa</label>
                                            <input type="text" id="inputEName" class="form-control validate" style="margin-bottom: 10px">
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputTip">Tipo</label>
                                        <div class="md-form mb-5">
                                            <select id="inputETipo" style="margin-bottom: 10px">
                                                <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                                @foreach($tipoEmpresas as $te)
                                                    <option value={{$te->id}}> {{$te->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Nivel del cargo</label>
                                        <div class="md-form mb-5">
                                            <select id="inputNivel" style="margin-bottom: 10px">
                                                <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                                @foreach($nivel as $n)
                                                    <option value={{$n->id}}> {{$n->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputStart">Fecha de inicio</label>
                                            <input type="date" id="inputDateS" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputEnd">Fecha de termino</label>
                                            <input type="date" id="inputDateEn" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Sueldo</label><br>
                                            <input type="number" id="inputSalIn" name="quantity" min="100000" max="9000000" style="margin-bottom: 10px">
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Area</label>
                                        <div class="md-form mb-5">
                                            <select id="inputArea" style="margin-bottom: 10px">
                                                <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                                @foreach( $areas_trabajo as $ar)
                                                    <option value={{$ar->id}}> {{$ar->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Rubro</label>
                                        <div class="md-form mb-5">
                                            <select id="inputRubro" style="margin-bottom: 10px">
                                                <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                                @foreach($rubros as $ru)
                                                    <option value={{$ru->id}}> {{$ru->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                    <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                        <span class="table-add2 float-right mb-3 mr-2">
                                            <button type="submit" class="btn btn-outline-primary btn-block buttonAdd" data-dismiss="modal">Agregar
                                                <i class="glyphicon glyphicon-ok"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade modalEditClass" id="modEdit2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Editar Trabajo</h4>
                                        <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputName">Empresa</label>
                                            <input type="text" id="edEName" class="form-control validate" style="margin-bottom: 10px">
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputTip">Tipo</label>
                                        <div class="md-form mb-5">
                                            <select id="edETipo" style="margin-bottom: 10px">
                                                @foreach($tipoEmpresas as $te)
                                                    <option value={{$te->id}}> {{$te->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Nivel del cargo</label>
                                        <div class="md-form mb-5">
                                            <select id="edNivel" style="margin-bottom: 10px">
                                                @foreach($nivel as $n)
                                                    <option value={{$n->id}}> {{$n->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Fecha de inicio</label>
                                            <input type="date" id="edDateS" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Fecha de termino</label>
                                            <input type="date" id="edDateE" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputAge">Sueldo</label><br>
                                            <input type="number" id="edSal" name="quantity" min="100000" max="9000000" style="margin-bottom: 10px">
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Area</label>
                                        <div class="md-form mb-5">
                                            <select id="edArea" style="margin-bottom: 10px">
                                                @foreach( $areas_trabajo as $ar)
                                                    <option value={{$ar->id}}> {{$ar->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label data-error="wrong" data-success="right" for="inputOfficeInput">Rubro</label>
                                        <div class="md-form mb-5">
                                            <select id="edRubro" style="margin-bottom: 10px">
                                                @foreach($rubros as $ru)
                                                    <option value={{$ru->id}}> {{$ru->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                        <span class="table-editm2 float-right mb-3 mr-2">
                                            <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Aceptar
                                                <i class="fa fa-paper-plane-o ml-1"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>

                            var $TABLE2 = $('#laboral');
                            var emp={!! $tipoEmpresas !!};
                            var lvl={!! $nivel !!};
                            var areat={!! $areas_trabajo !!};
                            var rubrost={!! $rubros !!};
                            var pos2=null;


                            $('.table-add2').click(function () {
                                var iEName = $('#inputEName').val();
                                var iTipoE = $("#inputETipo option:selected").text();
                                var iTipoT = $("#inputNivel option:selected").text();
                                var iDatS = $('#inputDateS').val();
                                var iDatE = $('#inputDateEn').val();
                                var iSal = $('#inputSalIn').val();
                                var iArea = $('#inputArea option:selected').text();
                                var iRubro = $('#inputRubro option:selected').text();
                                document.getElementById("inNameT").innerHTML=iEName;
                                document.getElementById("inTipoT").innerHTML=iTipoE;
                                document.getElementById("inLvl").innerHTML=iTipoT;
                                document.getElementById("inDateS").innerHTML=iDatS;
                                document.getElementById("inDateE").innerHTML=iDatE;
                                document.getElementById("inSal").innerHTML=iSal;
                                document.getElementById("Area").innerHTML=iArea;
                                document.getElementById("Rubro").innerHTML=iRubro;

                                var $clone = $TABLE2.find('tr.hide').clone(true).removeClass('hide table-line');
                                $TABLE2.find('table').append($clone);
                                $('#modEdit2').val($('#inputEName').val(""));
                                $('#modEdit2').val($('#inputETipo').val(0));
                                $('#modEdit2').val($('#inputNivel').val(0));
                                $('#modEdit2').val($('#inputDateS').val("dd-mm-aaaa"));
                                $('#modEdit2').val($('#inputDateEn').val("dd-mm-aaaa"));
                                $('#modEdit2').val($('#inputSalIn').val(""));
                                $('#modEdit2').val($('#inputArea').val(0));
                                $('#modEdit2').val($('#inputRubro').val(0));
                            });

                            $('.table-edit2').click(function(){
                                var edName=$(this).parents('tr').find('td:first').children().html();
                                var eTipoE=$(this).parents('tr').find('td:nth-child(2)').children().html();
                                var eTipoT=$(this).parents('tr').find('td:nth-child(3)').children().html();
                                var eDatS=$(this).parents('tr').find('td:nth-child(4)').children().html();
                                var eDatE=$(this).parents('tr').find('td:nth-child(5)').children().html();
                                var eSal=$(this).parents('tr').find('td:nth-child(6)').children().html();
                                var eArea=$(this).parents('tr').find('td:nth-child(7)').children().html();
                                var eRubro=$(this).parents('tr').find('td:nth-child(8)').children().html();
                                $('#modEdit2').val($('#edEName').val(edName));
                                var aux = $.trim(eTipoE);
                                for($i=0;$i<window.emp.length;$i++){
                                    if(emp[$i].nombre == aux){
                                        $('#modEdit2').val($('#edETipo').val(emp[$i].id));
                                        break;
                                    }
                                }
                                aux = $.trim(eTipoT);
                                for($i=0;$i<window.lvl.length;$i++){
                                    if(lvl[$i].nombre == aux){
                                        $('#modEdit2').val($('#edNivel').val(lvl[$i].id));
                                        break;
                                    }
                                }
                                $('#modEdit2').val($('#edDateS').val(eDatS));
                                $('#modEdit2').val($('#edDateE').val(eDatE));
                                $('#modEdit2').val($('#edSal').val(eSal));
                                aux = $.trim(eArea);
                                for($i=0;$i<window.areat.length;$i++){
                                    if(areat[$i].nombre == aux){
                                        $('#modEdit2').val($('#edArea').val(areat[$i].id));
                                        break;
                                    }
                                }
                                aux = $.trim(eRubro);
                                for($i=0;$i<window.rubrost.length;$i++){
                                    if(rubrost[$i].nombre == aux){
                                        $('#modEdit2').val($('#edRubro').val(rubrost[$i].id));
                                        break;
                                    }
                                }
                                pos2=this;
                            });

                            $('.table-editm2').click(function(){
                                $(pos2).parents('tr').find('td:first').text($('#edEName').val());
                                $(pos2).parents('tr').find('td:nth-child(2)').text($('#edETipo option:selected').text());
                                $(pos2).parents('tr').find('td:nth-child(3)').text($('#edNivel option:selected').text());
                                $(pos2).parents('tr').find('td:nth-child(4)').text($('#edDateS').val());
                                $(pos2).parents('tr').find('td:nth-child(5)').text($('#edDateE').val());
                                $(pos2).parents('tr').find('td:nth-child(6)').text($('#edSal').val());
                                $(pos2).parents('tr').find('td:nth-child(7)').text($('#edArea option:selected').text());
                                $(pos2).parents('tr').find('td:nth-child(8)').text($('#edRubro option:selected').text());
                            });



                            $('.table-remove2').click(function () {
                                var result = confirm("Esta seguro de eliminarlo?");
                                if (result) {
                                    //Logic to delete the item
                                    $(this).parents('tr').detach();
                                }

                            });


                        </script>



                        <br>
                        <br>



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