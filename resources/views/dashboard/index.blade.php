@extends('dashboard.layouts.main')
@section('content')
<div class="p-4">
    <div class="grid grid-cols-2 gap-4 mb-4">
        <iframe class="flex w-full rounded" height="400" src="https://www.youtube.com/embed/MCVkMmYL-aY"></iframe>
        <iframe class="flex w-full rounded" height="400" src="https://www.youtube.com/embed/_27eD49ePQE"></iframe>
    </div>
    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-white">Diatas adalah "Iframe" test</p>
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">1</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">2</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">3</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">4</p>
        </div>
    </div>
</div>
@endsection