<x-app-layout>
    <!-- Create form -->
    <div>
        <form action="/bands" method="POST">
            @csrf
            <div>
                <p>バンド名</p>
                <input type="text" name="band[name]" placeholder="例）Matching Band">
            </div>
            <div>
                <p>ジャンル</p>
                @foreach($genres as $genre)
                    <label>
                        <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                            {{ $genre->genre }}
                        </input>
                    </label>
                @endforeach
            </div>
            <div>
                <p>活動場所</p>
                <select name="prefecture">
                @foreach($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">
                        {{ $prefecture->prefecture }}
                    </option>
                @endforeach
                </select>
            </div>
            <div>
                <p>募集楽器</p>
                @foreach($insts as $inst)
                    <label>
                        <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                            {{ $inst->inst }}
                        </input>
                    </label>
                @endforeach
            </div> 
            <div>
                <p>募集レベル</p>
                <input type="number" name="band[level]" placeholder="1~10"/>
            </div>
            <div>
                <p>バンド紹介</p>
                <input type="text" name="band[introduction]" placeholder="バンドの雰囲気：　やる曲の特徴：　よく使うスタジオ：　求める奏法：..."/>
            </div>
            <input type="checkbox" value="{{ $user->id }}" name="band[creater_id]" checked class="hidden">
            <input type="submit" value="保存"/>
        </form>
    </div>
</x-app-layout>

