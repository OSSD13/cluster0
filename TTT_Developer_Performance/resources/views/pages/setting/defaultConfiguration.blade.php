@extends('layouts.tester')

@section('title')
    <title>Default Configuration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Setting</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Default Configuration</p>
    </div>
@endsection

@section('contents')
    <div>
        <div class="flex justify-center pt-3 min-h-screen">
            <div class="bg-white p-6 rounded-lg w-full max-w-lg h-[550px] shadow-lg">
                <h2 class="text-2xl font-bold text-[#00408e] mb-4">Default Configuration</h2>
                <form>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-bold text-black">Set Default Password</label>
                        <input type="text" id="password" value="{{ $configData['defaultPassword'] }}" class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex justify-end">
                        <button id = "saveButton" type="submit" class="bg-[#E6E6E6] text-white font-semibold py-4 px-12 rounded-md shadow-lg hover:bg-[#00408e] hover:text-white transition duration-300 ease-in-out">
                            Save changes
                        </button>
                    </div>
                </form>
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
                            <p class="text-sm text-black font-semibold mt-1">New default password has saved.</p>
                        </div>
                    </div>

                    <!-- Close Button -->
                    <button onclick="closeAlertSuccessToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                        &times;
                    </button>
                </div>

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
                            <p class="text-sm text-black font-semibold mt-1">Sorry, but it have something wrong.</p>
                        </div>
                    </div>

                    <!-- Close Button -->
                    <button onclick="closeAlertErrorToast()" class="text-gray-400 hover:text-gray-600 text-3xl font-bold leading-none ml-4">
                        &times;
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('javascripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const saveButton = document.getElementById('saveButton');
        let originalText = passwordInput.value.trim(); // ตัด space เผื่อผู้ใช้ใส่ space ล้วน

        function updateButtonState() {
            const currentValue = passwordInput.value.trim();
            const isChanged = currentValue !== originalText;
            const isEmpty = currentValue === '';

            if (isChanged && !isEmpty) {
                saveButton.classList.add('changed');
                saveButton.classList.remove('disabled-button');
            } else {
                saveButton.classList.remove('changed');
                saveButton.classList.add('disabled-button');
            }
        }

        // ฟังเมื่อมีการพิมพ์
        passwordInput.addEventListener('input', updateButtonState);

        // ปุ่ม save
        saveButton.addEventListener('click', function (e) {
            e.preventDefault();

            const newValue = passwordInput.value.trim();

            if (!saveButton.classList.contains('changed') || newValue === '') {
                return; // ไม่มีการเปลี่ยนแปลง หรือ ค่าว่าง ไม่ต้องทำอะไร
            }

            fetch('/setting-save-config', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    defaultPassword: newValue
                })
            })
            .then(res => res.json())
            .then(data => {
                openAlertSuccessToast();
                originalText = newValue;
                updateButtonState(); // รีเซ็ตสถานะ
            })
            .catch(err => {
                openAlertErrorToast();
                console.error(err);
            });
        });

        // เรียกตอนแรกเพื่อให้ปุ่มเป็นสถานะถูกต้อง
        updateButtonState();
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

        /* ปุ่มเปลี่ยนสีเมื่อมีการแก้ไข */
        #saveButton.changed {
            background-color: #00408E !important;
            color: white !important;
        }

        #saveButton.changed:hover {
        background-color: #70abf3 !important; /* สีเขียวเข้มขึ้นเมื่อ hover */
        }

        #saveButton.disabled-button {
            background-color: #E6E6E6 !important;
            color: #ffffff !important;
            cursor: not-allowed;
        }

        #saveButton.disabled-button:hover {
            background-color: #E6E6E6 !important;
            color: #ffffff !important;
        }
    </style>
@endsection
