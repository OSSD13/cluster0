@extends('layouts.tester')

@section('title')
    <title>Dashborad</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Dashborad</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Overview</p>
    </div>
@endsection

@section('filter')
    {{-- filter --}}
    <div class="my-3">
        <div class="bg-white w-full h-[70px] rounded-lg shadow-xl">
            <div class="flex justify-start items-center gap-4 p-5">
                <img src="/resources/Images/Icons/filter (1).png" alt="" class="w-[40px] h-[40px]">
                <label class="text-[var(--primary-color)] text-2xl"><strong>Filter</strong></label>
            </div>
        </div>
    </div>

    {{-- show point 3 type --}}
    <div class="my-3 flex flex-row gap-4">

        {{-- Point All --}}
        <div class="basis-1/3 bg-white h-[90px] w-full rounded-lg shadow-xl">
            <div class="bg-[var(--primary-color-yellow)] w-full h-[30px] rounded-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point All</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointAllNumber" class="font-bold">37</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointAllPercent" class="font-bold text-[var(--yellow-color-text)]">100%</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Point Pass --}}
        <div class="basis-1/3 bg-white h-[90px] w-full rounded-lg shadow-xl">
            <div class="bg-[var(--primary-color-green)] w-full h-[30px] rounded-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point Pass</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassNumber" class="font-bold">36</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassPercent" class="font-bold text-[var(--green-color-text)]">97.30%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="basis-1/3 bg-white h-[90px] w-full rounded-lg shadow-xl">
            <div class="bg-[var(--primary-color-red)] w-full h-[30px] rounded-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point Fail</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassNumber" class="font-bold">3</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassPercent" class="font-bold text-[var(--red-color-text)]">8.10%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contents')
@endsection

@section('javascripts')
    <script></script>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        #navbar-title {
            font-family: "Jaro", sans-serif;
            line-height: 25px;
            letter-spacing: 0.5px;
        }

        body {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection
