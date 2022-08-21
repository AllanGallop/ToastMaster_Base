<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Location
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="max-w-xl pb-4 mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

            <form id="location" method="POST" autocomplete="off">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{$location->id}}"/>
                <label class="block mb-6">
                    <span class="text-gray-700">Address line 1</span>
                    <input
                    name="Address_1"
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
                    placeholder=""
                    value="{{$location->Address_1}}"
                    required
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Address line 2</span>
                    <input
                    name="Address_2"
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
                    placeholder=""
                    value="{{$location->Address_2}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Address line 3</span>
                    <input
                    name="Address_3"
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
                    placeholder=""
                    value="{{$location->Address_3}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">City</span>
                    <input
                    name="City"
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
                    placeholder=""
                    value="{{$location->City}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Postal code</span>
                    <input
                    name="Postcode"
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
                    placeholder=""
                    value="{{$location->Postcode}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">County</span>
                    <input
                    name="County"
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
                    placeholder=""
                    value="{{$location->County}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Country</span>
                    <input
                    name="Country"
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
                    placeholder=""
                    value="{{$location->Country}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Telephone</span>
                    <input
                    name="Tel"
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
                    placeholder=""
                    value="{{$location->Tel}}"
                    />
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
</x-app-layout>