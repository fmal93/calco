@extends('layouts.layout')

@section('title', "Checkout")

@section('content')
<div class="w-full py-8">
    <div class="container m-auto">
        <form action="" class="md:flex md:justify-center md:flex-wrap">
            <div class="w-full md:w-1/3">
                <h1 class="font-bold text-lg border-b-2 py-1 pl-5 md:pl-1">Datos Personales</h1>
                <div class="w-full py-2 md:px-4 pl-4">
                    <label for="c_nombre" class="md:px-1 w-1/4 text-gray-600 inline-block">Nombre:</label>
                    <input type="text" name="c_nombre" placeholder="Ingreasa tu Nombre completo" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
                <div class="w-full py-2 md:px-4 pl-4">
                    <label for="c_email" class="md:px-1 w-1/4 text-gray-600 inline-block">Email:</label>
                    <input type="text" name="c_email" placeholder="Ingreasa tu email" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
                <div class="w-full py-2 md:px-4 pl-4">
                    <label for="c_telefono" class="md:px-1 w-1/4 text-gray-600 inline-block">Telefono:</label>
                    <input type="text" name="c_telefono" placeholder="Ingreasa tu telefono" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
            </div>
            <shipping-select v-bind:total="{{ $total }}" v-bind:cart-ids="[{{ $cartIds }}]"></shipping-select>
        </form>
    </div>
</div>
    
     
@endsection

@section('script')
    
@endsection