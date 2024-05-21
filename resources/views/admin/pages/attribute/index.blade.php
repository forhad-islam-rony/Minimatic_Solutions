@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent
<div class="col-12 grid-margin">
  <div class="card">
      <div class="card-body text-sm-left">
      <a href="/admin/attribute/add" class="btn btn-primary">Add Attributes</a>
      </div>
    </div>
</div>

@component('admin.components.table',['columns'=>$columns,'contents'=>$attributes,'tableName'=>$tableName])
@endcomponent
@endsection