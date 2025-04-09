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
            <label class="block text-gray-700 font-bold mb-2">Team Name</label>
            <input type="text" name="team_name" value="{{ old('team_name', $team->tm_name) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        <!-- Trello Team Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Trello Team Name</label>
            <input type="text" name="trello_board" value="{{ old('trello_board', $team->tm_trello_boardname) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
        </div>

  <!-- Team Members -->
<div class="mb-6">
    <label class="block text-black font-bold text-2xl mb-2">Team Members</label>
  
    <!-- Hidden input -->
    <input type="hidden" name="team_members" id="team_members" value="{{ implode(',', old('team_members', $currentMembersUsernames ?? [])) }}">
  
    <!-- Tag input area -->
    <div id="tag-container" class="flex flex-wrap items-center gap-2 p-2 border border-gray-400 bg-gray-50 rounded-2xl min-h-[50px] relative">
      <!-- Tags will render here -->
      <input type="text" id="tag-input" 
             placeholder="Add team member..." 
             class="flex-1 min-w-[120px] bg-transparent outline-none text-base"
             onfocus="showDropdown()" autocomplete="off">
      
      <!-- Dropdown suggestion box -->
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
            <div class="w-1/2">
                <label class="block text-gray-700 font-bold mb-2">Choose API</label>
                <select name="api_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($apis as $api)
                        <option value="{{ $api->id }}" {{ $team->tm_trc_id == $api->id ? 'selected' : '' }}>
                            {{ $api->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/2">
                <label class="block text-gray-700 font-bold mb-2">Choose Setting</label>
                <select name="setting_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($settings as $setting)
                        <option value="{{ $setting->id }}" {{ $team->tm_stl_id == $setting->id ? 'selected' : '' }}>
                            {{ $setting->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Buttons -->
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
  const hiddenInput = document.getElementById('team_members');
  const dropdown = document.getElementById('member-dropdown');
  let tags = hiddenInput.value ? hiddenInput.value.split(',') : [];

  function renderTags() {
    // ลบ tag เก่าทิ้งก่อน
    tagContainer.querySelectorAll('.tag').forEach(tag => tag.remove());

    // วาด tag ใหม่
    tags.forEach(username => {
      const tag = document.createElement('span');
      tag.className = 'tag flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-800 rounded';
      tag.innerHTML = `
        <span>${username}</span>
        <button type="button" onclick="removeTag('${username}')" class="text-red-500 hover:text-red-700 font-bold ml-1">&times;</button>
      `;
      tagContainer.insertBefore(tag, tagInput);
    });

    hiddenInput.value = tags.join(',');
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
