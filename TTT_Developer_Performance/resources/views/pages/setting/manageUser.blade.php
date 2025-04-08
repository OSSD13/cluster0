@extends('layouts.tester')

@section('title')
    <title>Manage Users</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Access control</p>
    </div>
@endsection

@section('contents')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold text-[#00408e]">Manage Users</h2>
    <div></div>
    <input type="text" name="searhingUser" placeholder="Search" class="px-3 py-2 border border-black rounded-lg shadow-sm w-64 placeholder:font-bold">
</div>
<!-- รอใส่ filter dropdown -->
<div class="relative sm:rounded-lg">
    <!-- Table -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 gray-300">
        <!-- Table header -->
    <thead class="border-t border-gray-400 text-l text-gray-400 border-b gray-300">
    <tr>
                <!-- Table header -->
                <th class="px-2 py-2 text-center">#</th>
                <th class="px-2 py-2 text-center">Name</th>
                <th class="px-2 py-2 text-center">Username</th>
                <th class="px-2 py-2 text-center">Email</th>
                <th class="px-2 py-2 text-center">Trello Full Name</th>
                <th class="px-2 py-2 text-center">Password</th>
                <th class="px-2 py-2 text-center">Team</th>
                <th class="px-2 py-2 text-center">Access</th>
                <th class="px-2 py-2 text-center">Action</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            @foreach($users as $user)
            <tr class="bg-white text-black">
                <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                <!-- ลำดับ # -->
                <th scope="row" class="text-center px-6 py-4 font-medium text-black whitespace-nowrap ">
                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                </th>
                 <!-- Name -->
                <td class="px-2 py-4 text-center">
                    {{ $user->usr_name }}
                </td>
                 <!-- Username -->
                <td class="px-2 py-4 text-center">
                    {{ $user->usr_username }}
                </td>
                <!-- Email -->
                <td class="px-2 py-4 text-center">
                    {{ $user->usr_email }}
                </td>
                 <!-- Trello full name -->
                <td class="px-2 py-4 text-center">
                    {{ $user->usr_trello_fullname }}
                </td>
                 <!-- Password -->
                <td class="px-2 py-4 text-center">
                    <button class="w-25 bg-[#00408e] hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded" style="border-radius: 7px;">Reset</button>
                </td>
                 <!-- Team -->
                 <td class="py-4 text-center">
                    <div class="relative">
                        <select class="w-32 border-2 p-2 rounded-lg appearance-none pr-12 text-blue-900 text-center
                                      focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                                      hover:bg-blue-100"
                            style="border-color: #00408e;
                                   background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2300408e%22><path d=%22M7 10l5 5 5-5z%22 /></svg>');
                                   background-repeat: no-repeat;
                                   background-position: right 1rem center;
                                   background-size: 1.2rem;">

                            @if($user->current_team_name)
                                <option class="text-center text-blue-900 bg-white" value="">
                                    {{ $user->current_team_name }}
                                </option>
                                @foreach($teams as $team)
                                    @if($team->tm_name !== $user->current_team_name)
                                        <option class="text-center text-blue-900 bg-white" value="{{ $team->tm_id }}">
                                            {{ $team->tm_name }}
                                        </option>
                                    @endif
                                @endforeach
                            @else
                                <option class="text-center text-blue-900 bg-white" value="">-</option>
                                @foreach($teams as $team)
                                    <option class="text-center text-blue-900 bg-white" value="{{ $team->tm_id }}">
                                        {{ $team->tm_name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </td>
                <td class="py-4 text-center">
                    <form method="POST" action="{{ route('setting.update.role') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->usr_id }}">
                        <select name="role"
                                class="w-32 border-2 p-2 rounded-lg text-blue-900 text-center"
                                onchange="this.form.submit()"
                                style="border-color: #00408e;">
                            <option value="" {{ $user->usr_role ? '' : 'selected' }}>
                                {{ $user->usr_role ?? '-' }}
                            </option>
                            @if($user->usr_role !== 'Tester')
                                <option value="Tester">Tester</option>
                            @endif
                            @if($user->usr_role !== 'Developer')
                                <option value="Developer">Developer</option>
                            @endif
                        </select>
                    </form>
                </td>

                <!-- Actions button-->
                <td class="px-2 py-4 flex items-center justify-center space-x-2">
                    <button onclick="openAlertDelete()" class="p-0 border-0 bg-transparent">
                        <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]">
                    </button>
                </td>
            </tr>
            @endforeach
            <div id="alertDeleteBox"
                class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
                    <button onclick="closeAlertDelete()"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="flex justify-center mb-4">
                        <img alt="Cross icon" class="rounded-full" height="64"
                        src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
                    </div>
                    <h2 class="text-2xl font-bold mb-2">Confirm Deletion</h2>
                    <p class="text-gray-500 mb-6">Are you sure you want to delete this item?</p>
                    <div class="flex justify-center space-x-4">
                        <button
                            class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                            Delete
                        </button>
                        <button onclick="closeAlertDelete()"
                            class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </tbody>
    </table>
    <div class="mt-4 flex justify-center">
        {{ $users->links() }}
    </div>
</div>



@endsection

@section('javascripts')
    <script>
        function openAlertDelete() {
            document.getElementById("alertDeleteBox").classList.remove("hidden");
        }

        function closeAlertDelete() {
            document.getElementById("alertDeleteBox").classList.add("hidden");
        }

        document.getElementById("alertDeleteBox").addEventListener('click', function(e) {
            if (e.target === this) {
            closeAlertDelete();
        }
        });
    </script>
    <script>
        //ใช้จัดการ dropdown ของ access
        document.addEventListener('DOMContentLoaded', () => {
        });
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

        #alertDeleteBox {
            z-index: 9999; /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
