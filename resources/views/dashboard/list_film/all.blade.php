@extends('dashboard.layouts.main')
@section('content')
<div class="p-12">
    <div class="bg-gray-800 py-3 rounded-xl">
        <center><h1 class="font-bold text-lg text-orange-400">-----  CRUD FILM  -----</h1></center>
    </div>

    @if (session()->has('success'))
        <br>
        <div class="bg-green-600 bg-opacity-70 text-zinc-200 font-medium py-2 px-6 rounded-xl" role="alert">
            {{ session ('success')}}
        </div>
    @endif

    <br/><div class="flex space-x-5">
        {{-- Create data --}}
        <a href="/dashboard/film/create" type="button" class="text-slate-200 bg-sky-700 hover:bg-sky-800 font-medium rounded-lg text-sm w-full py-2.5 my-0.5 text-center">Add Data</a>

        {{-- search --}}
        <form action="/dashboard/film/all" role="search" class="flex items-center">   
            <select name="genre" class="mr-3 bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full p-2.5">
                <option name="genre" value="">None</option>
                <option name="genre" value="Action">Action</option>
                <option name="genre" value="Advanture">Advanture</option>
                <option name="genre" value="Horror">Horror</option>
                <option name="genre" value="Thriller">Thriller</option>
            </select>
            <div class="relative w-96">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" value="{{ request('search') }}" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
            </div>
            <button type="submit" id="search" class="p-2.5 ml-2 text-sm font-medium text-white bg-orange-400 rounded-lg border border-orange-700 hover:bg-orange-800 focus:ring-2 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </div><br/>

    {{-- table data --}}
    <div class="relative overflow-x-auto shadow-md rounded-xl">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Film Name</th>
                    <th scope="col" class="px-6 py-3">Synopsis</th>
                    <th scope="col" class="px-6 py-3">Studio</th>
                    <th scope="col" class="px-6 py-3">Release</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($films as $film)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$no++}}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$film->name}}</th>
                    <td class="px-6 py-4">{{$film->synopsis}}</td>
                    <td class="px-6 py-4">{{$film->studio->name}}</td>
                    <td class="px-6 py-4">{{$film->release}}</td>
                    <td class="px-6 py-4">
                        <div class="inline-flex">
                            <a href="/dashboard/film/detail/{{ $film->id }}" type="button" class="text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2">detail</a>
                            <a href="/dashboard/film/edit/{{ $film->id }}" type="button" class="text-yellow-500 hover:text-white border border-yellow-500 hover:bg-yellow-500 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2">Edit</a>
                            <form action="/dashboard/film/delete/{{ $film->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-white border border-red-500 hover:bg-red-500 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br/>
    
    {{-- Pagination --}}
    @if ($films->total() > 10)
    <div class="flex inline-flex">
        <a href="{{$films->previousPageUrl()}}" class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-400 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
            Previous
        </a>
        <a href="{{$films->nextPageUrl()}}" class="inline-flex justify-items-center items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white">
            Next
            <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
    @endif
</div>
@endsection