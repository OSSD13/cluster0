@extends('layouts.tester')

@section('title')
    <title>Default Configuration</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Default Configuration</p>
    </div>
@endsection

@section('contents')
<div class="flex justify-center pt-3 min-h-screen">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg h-[550px] shadow-lg">
        <h2 class="text-2xl font-bold text-[#00408e] mb-4">Default Configuration</h2>
        <form>
            <div class="mb-4">
                <label for="password" class="block text-sm font-bold text-black">Set Default Password</label>
                <input type="text" id="password" value="TTT@1234" class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-gray-300 text-white font-semibold py-4 px-12 rounded-md shadow-md">
                    Save changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('javascripts')
<script>
</script>

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
