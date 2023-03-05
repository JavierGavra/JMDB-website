@extends('dashboard.layouts.main')
@section('content')
<div class="p-12">
    <div class="bg-gray-800 py-3 rounded-xl">
        <center><h1 class="font-bold text-lg text-orange-400">-----  CRUD STUDIO  -----</h1></center>
    </div><br/>
    <div class="flex justify-center">
        {{-- search --}}
        <form class="flex items-center">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-96">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-orange-400 rounded-lg border border-orange-700 hover:bg-orange-800 focus:ring-2 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
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
                    <th scope="col" class="px-6 py-3">Region</th>
                    <th scope="col" class="px-6 py-3">Started at</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($studios as $studio)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$no++}}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$studio->name}}</th>
                    <td class="px-6 py-4">{{$studio->region}}</td>
                    <td class="px-6 py-4">{{$studio->started_at}}</td>
                    <td class="px-6 py-4">
                        <a href="/dashboard/studio/detail/ {{$studio->id}}" type="button" class="text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2">
                            detail
                        </a>
                        <a href="/dashboard/studio/edit/ {{$studio->id}}" type="button" class="text-yellow-500 hover:text-white border border-yellow-500 hover:bg-yellow-500 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br/>
</div>
@endsection