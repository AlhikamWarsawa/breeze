<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    @csrf
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$category->name_cat}}
                        </th>
                        <td class="px-6 py-4">
                            {{$category->desc_cat}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('categories.show', $category->id)}}">
                                <button type="button"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    View
                                </button>
                            </a>
                            <a href="{{route('categories.edit', $category->id)}}">
                                <button type="button"
                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Edit
                                </button>
                            </a>
                            <form id="delete-form-{{ $category->id }}"
                                  action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" onclick="confirmDelete({{ $category->id }})"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <h1 class="text-white">Kurang Sigma Apa Lagi?</h1>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <script>
        function confirmDelete(id) {
            if (confirm('Sudah Sigma?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-app-layout>
