
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

    #otraArea {
        display: none;
    }

    #otraArea.show {
        display: block;
    }

    #otraAreaed {
        display: none;
    }

    #otraAreaed.show {
        display: block;
    }

    #otroCargo {
        display: none;
    }

    #otraCargo.show {
        display: block;
    }

    #otroCargoed {
        display: none;
    }

    #otraCargoed.show {
        display: block;
    }

    #otraUni {
        display: none;
    }

    #otraUni.show {
        display: block;
    }

    #otraUnied {
        display: none;
    }

    #otraUnied.show {
        display: block;
    }

    .columnLabel {
        float: left;
        width: 25%;
        margin-left: 5%;
        padding: 0%;
        /*height: 300px; !* Should be removed. Only for demonstration *!*/
    }

    .columnInput {
        float: left;
        width: 40%;
        padding: 0%;
        /*height: 300px; !* Should be removed. Only for demonstration *!*/
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .clp:after {
        content: " CLP";
    }
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

    <div class="container">
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Configuración de perfil</div>
                </div>

                <div class="panel-body" >
                    <form  class="form-horizontal" method="post" action={{"/persona/".Auth::user()->persona->id}}>
                    @method('PUT')
                    {{csrf_field()}}

                        <h3>Datos personales</h3>

                        <div id="div_id_username" class="form-group required">
                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_username" class="control-label requiredField">Nombre<span class="asteriskField">*</span> </label>
                                </div>
                                <div class="columnInput">
                                    <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" value="{{$nombre}}" style="margin-bottom: 10px" type="text" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_rut" class="requiredField">Rut</label>
                                </div>
                                <div class="columnInput">
                                    <label class="requiredField"> {{$rut}}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_email" class="control-label requiredField"> E-mail </label>
                                </div>
                                <div class="columnInput">
                                    <label class="control-label requiredField"> {{$email}}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_gender" class="control-label requiredField"> Genero </label>
                                </div>
                                <div class="columnInput">
                                    <label class="control-label requiredField"> {{$genero}}</label>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 10px">
                                <div class="columnLabel">
                                    <label for="id_date" class="control-label requiredField"> Fecha de nacimiento </label>
                                </div>
                                <div class="columnInput">
                                    <label class="control-label requiredField"> {{$fecha_nacimiento}}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_sede" class=" requiredField"> Situación laboral actual </label>
                                </div>
                                <div class="columnInput">
                                    <select name="estado_trabajo">
                                        <option value="trabajo dependiente" <?php if($situacion == "trabajo dependiente") echo('selected');?> >Trabajo dependiente</option>
                                        <option value="trabajo independiente"  <?php if($situacion == 'trabajo independiente') echo('selected');?> >Trabajo independiente</option>
                                        <option value="desempleado" <?php if($situacion == "desempleado") echo('selected');?> >Desempleado</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <h3>Historial académico</h3>

                        <div id="fieldList">

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_career" class="requiredField">Carrera<span class="asteriskField">*</span> </label>
                                </div>
                                <div class="columnInput">
                                    <select name="carrera">
                                        <option value="1" <?php if($carreras->count()>0 && $carreras->first()->nombre=="ICCI") echo('selected');?>>ICCI</option>
                                        <option value="2" <?php if($carreras->count()>0 && $carreras->first()->nombre=="IenCI") echo('selected');?>>IenCI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_year_in" class="requiredField">Fecha de ingreso<span class="asteriskField">*</span> </label>
                                </div>
                                <div class="columnInput">
                                    <?php if($carreras->count()>0):?>
                                    <input name="fecha_ingreso" value={{$carreras->first()->pivot->fecha_ingreso}} type="date" placeholder="YYYY" min="1980" max="2018" style="margin-bottom: 10px">
                                    <?php else:?>
                                    <input name="fecha_ingreso" type="date" placeholder="YYYY" min="1980" max="2018" style="margin-bottom: 10px">
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_year_in" class="requiredField">Fecha de egreso<span class="asteriskField">*</span> </label>
                                </div>
                                <div class="columnInput">
                                    <?php if($carreras->count()>0):?>
                                    <input name="fecha_egreso" value={{$carreras->first()->pivot->fecha_egreso}} type="date" placeholder="YYYY" min="1980" max="2018" style="margin-bottom: 10px">
                                    <?php else:?>
                                    <input name="fecha_egreso" type="date" placeholder="YYYY" min="1980" max="2018" style="margin-bottom: 10px">
                                    <?php endif;?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="columnLabel">
                                    <label for="id_year_in" class="requiredField">Titulado<span class="asteriskField">*</span> </label>
                                </div>
                                <div class="columnInput">
                                    <input type="checkbox" id="Titulado" value="true" onclick="hide2()"><br>
                                </div>
                            </div>

                            <div class="hidden" id="fecha">
                                <div class="row">
                                    <div class="columnLabel">
                                        <label for="id_year_in" class="requiredField">Fecha de titulación<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="columnInput">
                                        <?php if($carreras->count()>0):?>
                                        <input id="fechaTitulacion" value={{$carreras->first()->pivot->fecha_titulacion}}"" name="fecha_titulacion" type="date" placeholder="YYYY" min="1980" max="2100" style="margin-bottom: 10px">
                                        <?php else:?>
                                        <input id="fechaTitulacion" name="fecha_titulacion" type="date" placeholder="YYYY" min="1980" max="2100" style="margin-bottom: 10px">
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="columnLabel">
                                        <label for="id_year_in" class="requiredField">Tipo de tesis<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="columnInput">
                                        <select id="tipoTesis" name="tipo_tesis">
                                            <option value="Proyecto" <?php if($carreras->count()>0 && $carreras->first()->pivot->tipo_tesis=="Proyecto") echo('selected');?>>Proyecto</option>
                                            <option value="Investigacion" <?php if($carreras->count()>0 && $carreras->first()->pivot->tipo_tesis=="Investigacion") echo('selected');?>>Investigacion</option>
                                            <option value="Capstone" <?php if($carreras->count()>0 && $carreras->first()->pivot->tipo_tesis=="Capstone") echo('selected');?>>Capstone</option>
                                            <option value="Modalidad trabajo" <?php if($carreras->count()>0 && $carreras->first()->pivot->tipo_tesis=="Modalidad trabajo") echo('selected');?>>Modalidad trabajo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="aab controls col-md-4 " align="center"></div>
                                <div class="controls col-md-8 ">
                                    <input type="submit" name="Signup" value="Guardar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                </div>
                            </div>
                        </div>

                        <h3>Seguridad</h3>

                        <div class="form-group">
                            <div class="controls" align="left" style="margin-left: 2%">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modPass">
                                    <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span> Cambiar contraseña
                                </button>
                            </div>
                        </div>


                        {{--modal cambiar pass--}}
                        <div class="modal fade modalEditClass" id="modPass" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Cambiar contraseña</h4>
                                        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputName">Ingrese su antigua contraseña</label>
                                            <input type="password" id="inputOldPass" class="form-control validate" style="margin-bottom: 10px">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputName">Ingrese su nueva contraseña</label>
                                            <input type="password" id="inputNewPass" class="form-control validate" style="margin-bottom: 10px">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="inputName">confirme su nueva contraseña</label>
                                            <input type="password" id="ConfirmPass" class="form-control validate" style="margin-bottom: 10px">
                                        </div>

                                    </div>

                                    <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                        <span class="edit-pass float-right mb-3 mr-2">
                                            <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Aceptar
                                                <i class="fa fa-paper-plane-o ml-1"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            function hide() {
                                if(document.getElementById('edArea').value == "5") {
                                    document.getElementById("otraAreaed").classList.add("show");
                                }else{
                                    document.getElementById("otraAreaed").classList.remove("show");
                                }
                            }

                            function hide2() {
                                if($("#Titulado").is(':checked')){
                                    var box=document.getElementById('fecha');
                                    box.removeAttribute('class');
                                }else{
                                    var box=document.getElementById('fecha');
                                    box.setAttribute("class","hidden");
                                }
                            }

                            function hide3() {
                                if(document.getElementById('inputNivel').value == "4") {
                                    document.getElementById("otroCargo").classList.add("show");
                                }else{
                                    document.getElementById("otroCargo").classList.remove("show");
                                }
                            }

                            function hide5() {
                                if(document.getElementById('inputUni').value == "2") {
                                    document.getElementById("otraUni").classList.add("show");
                                }else{
                                    document.getElementById("otraUni").classList.remove("show");
                                }
                            }

                            function hide6() {
                                if(document.getElementById('inputUnied').value == "2") {
                                    document.getElementById("otraUnied").classList.add("show");
                                }else{
                                    document.getElementById("otraUnied").classList.remove("show");
                                }
                            }


                            function checkTitulado($tipo,$fecha) {
                                document.getElementById("Titulado").checked = true;
                                document.getElementById("fechaTitulacion").value=$fecha;
                                document.getElementById("tipoTesis").value=$tipo;
                            }

                        </script>

                        <?php
                        $id=auth()->user()->persona->id;
                        $titu=DB::table('carrera_persona')->where('persona_id','=',$id)->first();
                        if($titu!=null)
                            echo '<script type="text/javascript">',
                            'checkTitulado("',$titu->tipo_tesis,'","',$titu->fecha_titulacion,'");hide2();',
                            '</script>';
                        ?>
                    </form>
                </div>
            </div>

            <!---modal postgrados---->
            <!---modal agregar---->
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
                                <select id="inputUni" style="margin-bottom: 10px" onchange="hide5()">
                                    <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                    @foreach($universidades as $uni)
                                        <option value={{$uni->id}}> {{$uni->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="otraUni" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otra</label>
                                <div class="md-form mb-5">
                                    <input id="otra_uni" name="otra_Uni" type="text" style="margin-bottom: 10px" />
                                </div>
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

            <!---modal editar---->
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
                                <select id="inputUnied" style="margin-bottom: 10px" onchange="hide6()">
                                    <!--<option disabled selected value> -- Seleccionar una opcion -- </option>-->
                                    @foreach($universidades as $uni)
                                        <option value={{$uni->id}}> {{$uni->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="otraUnied" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otro</label>
                                <div class="md-form mb-5">
                                    <input id="otra_unied" name="otro" type="text" style="margin-bottom: 10px" />
                                </div>
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
            {{----------------------}}


            <!---modal trabajos---->
            <div method="post" action="/Empresa" class="modal fade addNewInputs" id="modAdd2" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Agregar nuevo trabajo</h4>
                            <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">

                            <div class="row md-form mb-5">
                                <div class="col-md-7">
                                    <label data-error="wrong" data-success="right" for="inputName">Empresa</label>
                                    <input type="text" id="inputEName" class="form-control validate" style="margin-bottom: 10px">
                                </div>
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
                                <select id="inputNivel" style="margin-bottom: 10px" onchange="hide3()">
                                    <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                    @foreach($nivel as $n)
                                        <option value={{$n->id}}> {{$n->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="otroCargo" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otro</label>
                                <div class="md-form mb-5">
                                    <input id="otro_cargo" name="otroCargo" type="text" style="margin-bottom: 10px" />
                                </div>
                            </div>


                            <div id="otroCargo" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otro</label>
                                <div class="md-form mb-5">
                                    <input id="otroCa_nombre" name="otro" type="text" style="margin-bottom: 10px" />
                                </div>
                            </div>

                            <div class="row md-form mb-5">
                                <div class="col-md-7">
                                    <label data-error="wrong" data-success="right" for="inputStart">Fecha de inicio</label>
                                    <input type="date" id="inputDateS" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                </div>
                            </div>

                            <div class="row md-form mb-5">
                                <div class="col-md-7">
                                    <label data-error="wrong" data-success="right" for="inputEnd">Fecha de termino</label>
                                    <input type="date" id="inputDateEn" class="form-control" placeholder="Select Date" style="margin-bottom: 10px">
                                </div>
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputAge">Sueldo en CLP</label><br>
                                <input type="text" id="inputSalIntext" name="quantity" min="100000" max="9000000" style="margin-bottom: 10px">
                            </div>

                            <input class="hide" type="number" id="inputSalIn">

                            <script>
                                document.getElementById("inputSalIntext").onblur =function (){
                                    this.value = parseFloat(this.value.replace(/,/g, ""))
                                        .toFixed(0)
                                        .toString()
                                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                                    document.getElementById("inputSalIn").value = this.value.replace(/,/g, "")
                                }
                            </script>

                            <label data-error="wrong" data-success="right" for="inputOfficeInput">Area</label>
                            <div class="md-form mb-5">
                                <select id="inputArea" style="margin-bottom: 10px">
                                    <option value="0" disabled selected value> -- Seleccionar una opcion -- </option>
                                    @foreach( $areas_trabajo as $ar)
                                        <option value={{$ar->id}}> {{$ar->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div id="otraArea" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otro</label>
                                <div class="md-form mb-5">
                                    <input id="otro_nombre" name="otro" type="text" style="margin-bottom: 10px" />
                                </div>
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
                <div class="modal-dialog modal-lg" role="document">
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
                                <select id="edNivel" style="margin-bottom: 10px" onchange="hide4()">
                                    @foreach($nivel as $n)
                                        <option value={{$n->id}}> {{$n->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="otroCargoed" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otro</label>
                                <div class="md-form mb-5">
                                    <input id="otro_cargoEd" name="otroCargoEd" type="text" style="margin-bottom: 10px" />
                                </div>
                            </div>

                            <script>
                                function hide4() {
                                    if(document.getElementById('edNivel').value == "4") {
                                        document.getElementById("otroCargoed").classList.add("show");
                                    }else{
                                        document.getElementById("otroCargoed").classList.remove("show");
                                    }
                                }
                            </script>

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
                                <input type="text" id="edSaltext" name="quantity" style="margin-bottom: 10px">
                            </div>

                            <input class="hide" type="number" id="edSal">

                            <script>
                                document.getElementById("edSaltext").onblur =function (){
                                    this.value = parseFloat(this.value.replace(/,/g, ""))
                                        .toFixed(0)
                                        .toString()
                                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    document.getElementById("edSal").value = this.value.replace(/,/g, "")
                                }
                            </script>

                            <label data-error="wrong" data-success="right" for="inputOfficeInput">Area</label>
                            <div class="md-form mb-5">
                                <select id="edArea" style="margin-bottom: 10px" onchange="hide()">
                                    @foreach( $areas_trabajo as $ar)
                                        <option value={{$ar->id}}> {{$ar->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="otraAreaed" class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="inputOfficeInput">Otro</label>
                                <div class="md-form mb-5">
                                    <input id="otro_nombre" name="otro" type="text" style="margin-bottom: 10px" />
                                </div>
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
            {{--------------------}}

            {{--tablas--}}
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Datos adicionales</div>
                </div>

                <div class="panel-body" >
                    <!--tabla postgrados-->

                    <div id="postGrados" class="table-editable">

                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modAdd">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar un Postgrado
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
                                    <td class="hidden">{{$p->id}}</td>
                                    <td class="tg-73oq" id="inName">{{$p->nombre}}</td>
                                    <td class="tg-73oq" id="inTipo">{{$p->tipo->nombre}}</td>
                                    <td class="tg-73oq" id="inUni">{{$p->universidad->nombre}}</td>
                                    <td class="tg-73oq" id="inDate">{{$p->fecha_obtencion}}</td>
                                    <td class="tg-vlcj">

                                            <span class="table-edit">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                        <span class="table-remove">
                                            <button type="button" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="hide">
                                <td class="hidden" id="clone_id_ad"></td>
                                <td class="tg-73oq" id="inNamec"></td>
                                <td class="tg-73oq" id="inTipoc"></td>
                                <td class="tg-73oq" id="inUnic"></td>
                                <td class="tg-73oq" id="inDatec"></td>
                                <td class="tg-vlcj">

                                            <span class="table-edit">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                    <span class="table-remove">
                                                <button type="button" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
                                            </span>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{--script de la tabla postgrado--}}
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
                            var sendTipo=$("#inputTipo").val();
                            var sendUni=$("#inputUni").val();
                            var otra_uni=$("#otra_uni").val();

                            document.getElementById("inNamec").innerHTML=iName;
                            document.getElementById("inTipoc").innerHTML=iTipo;
                            document.getElementById("inUnic").innerHTML=iUni;
                            document.getElementById("inDatec").innerHTML=iDat;

                            $.ajax({
                                type: 'POST',
                                url: "{{url('/personaAdd/json')}}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    nombre: iName,
                                    tipo: sendTipo,
                                    univ: sendUni,
                                    date :iDat,
                                    otraUni: otra_uni
                                },
                                success: function (id) {
                                    document.getElementById("clone_id_ad").innerHTML=id;
                                    alert("Postgrado Agregado");
                                    var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide');
                                    $TABLE.find('table').append($clone);
                                }
                            });




                            //$('#postGrados tr:last').parents('tr').find('td:nth-child(2)').text(iName);
                            //$('#postGrados tr:last').parents('tr').find('td:nth-child(3)').text(iTipo);
                            //$('#postGrados tr:last').parents('tr').find('td:nth-child(4)').text(iUni);
                            //$('#postGrados tr:last').parents('tr').find('td:nth-child(5)').text(iDat);

                            $('#modAdd').val($('#inputName').val(""));
                            $('#modAdd').val($('#inputTipo').val(0));
                            $('#modAdd').val($('#inputUni').val(0));
                            $('#modAdd').val($('#inputDate').val("dd-mm-aaaa"));
                            document.getElementById("otraUni").classList.remove("show");





                        });

                        //captura los datos de la tabla y la pasa al modal
                        $('.table-edit').click(function(){

                            var eName=$(this).parents('tr').find('td:nth-child(2)').html();
                            var eTipo=$(this).parents('tr').find('td:nth-child(3)').html();
                            var eUni=$(this).parents('tr').find('td:nth-child(4)').html();
                            var eDat=$(this).parents('tr').find('td:nth-child(5)').html();

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

                        //manda los cambios al controlador
                        $('.table-editm1').click(function(){
                            var id=$(pos).parents('tr').find('td:first').html();
                            $(pos).parents('tr').find('td:nth-child(2)').text($('#NameEdit').val());
                            $(pos).parents('tr').find('td:nth-child(3)').text($('#inputTipoe option:selected').text());
                            $(pos).parents('tr').find('td:nth-child(4)').text($('#inputUnie option:selected').text());
                            $(pos).parents('tr').find('td:nth-child(5)').text($('#inputDateE').val());

                            var sendName=$('#NameEdit').val();
                            var sendTipo=$('#inputTipoe').val();
                            var sendUn=$('#inputUnie').val();
                            var sendDate=$('#inputDateE').val();
                            var sendId=$.trim(id);
                            var sendOtraUni=$('#otra_unied').val();

                            $.ajax({
                                type: 'POST',
                                url: "{{url('/personaEdit/json')}}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    nombre: sendName,
                                    tipo: sendTipo,
                                    univ: sendUn,
                                    date :sendDate,
                                    id:sendId,
                                    otraUni: sendOtraUni,
                                },
                                success: function () {
                                    alert("Postgrado Actualizado");
                                }
                            });

                            document.getElementById("otraUnied").classList.remove("show");
                        });

                        //script para cambiar la pass se mandan los datos al controlador de persona
                        $('.edit-pass').click(function() {
                            var oldPass = $('#inputOldPass').val();
                            var NewPass = $('#inputNewPass').val();
                            var Confirm = $('#ConfirmPass').val();

                            $.ajax({
                                type: 'POST',
                                url: "{{url('/personaPass/json')}}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    opass: oldPass,
                                    password: NewPass,
                                    password_confirmation: Confirm
                                },
                                success: function () {
                                    alert("Clave actualizada!");
                                },
                                error: function () {
                                    alert("Error");
                                },
                            });

                            $('#modAdd').val($('#inputOldPass').val(""));
                            $('#modAdd').val($('#inputNewPass').val(""));
                            $('#modAdd').val($('#ConfirmPass').val(""));


                        });


                        $('.table-remove').click(function () {
                            var result = confirm("Esta seguro de eliminarlo?");
                            var sendIdd=$(this).parents('tr').find('td:first').html();

                            if (result) {
                                //Logic to delete the item
                                $(this).parents('tr').detach();

                                $.ajax({
                                    type: 'POST',
                                    url: "{{url('/personaDelete/json')}}",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        id:sendIdd
                                    },
                                    success: function () {
                                        alert("Postgrado Eliminado");
                                    }
                                });
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

                    <br>
                    <br>

                    <!--tabla tabajos-->
                    <div id="laboral" class="table-editable">

                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modAdd2">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar un Trabajo
                        </button>

                        <table class="tg" id="table">
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

                            @foreach( $aux as $c)

                                <tr>
                                    <td class="hidden">
                                        {{$c->id}}
                                    </td>
                                    <td class="tg-73oq" width="8%" id="inNameT">{{$c->empresa->nombre}}</td>
                                    <td class="tg-73oq" width="13%" id="inTipoT">{{$c->empresa->tipo_empresa->nombre}}</td>
                                    <td class="tg-73oq" width="9%" id="inLvl">{{$c->nivel_cargo->nombre}}</td>
                                    <td class="tg-73oq" width="10%" id="inDateS">{{$c->fecha_inicio}}</td>
                                    <td class="tg-73oq" width="10%" id="inDateE">{{$c->fecha_termino}}</td>
                                    <td class="tg-73oq clp" width="10%" id="inSal"><?php echo number_format($c->sueldo, 0,",",".");?></td>
                                    <td class="tg-73oq" width="10%" id="Area">{{$c->area->nombre}}</td>
                                    <td class="tg-73oq" width="20%" id="Rubro">{{$c->empresa->rubro->nombre}}</td>
                                    <td class="tg-vlcj" width="10%">

                                            <span class="table-edit2">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit2">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                        <span class="table-remove2">
                                            <button type="button" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                        @endforeach



                        <!--tabla clonable-->
                            <tr class="hide" id="tn">
                                <td class="hidden" id="clone_id">

                                </td>
                                <td class="tg-73oq" width="8%" id="inNameTc"></td>
                                <td class="tg-73oq" width="13%" id="inTipoTc"></td>
                                <td class="tg-73oq" width="9%" id="inLvlc"></td>
                                <td class="tg-73oq" width="10%" id="inDateSc"></td>
                                <td class="tg-73oq" width="10%" id="inDateEc"></td>
                                <td class="tg-73oq clp" width="10%" id="inSalc"></td>
                                <td class="tg-73oq" width="10%" id="Areac"></td>
                                <td class="tg-73oq" width="20%" id="Rubroc"></td>
                                <td class="tg-vlcj" width="10%" >

                                            <span class="table-edit2">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modEdit2">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </span>

                                    <span class="table-remove2">
                                                <button type="button" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
                                            </span>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{--script de la tabla trabajos--}}
                    <script>

                        const formatter = new Intl.NumberFormat('es-CL', {
                            //style: 'currency',
                            //currency: 'CLP',
                            minimumFractionDigits: 0
                        })

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
                            //obtener nombre otro y vaciar
                            var otro_nombre = $('#otro_nombre').val();
                            var otro_cargo = $('#otro_cargo').val();
                            document.getElementById("otro_nombre").value="";

                            document.getElementById("inNameTc").innerHTML=iEName;
                            document.getElementById("inTipoTc").innerHTML=iTipoE;
                            document.getElementById("inLvlc").innerHTML=iTipoT;
                            document.getElementById("inDateSc").innerHTML=iDatS;
                            document.getElementById("inDateEc").innerHTML=iDatE;
                            document.getElementById("inSalc").innerHTML=formatter.format(iSal);
                            document.getElementById("Areac").innerHTML=iArea;
                            document.getElementById("Rubroc").innerHTML=iRubro;

                            var sendLvl=$("#inputNivel").val();
                            var sendArea=$("#inputArea").val();
                            var sendTemp=$("#inputETipo").val();
                            var sendRu=$("#inputRubro").val();
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/cargoAdd/json')}}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    fechaS:iDatS,
                                    fechaE:iDatE,
                                    sueldo:iSal,
                                    lvl: sendLvl,
                                    area: sendArea,
                                    nombre :iEName,
                                    tipoEmp:sendTemp,
                                    rubro:sendRu,
                                    otro: otro_nombre,
                                    otroCargo: otro_cargo,
                                },
                                success: function(idce) {
                                    document.getElementById("clone_id").innerHTML=idce;
                                    alert("Trabajo Agregado");
                                    var $clone = $TABLE2.find('tr.hide').clone(true).removeClass('hide');
                                    $TABLE2.find('table').append($clone);
                                },
                                error: function(){
                                    alert("Datos invalidos");
                                }
                            });
                            $('#modEdit2').val($('#inputEName').val(""));
                            $('#modEdit2').val($('#inputETipo').val(0));
                            $('#modEdit2').val($('#inputNivel').val(0));
                            $('#modEdit2').val($('#inputDateS').val("dd-mm-aaaa"));
                            $('#modEdit2').val($('#inputDateEn').val("dd-mm-aaaa"));
                            $('#modEdit2').val($('#inputSalIn').val(""));
                            $('#modEdit2').val($('#inputArea').val(0));
                            $('#modEdit2').val($('#inputRubro').val(0));

                            document.getElementById("otraArea").classList.remove("show");
                            document.getElementById("otroCargo").classList.remove("show");




                            //var sendTipoE=$("#inputETipo").val();
                            //var sendTipoT=$("#inputNivel").val();
                            //var sendArea=$("#inputArea").val();
                            //var sendRubro=$("#inputRubro").val();


                        });

                        $('.table-edit2').click(function(){
                            var edName=$(this).parents('tr').find('td:nth-child(2)').html();
                            var eTipoE=$(this).parents('tr').find('td:nth-child(3)').html();
                            var eTipoT=$(this).parents('tr').find('td:nth-child(4)').html();
                            var eDatS=$(this).parents('tr').find('td:nth-child(5)').html();
                            var eDatE=$(this).parents('tr').find('td:nth-child(6)').html();
                            var eSal=$(this).parents('tr').find('td:nth-child(7)').html();
                            var eArea=$(this).parents('tr').find('td:nth-child(8)').html();
                            var eRubro=$(this).parents('tr').find('td:nth-child(9)').html();
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
                            $('#modEdit2').val($('#edSaltext').val(eSal.replace(".", ",")));
                            $('#modEdit2').val($('#edSal').val(eSal.replace(".", "")));

                            //$('#modEdit2').val($('#edSal').val(eSal));
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
                            var idc2=$(pos2).parents('tr').find('td:first').html();
                            $(pos2).parents('tr').find('td:nth-child(2)').text($('#edEName').val());
                            $(pos2).parents('tr').find('td:nth-child(3)').text($('#edETipo option:selected').text());
                            $(pos2).parents('tr').find('td:nth-child(4)').text($('#edNivel option:selected').text());
                            $(pos2).parents('tr').find('td:nth-child(5)').text($('#edDateS').val());
                            $(pos2).parents('tr').find('td:nth-child(6)').text($('#edDateE').val());
                            $(pos2).parents('tr').find('td:nth-child(7)').text(formatter.format($('#edSal').val()));
                            //$(pos2).parents('tr').find('td:nth-child(7)').text($('#edSal').val());
                            $(pos2).parents('tr').find('td:nth-child(8)').text($('#edArea option:selected').text());
                            $(pos2).parents('tr').find('td:nth-child(9)').text($('#edRubro option:selected').text());

                            var sendLvle=$("#edNivel").val();
                            var sendAreae=$("#edArea").val();
                            var sendTempe=$("#edETipo").val();
                            var sendRue=$("#edRubro").val();
                            var datS=$('#edDateS').val();
                            var datE=$('#edDateE').val();
                            var sal=$('#edSal').val();
                            var name=$('#edEName').val();
                            var otro_cargo=$('#otro_cargoEd').val();



                            $.ajax({
                                type: 'POST',
                                url: "{{url('/cargoEdit/json')}}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    fechaS:datS,
                                    fechaE:datE,
                                    sueldo:sal,
                                    lvl: sendLvle,
                                    area: sendAreae,
                                    nombre :name,
                                    tipoEmp:sendTempe,
                                    rubro:sendRue,
                                    id:idc2,
                                    otroCargo: otro_cargo,
                                },
                                success: function () {
                                    alert("Trabajo Actualizado");
                                }
                            });
                            document.getElementById("otroCargoed").classList.remove("show");
                            document.getElementById("otraAreaed").classList.remove("show");
                        });

                        $('.table-remove2').click(function () {
                            var result = confirm("Esta seguro de eliminarlo?");
                            var sendIdc=$(this).parents('tr').find('td:first').html();
                            if (result) {
                                //Logic to delete the item
                                $(this).parents('tr').detach();
                                $.ajax({
                                    type: 'POST',
                                    url: "{{url('/cargoDelete/json')}}",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        id:sendIdc
                                    },
                                    success: function () {
                                        alert("Trabajo Eliminado");
                                    }
                                });
                            }

                        });


                    </script>

                </div>

            </div>

        </div>
    </div>

    <script>
        const source = document.querySelector("#inputArea");
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
    


@endsection