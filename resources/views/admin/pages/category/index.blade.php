@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent

<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body text-sm-left">
        <a href="/admin/category/add" class="btn btn-primary">Add Category</a>
      </div>
    </div>
  </div>
  @component('admin.components.table',['columns'=>$columns,'contents'=>$categories,'tableName'=>'category'])
  @endcomponent
@endsection