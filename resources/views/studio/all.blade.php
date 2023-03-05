@extends('main')
@section('content')
<div class="flex items-center justify-center h-screen bg-fixed bg-center z-auto bg-[url('/images/background-img.jpg')]">
    <div class="h-screen w-screen center bg-zinc-700 bg-opacity-60">
        <div class="mt-4">
            <center>
                <div class="grid grid-cols-4 gap-12 mx-32 my-20">
                    @foreach($studios as $item)
                    <a href="/studio/detail/ {{$item->id}}" class="block max-w-sm p-6 bg-gray-800 border border-gray-200 rounded-lg shadow transition hover:brightness-125 hover:duration-150 hover:scale-110 text-left">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-slate-200">{{$item->name}}</h5>
                        <p class="font-normal text-gray-400">{{$item->email}}</p>
                    </a>
                    @endforeach  
                </div>
                
                <!-- Pagination Button -->
                @if ($studios->total() > 12)
                <div class="flex inline-flex">
                    <a href="{{$studios->previousPageUrl()}}" class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Previous
                    </a>
                    <a href="{{$studios->nextPageUrl()}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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