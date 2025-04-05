@extends('layouts.tester')

@section('title')
    <title>Trello Configuration API</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Trello Configuration / API</p>
    </div>
@endsection

@section('contents')
    <div class="max-w-md mx-auto">
        <div class="text-2xl font-bold mb-4 text-blue-900 ">
            <p>Trello API</p>
        </div>
        <form>
            <div class="mb-4">
                <label for="setting-name" class="block text-sm font-bold text-black mb-2">Setting Name</label>
                <input type="text" id="setting-name" placeholder="Setting Name"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="api-key" class="block text-sm font-bold text-black mb-2">API Key</label>
                <input type="text" id="api-key" placeholder="Your API Key"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="api-token" class="block text-sm font-bold text-black mb-2">API Token</label>
                <input type="text" id="api-token" placeholder="Your API Token"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-center gap-4">
                <button type="button"
                    class="w-60 px-6 py-2 bg-[#636363] text-white rounded-md hover:bg-[#636363]">Cancel</button>
                <button type="submit"
                    class="w-60 px-6 py-2 bg-[#00408E] text-white rounded-md hover:bg-[#00408E]">Create</button>
            </div>
        </form>
    </div>
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
