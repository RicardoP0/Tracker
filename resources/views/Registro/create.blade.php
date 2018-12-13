@extends('layouts.master')

@section('content')


<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Registro</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Ingresar</a></div>
            </div>
            <div class="panel-body" >
                <form  class="form-horizontal" method="post" action="/us/er">
                {{csrf_field()}}
                <!--preguntas-->
                    <div id="div_id_name" class="form-group required">
                        <label for="id_name" class="control-label col-md-4  requiredField">Nombre<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_name" name="name" placeholder="Ingrese su nombre" style="margin-bottom: 10px" />
                        </div>
                    </div>

                    <div id="div_id_rut" class="form-group required">
                        <label for="id_rut" class="control-label col-md-4  requiredField"> Rut<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md rutinput form-control" id="id_rut" name="rut" placeholder="Ingrese su rut" style="margin-bottom: 10px" type="rut"  />
                        </div>
                    </div>

                    <div id="div_id_email" class="form-group required">
                        <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md emailinput form-control" id="id_email" name="email" placeholder="Correo" style="margin-bottom: 10px" type="email" />
                        </div>
                    </div>

                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">Password<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password" placeholder="Cree una contraseña" style="margin-bottom: 10px" type="password" />
                        </div>
                    </div>

                    <div id="div_id_gender" class="form-group required">
                        <label for="id_gender"  class="control-label col-md-4  requiredField"> Genero<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 "  style="margin-bottom: 15px">
                            <label class="radio-inline"> <input type="radio" required name="gender" id="id_gender_1" value="hombre"  style="margin-bottom: 10px">Masculino</label>
                            <label class="radio-inline"> <input type="radio" required name="gender" id="id_gender_2" value="mujer"  style="margin-bottom: 10px">Femenino </label>
                        </div>
                    </div>

                    <div id="div_id_date" class="form-group required">
                        <label for="id_date" class="control-label col-md-4  requiredField"> Fecha de nacimiento<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required id="date" type="date" name="bdate" style="margin-bottom: 10px">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-8 ">
                            <input type="submit" name="Signup" value="Registrarse" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                        </div>
                    </div>

                </form>



            </div>
        </div>
    </div>
</div>
@endsection