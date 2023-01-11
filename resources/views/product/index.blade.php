<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-success-status class="mb-4" :status="session('message')" />

            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <table style="width: 100%; border: 1px solid black">
                <thead>
                    <tr style="text-align: center; background-color: rgb(1, 146, 190); ">
                        <th style="border: 1px solid black">ID</th>
                        <th style="border: 1px solid black">Name</th>
                        <th style="border: 1px solid black">Price</th>
                        <th style="border: 1px solid black">Edit</th>
                        <th style="border: 1px solid black">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr  class="text-center">
                        <td style='border: 1px solid black'>{{ $product->id }}</td>
                        <td style='border: 1px solid black'>{{ $product->name }}</td>
                        <td style='border: 1px solid black'>{{ $product->price }}</td>

                        <td style='border: 1px solid black; background-color: rgb(1, 190, 80)' class="text-white py-2 px-5">
                            <a href="{{ url('/edit-product/'.$product->id) }}" class="btn btn-primary">Edit</a>
                        </td>

                        <td style='border: 1px solid black; background-color: rgb(255, 60, 60)' class="text-white py-2 px-5">
                        
                            <form action="{{ url('/delete-product/'.$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center"> Tidak Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
</x-app-layout>