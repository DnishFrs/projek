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
                    <center>
                        <form action="{{ url('/request') }}" method="post">
                            @csrf
                            <label class="p-6 text-gray-900 dark:text-gray-100" for="title">Title:</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="title"
                                name="title" value="" readonly>

                            <label class="p-6 text-gray-900 dark:text-gray-100" for="asset_type">Asset Type</label>
                            <select name="asset_type" id="asset_type">
                                @foreach ($assets as $asset)
                                    <option value="{{ $asset->type }}">{{ $asset->type }}</option>
                                @endforeach
                            </select>

                            <label class="p-6 text-gray-900 dark:text-gray-100" for="requester_id">Requester ID</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="requester_id"
                                name="requester_id" value="" readonly><br><br>

                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                                type="submit" readonly>Submit</button>
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
</x-admin-layout>
