    <div class="container mx-auto">
        @if(session('status'))
        <div class="fixed z-20 inset-x-0" x-data="{show:true}" x-show="show" x-cloak>
            <div class="bg-gradient-to-r font-medium font-semibold from-green-500 max-w-4xl mx-auto my-4 px-8 py-4 rounded shadow text-center text-green-50 to-green-600" @click.away="show=false">
                {{ session('status') }}
            </div>
        </div>
        @endif
        <div class="py-8">
            <div class=" mx-auto">
                <h1 class="text-3xl text-blue-500 font-bold"> Equipo </h1>
                <x-slot name="header"> Equipo </x-slot>
            </div>
            <div class=" mx-auto flex justify-end my-8">
                <a class="text-blue-50 bg-blue-500 px-5 py-1.5 rounded hover:bg-blue-700" href="{{route('equipos.create')}}">Create Equipo</a>
            </div>

            <div class=" mx-auto">
                <table class="w-full border-gray-200 rounded shadow overflow-hidden mx-auto">
                    @if(count($equipos))
                    <thead class="bg-gray-200 uppercase text-sm text-gray-500">
                        <tr class="">
                            <th>&nbsp;</th>
                            <th class="px-6 py-3 whitespace-nowrap">Nombre</th>
                            <th class="px-6 py-3 whitespace-nowrap">Codigo</th>
                            <th class="px-6 py-3 whitespace-nowrap">Descripcion</th>
                        </tr>
                    </thead>
                    @endif
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($equipos as $equipo)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-xs">
                                <div class="flex items-center space-x-1">
                                    <a class=" text-blue-400 hover:text-blue-500" href="{{route('equipos.show',['equipo'=>$equipo] )}}">Show</a>
                                    <a class=" text-blue-400 hover:text-blue-500" href="{{route('equipos.edit',['equipo'=>$equipo] )}}">Edit</a>
                                    <a class=" text-blue-400 hover:text-blue-500" href="javascript:void(0)" onclick="event.preventDefault();
                            document.getElementById('delete-equipo-{{$equipo->id}}').submit();">
                                        Delete
                                    </a>
                                </div>
                                <form id="delete-equipo-{{$equipo->id}}" action="{{route('equipos.destroy',['equipo'=>$equipo])}}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600 truncate max-w-xs">{{$equipo->nombre}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600 truncate max-w-xs">{{$equipo->codigo}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600 truncate max-w-xs">{{$equipo->descripcion}}</td>

                        </tr>
                        @empty
                        <p>No Equipos</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class=" mx-auto my-8">
                {{ $equipos->links() }}
            </div>
        </div>

    </div>