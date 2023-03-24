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
                        <form action="{{ url('/admin') }}" method="post">
                            @csrf
                            <label class="p-6 text-gray-900 dark:text-gray-100" for="type">Type:</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="type"
                                name="type" value="">

                            <label class="p-6 text-gray-900 dark:text-gray-100" for="description">Description</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text"
                                id="description" name="description" value="">

                            <label class="p-6 text-gray-900 dark:text-gray-100" for="quantity">Quantity</label>
                            <input class="p-6 text-black-900 dark:text-black-100" type="text" id="quantity"
                                name="quantity" value=""><br><br>

                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                                type="submit">Submit</button>
                        </form>

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
