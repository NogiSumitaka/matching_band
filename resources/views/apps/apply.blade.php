<x-app-layout>
    <p>応募しているバンド一覧</p>
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
</x-app-layout>