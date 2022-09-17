<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-3/4 m-auto">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-2/4 m-auto" method="POST" action="/products/{{ $product->id }}">
                        @csrf
                        <div class="mb-4">
                            <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Name</label>
                            <input value="{{ $product->name }}" name="name" type="text" id="product-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>

                        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Categories</label>
                        <select name="category" id="categories" class="block mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($categories as $category)
                                @if($category->id == $selectedcategory)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="suppliers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Suppliers</label>
                        <select name="supplier" id="suppliers" class="block mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($suppliers as $supplier)
                                @if($supplier->id == $selectedsupplier)
                                    <option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
                                @else
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endif
                            @endforeach
                        </select>

                        <div class="mb-4">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                            <input value="{{ $product->unit_price }}" name="price" type="text" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>

                        <button type="submit" class="mt-4 mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>

                        <a href="{{route('products.index')}}" class="block w-full text-center text-black bg-gray-700 hover:bg-gray-800 border border-gray-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
