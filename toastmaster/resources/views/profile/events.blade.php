<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    @if(Auth::user()->role == 'admin')
    <div class="max-w-4xl p-4 mx-auto sm:px-6 lg:px-8">
        <a 
        class="px-6 py-3 text-white no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200"
        href="/admin/events/add">
            Add
        </a>
    </div>
    @endif

    <div class="p-4">
    @foreach ($Events as $event)
        <div class="max-w-4xl pb-4 mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="bg-white border-b border-gray-200 flex">

                    <div class="inline-block flex-none w-16 md:w-32 min-h-48 bg-violet-800 text-white text-center align-middle">
                        <span class="block align-top"> {{ Carbon\Carbon::parse($event->starts)->format('M') }} </span>
                        <span class="block align-middle text-3xl"> {{ Carbon\Carbon::parse($event->starts)->format('d') }} </span>
                        <span class="block align-bottom"> {{ Carbon\Carbon::parse($event->starts)->format('Y') }} </span>
                    </div>

                    <div class="grow p-1 relative">
                        <div class="absolute top-0 right-0">
                            <a href="/admin/events/edit/{{$event->id}}"><x-forkawesome-pencil class="inline-block w-6 h-6 pl-1 ml-0.5 text-blue-400"/></a>
                            <a href="/admin/events/delete/{{$event->id}}"><x-forkawesome-ban class="inline-block w-6 h-6 pl-1 ml-0.5 text-red-600"/></a>
                        </div>
                    <style>
                        details > summary {
                        list-style: none;
                        }
                        details > summary::-webkit-details-marker {
                        display: none;
                        }
                    </style>
                    <details>
                        <summary class="cursor-pointer">
                            <div class="block text-2xl ml-1 md:py-2">{{$event->title}}</div>
                            <div>

                                <x-forkawesome-clock-o class="inline-block w-6 h-6 pl-1 ml-0.5 text-violet-800"/>
                                <span class="h-6 inline-block align-middle">
                                        {{ Carbon\Carbon::parse($event->starts)->format('H:i') }}
                                        @if( !empty($event->ends) )
                                            - {{ Carbon\Carbon::parse($event->ends)->format('H:i') }}
                                        @endif
                                </span>

                                <x-forkawesome-user-o class="inline-block w-6 h-6 pl-1 text-violet-800"/>
                                <span class="h-6 min-w-24 inline-block align-middle">
                                    {{$event->volunteerRoles->whereNotNull('user_id')->count()}}/{{$event->volunteerRoles->count()}}
                                </span>

                                <span class="block md:inline-block">
                                    <x-forkawesome-map-marker class="inline-block w-6 h-6 pl-1 ml-0.5 text-violet-800"/>
                                    <span class="h-6 inline-block -ml-1 align-middle underline">
                                        <a href="/profile/events/location/{{$event->atLocation->id}}">{{$event->atLocation->Address_1}}</a>
                                    </span>
                                </span>

                            </div>
                        </summary>
                        <p>{!! $event->description !!}</p>

                        @if( !$event->volunteerRoles->isEmpty() )
                        <div class="border-2 border-violet-800 rounded-md m-4 w-72 md:w-96 sm:mx-auto">
                            <div class="bg-violet-800 p-2 text-white">Required Roles</div>
                            <table class="table-auto rounded-lg w-full">
                            @foreach($event->volunteerRoles as $volunteer)
                                <tr>
                                    <td class="font-bold text-right">{{$volunteer->Role}}</td>
                                    <td class="text-center">
                                        @if(empty($volunteer->User->name))
                                            <form method="POST" action="/profile/events/volunteer">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="event_role" value="{{$volunteer->id}}">
                                                <button type="submit"
                                                    class="underline appearance-none">
                                                    click to volunteer
                                                </button>
                                            </form>
                                        @else
                                        {{ $volunteer->User->name }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                        @endif

                    </details>
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="max-w-7xl mx-auto justify-center p-4">
        {!! $Events->links() !!}
    </div>
</x-app-layout>