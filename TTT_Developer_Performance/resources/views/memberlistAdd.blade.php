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
    <div class="flex justify-center items-center ">
        <div class="w-[900px] bg-transparent p-6 rounded-lg ">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-900">Create New Member</h3>

            </div>

            <div>
                <!-- Member Input Fields -->
                @for ($i = 1; $i <= 3; $i++)
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-1/3">
                            <label class="block font-bold text-gray-700">{{ $i }}. Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" placeholder="Your Name"
                                class="w-full h-full max-h-[60px] p-4 border border-gray-400 rounded-[7px]
           placeholder-gray-300 placeholder:font-medium placeholder:text-base">
                        </div>
                        <div class="w-1/3">
                            <label class="block font-bold text-gray-700">{{ $i }}. Username <span
                                    class="text-red-500">*</span></label>
                            <input type="text" placeholder="Your Username"
                                class="w-full h-full max-h-[60px] p-4 border border-gray-400 rounded-[7px]
           placeholder-gray-300 placeholder:font-medium placeholder:text-base">
                        </div>
                        <div class="w-1/3 flex items-center">
                            <div class="w-full">
                                <label class="block font-bold text-gray-700">{{ $i }}. Trello Full Name</label>
                                <input type="text" placeholder="Trello Name"
                                    class="w-full h-full max-h-[60px] p-4 border border-gray-400 rounded-[7px]
           placeholder-gray-300 placeholder:font-medium placeholder:text-base">
                            </div>

                            <a href="javascript:void(0)" class="block mt-6" onclick="handleDelete()">
                                <img src="http://localhost:1300/resources/Images/Icons/deleteIcon.png" alt="Delete"
                                    class="w-[53px] h-[53px] ml-2 rounded-xl">
                            </a>
                        </div>
                    </div>
                @endfor


                <!-- Dropdown -->
                <div>
                    <select
                        class="w-[400px] h-[50px] border-2 p-2 rounded-lg pr-12 text-blue-900
                              focus:outline-none focus:ring-2 focus:ring-[#00408e] focus:border-[#00408e]
                              hover:bg-blue-100 mt-4"
                        style="border-color: #00408e;
                              background-image: url('data:image/svg+xml;utf8,<svg fill=\'%2300408e\' height=\'24\' viewBox=\'0 0 24 24\' width=\'24\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>');
                              background-repeat: no-repeat;
                              background-position: right 1rem center;
                              background-size: 1.5rem;
                              appearance: none;">
                        <option class="text-center text-blue-900 bg-white text-xl font-bold">Choose Team</option>
                        <option class="text-center text-blue-900 bg-white">Team 1</option>
                        <option class="text-center text-blue-900 bg-white">Team 2</option>
                        <option class="text-center text-blue-900 bg-white">Team 3</option>
                    </select>


                </div>


                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <button
                        class="w-[450px] h-[60px] p-2 bg-[#636363] text-white rounded-[10px] font-bold hover:bg-[#a6a6a6] hover:text-white hover:border-3 hover:border-[#636363]">
                        Cancel
                    </button>
                    <button
                        class="ml-[10px] w-[450px] h-[60px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">
                        Create</button>
                </div>

            </div>
        @endsection

        @section('styles')
            <style>
                body {
                    font-family: "Inter", sans-serif;
                }
            </style>
        @endsection
