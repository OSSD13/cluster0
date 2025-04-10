@extends('layouts.tester')

@section('title')
    <title>Trello Configuration</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Trello Configuration</p>
    </div>
@endsection

@section('contents')
    <div class="container mx-auto p-4">
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Trello API Section -->
            <div class="bg-white rounded-lg shadow-lg p-4 w-full lg:w-1/2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-blue-900">Trello API</h2>
                    <!-- Add New API -->
                    <button type="button" onclick="window.location.href='{{ route('trello.api') }}'"
                        class="bg-[#00408E] text-white px-3 py-1 rounded-lg flex items-center hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                        <img src="{{ asset('resources\Images\Icons\image-gallery.png') }}" alt=""
                            class="w-[20px] h-[20px] mr-2 transition-transform duration-300 hover:rotate-12">
                        Add New
                    </button>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <!-- Table API -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                        <thead class="border-t border-gray-400 text-l text-gray-400 border-b dark:border-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">#</th>
                                <th scope="col" class="px-6 py-3 text-center">Name</th>
                                <th scope="col" class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($apis) && $apis->count() > 0)
                                @foreach ($apis as $index => $api)
                                    <tr class="bg-white text-black">
                                        <th scope="row" class="px-6 py-4 font-medium text-center whitespace-nowrap">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-center">{{ $api->trc_name }}</td>
                                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                                            <a href="{{ route('trello.editApi.edit', $api->trc_id) }}">
                                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit Icon" class="w-[35px] h-[35px]">
                                            </a>
                                            <a href="#" onclick="confirmDeleteAPI({{ $api->trc_id }})">
                                                <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                    alt="Delete Icon" class="w-[35px] h-[35px]">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">No API found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Trello Lists Section -->
            <div class="bg-white rounded-lg shadow-lg p-4 w-full lg:w-1/2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-blue-900">Trello Lists</h2>
                    <!-- Add New List -->
                    <button type="button" onclick="window.location.href='{{ route('trello.list') }}'"
                        class="bg-[#00408E] text-white px-3 py-1 rounded-lg flex items-center hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                        <img src="{{ asset('resources\Images\Icons\image-gallery.png') }}" alt=""
                            class="w-[20px] h-[20px] mr-2 transition-transform duration-300 hover:rotate-12">
                        Add New
                    </button>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <!-- Table Lists -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                        <thead class="border-t border-gray-400 text-l text-gray-400 border-b dark:border-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">#</th>
                                <th scope="col" class="px-6 py-3 text-center">Name</th>
                                <th scope="col" class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($lists) && $lists->count() > 0)
                                @foreach ($lists as $index => $list)
                                    <tr class="bg-white text-black">
                                        <th scope="row" class="px-6 py-4 font-medium text-center whitespace-nowrap">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-center">{{ $list->stl_name }}</td>
                                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                                            <a href="{{ route('trello.editList.edit', $list->stl_id) }}">
                                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit Icon" class="w-[35px] h-[35px]">
                                            </a>
                                            <a href="#" onclick="confirmDeleteList({{ $list->stl_id }})">
                                                <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                                                    alt="Delete Icon" class="w-[35px] h-[35px]">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">No Lists found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Delete Trello API -->
    <div id="alertDeleteBox_API" class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
            <button onclick="closeAlertDeleteAPI()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex justify-center mb-4">
                <img alt="Cross icon" class="rounded-full" height="64"
                    src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
            </div>
            <h2 class="text-2xl font-bold mb-2">Confirm Deletion</h2>
            <p class="text-gray-500 mb-6">Are you sure you want to delete this item?</p>
            <div class="flex justify-center space-x-4">
                <button onclick="deleteAPI()"
                    class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                    Delete
                </button>
                <button onclick="closeAlertDeleteAPI()"
                    class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Delete Trello List -->
    <div id="alertDeleteBox_List" class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
            <button onclick="closeAlertDeleteList()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex justify-center mb-4">
                <img alt="Cross icon" class="rounded-full" height="64"
                    src="{{ asset('resources/Images/Icons/cross.png') }}" width="64" />
            </div>
            <h2 class="text-2xl font-bold mb-2">Confirm Deletion</h2>
            <p class="text-gray-500 mb-6">Are you sure you want to delete this item?</p>
            <div class="flex justify-center space-x-4">
                <button onclick="deleteList()"
                    class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                    Delete
                </button>
                <button onclick="closeAlertDeleteList()"
                    class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Success Box -->
    <div id="alertSuccessBox" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
            <!-- ปุ่มปิด -->
            <button onclick="closeSuccessAlert()"
                class="absolute top-2 right-4 text-gray-400 text-2xl hover:text-gray-600">
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

    <!-- Alert Box -->
    <div id="alertWarningBox"
        class="hidden fixed inset-0 flex items-center justify-center transition-opacity duration-300 rounded-lg">
        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center rounded-xl">
            <!-- ปุ่มปิด -->
            <button onclick="closeWarningAlert()"
                class="absolute top-2 right-4 text-gray-400 hover:text-gray-600 text-3xl">
                &times;
            </button>

            <!-- ไอคอน -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('resources/Images/Icons/warning.png') }}" alt="Check icon" class="w-16 h-16">
            </div>

            <!-- ข้อความ -->
            <h2 class="text-2xl font-bold text-black-600 mb-2">Something went wrong</h2>
            <p class="text-lg text-gray-500 mb-6">Unable to delete Trello List because it is currently in use by a Team.</p>

            <!-- ปุ่ม Done -->
            <button onclick="closeWarningAlert()"
                class="bg-yellow-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-yellow-600">
                OK
            </button>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        let deleteApiId = null;

        function confirmDeleteAPI(id) {
            deleteApiId = id;
            document.getElementById("alertDeleteBox_API").classList.remove("hidden");
        }

        function deleteAPI() {
            if (!deleteApiId) return;
            window.location.href = `/setting-trello-configAPI-delete/${deleteApiId}`;
        }

        function closeAlertDeleteAPI() {
            document.getElementById("alertDeleteBox_API").classList.add("hidden");
        }

        document.getElementById("alertDeleteBox_API").addEventListener('click', function(e) {
            if (e.target === this) {
                closeAlertDeleteAPI();
            }
        });
    </script>

    <script>
        let deleteListId = null;

        function confirmDeleteList(id) {
            deleteListId = id;
            document.getElementById("alertDeleteBox_List").classList.remove("hidden");
        }

        function deleteList() {
            if (!deleteListId) return;
            window.location.href = `/setting-trello-configList-delete/${deleteListId}`;
        }

        function closeAlertDeleteList() {
            document.getElementById("alertDeleteBox_List").classList.add("hidden");
        }

        document.getElementById("alertDeleteBox_List").addEventListener('click', function(e) {
            if (e.target === this) {
                closeAlertDeleteList();
            }
        });
    </script>

    <script>
        @if (session('success'))
            window.addEventListener('DOMContentLoaded', function() {
                openSuccessAlert();
            });

            function openSuccessAlert() {
                document.getElementById("alertSuccessBox").classList.remove("hidden");
            }

            function closeSuccessAlert() {
                document.getElementById("alertSuccessBox").classList.add("hidden");
            }

            // ปิด alert ถ้าคลิกนอกกล่อง
            document.getElementById("alertSuccessBox").addEventListener('click', function(e) {
                if (e.target === this) {
                    closeSuccessAlert();
                }
            });
        @endif
    </script>

    <script>
        @if (session('warning'))
        window.addEventListener('DOMContentLoaded', function() {
                openSuccessAlert();
            });

            function openSuccessAlert() {
                document.getElementById("alertWarningBox").classList.remove("hidden");
            }

            function closeWarningAlert() {
                document.getElementById("alertWarningBox").classList.add("hidden");
            }

            // ปิด alert ถ้าคลิกนอกกล่อง
            document.getElementById("alertWarningBox").addEventListener('click', function(e) {
                if (e.target === this) {
                    closeWarningAlert();
                }
            });
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

        #alertDeleteBox_API {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }

        #alertDeleteBox_List {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }

        #alertSuccessBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
