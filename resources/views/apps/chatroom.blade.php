<x-app-layout>
    <!--Talk -->
        <div class="flex flex-col items-center w-auto h-auto min-w-screen-sm">
            <div class="border border-gray-800 rounded-md bg-white w-3/4 h-3/4 min-w-screen-sm my-4">
                <div class="flex my-2">
                    <p class="p-2 m-1 rounded-lg border">icon</p>
                    <p class="py-1 px-2 m-1 rounded-md bg-green-400 max-w-lg">こんにちは！</p>
                </div>
                <div class="flex flex-row-reverse">
                    <p class="p-2 m-1 rounded-lg border">icon</p>
                    <p class="py-1 px-2 m-1 rounded-md bg-green-400 max-w-lg">応募させていただきました！ゲストです．</p>
                </div>
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