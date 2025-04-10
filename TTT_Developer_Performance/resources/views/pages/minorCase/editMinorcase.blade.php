@extends('layouts.tester')

@section('title')
    <title>Edit Minorcase</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Performance Review</h2>
        <p class="font-bold text-neutral-400">Minor Case / Edit</p>
    </div>
@endsection

@section('contents')
    <form action="{{ route('minorcase.update', $minorCase->mnc_id) }}" method="POST">
        @csrf
        <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
            <div class="text-xl font-bold mb-4 text-blue-900">
                <p>Edit Minor Case</p>
            </div>

            <div class="flex gap-4 mb-[30px] w-full">
                {{-- Select Member --}}
                {{-- <div class="w-1/5">
                    <label for="mnc_uth_id" class="block mb-2 text-sm font-bold text-gray-900">Member</label>
                    <select id="mnc_uth_id" name="mnc_uth_id" required class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                        <option value="" disabled hidden>เลือกสมาชิก</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->tm_id }}" {{ $team->tm_id == $minorCase->mnc_uth_id ? 'selected' : '' }}>
                                {{ $userName }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- Members (disabled just for display) --}}
                <div class="w-1/5">
                    <label class="block mb-2 text-sm font-bold text-gray-900">Member</label>
                    <input type="text" value="{{ $userName }}" disabled class="bg-gray-100 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5" />
                </div>
                {{-- Team (disabled just for display) --}}
                <div class="w-1/5">
                    <label class="block mb-2 text-sm font-bold text-gray-900">Current Team</label>
                    <input type="text" value="{{ $teamName }}" disabled class="bg-gray-100 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5" />
                </div>
                {{-- Point --}}
                <div class="w-2/5">
                    <label for="mnc_point" class="block mb-2 text-sm font-bold text-gray-900">Your Point</label>
                    <input type="number" name="mnc_point" id="mnc_point" value="{{ $minorCase->mnc_point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>


                {{-- Year --}}
                <div class="w-1/5">
                    <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year</label>
                    <select id="year" disabled class="bg-gray-100 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
                        <option>{{ $sprints->firstWhere('spr_id', $minorCase->mnc_spr_id)?->spr_year ?? 'N/A' }}</option>
                    </select>
                </div>

                {{-- Sprint --}}
                <div class="w-1/5">
                    <label for="mnc_spr_id" class="block mb-2 text-sm font-bold text-gray-900">Sprint</label>
                    <select name="mnc_spr_id" id="mnc_spr_id" required class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                        <option value="" hidden>เลือก Sprint</option>
                        @foreach($sprints as $sprint)
                            <option value="{{ $sprint->spr_id }}" {{ $sprint->spr_id == $minorCase->mnc_spr_id ? 'selected' : '' }}>
                                ปี {{ $sprint->spr_year }} - ครั้งที่ {{ $sprint->spr_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Textareas --}}
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="mnc_card_detail" class="block mb-2 text-sm font-bold text-gray-900">Card Detail</label>
                    <textarea name="mnc_card_detail" id="mnc_card_detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $minorCase->mnc_card_detail }}</textarea>
                </div>

                <div class="w-1/2">
                    <label for="mnc_defect_detail" class="block mb-2 text-sm font-bold text-gray-900">Defect Detail</label>
                    <textarea name="mnc_defect_detail" id="mnc_defect_detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $minorCase->mnc_defect_detail }}</textarea>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6">
                <a href="{{ url('/minorcase') }}" class="w-1/2 h-[50px] p-2 bg-zinc-500 text-white rounded-[10px] font-bold flex items-center justify-center hover:bg-white hover:text-blue-900 hover:border hover:border-blue-900">
                    Cancel
                </a>
                <button type="submit" class="w-[450px] h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">
                    Apply
                </button>
            </div>
        </div>
    </form>
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
