@extends('layouts.admin')
@section('content')
    @component('admin.components.table', ['columns' => $columns, 'contents' => $orders, 'tableName' => 'orders'])
    @endcomponent
@endsection
