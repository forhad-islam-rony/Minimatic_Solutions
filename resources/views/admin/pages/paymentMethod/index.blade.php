@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
{{-- {{dd($brands[4]->products)}}         //To Know how many products are avaiable for this brand --}}
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body text-sm-left">
      <a href="/admin/paymentMethod/add" class="btn btn-primary">Add Payment Method</a>
      </div>
    </div>
</div>
@component('admin.components.table',['columns'=>$columns,'contents'=>$paymentMethods,'tableName'=>$tableName])
@endcomponent
@endsection