@extends('admin.layouts.master')
@section('content')
@section('title')
Customers
@endsection
@section('title_page')
customers
@endsection
@section('defintion')
Home |All Customers
@endsection
<div id="kt_content_container" class="container">
@livewire('customer-search')
</div>
@livewireScripts
@endsection
