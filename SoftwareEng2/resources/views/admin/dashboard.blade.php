@extends('admin.layouts.adminlayout')

@section('Content')
    <div class="row">
        <div class="col-md-12">

            <!-- Collapsed panel -->
            <div class="panel panel-inverted"><!-- Add class "collapsed" to minimize the panel -->
                <div class="panel-heading">
                    <h3 class="panel-title">This panel is collapsed by default</h3>

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

                <div class="panel-body">

                    <p>In entirely be to at settling felicity. Fruit two match men you seven share. Needed as or is enough points. Miles at smart ﻿no marry whole linen mr. Income joy nor can wisdom summer. Extremely depending he gentleman improving intention rapturous as. </p>
                    <p>Picture removal detract earnest is by. Esteems met joy attempt way clothes yet demesne tedious. Replying an marianne do it an entrance advanced. Two dare say play when hold. Required bringing me material stanhill jointure is as he. Mutual indeed yet her living result matter him bed whence. </p>

                </div>
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