<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
            {{ __('Posts') }}
        </h2>

        @if(Auth::user()->role == 'admin')
        <span class="ml-6">
            <a 
            class="px-2 py-1 text-white no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200"
            href="/admin/posts/add">
                Add
            </a>
        </span>
        @endif
    </x-slot>

    <div class="p-4">
    @foreach ($posts as $post)
        <div class="max-w-4xl pb-4 mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="bg-white border-b border-gray-200 flex">

                    <div class="inline-block flex-none w-16 md:w-32 min-h-48 bg-violet-800 text-white text-center align-middle">
                        <span class="block align-top"> {{ Carbon\Carbon::parse($post->created_at)->format('M') }} </span>
                        <span class="block align-middle text-3xl"> {{ Carbon\Carbon::parse($post->created_at)->format('d') }} </span>
                        <span class="block align-bottom"> {{ Carbon\Carbon::parse($post->created_at)->format('Y') }} </span>
                    </div>

                    <div class="grow p-1 relative">

                        @if(Auth::user()->role == 'admin')
                            <div class="absolute top-0 right-0">
                                <a href="/admin/post/edit/{{$post->id}}"><x-forkawesome-pencil class="inline-block w-6 h-6 pl-1 ml-0.5 text-blue-400"/></a>
                                <a href="/admin/post/delete/{{$post->id}}"><x-forkawesome-ban class="inline-block w-6 h-6 pl-1 ml-0.5 text-red-600"/></a>
                            </div>
                        @endif

                        <div class="cursor-pointer">
                            <div class="block text-2xl ml-1 md:py-2">{{$post->title}}</div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="max-w-7xl mx-auto justify-center p-4">
        {!! $posts->links() !!}
    </div>
</x-app-layout>