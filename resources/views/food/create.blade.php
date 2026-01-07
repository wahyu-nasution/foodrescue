<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Post Food
        </h2>
    </x-slot>

    <div class="p-8">
        <form method="POST" action="{{ route('food.store') }}">
            @csrf

            <input type="text" name="food_name" placeholder="Food Name"
                   class="block w-full mb-3">

            <input type="text" name="location" placeholder="Location"
                   class="block w-full mb-3">

            <input type="number" name="quantity" placeholder="Quantity"
                   class="block w-full mb-3">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Post Food
            </button>
        </form>
    </div>
</x-app-layout>
