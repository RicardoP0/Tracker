@extends('layouts.master')

@section('content')

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
        .tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
        .tg .tg-vlcj{font-family:serif !important;;border-color:#000000;text-align:left;vertical-align:top}

        .columnLabel {
            float: left;
            width: 25%;
            margin-left: 2%;
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
    </style>

    <div class="container">
        <div id="signupbox" style=" margin-top:2%" class="mainbox col-md-7">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Administración de cuentas</div>
                </div>

                <!---modals---->
                <div method="add" action="/permisos" class="modal fade addNewInputs" id="modAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Agregar nuevo usuario</h4>
                                <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">Nombre</label>
                                        <input type="text" id="id_name" name="name" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">Rut</label>
                                        <input type="text" id="id_rut" name="rut" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">E-mail</label>
                                        <input type="text" id="id_email" name="email" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">Contraseña</label>
                                        <input type="password" id="id_password1" name="password" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">Confirme Contraseña</label>
                                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 10px">
                                    <div class="columnLabel">
                                        <label data-error="wrong" data-success="right">Genero</label>
                                    </div>
                                    <div class="columnInput">
                                        <select name="gender" id="genero">
                                            <option value="hombre">Masculino</option>
                                            <option value="mujer">Femenino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="columnLabel">
                                        <label data-error="wrong" data-success="right">Fecha de nacimiento</label>
                                    </div>
                                    <div class="columnInput">
                                        <input required id="date" type="date" name="bdate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="columnLabel">
                                        <label data-error="wrong" data-success="right">Privilegio</label>
                                    </div>
                                    <div class="columnInput">
                                        <select id="op" style="margin-bottom: 10px">
                                            {{--<option value="0" disabled selected value> -- Seleccionar una opcion -- </option>--}}
                                            <option value="2">user</option>
                                            <option value="1">admin</option>
                                        </select>
                                    </div>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Editar Trabajo</h4>
                                <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">Nombre</label>
                                        <input type="text" id="id_nameEd" name="name" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">Rut</label>
                                        <input type="text" id="id_rutEd" name="rut" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                <div class="row md-form mb-5">
                                    <div class="col-md-7">
                                        <label data-error="wrong" data-success="right">E-mail</label>
                                        <input type="text" id="id_emailEd" name="email" class="form-control validate" style="margin-bottom: 10px">
                                    </div>
                                </div>

                                {{--<div class="row" style="margin-bottom: 10px">--}}
                                    {{--<div class="columnLabel">--}}
                                        {{--<label data-error="wrong" data-success="right">Genero</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="columnInput">--}}
                                        {{--<select name="gender" id="generoEd">--}}
                                            {{--<option value="hombre">Masculino</option>--}}
                                            {{--<option value="mujer">Femenino</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="row">
                                    <div class="columnLabel">
                                        <label data-error="wrong" data-success="right">Privilegio</label>
                                    </div>
                                    <div class="columnInput">
                                        <select id="opEd" style="margin-bottom: 10px">
                                            {{--<option value="0" disabled selected value> -- Seleccionar una opcion -- </option>--}}
                                            <option value="2">user</option>
                                            <option value="1">admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                        <span class="table-editm float-right mb-3 mr-2">
                                            <button class="btn btn-outline-secondary btn-block editInside" data-dismiss="modal">Aceptar
                                                <i class="fa fa-paper-plane-o ml-1"></i>
                                            </button>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            {{--------------------}}

            <!--tabla usuarios-->

                <div id="usuarios" class="table-editable">

                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modAdd">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar un nuevo usuario
                    </button>

                    <table class="tg" id="table">

                        <tr>
                            <th class="tg-73oq">Nombre</th>
                            <th class="tg-73oq">Rut<br></th>
                            <th class="tg-73oq">Email</th>
                            {{--<th class="tg-73oq">Genero</th>--}}
                            <th class="tg-73oq">Privilegio</th>
                            <th class="tg-73oq"></th>
                        </tr>
                        <tr>
                        @foreach($usuarios as $u)
                            <tr>
                                <td class="hidden">{{$u->id}}</td>
                                <td class="tg-73oq" id="inName">{{$u->name}}</td>
                                <td class="tg-73oq" id="inTipo">{{$u->rut}}</td>
                                <td class="tg-73oq" id="inEmail">{{$u->email}}</td>
                                {{--<td class="tg-73oq" id="inGen">{{$u->persona->genero}}</td>--}}
                                <td class="tg-73oq" id="inPriv">{{$u->roles->first()->name}}</td>

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
                            <td class="tg-73oq" id="inRutc"></td>
                            <td class="tg-73oq" id="inEmailc"></td>
                            {{--<td class="tg-73oq" id="inGenc"></td>--}}
                            <td class="tg-73oq" id="inPrivc"></td>
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

                {{--script de la tabla--}}
                <script>

                    var $TABLE = $('#usuarios');
                    var $BTN = $('#export-btn');
                    var $EXPORT = $('#export');
                    var pos;

                    $('.table-add').click(function () {
                        var iName = $('#id_name').val();
                        var iRut = $("#id_rut").val();
                        var iEmail = $("#id_email").val();
                        var iPass = $('#id_password1').val();
                        var gen = $("#genero option:selected").val();
                        var iDate = $('#date').val();
                        var PassCon=$('#password-confirm').val();
                        var iop=$('#op').val();

                        document.getElementById("inNamec").innerHTML=iName;
                        document.getElementById("inRutc").innerHTML=iRut;
                        document.getElementById("inEmailc").innerHTML=iEmail;
                        //document.getElementById("inGenc").innerHTML=gen;
                        document.getElementById("inPrivc").innerHTML=$('#op option:selected').text();

                        $.ajax({
                            type: 'POST',
                            url: "{{url('userAdd/json')}}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                name: iName,
                                rut: iRut,
                                email: iEmail,
                                password :iPass,
                                password_confirmation: PassCon,
                                gender: gen,
                                bdate: iDate,
                                op: iop
                            },
                            success: function (id) {
                                document.getElementById("clone_id_ad").innerHTML=id;
                                alert("Usuario agregado");
                                var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide');
                                $TABLE.find('table').append($clone);
                            }
                        });


                        $('#modAdd').val($('#id_name').val(""));
                        $('#modAdd').val($('#id_rut').val(""));
                        $('#modAdd').val($('#id_email').val(""));
                        $('#modAdd').val($('#id_password1').val(""));
                        $('#modAdd').val($('#password-confirm').val(""));
                        $('#modAdd').val($('#genero').val(0));
                        $('#modAdd').val($('#date').val(""));


                    });

                    $('.table-edit').click(function(){

                        var eName=$(this).parents('tr').find('td:nth-child(2)').html();
                        var eRut=$(this).parents('tr').find('td:nth-child(3)').html();
                        var eEmail=$(this).parents('tr').find('td:nth-child(4)').html();
                        //var eGen=$(this).parents('tr').find('td:nth-child(5)').html();
                        var ePriv=$(this).parents('tr').find('td:nth-child(5)').html();

                        $('#modEdit').val($('#id_nameEd').val(eName));
                        $('#modEdit').val($('#id_rutEd').val(eRut));
                        $('#modEdit').val($('#id_emailEd').val(eEmail));
                        //$('#modEdit').val($('#generoEd').val(eGen));
                        if(ePriv=="user"){
                            ePriv=2;
                        }else{
                            ePriv=1;
                        }
                        $('#modEdit').val($('#opEd').val(ePriv));

                        // var aux = $.trim(eName);
                        // $('#modEdit').val($('#NameEdit').val(aux));
                        // aux = $.trim(eTipo);
                        // for($i=0;$i<window.tipo.length;$i++){
                        //     if(tipo[$i].nombre == aux){
                        //         $('#modEdit').val($('#inputTipoe').val(tipo[$i].id));
                        //         break;
                        //     }
                        // }
                        // aux = $.trim(eUni);
                        // for($i=0;$i<window.uni.length;$i++){
                        //     if(uni[$i].nombre == aux){
                        //         $('#modEdit').val($('#inputUnie').val(uni[$i].id));
                        //         break;
                        //     }
                        // }
                        // $('#modEdit').val($('#inputDateE').val(eDat));
                        pos=this;




                    });

                    $('.table-editm').click(function(){
                        var id=$(pos).parents('tr').find('td:first').html();


                        var sendName=$('#id_nameEd').val();
                        var sendTipo=$('#id_rutEd').val();
                        var sendEmail=$('#id_emailEd').val();
                        //var sendGen=$('#generoEd').val();
                        var sendOp=$('#opEd').val();
                        var sendId=$.trim(id);

                        $.ajax({
                            type: 'POST',
                            url: "{{url('/userUp/json')}}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: sendId,
                                name: sendName,
                                rut: sendTipo,
                                email: sendEmail,
                                //gender: sendGen,
                                op: sendOp
                            },
                            success: function () {
                                alert("Usuario Actualizado");
                                $(pos).parents('tr').find('td:nth-child(2)').text($('#id_nameEd').val());
                                $(pos).parents('tr').find('td:nth-child(3)').text($('#id_rutEd').val());
                                $(pos).parents('tr').find('td:nth-child(4)').text($('#id_emailEd').val());
                                //$(pos).parents('tr').find('td:nth-child(5)').text($('#generoEd').val());

                                if($('#opEd').val()==2){
                                    $(pos).parents('tr').find('td:nth-child(5)').text("user");
                                }else{
                                    $(pos).parents('tr').find('td:nth-child(5)').text("admin");
                                }
                            },
                            error: function() {
                                alert("Error");
                            },
                        });
                    });


                    $('.table-remove').click(function () {
                        var result = confirm("Esta seguro de eliminarlo?");
                        var sendIdd=$(this).parents('tr').find('td:first').html();

                        if (result && sendIdd!=1) {
                            //Logic to delete the item
                            $(this).parents('tr').detach();

                            $.ajax({
                                type: 'POST',
                                url: "{{url('userDel/json')}}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: sendIdd
                                },
                                success: function () {
                                    if(sendIdd!=1){
                                        alert("Usuario Eliminado");
                                    }else{

                                    }
                                }
                            });
                        }
                        if(sendIdd==1){
                            alert("Error no se puede eliminar el administrador original");
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

            </div>
        </div>
    </div>
@endsection