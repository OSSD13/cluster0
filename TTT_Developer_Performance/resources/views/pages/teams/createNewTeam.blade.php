@extends('layouts.tester')

@section('title')
    <title>Create New Team</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Team List / Add Team</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white shadow-md rounded-xl p-6 max-w-[600px] mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Create New Team</h2>

        <form action="{{ route('team.create') }}" method="POST">
            @csrf

            <!-- Team Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Team Name <span class="text-red-500">*</span></label>
                <input type="text" name="team_name" placeholder="Team Name" 
                    class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Trello Board Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Trello Board Name <span class="text-red-500">*</span></label>
                <input type="text" name="trello_board" placeholder="Trello Board Name" 
                    class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Team Members -->
            <div class="mb-6">
                <label class="block text-black font-bold text-2xl mb-2">Team Members</label>
                <select name="team_members[]" id="team_members" multiple 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Choose API & Setting -->
            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 font-bold mb-2">Choose API</label>
                    <select name="api_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        {{-- <option value=""></option> --}}
                        @foreach($apis as $api)
                            <option value="{{ $api->id }}">{{ $api->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 font-bold mb-2">Choose Setting</label>
                    <select name="setting_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        {{-- <option value=""></option> --}}
                        @foreach($settings as $setting)
                            <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <a href="{{ route('team') }}" 
                       class="inline-flex items-center justify-center w-full h-[50px] bg-gray-500 text-white text-lg rounded-lg hover:bg-gray-600">
                        Cancel
                    </a>
                </div>
                <div class="w-1/2">
                   
                    <form action="{{ route('team.create') }}" method="POST">
                        @csrf
                        <button type="submit" 
                            class="inline-flex items-center justify-center w-full h-[50px] bg-blue-800 text-white text-lg rounded-lg hover:bg-blue-900">
                            Create
                        </button>
                    </form>
                    
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new TomSelect('#team_members', {
            plugins: ['remove_button'],
            placeholder: 'Type to search and select users...',
            maxItems: null,
            create: false
        });
    });
</script>
@endpush
