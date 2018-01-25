@extends('layout.app')

@section('content')
    <div id="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <p class="huge well page-header">Welcome to the Dashboard {{$user->firstname}}!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                    <!-- <i class="fa fa-comments fa-5x"></i> -->
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$projects}}</div>
                                    <div>Total Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('projects')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book     fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$events}}</div>
                                    <div>Total Events</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('viewevents')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$staffs}}</div>
                                    <div>Total Staffs</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('staffs')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$vols}}</div>
                                    <div>Total Volunteers</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('vols')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            <div class="huge col-lg-12 text-center">iCOMMP Calendar</div>
            <div class="col-lg-12 well" id="calendar"></div>
          </div>
    </div>
@endsection
