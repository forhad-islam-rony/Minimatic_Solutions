@extends('layouts.admin');

@section('content')
<h1>Hello {{Session::get('adminName')}}</h1>   
@endsection