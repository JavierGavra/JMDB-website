@extends('main')
@section('content')
<div class="flex items-center justify-center h-screen bg-fixed bg-center z-auto bg-[url('/images/background-img.jpg')]">
    <div class="h-screen w-screen center bg-zinc-700 bg-opacity-60">
        <div class="mt-3">
            <center>
                <div class="flex flex-col justify-items-center p-8 gap-y-6">
                    <center>
                        <div class="flex bg-gray-800 px-10 py-5 mx-56 rounded-xl border border-gray-200 border-opacity-40 text-slate-400 place-content-center">
                            <div class="mx-20">
                                <p class="text-center mb-2 text-slate-200 font-semibold text-xl">{{$studio->name}}</p>
                                <div class="h-0.5 bg-slate-500"></div>
                                <br/>
                                <div class="text-center mb-6">
                                    <p class="text-slate-300 font-medium">Films</p>
                                    <p class="text-center mb-6">
                                        @if ($studio->films->count() != 0)
                                            @foreach ($studio->films as $item)
                                                {{$item->name}}, 
                                            @endforeach
                                        @endif
                                        Tidak ada
                                    </p>
                                </div>
                                <div class="text-center mb-6">
                                    <p class="text-slate-300 font-medium">Email</p>
                                    <p>{{$studio->email}}</p>
                                </div>
                                <div class="text-center mb-8">
                                    <p class="text-slate-300 font-medium">Region</p>
                                    <p>{{$studio->region}}</p>
                                </div>
                                <p class="text-center mb-2 text-orange-400">Release at {{$studio->created_at}}</p>
                            </div>
                        </div>
                    </center>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection