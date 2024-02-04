<x-app-layout>
    <!-- Create form -->
    <div class="flex flex-col items-center mt-10">
        <p class="text-2xl font-bold underline">メンバー募集作成</p>
        <div class="p-4 mt-2 w-3/4 rounded-lg bg-white shadow-lg">
            <form action="/bands" method="POST">
                @csrf
                <div>
                    <p class="text-lg">バンド名</p>
                    <input type="text" name="band[name]" placeholder="例）Matching Band" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">ジャンル</p>
                    @foreach($genres as $genre)
                        <label>
                            <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                                {{ $genre->genre }}
                            </input>
                        </label>
                    @endforeach
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">活動場所</p>
                    <select name="prefecture">
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">
                            {{ $prefecture->prefecture }}
                        </option>
                    @endforeach
                    </select>
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">募集楽器</p>
                    @foreach($insts as $inst)
                        <label>
                            <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                                {{ $inst->inst }}
                            </input>
                        </label>
                    @endforeach
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">募集レベル*　<span class="text-sm text-gray-500">*(初心者1~3，中級者4~7，上級者8~10)</span></p>
                    <input type="number" name="band[level]" placeholder="1~10" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"/>
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">バンド紹介</p>
                    <textarea name="band[introduction]" rows="4" placeholder="バンド紹介・メンバーに求めること等..." class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                </div>
                <div class="flex flex-row-reverse">
                    <input type="checkbox" value="{{ $user->id }}" name="band[creater_id]" checked class="hidden">
                    <input type="submit" value="保存" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 mt-2 border border-gray-400 rounded shadow"/>
                </div>
                
            </form>
        </div>
    </div>
</x-app-layout>

