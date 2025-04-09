@extends('layouts.tester')

@section('title')
    <title>Sprint Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Sprint Management</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400 ml-4">Sprint List</p>
    </div>
@endsection

@section('contents')
    <!-- ตารางเต็มจอ -->
    <div class="w-full px-6">
        <div class="bg-white rounded-lg shadow-md p-6 shadow-lg w-full">
            <!-- Title + Filter -->
            <div class="flex items-center justify-between gap-4 mb-4 w-full">
                <p class="text-xl font-bold text-blue-900">Sprint List</p>

                <div class="flex-1 flex justify-center">
                    <input type="text" placeholder="Search"
                        class="px-4 py-2 rounded-[10px] text-black w-[300px] bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300" />
                </div>

                <a href="{{ route('sprint.add') }}"
                    class="flex items-center bg-blue-900 text-white px-2 py-1 w-28 h-9 rounded text-[12px] font-bold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                    <img src="http://localhost:1300/resources/Images/Icons/image-gallery.png" alt="Add"
                        class="w-6 h-6 mr-2 transition-transform duration-300 hover:rotate-12">
                    Add New
                </a>
            </div>

            <!-- Table -->
            </div>
        </div>
    </div>

    <!-- Modal Alert -->
    <div id="alertBox" class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50 z-[9999]">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
            <button onclick="closeAlert()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex justify-center mb-4">
                <img alt="Cross icon" class="rounded-full" height="64"
                    src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
            </div>
            <h2 class="text-2xl font-bold mb-2">Confirm Deletion</h2>
            <p class="text-gray-500 mb-6">Are you sure you want to delete this item?</p>
            <div class="flex justify-center space-x-4">
                <button id="confirmDelete"
                    class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                    Delete
                </button>
                <button onclick="closeAlert()"
                    class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                    Cancel
                </button>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script></script>
@endsection
