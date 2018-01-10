@if(count($errors)>0)
  @foreach ($errors->all() as $error)
    <div class="card-panel red accent-4" style="width:300px">
      {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="card-panel green accent-4" style="width:300px">
    {{session('success')}}
  </div>
@endif
@if(session('error'))
  <div class="card-panel red accent-4" style="width:300px">
    {{session('error')}}
  </div>
@endif
