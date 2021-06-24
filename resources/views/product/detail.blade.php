@extends('layouts.layout')

@section('title', $product->name)

@section('content')
    <p class="w-full px-8 font-bold uppercase transform pt-5">{{ $product->name}}</p>
    <div class="w-full flex flex-col md:flex-row md:py-8">
        <shop-image product-id="{{ $product->id }}" class="order-1"></shop-image>
        <div class="w-full md:w-1/3 mx-auto py-2 md:py-0 order-3 md:order-2 pb-32 md:pb-0">
            <p class="pb-5 w-full md:w-11/12">{{ $product->description}}</p>
            @foreach ($product->productValues[0]->productFeatures as $feature)
                <div class="py-1 border-t-2 border-gray-300 flex w-full md:w-11/12">
                    <p class="w-1/2 mx-3">{{ $feature->feature }}</p>
                    <p class="w-1/2 mx-3">{{ $feature->description }}</p>
                </div>
            @endforeach
        </div>
        <div class="w-full md:w-1/3 mx-auto order-2 md:order-3">
            <span>SKU: {{ $product->productValues[0]->sku}}</span>
            <div class="w-full md:w-11/12 border-2 border-gray-300 rounded-md shadow md:text-lg pt-6 fixed bottom-0 md:static bg-white">
                <p class="py-2 px-5 flex justify-between {{ $product->productValues[0]->productDiscounts ? 'line-through text-red-500' : '' }}"><strong>Precio:</strong> <span class="font-bold">$ {{ number_format($product->productValues[0]->price,  0, '.', '.') }}</span></p>
                @if ($product->productValues[0]->productDiscounts)
                    <p class="py-2 px-5 flex justify-between"><strong>Precio Oferta:</strong> <span class="font-bold">$ {{ number_format($product->productValues[0]->price * (( 100 - $product->productValues[0]->productDiscounts->percentage ) / 100),  0, '.', '.') }}</span></p>
                @endif
                <form action="/add-many" method="GET" class="w-full flex justify-center items-center pb-12 pt-6">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="number" name="qty" min="1" max="{{ $product->productValues[0]->productStocks->stock }}" value="1" class="w-1/6 border-2 border-gray-300 p-1 rounded-md mx-2">
                    <button type="submit" class="w-4/6 bg-denim-blue rounded-md text-white p-1">Agregar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection