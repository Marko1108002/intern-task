<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="py-8 max-w-6xl mx-auto">
                        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                <tr>
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Project Name</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-300">
                                @foreach ($projects as $project)
                                    <tr class="border">
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $project->name }}</td>
                                        <td class="border px-4 py-2">{{ Str::limit($project->description, 50) }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('projects.show', $project->id) }}"
                                                class="text-blue-500">View</a> |
                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                class="text-yellow-500">Edit</a> |
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                                class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500"
                                                    onclick="return confirm('Delete this project?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($projects->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400 text-center mt-4">No projects found.</p>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
