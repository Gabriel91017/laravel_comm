<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de productos
            </h2>
            <x-button-enlace class="ml-auto" href="{{ route('admin.products.create') }}">
                Agregar producto
            </x-button-enlace>
        </div>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">
        <x-table-responsive>
            <div class="px-6 py-4">
                <x-jet-input
                    wire:model="search"
                    type="text"
                    placeholder="Ingrese el nombre del producto que quiere buscar"
                    class="w-full" />
            </div>

            @if ($products->count())
                <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Name")}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Category")}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Status")}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Price")}}
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $product->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $product->subcategory->category->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @switch($product->status)
                                                @case(1)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{__("Draft")}}
                                                    </span>
                                                    @break
                                                @case(2)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{__("Published")}}
                                                    </span>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $product->price }} USD
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{route('admin.products.edit', $product)}}" class="text-indigo-600 hover:text-indigo-900">{{__("Edit")}}</a>
                                        </td>
                                    </tr>
                                @endforeach
            
                        <!-- More people... -->
                        </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ning??n resultado con la b??squeda <span class="font-bold">{{$search}}</span>, intentalo nuevamente.
                </div>
            @endif
            @if ($products->hasPages())
                <div class="px-6 py-4">
                    {{$products->links()}}
                </div>
            @endif
        </x-table-responsive>       
    </div>
  
</div>
