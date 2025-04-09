@extends('layouts.tester')

@section('title')
    <title>Edit Trello API</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Setting</h2>
        <p class="font-bold text-neutral-400">Trello Configuration / Edit API</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
        <div class="text-2xl font-bold mb-4 text-blue-900 ">
            <p>Edit Trello API</p>
        </div>

        {{-- Form Trello API --}}
        <form action="{{ route('trello.editApi.update', $api->trc_id) }}" method="post">
            @csrf
            @method('POST')
            {{-- Setting Name --}}
            <div class="mb-4">
                <label for="setting-name" class="block text-sm font-bold text-black mb-2">Setting Name</label>
                <input type="text" id="setting-name" placeholder="Setting Name" name="setting_name"
                    value="{{ old('setting_name', $api->trc_name) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            {{-- API Key --}}
            <div class="mb-4">
                <label for="api-key" class="block text-sm font-bold text-black mb-2">API Key</label>
                <input type="text" id="api-key" placeholder="Your API Key" name="api_key"
                    value="{{ old('api_key', $api->trc_api_key) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            {{-- API Token --}}
            <div class="mb-6">
                <label for="api-token" class="block text-sm font-bold text-black mb-2">API Token</label>
                <input type="text" id="api-token" placeholder="Your API Token" name="api_token"
                    value="{{ old('api_token', $api->trc_api_token) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            {{-- Cancel And Create --}}
            <div class="flex gap-4 mb-[30px] w-full max-w-[900px] mx-auto">
                <button type="button" onclick="window.location.href='{{ route('trello.config') }}'"
                    class="w-60 px-6 py-2 bg-zinc-500 text-white rounded-[10px] font-bold border-2 border-transparent hover:bg-white hover:text-blue-900 hover:border-blue-900">
                    Cancel
                </button>
                <button type="submit"
                    class="w-60 px-6 py-2 bg-blue-900 text-white rounded-[10px] font-bold border-2 border-transparent hover:bg-white hover:text-blue-900 hover:border-blue-900">
                    Apply
                </button>
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
