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
<div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#00408e]">Manage Users</h2>
        <div></div>
        <div class = "flex justify-end">
            <input
                type="text"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Search"
                class="px-3 py-2 border border-black rounded-lg shadow-sm w-64 placeholder:font-bold"
            >
        </div>
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
            <tbody id="userTableBody">
                @foreach($users as $user)
                <tr class="bg-white text-black">
                    <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                    <!-- ลำดับ # -->
                    <th scope="row" class="text-center px-6 py-4 font-medium text-black whitespace-nowrap ">
                        {{ $loop->iteration }}
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
                        <form method="POST" action="{{ route('setting.reset.password') }}" onsubmit="return submitWithReloadAlert(this)">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->usr_id }}">
                            <button type="submit"
                                class="w-25 bg-[#00408e] hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded"
                                style="border-radius: 7px;">
                                Reset
                            </button>
                        </form>
                    </td>
                    <!-- Team -->
                    <td class="py-4 text-center">
                        <form method="POST" action="{{ route('setting.update.team') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->usr_id }}">
                            <div class="relative">
                                <select name="team_id"
                                    onchange="this.form.submit()"
                                    class="w-32 border-2 p-2 rounded-lg pr-12 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">

                                    @if($user->current_team_id && $user->current_team_name)
                                        <option value="{{ $user->usr_tm_id }}">{{ $user->current_team_name }}</option>
                                        @foreach($teams as $team)
                                            @if($team->tm_id !== $user->current_team_id)
                                                <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">-</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </form>
                    </td>
                    <td class="py-4 text-center">
                        <form method="POST" action="{{ route('setting.update.role') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->usr_id }}">
                            <select name="role"
                                    class="w-32 border-2 p-2 rounded-lg text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900"
                                    data-current="{{ $user->usr_role }}"
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
                        <button onclick="openAlertDelete({{ $user->usr_id }})" class="p-0 border-0 bg-transparent">
                            <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="" class="w-[35px] h-[35px]">
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            let alertBox;
            document.addEventListener('DOMContentLoaded', () => {
                alertBox = document.getElementById("alertReloadBox");

                // จากนี้ไปที่ไหนก็ใช้ alertBox ได้เลย
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // หา select ทั้งหมดใน user table
                const selects = document.querySelectorAll('#userTableBody select');

                selects.forEach(select => {
                    select.addEventListener('change', function () {
                        const form = this.closest('form'); // หาฟอร์มที่ใกล้ที่สุด

                        if (form) {
                            // แสดง alert โหลด
                            const alertBox = document.getElementById('alertReloadBox');
                            alertBox.classList.remove('hidden');

                            // ส่งฟอร์ม (reload จะเกิดขึ้น)
                            form.submit();
                        }
                    });
                });
            });
        </script>
        <!-- Alert Reload Box -->
        <div id="alertReloadBox" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
                <!-- ไอคอน -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('../resources/Images/Icons/refreshBlue.png') }}" alt="Reload" class="w-16 h-16 spin">
                </div>

                <!-- ข้อความ -->
                <h2 class="text-2xl font-bold text-black mb-2">Reloading</h2>
                <p class="text-gray-500 mb-6">Wait a minute.</p>
            </div>
        </div>

        <!-- Alert Success Toast -->
        <div id="alertSuccessToast" class="hidden fixed bottom-5 right-5 bg-white border-l-[5px] border-green-600 p-4 rounded-md shadow-md w-[500px] z-50 flex justify-between items-center transition-all duration-500 translate-x-full opacity-0">
            <!-- Icon + Text -->
            <div class="flex space-x-4">
                <!-- Green Circle Icon -->
                <div class="flex items-center">
                    <div class="w-8 h-8 mt-1 rounded-full bg-green-500 flex items-center justify-center">
                        <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="Check icon" class="w-8 h-8">
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-black">Success</h3>
                    <p class="text-sm text-black font-semibold mt-1">Data update successful.</p>
                </div>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlertSuccessToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                &times;
            </button>
        </div>

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

                <form id="deleteUserForm" method="POST" action="{{ route('setting.delete.user') }}" onsubmit="return submitWithReloadAlert(this)">
                    @csrf
                    <input type="hidden" name="user_id" id="deleteUserId">
                    <div class="flex justify-center space-x-4">
                        <button type="submit" onclick="closeAlertDelete()"
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

    <script>
        function submitWithReloadAlert(formElement) {

            const alertBox = document.getElementById('alertReloadBox');
            alertBox.classList.remove('hidden');

            sessionStorage.setItem('showReloadAlert', 'true');

            setTimeout(() => {
                formElement.submit();
            }, 100);

            return false;
        }

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // เฉพาะฟอร์ม team และ role เท่านั้น
            const reloadForms = document.querySelectorAll('form[action*="update/team"], form[action*="update/role"]');

            reloadForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    sessionStorage.setItem('showReloadAlert', 'true');
                });
            });

            // เช็คหลัง reload
            if (sessionStorage.getItem('showReloadAlert') === 'true') {
                sessionStorage.removeItem('showReloadAlert');
                const alertBox = document.getElementById("alertReloadBox");
                alertBox.classList.remove("hidden");

                alertBox.classList.add("hidden");

            }
        });

    </script>

    <script>
        function openReloadAlert() {
            const alertBox = document.getElementById("alertReloadBox");
            alertBox.classList.remove("hidden");

            // ปิดเองหลังจาก 10 วินาที
            setTimeout(() => {
                alertBox.classList.add("hidden");
            }, 10000);
        }

        function closeReloadAlert() {
            document.getElementById("alertReloadBox").classList.add("hidden");
        }

    </script>

    <script>
        function openAlertDelete(userId) {
            document.getElementById("deleteUserId").value = userId;
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
            const roleDropdowns = document.querySelectorAll('select[name="role"]');
            roleDropdowns.forEach(select => {
                select.addEventListener('change', function () {
                    const current = this.getAttribute('data-current');
                    const selected = this.value;

                    if (current !== selected) {
                        this.form.submit();
                    }
                });
            });
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rows = Array.from(document.querySelectorAll('#userTableBody tr'));
            const searchInput = document.getElementById('searchInput');

            function filterRows() {
                const searchText = searchInput.value.toLowerCase();

                return rows.filter(row => {
                    const cells = Array.from(row.querySelectorAll('td'));

                    // ดึงค่าที่แสดงใน dropdowns (team & role)
                    const teamSelect = row.querySelector('select[name="team_id"]');
                    const roleSelect = row.querySelector('select[name="role"]');

                    const selectedTeam = teamSelect ? teamSelect.selectedOptions[0].textContent.toLowerCase() : '';
                    const selectedRole = roleSelect ? roleSelect.selectedOptions[0].textContent.toLowerCase() : '';

                    // เอาแค่ 5 cell แรก (Name, Username, Email, Trello name, etc.)
                    const textCells = cells.slice(0, 5).map(cell => cell.textContent.toLowerCase());

                    const allText = [...textCells, selectedTeam, selectedRole].join(' ');

                    return allText.includes(searchText);
                });
            }

            function renderTable() {
                const filtered = filterRows();

                rows.forEach(row => row.style.display = 'none');
                filtered.forEach(row => row.style.display = '');
            }

            // Event: search
            searchInput.addEventListener('input', () => {
                renderTable();
            });

            renderTable(); // Initial render
        });
    </script>

    <script>
        //alert reload
        function openReloadAlert() {
            const alertBox = document.getElementById("alertReloadBox");
            alertBox.classList.remove("hidden");

            // ปิดเองหลังจาก 10 วินาที
            setTimeout(() => {
                alertBox.classList.add("hidden");
            }, 10000);
        }

        function closeReloadAlert() {
            document.getElementById("alertReloadBox").classList.add("hidden");
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

        #alertDeleteBox {
            z-index: 9999; /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }

        .spin {
        animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(-360deg); }
        }

        #alertReloadBox {
            z-index: 9999; /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }


    </style>
@endsection
