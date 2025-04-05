@extends('layouts.tester')

@section('title')
    <title>Edit Extrapoint</title>
@endsection

@section('javascripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>
    <script>
        // Ensure the button exists before adding the event listener
        document.addEventListener("DOMContentLoaded", function() {
            const editBtn = document.getElementById("saveBtn");
            if (editBtn) {
                editBtn.addEventListener("click", function() {
                    Swal.fire({
                        title: "Your edits are saved!",
                        icon: "success",
                        draggable: true
                    });
                });
            }
        });
    </script>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Extrapoint / Edit</p>
    </div>
@endsection

@section('contents')
    <!-- Input All Inline -->
    <div class="text-xl font-bold mb-4 text-blue-900 w-full max-w-[900px] mx-auto">
        <p>Edit Extrapoint</p>
    </div>

    <!-- Input All Inline -->
    <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">

        <!-- Input Member -->
        <div class="w-full sm:w-1/4">
            <label for="member" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Member <span
                    class="text-red-500">*</span></label>
            <select id="member"
                class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                <option value="" disabled selected hidden class="text-center">Member</option>
                <option value="Member A">Sun</option>
                <option value="Member B">ohm</option>
            </select>
        </div>

        <!-- Input Current Team -->
        <div class="w-full sm:w-1/4">
            <label for="current_team" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Current Team <span
                    class="text-red-500">*</span></label>
            <select id="member"
                class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                <option value="" disabled selected hidden class="text-center">Team</option>
                <option value="Team A">Team A</option>
                <option value="Team B">Team B</option>
            </select>
        </div>

    </div>

    <!-- Input Points -->
    <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">
        <!-- Input Point All -->
        <div class="w-full sm:w-1/4">
            <label for="point_all" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Point All <span
                    class="text-red-500">*</span></label>
            <input type="text" id="point_all"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Point" required />
        </div>

    </div>

    <!-- Buttons -->
    <div class="flex flex-wrap gap-4 mb-[30px] w-full max-w-[900px] mx-auto">
        <!-- Cancel Button -->
        <a href="{{ route('extrapoint') }}">
            <button type="button"
            class="w-full sm:w-[250px] h-[50px] p-2 bg-zinc-500 text-white rounded-[10px] font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900">
            Cancel
            </button>
        </a>

        <!-- Apply Button -->
        <form action="{{ route('editExtrapoint') }}" method="POST" class="inline">
            @csrf
            @method('PUT')
            <button type="submit" id="saveBtn"
            class="w-full sm:w-[250px] h-[50px] p-2 bg-blue-900 text-white rounded-[10px] font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900">
            Apply
            </button>
        </form>
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

        input:focus {
            outline: none;
            border: 3px solid var(--primary-color);
        }
    </style>
@endsection
