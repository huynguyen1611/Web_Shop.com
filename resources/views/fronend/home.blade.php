@extends('fronend.main')
@section('content')
    <div id="homepage" class="homepage">
        {{-- Panel --}}
        @include('fronend.part.panel')
        {{-- Flash_Sale --}}
        @include('fronend.part.flash_sale')
        {{-- Product --}}
        @include('fronend.part.product')
        {{-- Panel-new --}}
        @include('fronend.part.panel_new')
    </div>
@endsection
