<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-success-status class="mb-4" :status="session('message')" />

        <x-validation-errors class="mb-4" :errors='$errors' />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ url('create-product') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <div class="">
                            <x-input-label style="font-weight:800" class="text-xl font-bold" for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
                        </div>
    
                        <div>
                            <x-input-label style="font-weight:800" class="text-xl font-bold mt-2" for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" autofocus />
                        </div>
                    </div>
                   
                    <div class="flex justify-center">

                        <x-primary-button class="ml-3 mt-6 bg-red-600">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>