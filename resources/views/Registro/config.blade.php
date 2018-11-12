
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

@extends('layouts.master')

@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <div class="container">

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
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
                            </li>
                        </ul>

                        <h4>Postgrados</h4>

                        <table class="tg">
                            <tr>
                                <th class="tg-73oq">nombre</th>
                                <th class="tg-73oq">universidad<br></th>
                                <th class="tg-73oq">fecha de obtención</th>
                            </tr>
                            <tr>
                                @foreach( $post as $p)
                                <tr>
                                    <td class="tg-73oq">{{$p->nombre}}</td>
                                    <td class="tg-73oq">{{$p->tipo}}</td>
                                    <td class="tg-vlcj">{{$p->fecha_obtencion}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>

                        <br>
                        <br>

                        <div id="div_id_name" class="form-group required">
                            <label for="id_name" class="control-label col-md-4  requiredField">Selecionar postgrado<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <select style="margin-bottom: 10px">
                                    @foreach( $post as $p)
                                        <option value={{$p->id}}> {{$p->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="div_id_name" class="form-group required">
                            <label for="id_name" class="control-label col-md-4  requiredField">Opciones de postgrado<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <button id="addMore">Agregar</button>
                                <button id="delete">eliminar</button>
                                <button id="edit">editar</button>
                            </div>
                        </div>


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