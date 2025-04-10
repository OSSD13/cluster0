@extends('layouts.tester')
@section('title')
    <title>Member Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Member Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Member List / Add Member</p>

    </div>
@endsection

@section('contents')
    <form action="{{ route('memberlist.add') }}" method="POST" onsubmit="return validateForm();">
        @csrf
        <div class="flex justify-center items-center">
            <div class="w-[800px] min-h-[600px] bg-white p-6 rounded-2xl shadow-lg">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-blue-900">Create New Member</h3>
                    <button type="button" onclick="addMoreRow()"
                        class="w-[150px] h-[40px] px-4 flex items-center justify-center gap-2 bg-[var(--primary-color)] text-white font-bold rounded-sm">
                        <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" class="w-[20px] h-[20px]"
                            alt="icon">
                        Add More
                    </button>
                </div>
                <script>
                    let rowCount = 0;

                    function addMoreRow() {
                        const container = document.getElementById('member-list-container');

                        const newRow = document.createElement('div');
                        newRow.className = 'flex items-start gap-4 mb-3 member-row';

                        newRow.innerHTML = `
                        <!-- Name -->
                        <div class="w-1/3 flex flex-col">
                        <label class="block font-bold text-gray-700 name-label">${rowCount + 1}. Name <span class="text-red-500">*</span></label>
                        <input name="members[${rowCount}][name]" type="text" placeholder="Your Name"
                        class="w-full h-[55px] p-4 border border-gray-400 rounded-[7px]
                        placeholder-gray-300 placeholder:font-medium placeholder:text-base">
                        </div>

                        <!-- Username -->
                        <div class="w-1/3 flex flex-col">
                        <label class="block font-bold text-gray-700 username-label">${rowCount + 1}. Username <span class="text-red-500">*</span></label>
                        <input name="members[${rowCount}][username]" type="text" placeholder="Your Username"
                        class="w-full h-[55px] p-4 border border-gray-400 rounded-[7px]
                        placeholder-gray-300 placeholder:font-medium placeholder:text-base">
                        </div>

                        <!-- Trello Fullname + Delete Button -->
                        <div class="w-1/3 flex items-start gap-2">
                        <div class="flex flex-col w-full">
                        <label class="block font-bold text-gray-700 trello-label">${rowCount + 1}. Trello Full Name <span class="text-red-500">*</span></label>
                        <input name="members[${rowCount}][trello_fullname]" type="text" placeholder="Trello Name"
                        class="w-full h-[55px] p-4 border border-gray-400 rounded-[7px]
                        placeholder-gray-300 placeholder:font-medium placeholder:text-base">
                        </div>

                        <!-- Delete Button -->
                        <button type="button" class="mt-6 delete-btn" onclick="handleDelete(this)">
                        <img src="http://localhost:1300/resources/Images/Icons/deleteIcon.png" alt="Delete"
                        class="w-[55px] h-[55px] ml-2 rounded-xl">
                        </button>
                        </div>
                        `;

                        container.appendChild(newRow);
                        rowCount++;
                        renumberRows(); // เรียกหลังเพิ่มด้วย (เพื่อกันกรณีแก้ไข label เอง)
                    }
                    // สร้างแถวเริ่มต้นเมื่อโหลดหน้า
                    window.onload = () => {
                        addMoreRow();
                    };

                    function handleDelete(el) {
                        const row = el.closest('.member-row');
                        if (row) {
                            row.remove();
                            renumberRows(); // เรียงเลขใหม่หลังลบ
                        }
                    }

                    function renumberRows() {
                        const rows = document.querySelectorAll('.member-row');
                        rows.forEach((row, index) => {
                            const number = index + 1;
                            row.querySelector('.name-label').innerHTML = `${number}. Name <span class="text-red-500">*</span>`;
                            row.querySelector('.username-label').innerHTML =
                                `${number}. Username <span class="text-red-500">*</span>`;
                            row.querySelector('.trello-label').innerHTML = `${number}. Trello Full Name`;
                        });
                        rowCount = rows.length;
                    }

                    function validateForm() {
                        const rows = document.querySelectorAll('.member-row');
                        let isValid = true;

                        // เคลียร์ error เก่าทุกแถว
                        rows.forEach(removeErrorMessages);

                        rows.forEach((row, index) => {
                            const nameInput = row.querySelector('input[name$="[name]"]');
                            const usernameInput = row.querySelector('input[name$="[username]"]');
                            const trelloFullnameInput = row.querySelector('input[name$="[trello_fullname]"]');

                            const name = nameInput.value.trim();
                            const username = usernameInput.value.trim();
                            const trelloFullname = trelloFullnameInput.value.trim();

                            if (!name) {
                                isValid = false;
                                displayErrorMessage(nameInput, 'Please enter your name');
                            }

                            if (!username) {
                                isValid = false;
                                displayErrorMessage(usernameInput, 'Please enter your username');
                            }

                            if (!trelloFullname) {
                                isValid = false;
                                displayErrorMessage(trelloFullnameInput, 'Please enter Trello Fullname');
                            }
                        });

                        // เช็ค team_id dropdown
                        const teamSelect = document.querySelector('select[name="team_id"]');
                        const teamSelected = teamSelect.value.trim();

                        // ลบ error เดิมก่อน
                        const prevError = teamSelect.parentElement.querySelector('.error-message');
                        if (prevError) prevError.remove();

                        if (!teamSelected) {
                            isValid = false;
                            displayErrorMessage(teamSelect, 'Please select a team');
                        }

                        return isValid;
                    }


                    // ฟังก์ชันแสดงข้อความเตือน
                    function displayErrorMessage(inputElement, message) {
                        const errorSpan = document.createElement('span');
                        errorSpan.className = 'error-message text-red-500 text-sm';
                        errorSpan.innerText = message;

                        // ใส่ข้อความเตือนหลังจาก input
                        inputElement.parentElement.appendChild(errorSpan);
                    }

                    // ฟังก์ชันลบข้อความเตือนออกเมื่อกรอกข้อมูลถูกต้อง
                    function removeErrorMessages(row) {
                        const errorMessages = row.querySelectorAll('.error-message');
                        errorMessages.forEach(errorMessage => errorMessage.remove());
                    }
                </script>


                <div id="member-list-container"></div>

                <!-- Dropdown -->
                <div class="w-[400px] mt-6">
                    <select name="team_id"
                        class="w-full h-[50px] border-2 p-2 rounded-lg pr-10 text-blue-900 mt-4
                        focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e] hover:bg-blue-100"
                        style="border-color: #00408e;
                        background-image: url('data:image/svg+xml;utf8,<svg fill=\'%2300408e\' height=\'24\' viewBox=\'0 0 24 24\' width=\'24\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>');
                        background-repeat: no-repeat;
                        background-position: right 1rem center;
                        background-size: 1.5rem;
                        appearance: none;">
                        <option value="" disabled selected>Choose Team</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button"
                        class="w-[450px] h-[60px] p-2 bg-[#636363] text-white rounded-[10px] font-bold hover:bg-[#a6a6a6] hover:text-white hover:border-3 hover:border-[#636363]"
                        onclick="window.location.href='{{ route('memberlist') }}'">
                        Cancel
                    </button>
                    <button type="submit"
                        class="ml-[10px] w-[450px] h-[60px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">
                        Create
                    </button>
                </div>


            </div>
        </div>
    </form>
@endsection




@section('styles')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        /* #alertWarningBox {
                                                                                                                                                            z-index: 9999; */
        /* ให้สูงกว่าทุกอย่างในหน้า */
        /* background-color: rgba(0, 0, 0, 0.5);
                                                                                                                                                        } */

        #alertErrorBox {
            z-index: 9999;
            /* ให้สูงกว่าทุกอย่างในหน้า */
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>


    <script>
        // function openWarningAlert() {
        //     document.getElementById("alertWarningBox").classList.remove("hidden");
        // }

        // function closeWarningAlert() {
        //     document.getElementById("alertWarningBox").classList.add("hidden");
        // }

        // // ปิด alert ถ้าคลิกนอกกล่อง
        // document.getElementById("alertWarningBox").addEventListener('click', function(e) {
        //     if (e.target === this) {
        //         closeWarningAlert();
        //     }
        // });

        function openErrorAlert() {
            document.getElementById("alertErrorBox").classList.remove("hidden");
        }

        function closeErrorAlert() {
            document.getElementById("alertErrorBox").classList.add("hidden");
        }

        // ปิด alert ถ้าคลิกนอกกล่อง
        document.getElementById("alertErrorBox").addEventListener('click', function(e) {
            if (e.target === this) {
                closeErrorAlert();
            }
        });
    </script>
@endsection
