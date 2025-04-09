@extends('layouts.tester')

@section('title')
    <title>Edit Backlog</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Performance Review</h2>
        <p class="font-bold text-neutral-400">Backlog / Edit</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-left mb-8">
            <h1 class="text-2xl font-bold text-blue-900">Edit Backlog</h1>
        </div>

        <!-- Form Container -->
        <form method="POST" action="{{ route('backlog.update', $backlog->blg_id) }}" class="space-y-6">
            @csrf
            @method('PUT') <!-- ใช้ PUT เพื่อบ่งชี้ว่าเป็นการอัปเดตข้อมูล -->

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Team Dropdown -->
                <div>
                    <label for="team_id" class="block mb-2 text-sm font-bold text-gray-900">Team</label>
                    <select name="team_id" id="team_id" required
                        class="team-selector w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled>Select team</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->tm_id }}" @if ($team->tm_id == $backlog->blg_tm_id) selected @endif>
                                {{ $team->tm_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Member Dropdown -->
                <div>
                    <label for="member_id" class="block mb-2 text-sm font-bold text-gray-900">Member</label>
                    <select name="member_id" id="member_id" required
                        class="member-selector w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled>Select member</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->usr_id }}" @if ($user->usr_id == $backlog->blg_usr_id) selected @endif>
                                {{ $user->usr_username }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Year Dropdown -->
                <div>
                    <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year</label>
                    <select name="year" id="year" required
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled>Select Year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->spr_year }}" @if ($year->spr_year == $backlog->spr_year) selected @endif>
                                {{ $year->spr_year }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <!-- Sprint Dropdown -->
                <div>
                    <label for="sprint_id" class="block mb-2 text-sm font-bold text-gray-900">Sprint</label>
                    <select name="sprint_id" id="sprint_id" required
                        class="w-full p-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-lg bg-gray-50 focus:ring-blue-900 focus:border-blue-900">
                        <option value="" disabled>Select Sprint</option>

                        <!-- Filter sprints by year -->
                        @foreach ($sprints->where('spr_year', $backlog->spr_year) as $sprint)
                            <option value="{{ $sprint->spr_id }}" @if ($sprint->spr_id == $backlog->blg_spr_id) selected @endif>
                                {{ $sprint->spr_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>




            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="test_pass" class="block mb-2 text-sm font-bold text-gray-900">Test Pass</label>
                    <input type="number" name="test_pass" id="test_pass" value="{{ $backlog->blg_pass_point }}" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="bug" class="block mb-2 text-sm font-bold text-gray-900">Bug</label>
                    <input type="number" name="bug" id="bug" value="{{ $backlog->blg_bug }}" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="cancel" class="block mb-2 text-sm font-bold text-gray-900">Cancel</label>
                    <input type="number" name="cancel" id="cancel" value="{{ $backlog->blg_cancel }}" required
                        class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <button type="button" onclick="window.location.href='{{ route('backlog') }}'"
                    class="min-w-[400px] px-8 py-3 bg-zinc-500 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Cancel
                </button>
                <button type="submit"
                    class="min-w-[400px] px-8 py-3 bg-blue-900 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Update
                </button>
            </div>
        </form>

    </div>
@endsection
