<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $project->name }} - Task: {{ $task->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-semibold mb-4">Task Details</h3>
                    <p><strong>Description:</strong> {{ $task->description }}</p>
                    <p><strong>Created At:</strong> {{ $task->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
