@extends('layouts.tester')

@section('title')
    <title>Team Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-2 mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400">Team List / Add Team</p>
    </div>
@endsection

@section('contents') 
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <div class="text-xl font-bold mb-4 text-blue-900">
            <p>Create New Team</p>
        </div>
        
        <div class="relative overflow-x-auto rounded-lg shadow-md">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-200 text-xs text-gray-600 uppercase">
                    <tr>
                        <th class="px-6 py-3 text-center">#</th>
                        <th class="px-6 py-3 text-center">Sprint</th>
                        <th class="px-6 py-3 text-center">Team</th>
                        <th class="px-6 py-3 text-center">Member</th>
                        <th class="px-6 py-3 text-center">Card Detail</th>
                        <th class="px-6 py-3 text-center">Defect Detail</th>
                        <th class="px-6 py-3 text-center">
                            <div class="flex items-center justify-center">
                                Point
                                <a href="#" class="ml-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([1, 2] as $i)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-center font-medium text-gray-700 dark:text-white">{{ $i }}</td>
                        <td class="px-6 py-4 text-center">67-52</td>
                        <td class="px-6 py-4 text-center">Team 2</td>
                        <td class="px-6 py-4 text-center">Steve</td>
                        <td class="px-6 py-4 text-center">Lorem</td>
                        <td class="px-6 py-4 text-center">Lorem</td>
                        <td class="px-6 py-4 text-center">2</td>
                        <td class="px-6 py-4 flex items-center justify-center gap-2">
                            <a href="#">
                                <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit" class="w-8 h-8">
                            </a>
                            <a href="#">
                                <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt="Delete" class="w-8 h-8">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        // JS functions (ถ้ามี)
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
    </style>
@endsection
