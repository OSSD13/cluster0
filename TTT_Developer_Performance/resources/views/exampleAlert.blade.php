@extends('layouts.tester')

@section('title')
    <title>Default Configuration</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Default Alert</p>
    </div>
@endsection

@section('contents')
<div class="flex justify-center pt-3 min-h-screen">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg h-[550px] shadow-lg">
        <h2 class="text-2xl font-bold text-[#00408e] mb-4">Example Alert</h2>
        <form>
            <!-- ปุ่มสร้างบัญชี -->
            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <img src="{{ asset('resources/Images/Icons/check (1).png') }}" alt="" class="w-[35px] h-[35px]" onclick="openSuccessAlert()" />
            </td>

            <!-- ปุ่ม INFO -->
            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <img src="{{ asset('resources/Images/Icons/information.png') }}" alt="" class="w-[35px] h-[35px]" onclick="openInfoAlert()" />
            </td>

            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition" onclick="openAlertSuccessToast()">Success test</button>
            </td>

            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition" onclick="openAlertInfoToast()">Info test</button>
            </td>

            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition" onclick="openAlertWarningToast()">Warning test</button>
            </td>

            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition" onclick="openAlertErrorToast()">Error test</button>
            </td>

            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition" onclick="openReloadAlert()">Reload</button>
            </td>

        </form>


        <!-- Alert Error Toast -->
        <div id="alertErrorToast" class="hidden fixed bottom-5 right-5 bg-white border-l-[5px] border-red-500 p-4 rounded-md shadow-md w-[500px] z-50 flex justify-between items-center transition-all duration-500 translate-x-full opacity-0">
            <!-- Icon + Text -->
            <div class="flex space-x-4">
                <!-- Green Circle Icon -->
                <div class="flex items-center">
                    <div class="w-8 h-8 mt-1 rounded-full flex items-center justify-center">
                        <img src="{{ asset('resources/Images/Icons/cross.png') }}" alt="Error icon" class="w-9 h-9">
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-black">Error</h3>
                    <p class="text-sm text-black font-semibold mt-1">Sorry, but you're not authorized to look at this page.</p>
                </div>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlertErrorToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                &times;
            </button>
        </div>


        <!-- Alert Warning Toast -->
        <div id="alertWarningToast" class="hidden fixed bottom-5 right-5 bg-white border-l-[5px] border-yellow-500 p-4 rounded-md shadow-md w-[500px] z-50 flex justify-between items-center transition-all duration-500 translate-x-full opacity-0">
            <!-- Icon + Text -->
            <div class="flex space-x-4">
                <!-- Green Circle Icon -->
                <div class="flex items-center">
                    <div class="w-8 h-8 mt-1 rounded-full flex items-center justify-center">
                        <img src="{{ asset('resources/Images/Icons/warning.png') }}" alt="Warning icon" class="w-9 h-9">
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-black">Warning</h3>
                    <p class="text-sm text-black font-semibold mt-1">Viewers of this file can see comments and suggestions.</p>
                </div>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlertWarningToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                &times;
            </button>
        </div>


        <!-- Alert Info Toast -->
        <div id="alertInfoToast" class="hidden fixed bottom-5 right-5 bg-white border-l-[5px] border-blue-500 p-4 rounded-md shadow-md w-[500px] z-50 flex justify-between items-center transition-all duration-500 translate-x-full opacity-0">
            <!-- Icon + Text -->
            <div class="flex space-x-4">
                <!-- Green Circle Icon -->
                <div class="flex items-center">
                    <div class="w-8 h-8 mt-1 rounded-full bg-blue-500 flex items-center justify-center">
                        <img src="{{ asset('resources/Images/Icons/information.png') }}" alt="Warning icon" class="w-9 h-9">
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-black">Info</h3>
                    <p class="text-sm text-black font-semibold mt-1">Anyone on the internet with this can view.</p>
                </div>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlertInfoToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                &times;
            </button>
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
                    <p class="text-sm text-black font-semibold mt-1">You can access all the files in this folder.</p>
                </div>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlertSuccessToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                &times;
            </button>
        </div>

        <!-- Alert Info Box -->
        <div id="alertInfoBox" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center">
                <!-- ปุ่มปิด -->
                <button onclick="closeInfoAlert()" class="absolute top-4 right-4 text-gray-400 text-2xl hover:text-gray-600">
                    &times;
                </button>

                <!-- ไอคอน -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('resources/Images/Icons/information.png') }}" alt="Info icon" class="w-16 h-16">
                </div>

                <!-- ข้อความ -->
                <h2 class="text-2xl font-bold text-black mb-2">Info</h2>
                <p class="text-gray-500 mb-6">Anyone on the internet with this can view.</p>

                <!-- ปุ่ม Done -->
                <button onclick="closeInfoAlert()" class="bg-[#2196F3] text-white font-semibold py-2 px-6 rounded-full hover:bg-blue-600">
                    OK
                </button>
            </div>
        </div>

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
                <p class="text-gray-500 mb-6">Your account is successfully created.</p>

                <!-- ปุ่ม Done -->
                <button onclick="closeSuccessAlert()" class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600">
                    Done
                </button>
            </div>
        </div>

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

    </div>
</div>
@endsection

@section('javascripts')
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
</script>
<script>
    function openInfoAlert() {
        document.getElementById("alertInfoBox").classList.remove("hidden");
    }

    function closeInfoAlert() {
        document.getElementById("alertInfoBox").classList.add("hidden");
    }

    // ปิด alert ถ้าคลิกนอกกล่อง
    document.getElementById("alertInfoBox").addEventListener('click', function(e) {
        if (e.target === this) {
            closeInfoAlert();
        }
    });
</script>


<script>
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

</script>

<script>
    //function ของ alertInfoToast

    function openAlertInfoToast() {
        const toast = document.getElementById("alertInfoToast");
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

    function closeAlertInfoToast() {
        const toast = document.getElementById("alertInfoToast");
        toast.classList.add("translate-x-full", "opacity-0");
        setTimeout(() => {
            toast.classList.add("hidden");
        }, 500);
    }

</script>

<script>
    //function ของ alertWarningToast

    function openAlertWarningToast() {
        const toast = document.getElementById("alertWarningToast");
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

    function closeAlertWarningToast() {
        const toast = document.getElementById("alertWarningToast");
        toast.classList.add("translate-x-full", "opacity-0");
        setTimeout(() => {
            toast.classList.add("hidden");
        }, 500);
    }

</script>

<script>
    //function ของ alertErrorToast

    function openAlertErrorToast() {
        const toast = document.getElementById("alertErrorToast");
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

    function closeAlertErrorToast() {
        const toast = document.getElementById("alertErrorToast");
        toast.classList.add("translate-x-full", "opacity-0");
        setTimeout(() => {
            toast.classList.add("hidden");
        }, 500);
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

        #alertSuccessBox {
            z-index: 9999; /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }

        #alertInfoBox {
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
