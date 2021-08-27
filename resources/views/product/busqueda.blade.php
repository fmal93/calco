@extends('layouts.layout')

@section('title', 'busqueda')

@section('content')
    <div class="flex w-full md:w-10/12 md:m-auto py-3 md:py-5">
        @foreach ($products as $product)
            <div class="w-1/2 md:w-1/6 md:mx-3 border-2 rounded-lg shadow transform hover:scale-105 flex flex-col justify-between">
            
                <a href='/product/{{ $product->slug }}'><img src='/storage/{{ $product->productImages[0]->img_url }}' alt="" class="w-10/12 h-full m-auto"></a>
                <div class="w-10/12 m-auto">            
                <p></p>
                <a href='/product/{{ $product->slug }}'><p class="py-2 text-xs md:text-md">{{ $product->name }}</p></a>
                <p class="text-sm py-2 flex justify-between {{ $product->productValues[0]->productDiscounts ? 'line-through text-red-500' : '' }}"><strong>Precio:</strong> <span class="font-bold">$ {{ number_format($product->productValues[0]->price,  0, '.', '.') }}</span></p>
                @if ($product->productValues[0]->productDiscounts)
                    <p class="text-sm py-2 flex justify-between"><strong>Oferta:</strong> <span class="font-bold">$ {{ number_format($product->productValues[0]->price * (( 100 - $product->productValues[0]->productDiscounts->percentage ) / 100),  0, '.', '.') }}</span></p>
                @endif
                </div>      
            
                <p class="pt-3 text-sm tracking-wider flex justify-around items-center w-10/12 m-auto text-xs md:text-md">
                Entrega a domicilio 
                <span class="w-10/12 m-auto">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                    </svg>
                </span>
                </p>
                <a href='/add-to-cart/{{ $product->id }}' class="block w-11/12 border-2 bg-denim-blue m-auto py-2 rounded-lg shadow my-3 text-white flex items-center justify-center">
                    <p>Agregar</p>
                </a>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    
@endsection