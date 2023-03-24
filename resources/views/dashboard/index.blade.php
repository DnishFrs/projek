<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <b>{{ __('Items List') }}</b>
                    <br>

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <center>
                                        <table class="min-w-full">
                                            <thead class="bg-gray-200 border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                                        #
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                                        Type
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                                        Quantity
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                                        Description
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($asset as $data)
                                                    <tr
                                                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $data->id }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $data->type }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $data->quantity }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $data->description }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>