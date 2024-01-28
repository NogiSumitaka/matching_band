<x-app-layout>
    <!--Talk -->
        <div class="flex flex-col items-center w-auto h-auto min-w-screen-sm">
            <div class="border border-gray-800 rounded-md bg-white w-3/4 h-3/4 min-w-screen-sm my-4">
            @foreach ($messages as $message)
                <div class="my-2 flex {{ $message->pivot->user_to_band ? '' : 'flex-row-reverse' }}">
                    <p class="p-2 m-1 rounded-lg border">{{ $message->pivot->user_to_band ? $message->name : $band->name }}</p>
                    <p class="py-1 px-2 m-1 rounded-md bg-green-400 max-w-lg">{{ $message->pivot->message }}</p>
                </div>
            @endforeach
            </div>
            
            <div class="px-4 py-1 rounded-md border border-gray-800 bg-white w-3/4 min-w-screen-sm">
                <form type="POST" action="/profile/message" class="flex bg-white">
                    @csrf
                    <input type="text" name="message" class="rounded-md w-lg ml-auto"/>
                    <input type="submit" value="送信" class="rounded-md px-4 py-1 bg-blue-400 text-neutral-50"/>
                </form>
            </div>
        </div>
</x-app-layout>