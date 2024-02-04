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
                    <input type="text" name="band[name]" value="{{ $band->name }}" placeholder="例）Matching Band">
                </div>
                <div class="mt-4">
                    <p class="text-lg">ジャンル</p>
                    @foreach($band->genres as $genre)
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
                    @foreach($band->prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">
                            {{ $prefecture->prefecture }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <p class="text-lg">募集楽器</p>
                    @foreach($band->insts as $inst)
                        <label>
                            <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                                {{ $inst->inst }}
                            </input>
                        </label>
                    @endforeach
                </div> 
                <div class="mt-4">
                    <p class="text-lg">募集レベル</p>
                    <input type="number" name="band[level]" value="{{ $band->level }}"placeholder="1~10"/>
                </div>
                <div class="mt-4">
                    <p class="text-lg">バンド紹介</p>
                    <textarea name="band[introduction]" rows="4" value="{{ $band->introduction }}" placeholder="バンド紹介・メンバーに求めることなど..."></textarea>
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