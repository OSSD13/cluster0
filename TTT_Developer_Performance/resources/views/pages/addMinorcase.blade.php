@extends('layouts.tester')

@section('title')
    <title>Create Minorcase</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Performance Review</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Minor Case / Add</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <div class="text-xl font-bold mb-4 text-blue-900"> 
            <p>Create Minor Case</p>
        </div>
    
    <!-- Input All Inline -->
    <div class="flex gap-4 mb-[30px] w-full ">
        <!-- Input Member -->
        <div class="w-1/5">
            <label for="member" class="block mb-2 text-sm font-bold text-gray-900 ">Member <span class="text-red-500">*</span> </label>
            <select id="member" class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5 ">
                <option selected>Member</option>
                <option value="Sun">Sun</option>
                <option value="Ohm">Ohm</option>
            </select>
        </div>
    
        <!-- Input Your Point (Wider) -->
        <div class="w-2/5">
            <label for="your_point" class="block mb-2 text-sm font-bold text-gray-900 ">Your Point <span class="text-red-500">*</span> </label>
            <input type="text" id="your_point" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Your point" required />
        </div>
    
        <!-- Input Current Team -->
        <div class="w-1/5">
            <label for="team" class="block mb-2 text-sm font-bold text-gray-900 ">Current Team <span class="text-red-500">*</span> </label>
            <select id="team" class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5 ">
                <option selected>Team</option>
                <option value="Team 1">Team 1</option>
                <option value="Team 2">Team 2</option>
            </select>
        </div>
    
        <!-- Input Year -->
        <div class="w-1/5">
            <label for="year" class="block mb-2 text-sm font-bold text-gray-900 ">Year <span class="text-red-500">*</span> </label>
            <select id="year" class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5 ">
                <option selected>Year</option>
                <option value="2568">2568</option>
                <option value="2567">2567</option>
            </select>
        </div>
    
        <!-- Input Sprint -->
        <div class="w-1/5">
            <label for="sprint" class="block mb-2 text-sm font-bold text-gray-900 ">Sprint <span class="text-red-500">*</span> </label>
            <select id="sprint" class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-lg focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5 ">
                <option selected>Sprint</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
    </div>
    
    
    <!-- Textarea -->
        <div class="flex gap-4"> 
            <!-- Card Detail -->
            <div class="w-1/2">
                <label for="card_detail" class="block mb-2 text-sm font-bold text-gray-900 ">Card Detail</label>
                <textarea id="card_detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your Detail"></textarea>
            </div>
    
            <!-- Defect Detail -->
            <div class="w-1/2">
                <label for="defect_detail" class="block mb-2 text-sm font-bold text-gray-900 ">Defect Detail</label>
                <textarea id="defect_detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your Detail"></textarea>
            </div>
        </div>
        <br>
        <!-- button create -->
        <div class="flex gap-4"> 
             <button type="submit" class="w-[450px] h-[50px] p-2 bg-zinc-500 text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">Cancel</button>
             <button type="submit" class="w-[450px] h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">Create</button>
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
