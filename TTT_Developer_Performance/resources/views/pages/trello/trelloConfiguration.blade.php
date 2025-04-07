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
                    <button type="button" onclick="window.location.href='{{ route('trelloConfigurationAPI') }}'"
                        class="bg-[#00408E] text-white px-3 py-1 rounded-lg flex items-center">
                        <img src="{{ asset('resources\Images\Icons\image-gallery.png') }}" alt=""
                            class="w-[20px] h-[20px] mr-2">
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
                                        <td class="px-6 py-4 text-center">{{ $api->name }}</td>
                                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                                            <a href="">
                                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit Icon" class="w-[35px] h-[35px]">
                                            </a>
                                            <a href="">
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
                    <button type="button" onclick="window.location.href='{{ route('trelloConfigurationList') }}'"
                        class="bg-[#00408E] text-white px-3 py-1 rounded-lg flex items-center ">
                        <img src="{{ asset('resources\Images\Icons\image-gallery.png') }}" alt=""
                            class="w-[20px] h-[20px] mr-2">
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
                                        <td class="px-6 py-4 text-center">{{ $list->name }}</td>
                                        <td class="px-6 py-4 flex items-center justify-center space-x-2">
                                            <a href="">
                                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}"
                                                    alt="Edit Icon" class="w-[35px] h-[35px]">
                                            </a>
                                            <a href="">
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
@endsection

@section('javascripts')
    <script></script>
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
    </style>
@endsection
