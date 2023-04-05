<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a class=" text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{ route('addView') }}">add plate</a>
        </div>
    </x-slot>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    plate name
                </th>
                <th scope="col" class="px-6 py-3">
                    plate price
                </th>
                <th scope="col" class="px-6 py-3">
                    plate image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          
        @foreach ($data as $item)

        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $item->name}}
                </th>
                <td class="px-6 py-4">
                {{ $item->price}}
                </td>
                <td class="px-6 py-4">
                    <img class="w-16 h-16" src="/images/{{ $item->image}}" alt="##">
                </td>
                <td class="px-6 py-4">
                    <a href="{{ url('delete/'.$item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">delete</a>
                    <a href="{{ url('edit/'.$item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
 @endforeach

        </tbody>
    </table>
</div>

</x-app-layout>
