<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('resources/Images/ttt_logo.jpg') }}" />
    <link rel="stylesheet" href="{{ asset('resources/css/global.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="flex justify-center">

    <div class="w-full h-full flex flex-col m-[50px]">
        
        {{-- Header --}}
        <div>
            <div class="flex justify-center w-full">
                <img src="{{ asset('resources/Images/ttt_logo.jpg') }}" alt="" class="w-[50px] h-[50px]">
                <h1>เอกสารประเมินทัม DEV รายสัปดาห์</h1>
                <p>(Document Weekly Developer Report)</p>
            </div>

            <div class="grid grid-cols-10 mb-5">
                <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-10"></div>
                <div class="bg-gray-100 p-5 border-[0.5px] col-span-10"></div>
                <div class="bg-gray-100 p-5 border-[0.5px] col-span-10"></div>
                <div class="bg-gray-100 p-5 border-[0.5px] col-span-10"></div>
                <div class="bg-gray-100 p-5 border-[0.5px] col-span-10"></div>
            </div>
        </div>

        {{-- Author --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-8"></div>

            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-3"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-3"></div>

            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-3"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-3"></div>
        </div>  

        {{-- Team Name --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-[var(--form-team)] p-5 border-[0.5px] col-span-10"></div>
        </div>

        {{-- Summary Points --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class=""></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class=""></div>

            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class=""></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class=""></div>

            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class=""></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class=""></div>
        </div>

        {{-- Current Sprint Points --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
            <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>

            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>

            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>

            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>

            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
        </div>

        {{-- Current Sprint Summary Points --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-gray-100 p-5 border-[0.5px] col-span-2"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
        </div>
        
        {{-- Others Points --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            {{-- Backlog --}}
            <div class="bg-gray-100 border-[0.5px] col-span-6">
                <div class="grid grid-cols-6">
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>  
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>

                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                </div>
            </div>

            {{-- Extra Points --}}
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 border-[0.5px] col-span-2">
                <div class="grid grid-cols-2">
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>

                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                </div>
            </div>
        </div>

        {{-- Minor Case --}}
        <div class="grid grid-cols-10 mb-5">
            <div class="bg-gray-100 p-5 border-[0.5px]"></div>
            <div class="bg-gray-100 border-[0.5px] col-span-6">
                <div class="grid grid-cols-5">
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>
                    <div class="bg-[var(--form-gray)] p-5 border-[0.5px]"></div>  

                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                    <div class="bg-gray-100 p-5 border-[0.5px]"></div>
                </div>
            </div>
        </div>

    </div> 
</body>
</html>