<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Location
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="max-w-xl pb-4 mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

            <form>
                <label class="block mb-6">
                    <span class="text-gray-700">Address line 1</span>
                    <input
                    name="address1"
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
                    value="{{$Location->Address_1}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Address line 2</span>
                    <input
                    name="address2"
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
                    value="{{$Location->Address_2}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Address line 3</span>
                    <input
                    name="address3"
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
                    value="{{$Location->Address_3}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">City</span>
                    <input
                    name="city"
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
                    value="{{$Location->City}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Postal code</span>
                    <input
                    name="zip"
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
                    value="{{$Location->Postcode}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">County</span>
                    <input
                    name="country"
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
                    value="{{$Location->County}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Country</span>
                    <input
                    name="country"
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
                    value="{{$Location->Country}}"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Telephone</span>
                    <input
                    name="telephone"
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
                    value="{{$Location->Tel}}"
                    />
                </label>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>