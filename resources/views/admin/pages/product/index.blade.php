@extends('layouts.admin')

@section('content')
@component('admin.components.error',[])
@endcomponent

<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
        <a href="/admin/product/add" class="btn btn-primary">Add Product</a>
    </div>
    </div>
</div>

<?php 
    $value = [];
    for($i=0;$i<count($products);$i++)
    {
        $products[$i]->brand_id = $products[$i]->brand->name;
        $products[$i]->category_name = $products[$i]->category->name;
    }
?>

@component('admin.components.table',['columns'=>$columns,'contents'=>$products,'tableName'=>'product'])
@endcomponent

@endsection