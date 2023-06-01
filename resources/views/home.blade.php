@extends('layouts.admin',  ['title' => 'Dashboard'])

@section('content')

@if (Auth::user()->type == "Supper") 
	@include('dashboards.supper');
@elseif (Auth::user()->type == "Owner") 
	@include('dashboards.owner')
@else
	@include('dashboards.general_user')
@endif
					
@endsection
