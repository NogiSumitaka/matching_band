<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row-reverse">
        <div class="bg-green-100 py-4 pl-4">1</div>
        <div class="bg-green-100 py-4 pl-4">2</div>
        <div class="bg-green-100 py-4 pl-4">3</div>
    </div>
</x-app-layout>
