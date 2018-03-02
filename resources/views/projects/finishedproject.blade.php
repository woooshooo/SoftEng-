@extends('layout.app')
@section('content')
  {!! Form::open(['action'=> ['ProfileProjectsController@update', $projects->projects_id], 'method' => 'POST',
    'class' => 'panel-body form'])!!}
    <div class="form-group col-lg-12 custom-checkbox ">
      <label class="control-label" for="volunteers">Volunteers</label><br>
      @foreach ($profileprojects as $key => $value)
          <input type="checkbox" class="custom-control-input" name="volunteers[]" value="{{$value->profile_id}}"> {{$value->profile->firstname}} {{$value->profile->lastname}} <br>
      @endforeach
    </div>
    <div class="form-group col-lg-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
    {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
@endsection
