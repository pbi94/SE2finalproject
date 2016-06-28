@extends('admin.layouts.adminlayout')

@section('Content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register an Driver</h3>
                <div class="panel-options">
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">–</span>
                        <span class="expand-icon">+</span>
                    </a>
                    <a href="#" data-toggle="remove">
                        ×
                    </a>
                </div>
            </div>

            <div class="panel-body ">
                <!--             begin: Form             -->
                {!! Form::open(array('url' => 'admin/addDriver/add', 'method' => "post", 'role'=> "form", 'id' =>"addDriver" , 'class'=>"form-horizontal")) !!}
                    <div class="form-group">
                        {!! Form::label('username', 'Username',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-user"></i></span>
                                {!! Form::text('username', '',array('class'=>"form-control", 'id'=>"username", 'autocomplete'=>"off", 'placeholder'=>"Username",'maxlength'=>"20")) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-lock"></i></span>
                                <input type="Password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('name', 'Personal Detail',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-user"></i></span>
                                <input type="text" name="family" id="family" class="form-control" placeholder="Family">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('phonenumber', 'Phone Number',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-phone-square"></i></span>
                                <input type="number" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phone Number" maxlength="11" minlenght="10">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('hourlywage', 'Cost per Hour',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-money"></i></span>
                                <input type="number" name="hourlywage" id="hourlywage" class="form-control" placeholder="Cost per Hour" maxlength="11">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('plate', 'License Plate',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="car fa-car"></i></span>
                                <input type="text" name="plate" id="plate" class="form-control" placeholder="License Plate" maxlength="11">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('vehicletype', 'Car Type',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="car fa-car"></i></span>
                                <select class="form-control" name="vehicletype" id="vehicletype">
                                    @foreach($vehicle as $v)
                                    <option>{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('starttime', 'Work Time',array('class'=>"col-sm-2 control-label")) !!}
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" fa-hourglass-start"></i></span>
                                <input type="time" name="starttime" id="starttime" class="form-control" maxlength="11">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa-hourglass-end"></i></span>
                                <input type="time" name="endtime" id="endtime" class="form-control" maxlength="11">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <div class="col-sm-12" style="text-align: -webkit-right;">
                            <div class="input-group">
                                <button type="submit" class="btn btn-blue">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!--            end: Form           -->
            </div>
        </div>

    </div>
    @endsection

    @section('Username')
    {{ $userD->name . " " .  $userD->family }}
    @stop

    @section('Email')
    {{ $userD->email }}
    @stop

    @section('EventNum')
            <!-- TODO: set Event Number -->
    5
@stop

@section('BottomScript')
        <!-- Bottom Scripts -->
    <script src="{{ url('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/js/TweenMax.min.js"></script>
    <script src="{{ url('assets') }}/js/resizeable.js"></script>
    <script src="{{ url('assets') }}/js/joinable.js"></script>
    <script src="{{ url('assets') }}/js/xenon-api.js"></script>
    <script src="{{ url('assets') }}/js/xenon-toggles.js"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets') }}/js/xenon-widgets.js"></script>
    <script src="{{ url('assets') }}/js/devexpress-web-14.1/js/globalize.min.js"></script>
    <script src="{{ url('assets') }}/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
    <script src="{{ url('assets') }}/js/toastr/toastr.min.js"></script>





    <!-- JavaScripts initializations and stuff -->
    <script src="{{ url('assets') }}/js/xenon-custom.js"></script>
@stop