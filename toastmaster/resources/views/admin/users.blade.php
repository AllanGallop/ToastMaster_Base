<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="max-w-7xl w-full pb-4 mx-auto sm:px-6 lg:px-8" >

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="bg-white border-b border-gray-200 flex p-4">
                    <table class="table-auto border-collapse border w-full">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Updated</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $user)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-900">{{$user->name}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-900">
                                    @if($user->email_verified_at)
                                    <x-forkawesome-envelope-o class="inline-block w-4 h-4 pl-1 text-green-600" title="Verified"/>
                                    @else
                                    <x-forkawesome-envelope-o class="inline-block w-4 h-4 pl-1 text-red-600" title="Not Verified"/>
                                    @endif
                                    {{$user->email}}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-center text-gray-900">{{$user->created_at}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-center text-gray-900">{{$user->updated_at}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-center text-red-600">
                                    <a href="#" onclick="deleteUser({{$user->id}})">
                                        Delete User
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="max-w-7xl mx-auto justify-center p-4">
                {!! $Users->links() !!}
            </div>
        </div>
    </div>

    <script>
        function deleteUser(ID)
        {
            var xhr = new XMLHttpRequest();
            var data = new Object();
            data.user_id = ID;
            xhr.open('POST', '/admin/users/delete');
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhr.setRequestHeader("content-type", "application/json");
            xhr.send(JSON.stringify(data))
            location.reload();
        }
    </script>


</x-app-layout>