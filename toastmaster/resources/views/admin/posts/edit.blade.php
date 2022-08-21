<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="max-w-4xl w-full pb-4 mx-auto sm:px-6 lg:px-8">
            <div id="post-editor" class="flex-auto block">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200 p-4">
                        <form id="post" method="POST" autocomplete="off">
                        @csrf
                        @method('POST')
                            <input name="id" type="hidden" value="{{$post->id}}"/>
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
                                placeholder="An interesting title"
                                value="{{$post->title}}"
                                Required
                                />
                            </label>
                            
                            <label class="block mb-6">
                            <span class="text-gray-700">Content</span>
                                <input id="x" value="{{ $post->content }}" type="hidden" name="content">
                                <trix-editor input="x"></trix-editor>
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
</x-app-layout>