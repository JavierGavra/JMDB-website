@extends('dashboard.layouts.main')
@section('content')
<div class="mx-24 my-14">
    <div class="bg-gray-700 py-3 rounded-xl">
        <center><h1 class="font-bold text-lg text-orange-400">Create Studio</h1></center>
    </div><br/>
    <div class="px-14 py-6 border border-gray-800 rounded-xl">
        <form action="/dashboard/studio/update/ {{ $studio->id }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Studio Name</label>
                <input type="text" id="name" name="name" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" placeholder="Your Studio name" value="{{ old('name', $studio->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="email" name="email" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" placeholder="name@company.com" value="{{ old('email', $studio->email) }}" required>
            </div>
            <div class="mb-4">
                <label for="region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                <input type="text" id="region" name="region" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" placeholder="Studio country..." value="{{ old('region', $studio->region) }}" required>
            </div>
            <div class="mb-4">
                <label for="started_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Started at</label>
                <input type="date" id="started_at" name="started_at" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" value="{{ old('started_at', $studio->started_at) }}" required>
            </div><br/>
            <button type="submit" class="text-white bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm w-full py-2.5 text-center">Create</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
@endsection