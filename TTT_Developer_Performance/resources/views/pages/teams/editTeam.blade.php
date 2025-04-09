@extends('layouts.tester')

@section('title')
    <title>Edit Team</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Team Management</h2>
        <p class="font-bold text-neutral-400 ml-4">Team List / Edit</p>
    </div>
@endsection

@section('contents')
<div class="bg-white shadow-md rounded-xl p-6 max-w-[600px] mx-auto">
    <h2 class="text-2xl font-bold text-blue-900 mb-4">Edit Team</h2>

    <form action="{{ route('team.update', ['id' => $team->tm_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Team Name -->
        <div class="mb-4">
            <label class="block text-black font-bold mb-2">
                Team Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="team_name" placeholder="Team Name"
                   value="{{ $team->tm_name }}"
                   class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        <!-- Trello Board Name -->
        <div class="mb-4">
            <label class="block text-black font-bold mb-2">
                Trello Board Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="trello_board" placeholder="Trello Board Name"
                   value="{{ $team->tm_trello_boardname }}"
                   class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        <!-- Team Members -->
        <div class="mb-6">
            <label class="block text-black font-bold mb-2">Team Members</label>
            <div id="tag-container" class="flex flex-wrap items-center gap-2 p-2 border border-gray-400 bg-gray-50 rounded-2xl min-h-[50px] relative">
                <!-- Tags render here -->
                <input type="text" id="tag-input" 
                       placeholder="Add team member..." 
                       class="flex-1 min-w-[120px] bg-transparent outline-none text-base"
                       onfocus="showDropdown()" autocomplete="off">
                <!-- Dropdown -->
                <ul id="member-dropdown" class="absolute z-10 top-full left-0 mt-1 w-full bg-white border border-gray-300 rounded-lg shadow-md max-h-60 overflow-y-auto hidden">
                    @foreach($users as $user)
                        <li onclick="addTag('{{ $user->username }}')" 
                            class="px-4 py-2 hover:bg-blue-100 cursor-pointer text-sm flex items-center gap-2">
                            <img src="{{ $user->profile_image_url ?? 'https://via.placeholder.com/40' }}" class="w-5 h-5 rounded-full">
                            <span>{{ $user->username }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Choose API & Setting -->
        <div class="mb-4 flex gap-4">
            <!-- API Select -->
            <div class="w-1/2">
                <label class="block text-black font-bold mb-2">Choose API</label>
                <select name="api_id"
                        class="w-full px-4 py-2 border border-blue-800 rounded-md text-black focus:outline-none">
                    @foreach($apis as $api)
                        <option value="{{ $api->id }}" {{ $api->id == $team->tm_trc_id ? 'selected' : '' }}>
                            {{ $api->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Setting Select -->
            <div class="w-1/2">
                <label class="block text-black font-bold mb-2">Choose Setting</label>
                <select name="setting_id"
                        class="w-full px-4 py-2 border border-blue-800 rounded-md text-black focus:outline-none">
                    @foreach($settings as $setting)
                        <option value="{{ $setting->id }}" {{ $setting->id == $team->tm_stl_id ? 'selected' : '' }}>
                            {{ $setting->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
            <div class="w-full sm:w-1/2">
                <button type="button" onclick="window.location.href='{{ route('team') }}'"
                    class="w-full px-8 py-3 bg-zinc-500 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Cancel
                </button>
            </div>
            <div class="w-full sm:w-1/2">
                <button type="submit"
                    class="w-full px-8 py-3 bg-blue-900 text-white rounded-lg font-bold hover:bg-white hover:text-blue-900 hover:border-2 hover:border-blue-900 transition-all duration-200">
                    Apply
                </button>
            </div>
        </div>
    </form>
</div>

<!-- JS Tag Input -->
<script>
    const tagContainer = document.getElementById('tag-container');
    const tagInput = document.getElementById('tag-input');
    const dropdown = document.getElementById('member-dropdown');
    let tags = @json(old('team_members', $currentMembersUsernames ?? []));

    function renderTags() {
        // Remove old tags
        tagContainer.querySelectorAll('.tag').forEach(tag => tag.remove());

        // Create new tags with hidden inputs
        tags.forEach(username => {
            const tag = document.createElement('span');
            tag.className = 'tag flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-800 rounded';
            tag.innerHTML = `
                <span>${username}</span>
                <button type="button" onclick="removeTag('${username}')" class="text-red-500 hover:text-red-700 font-bold ml-1">&times;</button>
                <input type="hidden" name="team_members[]" value="${username}">
            `;
            tagContainer.insertBefore(tag, tagInput);
        });
    }

    function addTag(username) {
        if (!tags.includes(username)) {
            tags.push(username);
            renderTags();
        }
        tagInput.value = '';
        hideDropdown();
    }

    function removeTag(username) {
        tags = tags.filter(tag => tag !== username);
        renderTags();
    }

    tagInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            const val = tagInput.value.trim();
            if (val && !tags.includes(val)) {
                tags.push(val);
                renderTags();
            }
            tagInput.value = '';
            hideDropdown();
        } else if (e.key === 'Backspace' && tagInput.value === '') {
            tags.pop();
            renderTags();
        }
    });

    tagInput.addEventListener('input', () => {
        showDropdown();
        const filter = tagInput.value.toLowerCase();
        document.querySelectorAll('#member-dropdown li').forEach(li => {
            const name = li.innerText.toLowerCase();
            li.style.display = name.includes(filter) ? 'flex' : 'none';
        });
    });

    function showDropdown() {
        dropdown.classList.remove('hidden');
    }

    function hideDropdown() {
        dropdown.classList.add('hidden');
    }

    document.addEventListener('click', (e) => {
        if (!tagContainer.contains(e.target)) {
            hideDropdown();
        }
    });

    renderTags();
</script>
@endsection
