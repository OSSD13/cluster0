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
                <div class="w-[794px] h-[1123px] bg-[var(--primary-color)] flex justify-center items-center text-white font-bold col-span-2">
                    PDF
                </div>
            </div>
            <div class="w-full">
                <form action="{{ route('step2') }}" method="POST" class="text-left">
                    <h2 class="text-[24px] font-bold text-[var(--primary-color)] mb-[15px] block text-left w-full">Generate Report</h2>
                    @csrf
                    <div class="mb-[15px] w-full">
                      <label for="author" class="block font-bold">Author</label>
                      <input type="text" name="author" placeholder="Author" required class="w-full h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                    </div>
    
                    <!-- Year & Sprint in the same row -->
                    <div class="mb-[15px] w-full flex gap-5">
                        <div class="w-1/2">
                            <label for="year" class="block font-bold">Year <span class="text-red-500">*</span></label>
                            <select id="year" class="w-full h-[50px] p-2 border-[2px] border-[var(--primary-color)] rounded-[10px] bg-white font-bold text-[var(--primary-color)]">
                                <option selected>Year</option>
                                <option value="2568">2568</option>
                                <option value="2567">2567</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label for="sprint" class="block font-bold">Sprint <span class="text-red-500">*</span></label>
                            <select id="sprint" class="w-full h-[50px] p-2 border-[2px] border-[var(--primary-color)] rounded-[10px] bg-white font-bold text-[var(--primary-color)]">
                                <option selected>Sprint</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="mb-[15px] w-full">
                        <label for="team" class="block font-bold">Team <span class="text-red-500">*</span></label>
                        <select id="team" class="w-full h-[50px] p-2 border-[2px] border-[var(--primary-color)] rounded-[10px] bg-white font-bold text-[var(--primary-color)]">
                            <option selected>Team</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    {{-- Switch Button --}}
                    <div class="mb-[15px] w-full">
                        <div x-data="toggleButtons()">
                            <!-- กล่องปุ่ม -->
                            <div class="relative w-full h-[50px] border-2 border-gray-300 rounded-[10px] flex items-center p-1">
                                <!-- ปุ่ม Save -->
                                <button @click="toggle"
                                    class="absolute left-1 h-[40px] w-[calc(50%-4px)] text-[16px] rounded-[10px] font-semibold transition-all duration-300"
                                    :class="active === 'save' ? 'bg-blue-900 text-white' : 'bg-transparent text-gray-400'">
                                    Save on device
                                </button>

                                <!-- ปุ่ม Send -->
                                <button @click="toggle"
                                    class="absolute right-1 h-[40px] w-[calc(50%-4px)] text-[16px] rounded-[10px] font-semibold transition-all duration-300"
                                    :class="active === 'send' ? 'bg-blue-900 text-white' : 'bg-transparent text-gray-400'">
                                    Send email
                                </button>
                            </div>

                            <!-- เนื้อหา Email ที่แสดง/ซ่อน -->
                            <div id="send-email" x-show="active === 'send'" x-transition>
                                <div class="mb-[15px] mt-[15px] w-full">
                                    <label for="sendToEmail" class="block font-bold">Send to Email</label>
                                    <input type="email" name="sendToEmail" placeholder="Email" required
                                        class="w-full h-[50px] p-2 border border-gray-300 rounded-[10px]">
                                </div>

                                <div class="mb-[15px] w-full">
                                    <label for="subject" class="block font-bold">Subject</label>
                                    <input type="text" name="subject" placeholder="Subject" required
                                        class="w-full h-[50px] p-2 border border-gray-300 rounded-[10px]">
                                </div>

                                <div class="mb-[15px] w-full">
                                    <label for="detail" class="block font-bold">Detail</label>
                                    <textarea name="message" placeholder="Detail" required
                                        class="w-full h-[100px] p-2 border border-gray-300 rounded-[10px]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Button --}}
                    <div class="flex justify-between w-full mt-5 gap-5">
                        <button class="bg-gray-300 rounded-lg shadow-md shadow-lg w-full h-[50px] text-white">
                            <strong>Cancel</strong>
                        </button>
    
                        <button class="bg-[var(--primary-color)] rounded-lg shadow-md shadow-lg w-full h-[50px] text-white">
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
