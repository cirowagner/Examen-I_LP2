<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        CRUD - TRACTOR
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Tractor</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">#ID</th>
                        <th class="px-4 py-2">Codigo</th>
                        <th class="px-4 py-2">Marca</th>
                        <th class="px-4 py-2">Modelo</th>
                        <th class="px-4 py-2">Potencia</th>
                        <th class="px-4 py-2">Velocidad</th>
                        <th class="px-4 py-2">Articulacion</th>
                        <th class="px-4 py-2">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trators as $tractor)
                    <tr>
                        <td class="border px-4 py-2">{{ $tractor->id }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_codigo }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_marca }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_modelo }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_potencia }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_velocidad }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_articulacion }}</td>
                        <td class="border px-4 py-2">{{ $tractor->trac_estado }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $tractor->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $tractor->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>