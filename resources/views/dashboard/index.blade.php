@extends('dashboard.layouts.main')

@section('container')
<div class="pt-6 px-4">
   <div class="w-full grid grid-cols-1">
      <div class="layer1 shadow rounded-[1rem] p-4 border-b">
         <div class="flex items-center justify-between mb-4">
            <div class="flex-shrink-0">
               <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Welcome, {{ auth()->user()->name }}</span>
               <h3 class="text-base font-normal text-gray-500">Edit, upload, and publish posts here.</h3>
            </div>
@endsection