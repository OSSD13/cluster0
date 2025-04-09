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

                <a href="{{ url('/listsprint-add') }}"
                    class="flex items-center bg-blue-900 text-white px-2 py-1 w-28 h-9 rounded text-[12px] font-bold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                    <img src="http://localhost:1300/resources/Images/Icons/image-gallery.png" alt="Add"
                        class="w-6 h-6 mr-2 transition-transform duration-300 hover:rotate-12">
                    Add New
                </a>
            </div>
            <div class="relative overflow-x-auto sm:rounded-lg">
                <!-- Table -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                    <!-- Table header -->
                    <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300">
                        <tr>
                            <!-- Table header -->
                            <th scope="col" class="px-6 py-3 text-center">#</th>
                            <th scope="col" class="px-6 py-3 text-center">Year</th>
                            <th scope="col" class="px-6 py-3 text-center">Sprint</th>
                            <th scope="col" class="px-6 py-4 pr-8 text-right w-[120px]">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sprints as $index => $sprint)
                            <tr class="text-center bg-white hover:bg-gray-50 bg-white border-b border-gray-200">
                                <td scope="col" class="px-6 py-3">
                                    {{ ($sprints->currentPage() - 1) * $sprints->perPage() + $index + 1 }}</td>
                                <td scope="col" class="px-6 py-3">{{ $sprint->spr_year }}</td>
                                <td scope="col" class="px-6 py-3">{{ $sprint->spr_number }}</td>
                                <td class="px-6 py-4 pr-6 flex items-center justify-end space-x-2">

                                    <form action="{{ route('sprint.delete', $sprint->spr_id) }}" method="POST">
                                        @csrf
                                        <div class="flex justify-between gap-2">
                                            <div class="items-center">
                                                <a href="{{ route('sprint.edit', $sprint->spr_id) }}">
                                                    <img src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                        alt="Edit" class="w-[35px] h-[35px]">
                                                </a>
                                            </div>
                                            <div class="items-center">
                                                @method('delete')
                                                <button type="submit"><img
                                                        src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                        alt="" alt="Delete" class="w-[35px] h-[35px]"></button>
                                            </div>
                                        </div>




                                    </form>
                                    {{-- <a href="{{ route('sprint.delete', $sprint->spr_id) }}"> <img
                                            src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                            class="w-[35px] h-[35px]" onclick=""></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-5">
                    {!! $sprints->links() !!}
                </div>
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

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        @section('styles')

        <style>@import url('https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        #navbar-title {
            font-family: "Jaro", sans-serif;
            line-height: 25px;
            letter-spacing: 0.5px;
        }

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
body {
font-family: "Inter", sans-serif;
}
</style>
@endsection
