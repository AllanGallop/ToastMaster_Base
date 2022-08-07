<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/profile">
                        @csrf
                        @method('POST')

                        <div class="flex flex-col md:flex-row m-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Email
                            </label>
                            <input id="email" name="email"
                                type="email"
                                value="{{ $User->email}}"
                                class="@error('email') is-invalid @else is-valid @enderror appearance-none block w-full text-gray-700 border border-purple-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Name
                                </label>
                                <input id="name" name="name" 
                                    type="text" 
                                    value="{{$User->name}}"
                                    class="appearance-none block w-full text-gray-700 border border-purple-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            </div>
                        </div>

                        <div class="w-full flex justify-center items-center">
                            <button type="submit"
                                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-4 pl-4 text-lg">Change Password</div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/profile/password">
                        @csrf
                        @method('POST')

                        <div class="flex flex-col md:flex-row m-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Password
                                </label>
                                <input id="password" name="password"
                                    type="password"
                                    class="@error('password') is-invalid @else is-valid @enderror appearance-none block w-full text-gray-700 border border-purple-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="confirm" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Confirm Password
                                </label>
                                <input id="confirm" name="confirm" 
                                    type="password" 
                                    class="@error('confirm') is-invalid @else is-valid @enderror appearance-none block w-full text-gray-700 border border-purple-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            </div>
                        </div>
                        
                        <div class="w-full flex justify-center items-center">
                            @error('confirm')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex justify-center items-center">
                            <button type="submit"
                                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>