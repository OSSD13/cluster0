@extends('layouts.tester')

@section('title')
    <title>Team Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Team Management</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400 ml-4">Team List</p>
    </div>
@endsection

@section('contents')
    <div class="flex items-center gap-4 mb-4">
        <p class="text-xl font-bold text-blue-900">Team List</p>
        <input type="text" placeholder="Search"
            class="px-4 py-2 rounded-[10px] text-black w-[300px] bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300 ml-10" />

            <a href="{{ url('/add') }}"
                    class="flex items-center bg-blue-900 text-white px-4 py-2 rounded font-bold">
                    <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add"
                        class="w-7 h-7 mr-2">
                    Add New
                </a>
    </div>


    <!-- รอใส่ filter dropdown -->
    <div class="relative overflow-x-auto sm:rounded-lg">
        <!-- Table -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
            <!-- Table header -->
            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300">
                <tr>
                    <!-- Table header -->
                    <th scope="col" class="px-6 py-3 text-center">#</th>
                    <th scope="col" class="px-6 py-3 text-center">Team Name</th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center justify-center">
                            Amount Members
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center justify-center">
                            Created Time
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 flex items-center space-x-2">Action</th>

                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($teams as $index => $team)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th class="px-6 py-4 text-center">{{ $index + 1 }}</th>
                        <td class="px-6 py-4 text-center">{{ $team->tm_name }}</td>
                        <td class="px-6 py-4 text-center">{{ $team->members_count }}</td>
                        <td class="px-6 py-4 text-center">
                            {{ $team->created_at}}
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-2">
                            <a href="#"><img src="{{ asset('resources/Images/Icons/editIcon.png') }}" class="w-[35px] h-[35px]" /></a>
                            <a href="#"><img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" class="w-[35px] h-[35px]" /></a>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
            
        </td>
        <td class="px-6 py-4 flex items-center space-x-2">
            
            <a href="{{url('/edit')}}"><img src="{{ asset('resources/Images/Icons/editIcon.png') }}" class="w-[35px] h-[35px]" /></a>
            <a href="#"><img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" class="w-[35px] h-[35px]" /></a>
        </td>
    </tr>


            
        </table>
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
