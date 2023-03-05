@extends('dashboard.layouts.main')
@section('content')
<div class="mx-24 my-14">
    <div class="bg-gray-700 py-3 rounded-xl">
        <center><h1 class="font-bold text-lg text-orange-400">Create Data Film</h1></center>
    </div><br/>
    <div class="px-14 py-6 border border-gray-800 rounded-xl">
        <form action="/dashboard/film/add" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Film Name</label>
                <input type="text" id="name" name="name" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" placeholder="Your movie name" required>
            </div>
            <div class="mb-4">
                <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
                <input type="text" id="synopsis" name="synopsis" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" placeholder="....." required>
            </div>
            <div class="mb-4">
                <label for="studio_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Studio</label>
                <select id="studio_id" name="studio_id" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5">
                    @foreach ($studios as $item)
                    <option name="studio_id" value="{{ $item->id }}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="director" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Director</label>
                <input type="text" id="director" name="director" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" placeholder="Director name" required>
            </div>
            <div class="mb-4">
                <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select genre</label>
                <select id="genre" name="genre" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5">
                    <option name="genre" value="Action">Action</option>
                    <option name="genre" value="Advanture">Advanture</option>
                    <option name="genre" value="Horror">Horror</option>
                    <option name="genre" value="Thriller">Thriller</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="release" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Release Date</label>
                <input type="date" id="release" name="release" class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5" required>
            </div><br/>
            <button type="submit" class="text-white bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm w-full py-2.5 text-center">Create</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
@endsection