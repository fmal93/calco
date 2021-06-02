<div>
    <form action="/products?fltrCat={{ implode(",", $message) }}&fltrbrand={{ implode(",", $message2) }}">
        <input wire:model="message" type="checkbox" value="1">
        <input wire:model="message" type="checkbox" value="2"> 
        <input wire:model="message" type="checkbox" value="3"> 
        <input wire:model="message" type="checkbox" value="4">
    </form>
    <hr>
    <form action="/products?fltrCat={{ implode(",", $message) }}&fltrbrand={{ implode(",", $message2) }}">
        <input wire:model="message2" type="checkbox" value="1">
        <input wire:model="message2" type="checkbox" value="2"> 
        <input wire:model="message2" type="checkbox" value="3"> 
        <input wire:model="message2" type="checkbox" value="4"> 
    </form>   
    <h1></h1>
    <div class="w-full py-5 flex flex-wrap">
        <div class="w-1/2 md:w-1/6 md:mx-3 border-2 rounded-lg shadow transform hover:scale-105 cursor-pointer">
            <img src="/storage/product-images/May2021/AREc2NaVKV9eLqum3BXP.webp" alt="">
            <p>Einhell</p>
            <p class="py-2 text-sm md:text-md">Ingleteadora Telescópica 8 Te-sm 2131 Dual Einhell</p>
            <p class="text-lg text-red-600 font-bold">$309.000</p>
            <p class="pt-6 text-sm tracking-wider flex justify-around items-center">
                Entrega a domicilio 
                <span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                    </svg>
                </span>
            </p>
            <a class="block w-11/12 border-2 bg-denim-blue m-auto h-12 rounded-lg shadow my-4 text-white flex items-center justify-center">
                <p>Agregar</p>
            </a>
        </div>
</div>
