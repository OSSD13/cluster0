@extends('layouts.tester')

@section('title')
<title>Team Management</title>
@endsection

@section('pagename')
<div class="flex items-end gap-[10px] mb-4">
    <h2 class="text-2xl font-bold">Team Management</h2>
    <p class="font-bold text-neutral-400">Team List</p>
</div>
@endsection

@section('contents')
<div class="w-full px-6">
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg w-full">
        <div class="flex items-center justify-between gap-4 mb-4 w-full">
            <p class="text-xl font-bold text-blue-900">Team List</p>
            <div class="flex-1 flex justify-center">
                <input type="text" placeholder="Search"
                    class="px-4 py-2 rounded-[10px] text-black w-[300px] bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300" />
            </div>
            <a href="{{ route('team.add') }}"
               class="flex items-center bg-blue-900 text-white px-2 py-1 w-28 h-9 rounded text-[12px] font-bold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                <img src="http://localhost:1300/resources/Images/Icons/image-gallery.png" alt="Add"
                    class="w-6 h-6 mr-2 transition-transform duration-300 hover:rotate-12">
                Add New
            </a>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <thead class="border-t border-gray-400 text-gray-400 uppercase border-b">
                    <tr>
                        <th class="px-6 py-6">#</th>
                        <th class="px-6 py-6">Team Name</th>
                        <th class="px-6 py-6 text-center">Amount Members</th>
                        <th class="px-6 py-6 text-center">Created Times</th>
                        <th class="px-6 py-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teams as $index => $team)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-center text-black">
                        <th class="px-6 py-6 font-medium whitespace-nowrap">{{ $index + 1 }}</th>
                        <td class="px-6 py-6">{{ $team->name }}</td>
                        <td class="px-6 py-6">{{ $team->current }}</td>
                        <td class="px-6 py-6">{{ \Carbon\Carbon::parse($team->created)->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-6">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ url('/team-edit' . $team->id) }}">
                                    <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit" class="w-[35px] h-[35px]" />
                                </a>
                                <button type="button" onclick="openAlertDelete({{ $team->id }})"
                                    class="text-red-600 hover:text-red-800 transform translate-y-[-2px] ml-2">
                                    <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                        class="w-[35px] h-[35px]">
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No teams found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal ลบ -->
<div id="alertDeleteBox" class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
        <button onclick="closeAlertDelete()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <i class="fas fa-times"></i>
        </button>
        <div class="flex justify-center mb-4">
            <img alt="Cross icon" class="rounded-full" height="64"
                src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
        </div>
        <h2 class="text-2xl font-bold mb-2">Confirm Deletion</h2>
        <p class="text-gray-500 mb-6">Are you sure want to delete this item?</p>
        <form id="deleteBacklogForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-center space-x-4">
                <button type="submit"
                    class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                    Delete
                </button>
                <button type="button" onclick="closeAlertDelete()"
                    class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('javascripts')
<script>
    function openAlertDelete(id) {
        const form = document.getElementById('deleteBacklogForm');
        form.action = `/team-delete${id}`;  // เพิ่ม id ใน URL
        form.querySelector('input[name="_method"]').value = 'DELETE'; // ใช้ _method เพื่อบอกว่าเป็น DELETE
        document.getElementById('alertDeleteBox').classList.remove('hidden');
    }

    function closeAlertDelete() {
        document.getElementById('alertDeleteBox').classList.add('hidden');
    }
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
