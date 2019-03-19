@extends('layouts.master')

@section('content')


<div class="container">

    <div id="signupbox" style=" margin-top:2%" class="mainbox col-md-7  col-sm-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Registro</div>
            </div>
            <div class="panel-body" >
                <form  class="form-horizontal" method="post" action="/user">
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
                            <input required oninput="checkRut(this)" class="input-md rutinput form-control" id="id_rut" name="rut" placeholder="Ingrese su rut" style="margin-bottom: 10px" type="rut"  />
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

                    <div id="div_id_password1" class="form-group required">
                        <label for="password-confirm" class="control-label col-md-4  requiredField">Confirm password<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Vuelva a escribir su contraseña" required>
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

                    <input class="hide" id="op" type="date" name="op" value="0" style="margin-bottom: 10px">

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

    <script>
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.','');
            // Despejar Guión
            valor = valor.replace('-','');

            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-'+ dv

            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;

            // Para cada dígito del Cuerpo
            for(i=1;i<=cuerpo.length;i++) {

                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);

                // Sumar al Contador General
                suma = suma + index;

                // Consolidar Múltiplo dentro del rango [2,7]
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

            }

            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);

            // Casos Especiales (0 y K)
            dv = (dv == 'K')?10:dv;
            dv = (dv == 0)?11:dv;

            // Validar que el Cuerpo coincide con su Dígito Verificador
            if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }
    </script>

@endsection