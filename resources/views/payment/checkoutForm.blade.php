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
            <div class="w-full md:w-1/3">
                <h1 class="font-bold text-lg border-b-2 py-1 pl-5 md:pl-1">Datos de Envio</h1>
                <div class="w-full py-2 md:px-4 pl-4">
                    <label for="c_direccion" class="md:px-1 w-1/4 text-gray-600 inline-block">Direccion:</label>
                    <input type="text" name="c_direccion" placeholder="Ingreasa tu direccion" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
                <div class="w-full py-2 md:px-4 pl-4">
                    <label for="c_region" class="md:px-1 w-1/4 text-gray-600 inline-block">Region:</label>
                    <input type="text" name="c_region" placeholder="Ingreasa tu Region" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
                <div class="w-full py-2 md:px-4 pl-4">
                    <label for="c_comuna" class="md:px-1 w-1/4 text-gray-600 inline-block">Comuna:</label>
                    <input type="text" name="c_comuna" placeholder="Ingreasa tu telefono" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
            </div>
            <div class="w-full md:w-2/3 py-4 md:py-8 text-center md:text-right md:px-12">
                <button type="submit" class="w-1/2 md:w-2/5 bg-denim-blue border-0 rounded-lg p-2 text-white">Avanzar</button>
            </div>
        </form>
    </div>
</div>
    
     
@endsection

@section('script')
    
@endsection