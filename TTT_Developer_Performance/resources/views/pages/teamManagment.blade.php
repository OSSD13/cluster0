@extends('layouts.tester')

@section('title')
    <title>Team Management</title>
@endsection

<!-- title -->
@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Team List</p>
    </div>
@endsection

@section('contents')
<!-- Header -->
<div class="bg-white shadow-md rounded-xl p-6 max-w-[900px] mx-auto">
    <div class="flex flex-col md:flex-row items-center justify-between mb-4 gap-4 md:gap-0">
        <p class="text-2xl font-bold text-blue-900">Team List</p>

        <!-- Search -->
        <div class="flex-1 flex justify-center order-3 md:order-none">
            <div class="relative w-[250px]">
                <input type="text" placeholder="Search"
                    class="px-4 py-2 pl-10 rounded-xl text-black w-full bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300" />
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 2a8 8 0 1 1-4.9 14.3l-4.2 4.2a1 1 0 0 1-1.4-1.4l4.2-4.2A8 8 0 0 1 10 2Zm0 2a6 6 0 1 0 3.9 10.6 6 6 0 0 0-3.9-10.6Z" />
                </svg>
            </div>
        </div>

        <!-- ปุ่ม Add New -->
        <div class="order-2 md:order-none">
            <button class="flex items-center bg-blue-900 text-white px-4 py-2 rounded-xl font-bold shadow transition duration-200 ease-in-out">
                <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add" class="w-7 h-7 mr-2">
                Add New
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">#</th>
                    <th scope="col" class="px-6 py-3 text-center">Team Name</th>
                    <th scope="col" class="px-6 py-3 text-center">
                         <!-- Amount Member -->
                        <div class="flex items-center justify-center">
                            Amount Members
                            <svg class="w-3 h-3 ml-1.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </div>
                    </th>

                    <!-- Created Time -->
                    <th scope="col" class="px-6 py-3 text-center">
                    <div class="flex items-center justify-center">
                            Created Time
                            <svg class="w-3 h-3 ml-1.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                            </svg>
                        </div>
                    </th>

                    <!-- Action -->
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <!-- ข้อมูลในตาราง -->
            <tbody>
                @foreach ([['Team0', 5, '25/01/67 09:00'], ['Team1', 4, '11/01/67 12:00'], ['Team2', 4, '5/12/67 11:00'], ['Team3', 5, '11/01/67 12:00']] as $index => $team)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap text-center">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4 text-center">{{ $team[0] }}</td>
                        <td class="px-6 py-4 text-center">{{ $team[1] }}</td>
                        <td class="px-6 py-4 text-center">{{ $team[2] }}</td>
                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                            <a href="#">
                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit" class="w-[30px] h-[30px]" />
                            </a>
                            <a href="#">
                                <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete" class="w-[30px] h-[30px]" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
