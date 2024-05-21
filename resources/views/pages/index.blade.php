@extends('layouts.app')
@section('content')
    {{-- <x-banner /> --}}
    @include('partial.slider', ['categories' => $categories])
    <x-bsp :bestSProducts="$bestSProducts" />
    <x-sbc :categories="$categories" />
    <x-sbs :sellers="$sellers" />

    <div>
        <div class="left-side-info">
            <div align="center">
                @if (Cookie::has('ad'))
                    <img src="{{ Cookie::get('ad') }}" alt="Advertise">
                @endif
            </div>
        </div>
    </div>
@endsection
