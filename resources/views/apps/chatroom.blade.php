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
                    <textarea name="message"  class="resize ml-auto" rows="2"></textarea>
                    <input type="submit" value="送信" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>
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
                    <input type="hidden" name="user_id" value="{{ $applicant_id }}" class="hidden">
                    <input type="hidden" name="band_id" value="{{ $band->id }}" class="hidden">
                    <input type="hidden" name="user_to_band" value=0 class="hidden">
                    <textarea name="message"  class="resize ml-auto" rows="2"></textarea>
                    <input type="submit" value="送信" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>
                </form>
            </div>
        </div>
    @endif
    <script>
        $('textarea.resize').on('keydown', function(){
        var textarea = this;
        setTimeout(function(){
            textarea.style.cssText = 'height : auto;';
            textarea.style.cssText = 'height : ' + textarea.scrollHeight + 'px;';
            },0);
        });
    </script>
</x-app-layout>