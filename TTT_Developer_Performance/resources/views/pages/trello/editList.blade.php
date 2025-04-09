@extends('layouts.tester')

@section('title')
    <title>Trello Configuration List</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        <h2 class="text-2xl font-bold">Setting</h2>
        <p class="font-bold text-neutral-400">Trello Configuration / Edit List</p>
    </div>
@endsection

@section('contents')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-bold text-blue-900 mb-6">Edit Trello List Setting</h2>

        {{-- กล่องแสดง Trello list 3 คอลัมน์ --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            {{-- To-do --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">To-do</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="todo-list-name">{{ $setting->stl_todo }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            {{-- In-progress --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">In-progress</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="inprogress-list-name">{{ $setting->stl_inprogress }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            {{-- Done --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Done</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="done-list-name">{{ $setting->stl_done }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
        </div>

        {{-- กล่องแสดง Trello list 4 คอลัมน์ --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            {{-- Bug / Backlog --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Bug / Backlog</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="bug-list-name">{{ $setting->stl_bug }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            {{-- Minor case --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Minor case</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="minor-case-list-name">{{ $setting->stl_minor_case }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            {{-- Extra --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Extra</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="extra-list-name">{{ $setting->stl_extra }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
            {{-- Cancel --}}
            <div class="bg-black text-white p-4 rounded-xl">
                <h3 class="font-bold mb-2">Cancel</h3>
                <div class="bg-gray-700 p-2 rounded mb-2" id="cancel-list-name">{{ $setting->stl_cancel }}</div>
                <div class="text-gray-400">+ Add a card</div>
            </div>
        </div>

        {{-- Form --}}
        <form class="flex flex-col items-center" action="{{ route('trello.editList.update', $setting->stl_id) }}" method="post">
            @csrf
            @method('POST')
            {{-- Setting Name --}}
            <div class="mb-4 w-[480px]">
                <label for="setting-name" class="block text-sm font-bold text-black mb-2">
                    Setting Name
                </label>
                <input type="text" id="setting-name" placeholder="Setting Name" name="setting_name"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('setting_name', $setting->stl_name) }}" >
            </div>
            {{-- Choose List --}}
            <div class="mb-4 w-[480px]">
                <label for="Choose List" class="block mb-2 text-sm font-bold text-gray-900">Choose List</label>
                <select id="Choose List"
                    class="bg-gray-50 border border-blue-900 text-blue-900 text-sm font-bold rounded-md focus:ring-blue-900 focus:border-blue-900 block w-full p-2.5">
                    <option value="" disabled selected hidden>Choose List</option>
                    <option value="stl_todo">To-do</option>
                    <option value="stl_inprogress">In-progress</option>
                    <option value="stl_done">Done</option>
                    <option value="stl_bug">Bug / Backlog</option>
                    <option value="stl_minor_case">Minor case</option>
                    <option value="stl_extra">Extra</option>
                    <option value="stl_cancel">Cancel</option>
                </select>
            </div>
            {{-- List Name --}}
            <div class="mb-4 w-[480px]">
                <label for="setting-name" class="block text-sm font-bold text-black mb-2">
                    List Name
                </label>

                <div class="relative">
                    <input type="text" id="list-name" placeholder="List Name" name="list_name"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button" id="check-green"
                        class="absolute top-1/2 left-122 transform -translate-y-1/2 w-[40px] h-[40px] bg-[#00BA00] p-2 rounded-md shadow-md flex items-center justify-center">
                        <img src="{{ asset('resources\Images\Icons\check-green.png') }}" alt=""
                            class="w-[25px] h-[25px]">
                    </button>
                </div>
            </div>
            {{-- Cancel And Create --}}
            <div class="flex justify-center gap-4">
                <button type="button" onclick="window.location.href='{{ route('trello.config') }}'"
                    class="w-58 px-6 py-2 bg-zinc-500 text-white rounded-[10px] font-bold border-2 border-transparent hover:bg-white hover:text-blue-900 hover:border-blue-900">
                    Cancel
                </button>
                <button type="submit"
                    class="w-58 px-6 py-2 bg-blue-900 text-white rounded-[10px] font-bold border-2 border-transparent hover:bg-white hover:text-blue-900 hover:border-blue-900">
                    Apply
                </button>
            </div>
        </form>
    </div>
@endsection

@section('javascripts')
    <script>
        let listData = {
            stl_todo: '',
            stl_inprogress: '',
            stl_done: '',
            stl_bug: '',
            stl_minor_case: '',
            stl_extra: '',
            stl_cancel: ''
        };

        document.getElementById('check-green').addEventListener('click', () => {
            const listType = document.getElementById('Choose List').value;
            const listName = document.getElementById('list-name').value;

            // อัปเดตข้อมูลในตัวแปร
            listData[listType] = listName;

            // แสดงผลในช่องที่เกี่ยวข้อง
            switch (listType) {
                case 'stl_todo':
                    document.getElementById('todo-list-name').innerText = listName;
                    break;
                case 'stl_inprogress':
                    document.getElementById('inprogress-list-name').innerText = listName;
                    break;
                case 'stl_done':
                    document.getElementById('done-list-name').innerText = listName;
                    break;
                case 'stl_bug':
                    document.getElementById('bug-list-name').innerText = listName;
                    break;
                case 'stl_minor_case':
                    document.getElementById('minor-case-list-name').innerText = listName;
                    break;
                case 'stl_extra':
                    document.getElementById('extra-list-name').innerText = listName;
                    break;
                case 'stl_cancel':
                    document.getElementById('cancel-list-name').innerText = listName;
                    break;
            }

            // ล้างช่องกรอกหลังเพิ่ม
            document.getElementById('list-name').value = '';
            document.getElementById('Choose List').selectedIndex = 0;
        });

        // ดักจับ submit เพื่อแนบ listData เข้าไป
        document.querySelector('form').addEventListener('submit', function(e) {
            for (const key in listData) {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = key;
                hiddenInput.value = listData[key];
                this.appendChild(hiddenInput);
            }
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
