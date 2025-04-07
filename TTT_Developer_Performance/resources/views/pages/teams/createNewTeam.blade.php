@extends('layouts.tester')

@section('title')
    <title>Create New Team</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Team List / Add Team</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white shadow-md rounded-xl p-6 max-w-[600px] mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Create New Team</h2>

        <form action="#" method="POST">
            @csrf

            <!-- Team Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Team Name <span class="text-red-500">*</span></label>
                <input type="text" name="team_name" placeholder="Team Name" 
                    class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Trello Board Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Trello Board Name <span class="text-red-500">*</span></label>
                <input type="text" name="trello_board" placeholder="Trello Board Name" 
                    class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

         <!-- Team Members -->
<div class="mb-6">
    <label class="block text-black font-bold text-2xl mb-2">Team Members</label>

    <!-- Hidden Input สำหรับส่งค่า tag ไป backend -->
    <input type="hidden" name="team_members" id="team_members">

    <!-- Tag Input Container -->
    <div id="tag-container" class="flex flex-wrap gap-2 p-4 border border-gray-400 bg-gray-50 rounded-2xl mb-4">
        <input type="text" id="tag-input" 
               placeholder="Type and press Enter" 
               class="border-none outline-none bg-transparent flex-1 min-w-[120px] text-base">
    </div>

    <!-- Choose API & Setting (ภายในกรอบเดียวกัน) -->
    <div class="mb-4 flex gap-4">
        <div class="w-1/2">
            <label class="block text-gray-700 font-bold mb-2">Choose API</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                <option>API set 1</option>
            </select>
        </div>
        <div class="w-1/2">
            <label class="block text-gray-700 font-bold mb-2">Choose Setting</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                <option>Setting 1</option>
            </select>
        </div>
    </div>

    <!-- Buttons (ภายในกรอบเดียวกัน) -->
    <div class="mb-4 flex gap-4">
        <div class="w-1/2">
            <a href="{{ route('team') }}" 
               class="inline-flex items-center justify-center w-full h-[50px] bg-gray-500 text-white text-lg rounded-lg hover:bg-gray-600">
                Cancel
            </a>
        </div>
        <div class="w-1/2">
            <button type="submit" 
                class="inline-flex items-center justify-center w-full h-[50px] bg-blue-800 text-white text-lg rounded-lg hover:bg-blue-900">
                Create
            </button>
        </div>
    </div>
</div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const input = document.getElementById("tag-input");
                const container = document.getElementById("tag-container");
                const hiddenInput = document.getElementById("team_members");
        
                let tags = [];
        
                const updateHiddenInput = () => {
                    hiddenInput.value = tags.join(',');
                };
        
                const createTagElement = (name) => {
                    const span = document.createElement('span');
                    span.className = 'inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium';
        
                    span.innerText = name;
        
                    const removeBtn = document.createElement('a');
                    removeBtn.innerText = '×';
                    removeBtn.className = 'ml-2 font-bold text-blue-600 hover:text-red-500 cursor-pointer';
        
                    removeBtn.onclick = () => {
                        tags = tags.filter(tag => tag !== name);
                        container.removeChild(span);
                        updateHiddenInput();
                    };
        
                    span.appendChild(removeBtn);
                    container.insertBefore(span, input);
                };
        
                input.addEventListener('keydown', (e) => {
                    if ((e.key === 'Enter' || e.key === ',') && input.value.trim() !== '') {
                        e.preventDefault();
                        const value = input.value.trim();
                        if (!tags.includes(value)) {
                            tags.push(value);
                            createTagElement(value);
                            updateHiddenInput();
                        }
                        input.value = '';
                    }
                });
        
                // หากต้องการ preload tag เก่า
                const initialTags = ['Name 1', 'Name 2', 'Name 3'];
                initialTags.forEach(tag => {
                    tags.push(tag);
                    createTagElement(tag);
                });
                updateHiddenInput();
            });
        </script>
        
    </div>
</div>
    </form>
</div>
@endsection