
 * Created by PhpStorm.
 * User: Naitsirc
 * Date: 03-11-2018
 * Time: 18:04
 */
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Registro</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Ingresar</a></div>
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
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" placeholder="Escriba su nombre" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div id="div_id_rut" class="form-group required">
                            <label for="id_rut" class="control-label col-md-4  requiredField"> Rut<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md rutinput form-control" id="id_rut" name="rut" placeholder="Ingrese su rut" style="margin-bottom: 10px" type="rut" />
                            </div>
                        </div>

                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Genero<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px">Masculino</label>
                                <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Femenino </label>
                            </div>
                        </div>

                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="Correo" style="margin-bottom: 10px" type="email" />
                            </div>
                        </div>

                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">Password<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_password1" name="password1" placeholder="Cree una contraseña" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>

                        <div id="div_id_password2" class="form-group required">
                             <label for="id_password2" class="control-label col-md-4  requiredField"> Re:password<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_password2" name="password2" placeholder="Confirme su contraseña" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>

                        <div id="div_id_date" class="form-group required">
                            <label for="id_date" class="control-label col-md-4  requiredField"> fecha de nacimiento<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input id="date" type="date" style="margin-bottom: 10px">
                            </div>
                        </div>

                        <div id="div_id_year_in" class="form-group required">
                            <label for="id_year_in" class="control-label col-md-4  requiredField"> año de ingreso<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="number" placeholder="YYYY" min="1940" max="2100" style="margin-bottom: 10px">
                            </div>
                        </div>

                        <div id="div_id_year_out" class="form-group required">
                            <label for="id_year_out" class="control-label col-md-4  requiredField"> año de egreso<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="number" placeholder="YYYY" min="1940" max="2100" style="margin-bottom: 10px">
                            </div>
                        </div>

                        <div id="div_id_year_gra" class="form-group required">
                            <label for="id_year_gra" class="control-label col-md-4  requiredField"> año de titulación<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="number" placeholder="YYYY" min="1940" max="2100" style="margin-bottom: 10px">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="controls col-md-offset-4 col-md-8 ">
                                <div id="div_id_terms" class="checkbox required">
                                    <label for="id_terms" class=" requiredField">
                                         <input class="input-ms checkboxinput" id="id_terms" name="terms" style="margin-bottom: 10px" type="checkbox" />
                                         Agree with the terms and conditions
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Signup" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div>

                    </form>

                </form>
            </div>
        </div>
    </div>
</div>






</div>