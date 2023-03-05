@extends('dashboard.layouts.main')
@section('content')
<div class="flex items-center justify-center h-screen bg-fixed bg-center z-auto bg-[url('/images/background-img.jpg')]">
    <div class="h-screen w-screen center bg-zinc-700 bg-opacity-60">
        <div class="mt-3">
            <center>
                <div class="flex flex-col justify-items-center p-8 gap-y-6">
                    <div><img src="/images/backdrop-img-spiderman.jpg" class="rounded-lg w-80 h-48 drop-shadow-xl border border-gray-400 transition hover:hue-rotate-180 hover:duration-150 hover:scale-105" alt="your-image-alt"></div>
                    <center>
                        <div class="flex bg-gray-800 w-fit px-6 py-1.5 items-center rounded border border-gray-200 border-opacity-40 text-slate-200 text-lg font-semibold">{{$film->name}} - <p class="text-sm font-medium text-slate-400">> {{$film->genre}}</p></div>
                    </center>
                    <center>
                        <div class="flex bg-gray-800 px-10 py-5 mx-56 rounded-xl border border-gray-200 border-opacity-40 text-slate-400 place-content-center">
                            <div class="mx-20">
                                <p class="text-center mb-6">{{$film->synopsis}}</p>
                                <div class="text-center mb-6">
                                    <p class="text-slate-300 font-medium">Studio</p>
                                    <p>{{$film->studio->name}}</p>
                                </div>
                                <div class="text-center mb-8">
                                    <p class="text-slate-300 font-medium">Director</p>
                                    <p>{{$film->director}}</p>
                                </div>
                                <p class="text-center mb-2 text-orange-400">Release at {{$film->release}}</p>
                            </div>
                        </div>
                    </center>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection