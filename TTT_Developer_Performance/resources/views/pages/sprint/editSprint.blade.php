@extends('layouts.tester')

@section('title')
    <title>Sprint Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Sprint Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Sprint List / Edit</p>
    </div>
@endsection

@section('contents')
    <form action="{{ route('sprint.update', $sprint->spr_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col items-center justify-start min-h-screen ml-10 pt-10">
            <div class="w-[500px] h-[600px] bg-white p-6 rounded-2xl shadow-lg">
                <!-- Header -->
                <h3 class="text-xl font-bold text-blue-900 text-left mb-4 ml-5">Edit Sprint</h3>

                <!-- Year Input -->
                <div class="w-[400px] ml-5">
                    <label class="block font-bold text-gray-700">Year</label>

                    <input type="number" name="year" value="{{ $sprint->spr_year }}" placeholder="Year"
                        class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
                </div>

                <!-- Sprint Input -->
                <div class="w-[400px] mt-4 ml-5">
                    <label class="block font-bold text-gray-700">Sprint</label>

                    <input type="number" name="sprint" value="{{ $sprint->spr_number }}" placeholder="Sprint"
                        class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
                </div>

                <!-- Buttons -->
                <div class="flex justify-start mt-6 gap-1 ml-5">

                    <button class="w-[199px] h-[50px] bg-gray-600 text-white rounded-lg font-bold hover:bg-gray-800"
                        onclick="window.location.href='{{ route('sprint') }}'">
                        Cancel
                    </button>
                    <button class="w-[199px] h-[50px] bg-blue-900 text-white rounded-lg font-bold hover:bg-blue-700"
                    type="submit">
                    Apply
                </button>
                </div>
            </div>
        </div>
    </form>
@endsection



@section('styles')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
@endsection
