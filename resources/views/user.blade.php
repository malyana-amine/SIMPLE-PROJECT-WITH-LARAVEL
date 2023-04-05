<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu') }}
        </h2>
        </div>
    </x-slot>


    <div class="flex justify-center flex-wrap relative overflow-x-auto shadow-md sm:rounded-lg">
        @foreach ($data as $item)
<div class="max-w-sm p-8 m-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="/images/{{ $item->image}}" alt="" />
    </a>
    <div class="p-5">
        <p >
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name}}</h5>
        </p>
        <h5 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $item->price}} DH</h5>
    </div>
</div>
 @endforeach
</div>



</x-app-layout>
