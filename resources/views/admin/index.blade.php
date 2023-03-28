<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Insert Asset') }}
                    </h2><br>
                    <center>

                        <form action="{{ url('/admin') }}" method="post">
                            @csrf
                            <label class="p-6 text-gray-900 dark:text-gray-100" for="type">Type:</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="type"
                                name="type" value="">

                            <label class="p-6 text-gray-900 dark:text-gray-100" for="description">Description</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="description"
                                name="description" value="">

                            <label class="p-6 text-gray-900 dark:text-gray-100" for="quantity">Quantity</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="quantity"
                                name="quantity" value=""><br><br>

                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                                type="submit">Submit</button>
                        </form><br>

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="w-4/8 m-auto text-center">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 list-none">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </div>
                        @endif
                    </center>
                </div>
            </div>
        </div>
    </div>

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
                                                @foreach ($request as $req)
                                                    <tr
                                                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $req->id }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $req->title }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $rseq->asset_type }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $req->requester_id }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $req->status }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $req->created_at }}
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
</x-admin-layout>
