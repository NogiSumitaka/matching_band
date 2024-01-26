<x-app-layout>
    <!--Talk -->
    @if (isset($user))
        <div class="flex flex-col items-center w-screen h-screen">
            <div class="w-3/4 h-3/4 bg-white border border-gray-800 rounded-md overflow-y-auto  min-w-screen-sm my-4">
            @foreach ($messages as $message)
                <div class="my-2 flex {{ $message->pivot->user_to_band ? 'flex-row-reverse' : '' }}">
                    <p class="p-2 m-1 rounded-lg border">{{ $message->pivot->user_to_band ? $user->name : $message->name }}</p>
                    <p class="py-1 px-2 m-1 rounded-md bg-green-400 max-w-lg">{{ $message->pivot->message }}</p>
                </div>
            @endforeach
            </div>
            
            <div class="px-4 py-1 rounded-md border border-gray-800 bg-white w-3/4 min-w-screen-sm">
                <form method="POST" action="/chat/message" class="flex bg-white">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" name="band_id" value="{{$band_id}}">
                    <input type="hidden" name="user_to_band" value=1>
                    <input type="text" name="message" class="rounded-md w-lg ml-auto"/>
                    <input type="submit" value="送信" class="rounded-md px-4 py-1 bg-blue-400 text-neutral-50"/>
                </form>
            </div>
        </div>
    @else
        <div class="flex flex-col items-center w-screen h-screen">
            <div class="w-3/4 h-3/4 bg-white border border-gray-800 rounded-md overflow-y-auto  min-w-screen-sm my-4">
            @foreach ($messages as $message)
                <div class="my-2 flex {{ $message->pivot->user_to_band ? '' : 'flex-row-reverse' }}">
                    <p class="p-2 m-1 rounded-lg border">{{ $message->pivot->user_to_band ? $message->name : $band->name }}</p>
                    <p class="py-1 px-2 m-1 rounded-md bg-green-400 max-w-lg">{{ $message->pivot->message }}</p>
                </div>
            @endforeach
            </div>
            <div class="px-4 py-1 rounded-md border border-gray-800 bg-white w-3/4 min-w-screen-sm">
                <form method="POST" action="/chat/message" class="flex bg-white">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $applicant_id }}">
                    <input type="hidden" name="band_id" value="{{ $band->id }}">
                    <input type="hidden" name="user_to_band" value=0>
                    <input type="text" name="message" class="rounded-md w-lg ml-auto"/>
                    <input type="submit" value="送信" class="rounded-md px-4 py-1 bg-blue-400 text-neutral-50"/>
                </form>
            </div>
        </div>
    @endif
</x-app-layout>