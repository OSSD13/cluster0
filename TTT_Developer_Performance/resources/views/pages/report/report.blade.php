@extends('layouts.tester')

@section('title')
<title>Report</title>
@endsection

@section('pagename')
<div class="flex items-end gap-[10px] mb-4">
    {{-- Main Menu --}}
    <h2 class="text-2xl font-bold">Reports</h2>
    {{-- Sub Menu --}}
    <p class="font-bold text-neutral-400">Generate Report</p>
</div>
@endsection

@section('contents')
<div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
    <div class="grid grid-cols-3 gap-4 h-full">
        <div class="w-full flex justify-center items-center text-white font-bold col-span-2">
            <div
                class="w-[794px] h-[1123px] bg-[var(--primary-color)] flex justify-center items-center text-white font-bold col-span-2">
                PDF
            </div>
        </div>
        <div class="w-full">
            <form id="report-form" action="{{ route('step2') }}" method="POST" class="text-left">
                @csrf

                <h2 class="text-[24px] font-bold text-[var(--primary-color)] mb-[15px] block text-left w-full">
                    Generate Report
                </h2>

                <div class="mb-[15px] w-full">
                    <label for="author" class="block font-bold">Author</label>
                    <input type="text" name="author" placeholder="Author" required
                        class="w-full h-[50px] p-2 border border-gray-300 rounded-[10px]">
                </div>

                <div class="mb-[15px] w-full flex gap-5">
                    <div class="w-1/2">
                        <label for="year" class="block font-bold">Year <span class="text-red-500">*</span></label>
                        <select name="year" id="year" required
                            class="w-full h-[50px] p-2 border-[2px] border-[var(--primary-color)] rounded-[10px] bg-white font-bold text-[var(--primary-color)]">
                            <option value="" disabled selected hidden>Year</option>
                            <option value="2568">2568</option>
                            <option value="2567">2567</option>
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="sprint" class="block font-bold">Sprint <span class="text-red-500">*</span></label>
                        <select name="sprint" id="sprint" required
                            class="w-full h-[50px] p-2 border-[2px] border-[var(--primary-color)] rounded-[10px] bg-white font-bold text-[var(--primary-color)]">
                            <option value="" disabled selected hidden>Sprint</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="mb-[15px] w-full">
                    <label for="team" class="block font-bold">Team <span class="text-red-500">*</span></label>
                    <select name="team" id="team" required
                        class="w-full h-[50px] p-2 border-[2px] border-[var(--primary-color)] rounded-[10px] bg-white font-bold text-[var(--primary-color)]">
                        <option value="" disabled selected hidden>Team</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                {{-- Switch Button --}}
                <div class="mb-[15px] w-full">
                    <div x-data="toggleButtons()">
                        <div
                            class="relative w-full h-[50px] border-2 border-gray-300 rounded-[10px] flex items-center p-1">
                            <button @click="toggle" type="button"
                                class="absolute left-1 h-[40px] w-[calc(50%-4px)] text-[16px] rounded-[10px] font-semibold transition-all duration-300"
                                :class="active === 'save' ? 'bg-blue-900 text-white' : 'bg-transparent text-gray-400'">
                                Save on device
                            </button>

                            <button @click="toggle" type="button"
                                class="absolute right-1 h-[40px] w-[calc(50%-4px)] text-[16px] rounded-[10px] font-semibold transition-all duration-300"
                                :class="active === 'send' ? 'bg-blue-900 text-white' : 'bg-transparent text-gray-400'">
                                Send email
                            </button>
                        </div>

                        <!-- ฟอร์มส่งอีเมล -->
                        <div id="send-email" x-show="active === 'send'" x-transition>
                            <div class="mb-[15px] mt-[15px] w-full">
                                <label for="sendToEmail" class="block font-bold">Send to Email</label>
                                <input type="email" name="sendToEmail" placeholder="Email"
                                    class="w-full h-[50px] p-2 border border-gray-300 rounded-[10px]">
                            </div>

                            <div class="mb-[15px] w-full">
                                <label for="subject" class="block font-bold">Subject</label>
                                <input type="text" name="subject" placeholder="Subject"
                                    class="w-full h-[50px] p-2 border border-gray-300 rounded-[10px]">
                            </div>

                            <div class="mb-[15px] w-full">
                                <label for="message" class="block font-bold">Detail</label>
                                <textarea name="message" placeholder="Detail"
                                    class="w-full h-[100px] p-2 border border-gray-300 rounded-[10px]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ปุ่มส่งฟอร์ม --}}
                <div class="flex justify-between w-full mt-5 gap-5">
                    <button type="button" class="bg-gray-300 rounded-lg shadow-md shadow-lg w-full h-[50px] text-white">
                        <strong>Cancel</strong>
                    </button>

                    <button type="submit"
                        class="bg-[var(--primary-color)] rounded-lg shadow-md shadow-lg w-full h-[50px] text-white">
                        <strong>Confirm</strong>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('javascripts')
<script>
function toggleButtons() {
    return {
        active: 'save',
        toggle() {
            this.active = this.active === 'save' ? 'send' : 'save';
        }
    };
}

document.getElementById('report-form').addEventListener('submit', function(e) {
    var activeButton = document.querySelector('[x-data="toggleButtons()"]').__x.$data.active;

    // Check if 'send' option is selected
    if (activeButton === 'send') {
        var sendEmail = document.querySelector('input[name="sendToEmail"]').value;
        var subject = document.querySelector('input[name="subject"]').value;
        var message = document.querySelector('textarea[name="message"]').value;

        // Add email fields to the form if they are present
        var form = e.target;
        var sendEmailInput = document.createElement('input');
        sendEmailInput.setAttribute('type', 'hidden');
        sendEmailInput.setAttribute('name', 'sendToEmail');
        sendEmailInput.setAttribute('value', sendEmail);
        form.appendChild(sendEmailInput);

        var subjectInput = document.createElement('input');
        subjectInput.setAttribute('type', 'hidden');
        subjectInput.setAttribute('name', 'subject');
        subjectInput.setAttribute('value', subject);
        form.appendChild(subjectInput);

        var messageInput = document.createElement('input');
        messageInput.setAttribute('type', 'hidden');
        messageInput.setAttribute('name', 'message');
        messageInput.setAttribute('value', message);
        form.appendChild(messageInput);
    }
});
</script>
@endsection