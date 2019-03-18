@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Administrar area</div>
            </div>
        <div class="container">
            <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Asignar area</div>
                    </div>
                    <div class="panel-body" >
                        <form  class="form-horizontal" method="post" action="/otros/0">
                            @method('PUT')
                            {{csrf_field()}}

                            <div id="div_id_otro" class="form-group required">
                                <label for="id_otro" class="control-label col-md-4  requiredField"> Area nueva<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <select style="margin-bottom: 10px" name="otros_area">
                                        @foreach($otros as $otro)
                                            <option value="{{$otro->id}}">{{$otro->nombre_area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="div_id_name" class="form-group required">
                                <label for="id_name" class="control-label col-md-4  requiredField">Nombre area <span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <select style="margin-bottom: 10px" name="new_area">
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}">{{$area->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8 ">
                                    <input type="submit" name="Signup" value="Asignar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Crear nueva area</div>
                    </div>
                    <div class="panel-body" >
                        <form  class="form-horizontal" method="post" action="/otros">
                            {{csrf_field()}}
                            <div id="div_id_otro" class="form-group required">
                                <label for="id_otro" class="control-label col-md-4  requiredField"> Area nueva<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <select style="margin-bottom: 10px" name="otros_area">
                                        @foreach($otros as $otro)
                                            <option value={{$otro->id}}>{{$otro->nombre_area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="div_id_name" class="form-group required">
                                <label for="id_name" class="control-label col-md-4  requiredField">Nombre area <span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input required class="input-md textinput textInput form-control" id="id_name" name="new_area_name" placeholder="Ingrese su nuevo area" style="margin-bottom: 10px" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8 ">
                                    <input type="submit" value="Asignar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Administrar universidades</div>
            </div>
            <div class="container">
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Asignar area</div>
                        </div>
                        <div class="panel-body" >
                            <form  class="form-horizontal" method="post" action="/universidad">
                                {{csrf_field()}}

                                <div id="div_id_otro" class="form-group required">
                                    <label for="id_otro" class="control-label col-md-4  requiredField"> Area nueva<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">

                                        <select style="margin-bottom: 10px" name="otros_univ">

                                            @foreach($universidades as $universidad)
                                                <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="div_id_name" class="form-group required">
                                    <label for="id_name" class="control-label col-md-4  requiredField">Nombre area <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input required class="input-md textinput textInput form-control" id="id_name" name="new_univ_name" placeholder="Ingrese nombre de universidad" style="margin-bottom: 10px" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="aab controls col-md-4 "></div>
                                    <div class="controls col-md-8 ">
                                        <input type="submit" name="Signup" value="Asignar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Administrar cargos</div>
            </div>
            <div class="container">
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Asignar cargo</div>
                        </div>
                        <div class="panel-body" >
                            <form  class="form-horizontal" method="post" action="/nivelcargo">
                                {{csrf_field()}}

                                <div id="div_id_otro" class="form-group required">
                                    <label for="id_otro" class="control-label col-md-4  requiredField"> Area nueva<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">

                                        <select style="margin-bottom: 10px" name="otros_cargo">

                                            @foreach($cargos as $cargo)
                                                <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="div_id_name" class="form-group required">
                                    <label for="id_name" class="control-label col-md-4  requiredField">Nombre area <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input required class="input-md textinput textInput form-control" id="id_name" name="new_cargo_name" placeholder="Ingrese nombre de universidad" style="margin-bottom: 10px" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="aab controls col-md-4 "></div>
                                    <div class="controls col-md-8 ">
                                        <input type="submit" name="Signup" value="Asignar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Asignar cargo</div>
                        </div>
                        <div class="panel-body" >
                            <form  class="form-horizontal" method="post" action="/nivelcargo/0">
                                @method('PUT')
                                {{csrf_field()}}

                                <div id="div_id_otro" class="form-group required">
                                    <label for="id_otro" class="control-label col-md-4  requiredField"> Area nueva<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">

                                        <select style="margin-bottom: 10px" name="otros_cargo">

                                            @foreach($cargos as $cargo)
                                                <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="div_id_name" class="form-group required">
                                    <label for="id_name" class="control-label col-md-4  requiredField">Nombre area <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <select style="margin-bottom: 10px" name="new_cargo_name">
                                            @foreach($niveles as $nivel)
                                                <option value="{{$nivel->id}}">{{$nivel->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="aab controls col-md-4 "></div>
                                    <div class="controls col-md-8 ">
                                        <input type="submit" name="Signup" value="Asignar" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection