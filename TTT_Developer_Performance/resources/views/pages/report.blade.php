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
    <div class="flex justify-between text-center gap-5">
        <div class="w-full h-[500px] bg-[var(--primary-color)] flex justify-center items-center text-white font-bold">
            PDF
        </div>
        <div class="w-full h-[500px]">
            <form action="{{ route('step2') }}" method="POST" class="text-left">
                <h2 class="text-[24px] font-bold text-[var(--primary-color)] mb-5 block text-left w-full">What your name?</h2>
                @csrf
                <div class="mb-[30px] w-full">
                  <label for="author" class="block font-bold">Author</label>
                  <input type="text" name="author" placeholder="Author" required class="w-full h-full max-h-[50px] p-2 border border-gray-300 rounded rounded-[10px]">
                </div>

                <div class="flex space-x-2 w-full">
                    <button type="submit" class="h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">
                        Sign Up
                    </button>
                    <button type="submit" class="h-[50px] p-2 bg-[var(--primary-color)] text-white rounded-[10px] font-bold hover:bg-[#ffffff] hover:text-[var(--primary-color)] hover:border-3 hover:border-[var(--primary-color)]">
                        Sign Up
                    </button>
                </div>

              </form>
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
