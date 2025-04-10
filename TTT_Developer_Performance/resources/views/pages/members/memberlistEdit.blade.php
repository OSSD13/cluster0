@extends('layouts.tester')

@section('title')
    <title>Member Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Member Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Member List / Edit</p>
    </div>
@endsection

@section('contents')
    <form action="{{ route('memberlist.update', $user->usr_id) }}" method="POST">

        @csrf
        <div class="flex flex-col items-center justify-start min-h-screen ml-10 pt-10">
            <div class="w-[500px] h-[600px] bg-white p-6 rounded-2xl shadow-lg">
                <!-- Header -->
                <h3 class="text-xl font-bold text-blue-900 text-left mb-4 ml-5">Edit Member</h3>

                <!-- Name Input -->
                <div class="w-[400px] ml-5">
                    <label class="block font-bold text-gray-700">Name</label>

                    <input type="text" name="usr_name" value="{{ $user->usr_name }}" placeholder="Your Name"
                        class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
                </div>

                <!-- Trello Name Input -->
                <div class="w-[400px] mt-4 ml-5">
                    <label class="block font-bold text-gray-700">Trello Full Name</label>

                    <input type="text" name="trello_fullname" value="{{ $user->usr_trello_fullname }}"
                        placeholder="Your Trello Name"
                        class="w-full p-3 border border-gray-400 rounded-lg placeholder-gray-400 text-base">
                </div>


                <!-- Dropdown -->
                <div class="w-[400px] mt-3 ml-5">
                    <select name="team_id"
                        class="w-[400px] h-[50px] border-2 p-2 rounded-lg pr-10 text-blue-900
                focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                hover:bg-blue-100 mt-4"
                        style="border-color: #00408e;
                background-image: url('data:image/svg+xml;utf8,<svg fill=\'%2300408e\' height=\'24\' viewBox=\'0 0 24 24\' width=\'24\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>');
                background-repeat: no-repeat;
                background-position: right 1rem center;
                background-size: 1.5rem;
                appearance: none;">
                        {{-- option disabled คือค่า default "Choose Team" --}}
                        <option disabled {{ is_null($lastTeamId) ? 'selected' : '' }}>
                            Choose Team
                        </option>

                        @foreach ($teams as $team)
                            <option value="{{ $team->tm_id }}" {{ $lastTeamId == $team->tm_id ? 'selected' : '' }}>
                                {{ $team->tm_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-start mt-6 gap-1 ml-5">

                    <button class="w-[199px] h-[50px] bg-gray-600 text-white rounded-lg font-bold hover:bg-gray-800"
                        onclick="window.location.href='{{ route('memberlist') }}'">
                        Cancel
                    </button>
                    <button class="w-[199px] h-[50px] bg-blue-900 text-white rounded-lg font-bold hover:bg-blue-700"
                        type="submit">
                        Apply
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- Alert Success Box -->
    <div id="alertSuccessBox" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
            <!-- ปุ่มปิด -->
            <button onclick="closeSuccessAlert()" class="absolute top-2 right-4 text-gray-400 text-2xl hover:text-gray-600">
                &times;
            </button>

            <!-- ไอคอน -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="Check icon" class="w-16 h-16">
            </div>

            <!-- ข้อความ -->
            <h2 class="text-2xl font-bold text-black mb-2">Successful</h2>
            <p class="text-gray-500 mb-6"> Trello credentials saved successfully! </p>

            <!-- ปุ่ม Done -->
            <button onclick="closeSuccessAlert()"
                class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                Done
            </button>
        </div>
    </div>
@endsection





@section('styles')
    <style>
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
