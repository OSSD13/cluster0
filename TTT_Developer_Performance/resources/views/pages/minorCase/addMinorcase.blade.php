@extends('layouts.tester')

@section('title')
<title>Create Minorcase</title>
@endsection

@section('pagename')
<div class="flex items-end gap-[10px] mb-4">
    <h2 class="text-2xl font-bold">Performance Review</h2>
    <p class="font-bold text-neutral-400">Minor Case / Add</p>
</div>
@endsection

@section('contents')
@if ($errors->any())
<div class="w-full max-w-[900px] mx-auto mb-4">
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<!-- Header -->
<div class="text-xl font-bold mb-4 text-blue-900 w-full max-w-[900px] mx-auto">
    <p>Create Minor Case</p>
</div>

<!-- Form Container -->
<div class="bg-white rounded-lg shadow-md p-6 shadow-lg max-w-[900px] mx-auto">
    <form action="{{ route('storeMinorcase') }}" method="POST">
        @csrf

        <!-- Inline Inputs -->
        <div class="flex gap-4 mb-[30px] w-full">
            <!-- Member -->
            <div class="w-1/5">
                <label for="member" class="block mb-2 text-sm font-bold text-gray-900">Member <span
                        class="text-red-500">*</span></label>
                <select id="member" name="uth_usr_id"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Member</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->usr_id }}">{{ $user->usr_username }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Your Point -->
            <div class="w-2/5">
                <label for="your_point" class="block mb-2 text-sm font-bold text-gray-900">Your Point <span
                        class="text-red-500">*</span></label>
                <input type="number" id="your_point" name="mnc_point"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Your point" required />
            </div>

            <!-- Current Team -->
            <div class="w-1/5">
                <label for="team" class="block mb-2 text-sm font-bold text-gray-900">Current Team <span
                        class="text-red-500">*</span></label>
                <select id="team" name="uth_tm_id"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Team</option>
                    @foreach ($teams as $team)
                    <option value="{{ $team->tm_id }}">{{ $team->tm_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Year -->
            <div class="w-1/5">
                <label for="year" class="block mb-2 text-sm font-bold text-gray-900">Year <span
                        class="text-red-500">*</span></label>
                <select id="year" name="spr_year"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Year</option>
                    @foreach ($sprints->unique('spr_year') as $sprint)
                    <option value="{{ $sprint->spr_year }}">{{ $sprint->spr_year }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sprint -->
            <div class="w-1/5">
                <label for="sprint" class="block mb-2 text-sm font-bold text-gray-900">Sprint <span
                        class="text-red-500">*</span></label>
                <select id="sprint" name="spr_number"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden class="text-center">Sprint</option>
                    @foreach ($sprints as $sprint)
                    <option value="{{ $sprint->spr_number }}">{{ $sprint->spr_number }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Textareas -->
        <div class="flex gap-4 mb-[30px]">
            <!-- Card Detail -->
            <div class="w-1/2">
                <label for="card_detail" class="block mb-2 text-sm font-bold text-gray-900">Card Detail</label>
                <textarea id="card_detail" name="mnc_card_detail" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Your Detail"></textarea>
            </div>

            <!-- Defect Detail -->
            <div class="w-1/2">
                <label for="defect_detail" class="block mb-2 text-sm font-bold text-gray-900">Defect Detail</label>
                <textarea id="defect_detail" name="mnc_defect_detail" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Your Detail"></textarea>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4 w-full">
            <a href="{{ route('minorcase') }}"
                class="w-[450px] h-[50px] p-2 bg-zinc-500 text-white rounded-[10px] font-bold flex items-center justify-center hover:bg-white hover:text-[var(--primary-color)] hover:border hover:border-[var(--primary-color)]">
                Cancel
            </a>
    
            <button type="submit "
                class="w-[450px] h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-white hover:text-[var(--primary-color)] hover:border hover:border-[var(--primary-color)]">
                Create
            </button>
        </div>
    </form>
</div>

@endsection

@section('javascripts')
<script>

    document.addEventListener('DOMContentLoaded', function() {
        const memberInput = document.getElementById('member');
        const teamInput = document.getElementById('team');

        // Example of handling member selection or adding dynamic behavior
        memberInput.addEventListener('change', function() {
            console.log('Member selected:', memberInput.value);
            // Handle team or other dynamic behavior here
        });

        // Similarly, you can add event listeners for other fields
    });
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