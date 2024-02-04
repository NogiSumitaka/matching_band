<x-app-layout>
    <!-- Profile edit form -->
    <div class="flex flex-col items-center mt-10">
        <h1 class="text-2xl font-bold underline">プロフィール編集</h1>
        <div class="p-4 mt-2 w-3/4 rounded-lg bg-white shadow-lg">
            <form action="/profile/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <p class="text-lg">ユーザー名</p>
                    <input type="text" name="user[name]" value="{{ $user->name }}" placeholder="例）マッチングバンド太郎" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">メールアドレス</p>
                    <input type="text" name="user[email]" value="{{ $user->email }}" placeholder="@gmail.com" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </div>
                
                <div class="mt-4">
                    <p class="text-lg">好きなジャンル</p>
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
                    <p class="text-lg">やっている楽器</p>
                    @foreach($insts as $inst)
                        <label>
                            <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                                {{ $inst->inst }}
                            </input>
                        </label>
                    @endforeach
                </div> 
                
                <div class="mt-4">
                    <p class="text-lg">自己紹介</p>
                    <input type="text" name="user[introduction]" value="{{ $user->introduction }}" placeholder="好きなバンド：　趣味：" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"/>
                </div>
                <div class="flex flex-row-reverse">
                    <input type="submit" value="保存" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 mt-2 border border-gray-400 rounded shadow"/>
                </div>
            </form>
        </div>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

