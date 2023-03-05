@extends('main')
@section('content')
<div class="flex items-center justify-center h-screen bg-fixed bg-center z-auto bg-[url('/images/background-img.jpg')]">
    <div class="h-screen w-screen center bg-zinc-700 bg-opacity-60">
        <div class="flex py-6 justify-center">
            <form action="/film/all" role="search" class="flex items-center">   
                <select name="genre" class="mr-3 bg-gray-700 border border-gray-600 text-white placeholder-gray-400 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-60 p-2.5">
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
                    <input type="text" value="{{ request('search') }}" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                </div>
                <button type="submit" id="search"  class="p-2.5 ml-2 text-sm font-medium text-white bg-orange-400 rounded-lg border border-orange-700 hover:bg-orange-800 focus:ring-2 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
        <div class="mt-3">
            <center>
                <div class="grid grid-cols-4 gap-12 mx-32">
                    @foreach($films as $film)
                    <a href="/film/detail/ {{ $film->id }}" class="w-64 bg-gray-800 shadow-xl rounded-lg drop-shadow-2xl transition hover:brightness-125 hover:duration-150 hover:scale-110">
                        <img src="/images/backdrop-img-spiderman.jpg" alt="Shoes" class="rounded-t-lg h-32 w-64 object-cover"/>
                        <div class="pb-5 pt-3 px-6">
                            <h2 class="text-left font-semibold text-slate-200 truncate">{{$film->name}}</h2>
                            <h2 class="text-left text-slate-400 truncate">by: {{$film->studio->name}}</h2>
                            <br/>
                            <p class="text-right text-red-300">{{$film->release}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>   

                <!-- Pagination Button -->
                @if ($films->total() > 8)
                <br/>
                <div class="flex inline-flex mx-32">
                    <a href="{{$films->previousPageUrl()}}" class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Previous
                    </a>
                    <a href="{{$films->nextPageUrl()}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                        <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                @endif
            </center>
        </div>
    </div>
</div>
@endsection