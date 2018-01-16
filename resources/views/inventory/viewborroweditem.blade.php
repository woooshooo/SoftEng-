@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$profiles->firstname}}'s Borrowed Items</h1>
            <table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
              <thead>
                <tr>
      						<th>Item Name</th>
      						<th>Quantity Borrowed</th>
      						<th>Purpose</th>
                </tr>
            </thead>
            @foreach ($borrows as $value)
              @if ($value->firstname == $profiles->firstname)
                <tr class="clickable-row" data-href="/items/{{$value->equipment_id}}">
                  <td>{{$value->item_name}}</td>
                  <td>{{$value->qtyBorrowed}}</td>
                  <td>{{$value->purpose}}</td>
                </tr>
              @endif
            @endforeach
          </table>
          <button class="btn btn-default"onclick="history.go(-1);">Back </button>
          <!-- <a href="/vols/{{$profiles->profile_id}}" class="btn btn-default btn-inline"> BACK  </a>-->
        </div>
    </div>


@endsection
