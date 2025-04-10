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
    <div class="w-full bg-white p-6 rounded-2xl shadow-lg">
        <div class="flex items-center gap-4 w-full mb-4">

            <p class="text-xl font-bold text-blue-900">Member List</p>

            <div class="flex items-center justify-between mb-4 ml-auto">
                <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}"
                    class="absolute ml-2 mt-0 w-[30px] h-[30px]">
                <button class="w-[150px] h-[40px] p-2 bg-[var(--primary-color)] text-white font-bold rounded-sm"
                    class="w-[150px] h-[40px] p-2 bg-[var(--primary-color)] text-white font-bold rounded-sm"
                    onclick="window.location.href='{{ route('memberlist.insert') }}'">
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
                        <th scope="col" class="px-6 py-3 text-center">Created Time</th>
                        <th scope="col" class="px-6 py-4 pr-8 text-right w-[120px]">Action</th>
                    </tr>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $index => $history)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-500 text-center">
                                {{ $index + 1 }}
                            </th>
                            <td class="px-6 py-4 text-center">{{ $history->user->usr_name }}</td>
                            <td class="px-6 py-4 text-center">{{ $history->team->tm_name }}</td>
                            <td class="px-6 py-4 text-center">{{ $history->user->usr_trello_fullname }}</td>
                            <td class="px-6 py-4 text-center">
                                {{ \Carbon\Carbon::parse($history->uth_start_date)->format('m/d') }}/{{ \Carbon\Carbon::parse($history->uth_start_date)->addYears(543)->format('y') }}
                            </td>
                            <td class="px-6 py-4 pr-6 flex items-center justify-end space-x-2">
                                <a
                                    href="{{ route('memberlist.edit', $history->user->usr_id, $history->user->usr_trello_fullname) }}">
                                    <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                        class="w-[35px] h-[35px]">
                                </a>
                                <a href="{{ route('memberlist.delete', $history->uth_id) }}"> <img
                                        src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                        class="w-[35px] h-[35px]"></a>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
            <!-- Alert Success Toast -->
            <div id="alertSuccessToast"
                class="hidden fixed bottom-5 right-5 bg-white border-l-[5px] border-green-600 p-4 rounded-md shadow-md w-[500px] z-50 flex justify-between items-center transition-all duration-500 translate-x-full opacity-0">
                <!-- Icon + Text -->
                <div class="flex space-x-4">
                    <!-- Green Circle Icon -->
                    <div class="flex items-center">
                        <div class="w-8 h-8 mt-1 rounded-full bg-green-500 flex items-center justify-center">
                            <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="Check icon"
                                class="w-8 h-8">
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-black">Success</h3>
                        <p class="text-sm text-black font-semibold mt-1">The information has been updated.</p>
                    </div>
                </div>

                <!-- Close Button -->
                <button onclick="closeAlertSuccessToast()"
                    class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                    &times;
                </button>
            </div>
        </div>

        <!-- Alert Success Toast -->
        <div id="alertSuccessToast"
        class="hidden fixed bottom-5 right-5 bg-white border-l-[5px] border-green-600 p-4 rounded-md shadow-md w-[500px] z-50 flex justify-between items-center transition-all duration-500 translate-x-full opacity-0">
        <!-- Icon + Text -->
        <div class="flex space-x-4">
            <!-- Green Circle Icon -->
            <div class="flex items-center">
                <div class="w-8 h-8 mt-1 rounded-full bg-green-500 flex items-center justify-center">
                    <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="Check icon"
                        class="w-8 h-8">
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold text-black">Success</h3>
                <p class="text-sm text-black font-semibold mt-1">The member has been edited</p>
            </div>
        </div>

        <!-- Close Button -->
        <button onclick="closeAlertSuccessToast()"
            class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
            &times;
        </button>
    </div>
</div>


    </div>
@endsection




@section('javascripts')
    <script>
        @if (session('success'))
            window.addEventListener('DOMContentLoaded', function() {
                openAlertSuccessToast();
            });

            //function ของ alertSuccessToast

            function openAlertSuccessToast() {
                const toast = document.getElementById("alertSuccessToast");
                toast.classList.remove("hidden");
                setTimeout(() => {
                    toast.classList.remove("translate-x-full", "opacity-0");
                }, 10); // เล็กน้อยเพื่อให้ transition ทำงาน

                // ซ่อนอัตโนมัติหลัง 3 วิ
                setTimeout(() => {
                    toast.classList.add("translate-x-full", "opacity-0");
                    // ซ่อน div จริง ๆ หลัง animation เสร็จ
                    setTimeout(() => {
                        toast.classList.add("hidden");
                    }, 500);
                }, 3000);
            }

            function closeAlertSuccessToast() {
                const toast = document.getElementById("alertSuccessToast");
                toast.classList.add("translate-x-full", "opacity-0");
                setTimeout(() => {
                    toast.classList.add("hidden");
                }, 500);
            }
        @endif
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

        #alertSuccessBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
