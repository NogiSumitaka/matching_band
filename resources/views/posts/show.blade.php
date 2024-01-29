<x-app-layout>
    <!-- Post -->
    <div class="flex flex-col justify-center mt-20">
        <div class="flex flex-col p-8 border border-gray-700 bg-white shadow-lg">
            <h2 class="text-center text-2xl font-semibold underline">{{ $band->name }}</h2>
            @foreach ($band->genres as $genre)
                <p class="body">ジャンル：{{ $genre->genre}}</p>
            @endforeach
            @foreach ($band->prefectures as $prefecture)
                <p class="body">活動場所：{{ $prefecture->prefecture }}</p>
            @endforeach
            @foreach ($band->insts as $inst)
                <p class="body">募集しているパート：{{ $inst->inst }}</p>
            @endforeach
            <p class="body">演奏レベル:{{ $band->level }}</p>
            <p class="p-4 border border-gray-500 rounded-lg text-wrap">{{ $band->introduction }}</p>
        </div>
        <form method="POST" action="/apply" class="flex flex-col justify-center w-screen mt-4">
            @csrf
            <input type="hidden" name="band_id" value="{{ $band->id }}"/>
            <input type="submit" value="応募する" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"/>
        </form>
    </div>
</x-app-layout>

       