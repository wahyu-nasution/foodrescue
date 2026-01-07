<x-app-layout>
    <x-slot name="header">
        <h2>Manage Food Posts</h2>
    </x-slot>

    <div class="p-8">
        @foreach($foods as $food)
            <div class="border p-4 mb-3">
                <strong>{{ $food->food_name }}</strong>
                <p>{{ $food->location }} | {{ $food->status }}</p>

                <form method="POST" action="{{ route('admin.food.delete',$food) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
