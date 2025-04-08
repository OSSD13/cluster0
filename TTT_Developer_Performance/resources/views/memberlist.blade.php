@extends('layouts.tester')

@section('title')
    <title>Member Management</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Member Management</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400 ml-4">Member List</p>
    </div>
@endsection

@section('contents')
    <div class="flex items-center gap-4 w-full mb-4">
        <p class="text-xl font-bold text-blue-900">Member List</p>
        <div class="flex justify-between mb-4 ml-auto">
            {{-- <img src="{{ asset('resources/Images/Icons/magnifier.png') }}" class="bg-grey absolute ml-2 mt-0 w-[30px] h-[30px]"> --}}
            <input type="text" placeholder="Search"
                class="px-4 py-2 rounded-[10px] text-black w-[300px] bg-white border border-gray-300 shadow-sm focus:ring focus:ring-blue-300" />
        </div>
        <div class="flex items-center justify-between mb-4 ml-auto">
            <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" class="absolute ml-2 mt-0 w-[30px] h-[30px]">
            <button class="w-[150px] h-[40px] p-2 bg-[var(--primary-color)] text-white font-bold rounded-sm"
                class="w-[150px] h-[40px] p-2 bg-[var(--primary-color)] text-white font-bold rounded-sm"
                onclick="window.location.href='{{ route('memberlist.add') }}'">
                Add new
            </button>

            @foreach ($histories as $index => $history)
                <th scope="row" class="px-6 py-4 font-medium text-gray-500 text-center">{{ $index + 1 }}</th>
                <td class="px-6 py-4 text-center">{{ $history->user->usr_name }}</td>
                <td class="px-6 py-4 text-center">{{ $history->team->tm_name }}</td>
                <td class="px-6 py-4 text-center">{{ $history->user->usr_trello_name }}</td>
                <td class="px-6 py-4 text-center">{{ $history->user->usr_trello_fullname }}</td>
                <td class="px-6 py-4 text-center">
                    {{ \Carbon\Carbon::parse($history->uth_start_date)->format('m/d') }}/{{ \Carbon\Carbon::parse($history->uth_start_date)->addYears(543)->format('y') }}
                </td>
            

            <td class="px-6 py-4 pr-6 flex items-center justify-end space-x-2">
                <a
                    href="{{ route('memberlist.edit', ['usr_name' => $history->user->usr_name, 'usr_trello_name' => $history->user->usr_trello_name]) }}">
                    <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="" class="w-[35px] h-[35px]">
                    <a href="{{ route('memberlist.edit', $history->user->usr_id) }}">
                        <img src="{{ asset('resources/Images/Icons/editIcon.png') }}" alt="Edit"
                            class="w-[35px] h-[35px]">
                    </a>
                    <a href=""> <img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}"
                            href="{{ route('memberlist.delete', $history->user->usr_id) }}"> <img
                            src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" alt=""
                            class="w-[35px] h-[35px]" onclick=""></a>
            </td>
            @endforeach

            </tr>

            {{-- <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-500 text-center">1</th>
                    <td class="px-6 py-4 text-center">67-52</td>
                    <td class="px-6 py-4 text-center">Team 2</td>
                    <td class="px-6 py-4 text-center">Steve</td>
                    <td class="px-6 py-4 text-center">Lorem</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <a href="#"><img src="{{ asset('resources/Images/Icons/editIcon.png') }}" class="w-[30px] h-[30px]" alt="Edit"></a>
                        <a href="#"><img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" class="w-[30px] h-[30px]" alt="Delete"></a>
                    </td>
                </tr>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-500 text-center">2</th>
                    <td class="px-6 py-4 text-center">67-52</td>
                    <td class="px-6 py-4 text-center">Team 2</td>
                    <td class="px-6 py-4 text-center">Steve</td>
                    <td class="px-6 py-4 text-center">Lorem</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <a href="#"><img src="{{ asset('resources/Images/Icons/editIcon.png') }}" class="w-[30px] h-[30px]" alt="Edit"></a>
                        <a href="#"><img src="{{ asset('resources/Images/Icons/deleteIcon.png') }}" class="w-[30px] h-[30px]" alt="Delete"></a>
                    </td>
                </tr> --}}

            </tbody>
            </table>
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
