@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Borrow Form <span class="pull-right">#{{$borrows->borrow_id}}</span></h1>

            <div class="form-group col-lg-12">
  						<label class="control-label" for="dateborrowed">Date Borrowed</label>
  						<input type="date" class="form-control custom-search-form" name="dateborrowed" placeholder="Enter Date" value="{{$borrows->dateborrowed}}" disabled>
  					</div>
  					<div class="form-group col-lg-12">
  						<label class="control-label" for="borrower">Borrower</label>
  						{{-- <input type="text" class="form-control custom-search-form" id="searchProfilee" name="borrower" placeholder="Enter Borrower"> --}}
  						<select class="form-control custom-search-form" name="borrower" disabled>
  							@foreach ($profiles as $value)
                  <option value="{{$value->firstname}} {{$value->lastname}}">{{$value->firstname}} {{$value->lastname}}</option>
  							@endforeach
  						</select>
  					</div>
  					<div class="form-group col-lg-12">
  										<div class="table-responsive">
  												 <table class="table table-hover" id="dynamic_field_borrow">
  													 		<thead>
  																<th><label class="control-label" for="item_code">Item Code</label></th>
  																<th><label class="control-label" for="item_name">Equipment Name</label></th>
  																<th><label class="control-label" for="quantity_borrowed">Quantity Borrowed</label></th>
  																<th><label class="control-label" for="numberofdays">Days to Borrow</label></th>
                                  <th><label class="control-label" for="item_desc">Item Condition</label><th>
  															</thead>
                                @foreach ($itemdetails as $key => $value)
                                  @foreach ($borrowdetails as $key2 => $value2)
                                    @if ($borrowdetails[$key2]->equipment_details_id == $value->equipment_details_id)
                                      <tr>
                                          <td><input type="text" name="item_code[]" placeholder="Enter Item Code"class="form-control" value="{{$value->item_code}}"disabled></td>
                                          <td><input type="text" name="item_name[]" placeholder="Enter Equipment Name" class="form-control" value="{{$value->item_name}}"disabled></td>
                                            <td><input type="number"  name="quantity_borrowed[]" placeholder="Enter Quantity" class="form-control" value="{{$borrowdetails[$key2]->quantity_borrowed}}" disabled></td>
                                          <td><input type="number" name="numberofdays[]"  placeholder="Enter Days" class="form-control" value="{{$borrowdetails[$key2]->numberofdays}}" disabled></td>
                                          {!! Form::open(['action' => ['BorrowsController@update',$value2->borrow->borrow_id], 'method' => 'POST', 'class' => 'form-class'])!!}
                                          {{ csrf_field() }}
                                          <td><input type="text" name="item_desc[]" class="form-control" style="width: 100%" placeholder="condition of item here"value="{{$value->item_desc}}"/></td>
                                      </tr>
                                    @endif
                                  @endforeach
                                @endforeach
  												 </table>
  										</div>
                      <div class="col-lg-12">
                      {{Form::submit('Return',['class' => 'btn btn-primary pull-right' ])}}
                      {{Form::hidden('_method','PUT')}}
                      {!!Form::close()!!}
                    </div>

        </div>
    </div>


@endsection
