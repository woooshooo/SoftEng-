@extends('layout.app')

@section('content')
    <div id="wrapper">
            <div class="row">
              <br>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                    <!-- <i class="fa fa-comments fa-5x"></i> -->
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$projectscount}}</div>
                                    <div>Total Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('projects')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Projects</span>
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
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$eventscount}}</div>
                                    <div>Total Events</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('events')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Events</span>
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
                                    <div class="huge">{{$staffscount}}</div>
                                    <div>Total Staffs</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('staffs')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Staffs</span>
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
                                    <div class="huge">{{$volscount}}</div>
                                    <div>Total Volunteers</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('vols')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Volunteers</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <img src="{{asset("images/logo.png")}}" alt="" style="width:100%">
                  </div>
                </div>


                <div class="row">
                  <div class="col-lg-12">
                    <hr>
                  </div>
                </div>

            <!-- ONGOING                    -->
                <div class="row">
                  <div class="col-lg-6">
                    <!-- /.col-lg-8 -->
                    <br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Ongoing Projects
                            </div>
                            <div class="progress progress-striped active">
                  						<div class="progress-bar progress-bar-info" name="progress_bar" role="progressbar" aria-valuenow="{{$projectsprogress}}%" aria-valuemin="0" aria-valuemax="100" style="width:{{$projectsprogress}}%">{{$projectsprogress}}%</div>
                  					</div>
                            <!-- /.panel-heading -->
                            <div class="panel-body scrollbox">
                                <div class="list-group">
                                  @foreach ($projects as $kp => $project)
                                    @if ($project->projects_status == 'Ongoing')
                                      <a href="/projects/{{$project->projects_id}}" class="list-group-item">
                                          <i class="fa fa-tasks fa-fw"></i> {{$project->projects_name}}
                                          <span class="pull-right text-muted small">
                                            <em>{{($currdate->diff($project->created_at))->format('%D days %H hours %I minutes ago')}}</em>
                                          </span>
                                      </a>
                                    @endif
                                  @endforeach
                                </div>
                            </div>
                            <!-- /.panel-body -->
                  </div>
                </div>
                <div class="col-lg-6">
                  <!-- /.col-lg-8 -->
                  <br><br>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <i class="fa fa-bell fa-fw"></i> Ongoing Events
                          </div>
                          <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-info" name="progress_bar" role="progressbar" aria-valuenow="{{$eventsprogress}}%" aria-valuemin="0" aria-valuemax="100" style="width:{{$eventsprogress}}%">{{$eventsprogress}}%</div>
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body scrollbox">
                              <div class="list-group" style="margin:auto; padding:auto">
                                @foreach ($events as $ke => $event)
                                  @if ($event->events_status == 'Ongoing')
                                    <a href="/events/{{$event->events_id}}" class="list-group-item" >
                                        <i class="fa fa-book fa-fw"></i> {{$event->events_name}}
                                        <span class="pull-right text-muted small">
                                          <em>{{($currdate->diff($event->created_at))->format('%D days %H hours %I minutes ago')}}</em>
                                        </span>
                                    </a>
                                  @endif
                                @endforeach
                              </div>
                          </div>
                          <!-- /.panel-body -->
                </div>
              </div>

              </div>
                <div class="row">
                    <div class="col-lg-6">
                      <h3>Event Rankings</h3>
                      <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-eventrank">
                        <thead>
                          <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Total Assigned</th>
                            <th>Worked</th>
                          </tr>
                        </thead>
                        @foreach ($eventrank as $erkey => $er)
                          @foreach ($profiles as $profile)
                            @if ($er->profile_id == $profile->profile_id)
                              <tr class="clickable-row" data-href="/vols/{{$profile->profile_id}}">
                                <td>{{$erkey+1}}</td>
                                <td>{{$profile->firstname}} {{$profile->lastname}}</td>
                                <td>{{$er->total}}</td>
                                <td>{{$er->worked}}</td>
                              </tr>
                            @endif
                          @endforeach
                        @endforeach
                      </table>
                    </div>
                    <div class="col-lg-6">
                      <h3>Project Rankings</h3>
                      <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-projrank">
                        <thead>
                          <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Total Assigned</th>
                            <th>Worked</th>
                          </tr>
                        </thead>
                        @foreach ($projectrank as $prkey => $pr)
                          @foreach ($profiles as $profile)
                            @if ($pr->profile_id == $profile->profile_id)
                              <tr class="clickable-row" data-href="/vols/{{$profile->profile_id}}">
                                <td>{{$prkey+1}}</td>
                                <td>{{$profile->firstname}} {{$profile->lastname}}</td>
                                <td>{{$pr->total}}</td>
                                <td>{{$pr->worked}}</td>
                              </tr>
                            @endif
                          @endforeach
                        @endforeach
                      </table>
                    </div>
                </div>
                <!-- /.row -->

                <br><br><br><br>
            </div>
        </div>
@endsection
