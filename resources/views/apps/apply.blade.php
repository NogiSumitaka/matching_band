<x-app-layout>
    <div class="flex flex-col p-4 m-4 rounded-md border border-gray-800 bg-white">
        <h1 class="underline text-xl font-bold">応募しているバンド一覧</h1>
    @foreach ($bands as $band)
        <div class="flex px-4 py-2 my-1 rounded-md border border-gray-800 max-w-lg">
            <p class="text-lg ">{{ $band->name }}</p>
            <div class="ml-auto">
                <a href='/index/{{ $band->id }}' class="rounded-md px-4 py-1 border border-gray-800 bg-gray-300">詳細</a>
                <a href='/apply/chatroom/user/{{ $user->id }}/{{ $band->id }}' class="rounded-md px-4 py-1 bg-blue-400 text-neutral-50">chat</a>
            </div>
        </div>
    @endforeach
    </div>
    <div class="flex flex-col p-4 m-4 rounded-md border border-gray-800 bg-white">
        <h1 class="text-xl font-bold underline">応募者一覧</h1>
        @foreach ($mybands as $myband)
            <h2 class="text-xl font-bold">{{ $myband->name }}</h2>
            @foreach ($myband->applications as $applicant)
            <div>
                <div class="flex px-4 py-2 my-1 rounded-md border border-gray-800 max-w-lg">
                    <p class="text-lg">{{ $applicant->name }}</p>
                    <div class="ml-auto">
                        <a href='/index/3' class="rounded-md px-4 py-1 border border-gray-800 bg-gray-300">詳細</a>
                        <a href="/apply/chatroom/band/{{$myband->id}}/{{$applicant->id}}" class="rounded-md px-4 py-1 bg-blue-400 text-neutral-50">chat</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
        
    </div>
    {{--
    @foreach( $application->bands as $applied_band)
        <div class="flex">
            <p>{{ $applied_band->name}}</p>
            <div>
                <a href='/apply/chatroom/user/{{ $user->id }}'>chat</a>
            </div>
        </div>
    @endforeach
    <p>応募者一覧</p>
    @foreach( $user_band_with_applicants as $band)
        <p>{{ $band->name}}</p>
        <div>
            @foreach( $band->users as $applicant)
                <div>
                    <p>{{ $applicant->name }}</p>
                    <div>
                        <a href='/apply/chatroom/band/{{ $band->id }}'></a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    --}}
</x-app-layout>