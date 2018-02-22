@extends('layout.app')
@section('content')
  {!! Form::open(['action'=> ['ProjectsController@destroy', $projects->projects_id], 'method' => 'POST',
    'class' => 'panel-body col-lg-12 form'])!!}
    {{Form::hidden('_method','DELETE')}}


    <div class="form-group col-lg-12">
      <label class="control-label" for="volunteers">Volunteers</label><br>

      @foreach ($profileprojects as $key => $value)

          <input type="checkbox" name="volunteers[]" value="{{$value->profile_id}}"> {{$value->profile->firstname}} {{$value->profile->lastname}} <br>

      @endforeach
    </div>
    <div class="form-group col-lg-12">



    {!! Form::close() !!}
@endsection
