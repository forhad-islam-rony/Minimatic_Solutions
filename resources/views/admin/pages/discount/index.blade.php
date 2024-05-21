@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent

<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <a href="/admin/discount/add" class="btn btn-primary">Add Discount</a>
    </div>
  </div>
</div>
@component('admin.components.table',['columns'=>$columns,'contents'=>$discounts,'tableName'=>$tableName])
@endcomponent
@endsection