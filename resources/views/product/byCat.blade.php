@extends('layouts.layout')

@section('title', "Calco $name")

@section('content')
<div class="w-full flex flex-wrap py-8">
    <shop-form-component v-bind:sub-cat-id="[{{ $sub_cat_id }}]"></shop-form-component>
</div>
    
     
@endsection

@section('script')
    
@endsection
