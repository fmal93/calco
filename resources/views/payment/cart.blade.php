@extends('layouts.layout')

@section('title', 'Carro de Compras')

@section('content')
    <div class="relative">
        @if (Session::has('cart'))
            <div class="fixed w-full h-40 z-20 bg-white md:z-10 m-auto md:flex md:items-center border-b-2 border-gray-300">
                <p class="text-center font-bold my-3 md:w-2/4">CARRO DE COMPRAS</p>
                <div class="md:absolute md:right-48 md:top-0">
                    <p class="flex justify-around"><strong>Subtotal: </strong><strong class="px-5">{{ number_format( $totalPrice, 0, '.', '.') }}</strong></p>
                </div>
                <a href="/checkout-form" class="block bg-denim-blue text-white w-2/3 m-auto text-center rounded-lg shadow-md p-3 mt-5 md:mt-8 mb-3 md:w-1/4">Avanzar</a>
            </div>
        @endif
        <div class="h-40"></div>
        <div class="w-full border-2 border-gray-300 rounded-lg shadow-md md:w-3/4 m-auto my-8 z-0">
            @if (Session::has('cart'))
                @foreach ($products as $product)
                    <div class="w-11/12 flex my-3 relative">
                        <div class="w-1/3 md:w-1/6">
                            <img src="/storage/{{ $product['item']->productImages[0]->img_url }}" class="w-5/6 m-auto" alt="">
                        </div>
                        <div class="w-2/3 md:w-5/6 md:flex">
                            <div class="md:w-2/4 md:flex md:flex-col md:justify-center">
                                <p class="text-sm font-bold pb-2">{{ Str::limit($product['item']->name, 50) }}</p>
                                <p class="text-sm">Makita</p>
                                <p class="text-xs pb-2">codigo del producto: {{ $product['item']->productValues[0]->sku }}</p>
                                <p> 
                                    <span class="font-bold {{ $product['item']->productValues[0]->productDiscounts ? 'line-through text-red-500' : '' }}">${{ number_format($product['item']->productValues[0]->price, 0, '.', '.') }}</span>
                                    <span class="font-bold no-underline px-3 text-black">{{ $product['item']->productValues[0]->productDiscounts ? '$' . number_format($product['item']->productValues[0]->price * (( 100 - $product['item']->productValues[0]->productDiscounts->percentage ) / 100)) : ""}}</span>
                                </p>
                            </div>
                            <div class="flex my-2 md:w-2/4 md:relative md:flex md:items-center md:justify-around">
                                <form action="/update-cart" method="GET" class="flex items-center">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product['item']['id']}}">
                                    <input type="number" name="qty" value="{{ $product['qty'] }}" class="w-2/3 border-2 border-gray-300 rounded-md shadow-md p-1">
                                    <button type="submit" class="mx-3 bg-denim-blue rounded-md text-white p-1">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                </form>
                                <a href="/remove/{{ $product['item']->id }}">
                                    <svg class="w-10 h-10 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-1/3">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" class="stroke-current text-red-600"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="flex justify-between md:absolute md:bottom-6 md:right-8">
                                <p class="text-xs md:mr-24">actualizar cantidades</p>
                                <p class="text-xs text-red-500 font-bold md:ml-12">Eliminar</p>
                            </div>
                        </div>
                        @if ($product['item']->productValues[0]->productDiscounts)
                            <div class="rounded-full h-8 w-8 md:w-12 md:h-12 flex items-center justify-center bg-denim-blue text-white absolute left-16 md:left-24 -top-3 ml-2 my-2 text-xs font-bold transform rotate-12">-{{ $product['item']->productValues[0]->productDiscounts->percentage }}%</div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="w-full py-8">
                    <p class="text-center text-lg font-bold">Carro Vacio</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    
@endsection