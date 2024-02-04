<x-app-layout>
    <!-- Post -->
    <div class="flex flex-col justify-center items-center mt-20">
        <div class="w-3/4 flex flex-col p-8 border border-gray-500 rounded-lg bg-white shadow-lg">
            <h2 class="text-center text-2xl font-semibold underline">{{ $band->name }}</h2>
            <div class="flex">
                <p>ジャンル：</p>
            @foreach ($band->genres as $genre)
                <p class="mx-2">{{ $genre->genre}}</p>
            @endforeach
            </div>
            
            <div class="flex">
                <p>活動場所：</p>
            @foreach ($band->prefectures as $prefecture)
                <p class="mx-2">{{ $prefecture->prefecture }}</p>
            @endforeach
            </div>
            
            <div class="flex">
                <p>募集パート：</p>
            @foreach ($band->insts as $inst)
                <p class="mx-2">{{ $inst->inst }}</p>
            @endforeach
            </div>
            
            <p class="body">演奏レベル:{{ $band->level }}</p>
            
            <p class="p-4 border border-gray-500 rounded-lg text-wrap">{{ $band->introduction }}</p>
        </div>
        <form method="POST" action="/apply" class="flex flex-col justify-center items-center w-screen mt-4">
            @csrf
            <input type="hidden" name="band_id" value="{{ $band->id }}"/>
            <input type="submit" value="応募する" class="w-3/4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"/>
        </form>
    </div>
</x-app-layout>

       