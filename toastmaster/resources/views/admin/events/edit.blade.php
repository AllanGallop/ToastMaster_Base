<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Event') }}
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="max-w-4xl w-full pb-4 mx-auto sm:px-6 lg:px-8">
            <div id="event-editor" class="flex-auto block">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200 p-4">
                        <form id="event" method="POST" action="/admin/events/edit" autocomplete="off">
                        <input name="id" type="hidden" value="{{$Event->id}}">
                        @csrf
                        @method('POST')
                            <label class="block mb-6 w-full">
                                <span class="text-gray-700">Title</span>
                                <input
                                name="title"
                                type="text"
                                class="
                                    block
                                    w-full
                                    mt-1
                                    border-gray-300
                                    rounded-md
                                    shadow-sm
                                    focus:border-indigo-300
                                    focus:ring
                                    focus:ring-indigo-200
                                    focus:ring-opacity-50
                                "
                                value="{{$Event->title}}"
                                Required
                                />
                            </label>
                            <label class="block mb-6 w-full">
                                <span class="text-gray-700">Location</span>
                                <select
                                name="location"
                                class="
                                    block
                                    w-full
                                    mt-1
                                    border-gray-300
                                    rounded-md
                                    shadow-sm
                                    focus:border-indigo-300
                                    focus:ring
                                    focus:ring-indigo-200
                                    focus:ring-opacity-50
                                "
                                Required
                                >
                                <option selected value="{{$Event->location}}">{{$Locations->where('id','=',$Event->location)->first()->Address_1}}</option>
                                @foreach($Locations as $l)
                                    <option value="{{$l->id}}">{{$l->Address_1}}</option>
                                @endforeach
                                </select>
                            </label>
                            <div class="flex w-full">
                                <label class="block mb-6 w-2/8 mr-4">
                                    <span class="text-gray-700">Date</span>
                                    <input
                                    id="date"
                                    name="date"
                                    type="date"
                                    class="
                                        block
                                        mt-1
                                        border-gray-300
                                        rounded-md
                                        shadow-sm
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                    "
                                    value="{{ Carbon\Carbon::parse($Event->starts)->format('Y-m-d') }}"
                                    Required
                                    />
                                </label>
                                <label class="block mb-6 w-1/8 mr-4">
                                    <span class="text-gray-700">Starts</span>
                                    <input
                                    id="date"
                                    name="starts"
                                    type="time"
                                    class="
                                        block
                                        mt-1
                                        border-gray-300
                                        rounded-md
                                        shadow-sm
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                    "
                                    placeholder="08:00"
                                    value="{{ Carbon\Carbon::parse($Event->starts)->format('H:i') }}"
                                    Required
                                    />
                                </label>
                                <label class="block mb-6 w-1/8">
                                    <span class="text-gray-700">Finishes</span>
                                    <input
                                    id="date"
                                    name="ends"
                                    type="time"
                                    class="
                                        block
                                        mt-1
                                        border-gray-300
                                        rounded-md
                                        shadow-sm
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                    "
                                    placeholder="23:00"
                                    value="{{ Carbon\Carbon::parse($Event->ends)->format('H:i') }}"
                                    required
                                    />
                                </label>
                            </div>
                            <label class="block mb-6">
                                <span class="text-gray-700">Content</span>
                                <input id="x" value="{{ $Event->description }}" type="hidden" name="description">
                                <trix-editor input="x"></trix-editor>
                            </label>

                            <label class="block mb-6 w-full">
                                <span class="text-gray-700 block">Volunteer Roles</span>
                                <div class="flex">
                                <input
                                name="roles"
                                type="text"
                                class="
                                    inline-block
                                    w-full
                                    mt-1
                                    border-gray-300
                                    rounded-md
                                    shadow-sm
                                    focus:border-indigo-300
                                    focus:ring
                                    focus:ring-indigo-200
                                    focus:ring-opacity-50
                                "
                                placeholder="Speaker, Helper, other"
                                value="{{$Volunteers}}"
                                />
                                </div>
                            </label>
                        

                        <button 
                        class="align-center bg-green-400 text-white rounded-md py-2 px-4 justify-self-center"
                        type="submit">
                        Update
                        </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
(function(){
    flatpickr("#date", {});
});
</script>
</x-app-layout>