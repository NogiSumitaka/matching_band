<x-app-layout>
    <!-- Band infomation edit form -->
    <div class="flex flex-col items-center mt-4">
        <p class="text-2xl font-bold underline">募集情報編集</p>
    @foreach ($bands as $band)
        <div class="p-4 mt-2 w-3/4 rounded-lg bg-white shadow-lg">
            <form action="/profile/bands/{{ $band->id }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <p class="text-lg">バンド名</p>
                    <input type="text" name="band[name]" value="{{ $band->name }}" placeholder="例）Matching Band" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">ジャンル</p>
                    @foreach($genres as $genre)
                        <label>
                            <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]"
                                @foreach ($band->genres as $old_genre)
                                    @if ($old_genre->id == $genre->id) 
                                        checked 
                                    @endif
                                @endforeach>
                                    {{ $genre->genre }}
                            </input>
                        </label>
                    @endforeach
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">活動場所</p>
                    <select name="prefecture">
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}"
                            @foreach ($band->prefectures as $old_prefecture)
                                @if ($old_prefecture->id == $prefecture->id) 
                                    selected
                                @endif
                            @endforeach>
                            {{ $prefecture->prefecture }}
                        </option>
                    @endforeach
                    </select>
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">募集楽器</p>
                    @foreach($insts as $inst)
                        <label>
                            <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]"
                                @foreach ($band->insts as $old_inst)
                                    @if ($old_inst->id == $inst->id) 
                                        checked 
                                    @endif
                                @endforeach>
                                {{ $inst->inst }}
                            </input>
                        </label>
                    @endforeach
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">募集レベル*　<span class="text-sm text-gray-500">*(初心者1~3，中級者4~7，上級者8~10)</span></p>
                    <input type="number" name="band[level]" value="{{ $band->level }}"placeholder="1~10" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"/>
                </div>
                <div class="mt-4">
                    <p class="text-lg">バンド紹介文</p>
                    <textarea name="band[introduction]" rows="4" placeholder="バンド紹介・メンバーに求めることなど..." class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $band->introduction }}</textarea>
                </div>
                <div class="flex flex-row-reverse">
                    <input type="checkbox" value="{{ $user->id }}" name="band[creater_id]" checked class="hidden">
                    <input type="submit" value="変更保存" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 mt-2 border border-gray-400 rounded shadow"/>
                </div>
                
            </form>
        </div>
    @endforeach
    </div>
</x-app-layout>