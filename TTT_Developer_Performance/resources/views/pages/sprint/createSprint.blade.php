@extends('layouts.tester')


@section('title')
    <title>Sprint Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Sprint Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Sprint List / Add Sprint</p>

    </div>
@endsection

@section('contents')
    <div class="flex justify-center items-center ">
        <div class="w-[900px] bg-transparent p-6 rounded-lg ">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-900">Create New Member</h3>
            </div>

            <div>
                <form action="{{ route('sprint.store')}}" method="POST">
                    @csrf
                    <div id="sprint-list-container">
                        <div class="flex items-center gap-4 mb-3 member-row">
                            <div class="w-1/2">
                                <label class="block font-bold text-gray-700">Year <span
                                        class="text-red-500">*</span></label>
                                <input type="number" placeholder="Year"
                                    class="w-full h-full max-h-[60px] p-4 border border-gray-400 rounded-[7px]
       placeholder-gray-300 placeholder:font-medium placeholder:text-base" name="year">
                            </div>
                            <div class="w-1/2">
                                <label class="block font-bold text-gray-700">Sprint <span
                                        class="text-red-500">*</span></label>
                                <input type="number" placeholder="Sprint"
                                    class="w-full h-full max-h-[60px] p-4 border border-gray-400 rounded-[7px]
       placeholder-gray-300 placeholder:font-medium placeholder:text-base" name="sprint">
                            </div>
                        </div>
                    </div>

                <script>
                    function validateAndSubmit() {
                        const inputs = document.querySelectorAll('#sprint-list-container input');
                        let hasEmpty = false;

                        inputs.forEach(input => {
                            if (input.value.trim() === '') {
                                hasEmpty = true;
                            }
                        });

                        if (hasEmpty) {
                            openErrorAlert();
                        } else {
                            // ส่งข้อมูลจริง หรือไปหน้าอื่น
                            console.log("Submit ได้");
                        }
                    }
                </script>
                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <button
                        class="w-[450px] h-[60px] p-2 bg-[#636363] text-white rounded-[10px] font-bold hover:bg-[#a6a6a6] hover:text-white hover:border-3 hover:border-[#636363]"
                        onclick="window.location.href='{{ route('sprint') }}'">
                        Cancel
                    </button>
                    <button onclick = "validateAndSubmit()"
                        class="ml-[10px] w-[450px] h-[60px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">
                        Create
                    </button>
                </div>
            </form>
                <!-- Alert Box -->
                {{-- <div id="alertWarningBox"
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
                        <p class="text-lg text-gray-500 mb-6">You have approved claim.</p>

                        <!-- ปุ่ม Done -->
                        <button onclick="closeWarningAlert()"
                            class="bg-yellow-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-yellow-600">
                            OK
                        </button>
                    </div>
                </div> --}}

                <div id="alertErrorBox"
                    class="hidden fixed inset-0 flex items-center justify-center transition-opacity duration-300">
                    <div class="bg-white rounded-lg shadow-lg p-8 relative max-w-sm w-full text-center rounded-xl">
                        <!-- ปุ่มปิด -->
                        <button onclick="closeErrorAlert()"
                            class="absolute top-2 right-4 text-gray-400 hover:text-gray-600 text-3xl">
                            &times;
                        </button>

                        <!-- ไอคอน -->
                        <div class="flex justify-center mb-4">
                            <img src="{{ asset('resources/Images/Icons/cross.png') }}" alt="Check icon" class="w-16 h-16">
                        </div>

                        <!-- ข้อความ -->
                        <h2 class="text-2xl font-bold text-black-600 mb-2">Error</h2>
                        <p class="text-lg text-gray-500 mb-6">You have approved claim.</p>

                        <!-- ปุ่ม Done -->
                        <button onclick="closeErrorAlert()"
                            class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-600">
                            TRY AGAIN
                        </button>
                    </div>
                </div>
            </div>
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

            {{-- <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // หา element ทุกปุ่มที่มี class delete-btn
                    document.querySelectorAll('.delete-btn').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'Do you want to remove this member row?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes, delete it',
                                cancelButtonText: 'Cancel'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // ลบ .member-row ที่เป็นพ่อของปุ่มนี้
                                    btn.closest('.member-row').remove();

                                    Swal.fire(
                                        'Deleted!',
                                        'This row has been removed.',
                                        'success'
                                    );
                                }
                            });
                        });
                    });
                });
            </script> --}}
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
