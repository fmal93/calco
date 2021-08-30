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
                    <div class="swiper-slide h-full pt-4">
                        <a class="h-full border-2 border-gray-300" href='/product/{{ $product->slug }}'><img src='/storage/{{ $product->productImages[0]->img_url }}' alt="" class="w-10/12 h-full m-auto"></a>
                    </div>
                    @if ($loop->index  == 12)
                        @break
                    @endif
                @endforeach 
            @endif                    
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
    </div>
    
    <div class="w-full md:flex-wrap md:flex">
        @foreach ($category_images as $image)
            @if ($image->categorieImage->img_url)
                <div class="w-11/12 md:w-1/4 my-3 mx-auto">
                    <a class="h-full" href='/category/{{ $image->id }}'><img src='/storage/{{ $image->categorieImage->img_url }}' alt="{{ $image->name}}" class="w-10/12 h-full m-auto"></a>
                </div> 
            @endif
            @if ($loop->index  == 3)
                @break
            @endif
        @endforeach
    </div> 
    
@endsection
            
        