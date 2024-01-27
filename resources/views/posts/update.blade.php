<x-app-layout>
    <!-- Band infomation edit form -->
    @foreach ($bands as $band)
    <div>
        <form action="/profile/bands/{{ $band->id }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <p>バンド名</p>
                <input type="text" name="band[name]" value="{{ $band->name }}" placeholder="例）Matching Band">
            </div>
            <div>
                <p>ジャンル</p>
                @foreach($band->genres as $genre)
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
                @foreach($band->prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">
                        {{ $prefecture->prefecture }}
                    </option>
                @endforeach
                </select>
            </div>
            <div>
                <p>募集楽器</p>
                @foreach($band->insts as $inst)
                    <label>
                        <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                            {{ $inst->inst }}
                        </input>
                    </label>
                @endforeach
            </div> 
            <div>
                <p>募集レベル</p>
                <input type="number" name="band[level]" value="{{ $band->level }}"placeholder="1~10"/>
            </div>
            <div>
                <p>バンド紹介</p>
                <input type="text" name="band[introduction]" value="{{ $band->introduction }}"placeholder="バンドの雰囲気：　やる曲の特徴：　よく使うスタジオ：　求める奏法：..."/>
            </div>
            <input type="checkbox" value="{{ $user->id }}" name="band[creater_id]" checked class="hidden">
            <input type="submit" value="変更保存"/>
        </form>
        <form action="/profile/bands/{{ $band->id }}" id="form_{{ $band->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $band->id }})">delete</button> 
        </form>
    </div>
    @endforeach
    <script>
        function deletePost(id) {
            'use strict'
            
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>