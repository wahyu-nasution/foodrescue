<x-app-layout>
    <x-slot name="header">
        <h2>Admin Dashboard</h2>
    </x-slot>

    <div class="p-8">
        <p>Total Users: {{ $users }}</p>
        <p>Total Food Posts: {{ $foods }}</p>
        <p>Available Food: {{ $available }}</p>

        <a href="{{ route('admin.foods') }}" class="text-blue-600">
            Manage Food Posts
        </a>
    </div>
</x-app-layout>
