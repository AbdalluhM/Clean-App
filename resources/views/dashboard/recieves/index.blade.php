@extends('admin.layouts.master')
@section('content')
@section('title')
Recieves
@endsection
@section('title_page')
recieves
@endsection
@section('defintion')
Home |All recieves
@endsection
<div id="kt_content_container" class="container">

    @livewire('recieve-search')
</div>
@livewireScripts

@endsection
