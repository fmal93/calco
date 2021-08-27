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
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        {{-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> --}}
    </div>     
    
    <div class="swiper overflow-hidden relative my-8">
        <div class="swiper-wrapper h-full">
            @if ($products)
                @foreach ($products as $product)
                    <div class="swiper-slide h-full">
                        <a class="h-full" href='/product/{{ $product->slug }}'><img src='/storage/{{ $product->productImages[0]->img_url }}' alt="" class="w-10/12 h-full m-auto"></a>
                    </div>
                @endforeach 
            @endif                    
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
      </div>
    
@endsection
            
        