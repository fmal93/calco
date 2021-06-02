@extends('layouts.layout')

@section('title', 'CalcoSpa Inicio')

@section('content')
    <div class="swiper-container swiper-1 relative z-0">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="storage/banner1.png" class="h-full w-full">
            </div>
            <div class="swiper-slide">
                <img src="storage/banner2.png" class="h-full w-full">
            </div>
            <div class="swiper-slide">
                <img src="storage/banner3.png" class="h-full w-full">
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>    
@endsection
            
        