@extends('layouts.tester')

@section('title')
    <title>Member Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Member Management</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400 ml-4">Member List</p>
    </div>
@endsection

@section('contents')
    <div class="flex items-center gap-4 w-full mb-4">
        <p class="text-xl font-bold text-blue-900">Member List</p>
        <div class="flex justify-between mb-4 ml-auto">
            {{-- <img src="{{ asset('resources/Images/Icons/magnifier.png') }}" class="bg-grey absolute ml-2 mt-0 w-[30px] h-[30px]"> --}}
            <input type="text" placeholder="Search"
                class="px-4 py-2 rounded-[10px] text-black w-[300px] bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300" />
        </div>
        <div class="flex items-center justify-between mb-4 ml-auto">
            <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" class="absolute ml-2 mt-0 w-[30px] h-[30px]">
            <button class="w-[150px] h-[40px] p-2 bg-[var(--primary-color)] text-white font-bold rounded-sm"
                class="w-[150px] h-[40px] p-2 bg-[var(--primary-color)] text-white font-bold rounded-sm"
                onclick="window.location.href='{{ route('memberlist.add') }}'">
                Add new
            </button>
        </div>
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
                    <th scope="col" class="px-6 py-3 text-center">Member Name</th>
                    <th scope="col" class="px-6 py-3 text-center">Team</th>
                    <th scope="col" class="px-6 py-3 text-center">Trello Full Name</th>
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
                    <th scope="col" class="px-6 py-4 pr-8 text-right w-[120px]">Action</th>



                </tr>

                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $index => $history)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-500 text-center">{{ $index + 1 }}</th>
                        <td class="px-6 py-4 text-center">{{ $history->user->usr_name }}</td>
                        <td class="px-6 py-4 text-center">{{ $history->team->tm_name }}</td>
                        <td class="px-6 py-4 text-center">{{ $history->user->usr_trello_fullname }}</td>
                        <td class="px-6 py-4 text-center">
                            {{ \Carbon\Carbon::parse($history->uth_start_date)->format('m/d') }}/{{ \Carbon\Carbon::parse($history->uth_start_date)->addYears(543)->format('y') }}
                        </td>
                        <td class="px-6 py-4 pr-6 flex items-center justify-end space-x-2">
                            <a href="{{ route('memberlist.edit', $history->user->usr_id, $history->user->usr_trello_fullname) }}">
                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                    class="w-[35px] h-[35px]">
                            </a>
                            <a href="{{ route('memberlist.delete', $history->user->usr_id) }}"> <img
                                    src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt=""
                                    class="w-[35px] h-[35px]" onclick=""></a>
                        </td>

                    </tr>
                @endforeach
                <tr class="bg-white border-b hover:bg-gray-50">
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-500 text-center">1</th>
                    <td class="px-6 py-4 text-center">67-52</td>
                    <td class="px-6 py-4 text-center">Team 2</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
</table>
</div>


@section('javascripts')
    <script></script>
@endsection
@section('javascripts')
    <script></script>
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
