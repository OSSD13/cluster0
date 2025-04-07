@extends('layouts.tester')

@section('title')
<title>Team Management</title>
@endsection

@section('pagename')
<div class="flex items-end gap-[10px] mb-4">
    {{-- Main Menu --}}
    <h2 class="text-2xl font-bold">Team Management</h2>
    {{-- Sub Menu --}}
    <p class="font-bold text-neutral-400">Team List</p>
</div>
@endsection

@section('contents')
<div class="flex justify-center w-full">
    <!-- Add these classes -->
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <!-- บรรทัดเดียวกัน: Title + Filter -->
        <div class="flex items-center gap-4 mb-4">
            <p class="text-xl font-bold text-blue-900">Team List</p>
            <input type="text" placeholder="Search"
                class="px-4 py-2 rounded-[10px] text-black w-[300px] bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300 ml-10" />

            <a href="{{ url('/team-add') }}"
                class="flex items-center bg-blue-900 text-white px-3 py-2 rounded-lg font-bold">
                <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add" class="w-6 h-6 mr-2">
                Add New
            </a>
        </div>
        <!-- end -->
        <div class="relative overflow-x-auto sm:rounded-lg">
            <!-- Table -->
            <table class="w-full text-[12px] text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <!-- Table header -->
                <thead
                    class="border-t border-gray-400 text-l text-gray-400 uppercase border-b dark:border-gray-300 text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Team Name</th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-center">
                                Amount Members
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-center">
                                Created Times
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-center text-black">
                        <!-- เขียนไว้แสดงตัวอย่างข้อมูลก่อนทำลูป -->
                        <!-- ลำดับ # -->
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">

                        </th>
                        <!-- Team Name-->
                        <td class="px-6 py-4">

                        </td>
                        <!-- Amount Member-->
                        <td class="px-6 py-4">

                        </td>
                        <!-- Create Times -->
                        <td class="px-6 py-4">

                        </td>
                        <!-- Action -->
                
                        <!-- Actions button-->
                        <td class="px-6 py-4 flex items-center justify-center space-x-2  h-full ">
                            <a href="{{ url('/team-edit')}}"> <img
                                    src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                                    class="w-[35px] h-[35px]" onclick=""> </a>
                            <form class="flex justify-center items-center" <button type="button" onclick="showAlert()">
                                <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete"
                                    class="w-[35px] h-[35px]  items-center">
                                </button>
                            </form>
                        </td>

                    </tr>
                    <div id="alertBox"
                        class="hidden fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
                            <button onclick="closeAlert()"
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
                                <!-- Add a data attribute to store the form ID -->
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


                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
<script>
// Your JavaScript code (if any)
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

#alertBox {
    z-index: 9999;
    /* ให้สูงกว่าทุกอย่างในหน้า */
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
@endsection