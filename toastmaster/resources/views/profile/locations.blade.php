<x-app-layout>
    <x-slot name="header" class="flex align-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
            {{ __('Locations') }}
        </h2>
        @if(Auth::user()->role == 'admin')
        <span class="ml-6">
            <a 
            class="px-2 py-1 text-white no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200"
            href="/admin/locations/add">
                Add
            </a>
        </span>
        @endif
    </x-slot>

    <div class="p-4">
        <div class="max-w-7xl w-full pb-4 mx-auto sm:px-6 lg:px-8" >

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="bg-white border-b border-gray-200 flex p-4">
                    <table class="table-auto border-collapse border w-full">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">City</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Country</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                            <tr onclick="window.location='/profile/events/location/{{$location->id}}';">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-900">
                                    {{$location->Address_1}}
                                    @if(Auth::user()->role == 'admin')
                                        <a href="/admin/locations/edit/{{$location->id}}">
                                            <x-forkawesome-pencil class="inline-block w-6 h-6 pl-1 mr-0.5 text-blue-400 text-left"/>
                                        </a>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-900 text-left">
                                    {{$location->City}}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-900 text-left">
                                    {{$location->Country}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="max-w-7xl mx-auto justify-center p-4">
                {!! $locations->links() !!}
            </div>
        </div>
    </div>

</x-app-layout>