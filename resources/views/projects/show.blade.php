<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $project->name }}
            </h2>

            <a href="{{ route('tasks.create', ['project' => $project->id]) }}" class=" text-white font-bold px-4 rounded">
                Create Task
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-4">Project Description</h3>
                    <p>{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="py-8 max-w-6xl mx-auto">
                    <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">Task Title</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300">
                            @foreach ($project->tasks as $task)
                                <tr class="border">
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $task->title }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($task->description, 50) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('tasks.show', ['project' => $project->id, 'task' => $task->id]) }}"
                                            class="text-blue-500">View</a>

                                        <a href="{{ route('tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}"
                                            class="text-yellow-500">Edit</a>

                                        <form
                                            action="{{ route('tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500"
                                                onclick="return confirm('Delete this task?')">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($tasks->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400 text-center mt-4">No tasks found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
