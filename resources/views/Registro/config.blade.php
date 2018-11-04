
/**
 * Created by PhpStorm.
 * User: Naitsirc
 * Date: 04-11-2018
 * Time: 16:06
 */

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
                    <form method="post" action=".">
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />


                        <form  class="form-horizontal" method="post" >
                            <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />


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
@endsection