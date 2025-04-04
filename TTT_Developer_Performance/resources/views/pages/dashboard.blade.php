@extends('layouts.tester')

@section('title')
    <title>Dashboard</title>
@endsection

@section('pagename')
    <div class="flex items-end gap-[10px] mb-4">
        {{-- Main Menu --}}
        <h2 class="text-2xl font-bold">Dashboard</h2>
        {{-- Sub Menu --}}
        <p class="font-bold text-neutral-400">Overview</p>
    </div>
@endsection

@section('filter')
    {{-- filter --}}
    <div class="my-3 m-2 flex item-center justify-between">
        <div class="bg-white w-full h-[70px] rounded-lg shadow-md shadow-lg flex items-center">
            <div class="gap-4 flex flex-row items-center w-full justify-between mx-10">
                <div class="flex justify-start items-center gap-2 ">
                    <img src="/resources/Images/Icons/filter (1).png" alt="" class="w-[40px] h-[40px]">
                    <label class="text-[var(--primary-color)] text-2xl"><strong>Filter</strong></label>
                </div>
                <div class="flex justify-end gap-4 ml-4">
                    <!-- Year Dropdown -->
                    <div class="relative">
                        <button id="dropdownButton"
                            class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                            <span id="dropdownSelected" class="truncate text-center w-full">Year:</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="dropdownMenu"
                            class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="year2568" value="2568" class="mr-2">
                                <label for="year2568" class="text-black">2568</label>
                            </div>
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="year2567" value="2567" class="mr-2">
                                <label for="year2567" class="text-black">2567</label>
                            </div>
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="year2566" value="2566" class="mr-2">
                                <label for="year2566" class="text-black">2566</label>
                            </div>
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="year2565" value="2565" class="mr-2">
                                <label for="year2565" class="text-black">2565</label>
                            </div>
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="year2564" value="2564" class="mr-2">
                                <label for="year2564" class="text-black">2564</label>
                            </div>
                        </div>
                    </div>

                    <!-- Sprint Dropdown -->
                    <div class="relative">
                        <button id="dropdownSprint"
                            class="border border-blue-900 text-blue-900 font-bold rounded px-4 py-2 w-48 bg-white text-center flex justify-between items-center">
                            <span id="dropdownSprintSelected" class="truncate text-center w-full">Sprint:</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="dropdownSprintMenu"
                            class="absolute hidden mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="sprint01" value="Sprint 01" class="mr-2">
                                <label for="sprint01" class="text-black">Sprint 01</label>
                            </div>
                            <div class="flex items-center px-4 py-2">
                                <input type="checkbox" id="sprint02" value="Sprint 02" class="mr-2">
                                <label for="sprint02" class="text-black">Sprint 02</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- show point 3 type --}}
    <div class="my-3 flex flex-row gap-4">

        {{-- Point All --}}
        <div class="basis-1/3 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color-yellow)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point All</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointAllNumber" class="font-bold">37</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointAllPercent" class="font-bold text-[var(--yellow-color-text)]">100%</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Point Pass --}}
        <div class="basis-1/3 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color-green)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point Pass</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassNumber" class="font-bold">36</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassPercent" class="font-bold text-[var(--green-color-text)]">97.30%</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Point Fail --}}
        <div class="basis-1/3 bg-white h-[90px] w-full rounded-lg shadow-md shadow-lg">
            <div class="bg-[var(--primary-color-red)] w-full h-[30px] rounded-t-lg flex flex-col">
                <div class="mt-1 flex justify-center items-center gap-2">
                    <label class="text-white font-bold">Point Fail</label>
                </div>
                <div class="flex items-center gap-4 w-full mt-3">
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassNumber" class="font-bold">3</p>
                    </div>
                    <div class="border-l-2 border-black h-[30px]"></div>
                    <div class="flex-1 flex items-center justify-center">
                        <p id="pointPassPercent" class="font-bold text-[var(--red-color-text)]">8.10%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard')
    <div class="my-3 flex flex-row gap-4 grid grid-cols-3">
        <div class="col-span-2 bg-white h-full w-full rounded-lg shadow-md shadow-lg">
            <div id="columnChart"></div>
        </div>

        <div class="bg-white h-full rounded-lg shadow-md shadow-lg flex flex-col items-center">
            <div id="pieChart"></div>
            <div class="flex flex-col h-full justify-center items-center gap-2">
                <div
                    class="bg-[var(--primary-color-green)] w-[180px] h-[35px] rounded-lg flex justify-between items-center">
                    <div
                        class="bg-[var(--primary-color-green)] w-[90px] h-[35px] rounded-lg flex justify-center items-center">
                        <p class="text-white font-bold">Pass</p>
                    </div>

                    <div class="bg-white w-[90px] h-[30px] rounded-lg flex justify-center items-center m-1">
                        <p class="text-[var(--primary-color-green)] font-bold">36</p>
                    </div>
                </div>

                <div
                    class="bg-[var(--primary-color-red)] w-[180px] h-[35px] rounded-lg flex justify-between items-center">
                    <div
                        class="bg-[var(--primary-color-red)] w-[90px] h-[35px] rounded-lg flex justify-center items-center">
                        <p class="text-white font-bold">Fail</p>
                    </div>

                    <div class="bg-white w-[90px] h-[30px] rounded-lg flex justify-center items-center m-1">
                        <p class="text-[var(--primary-color-red)] font-bold">3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownSprint = document.getElementById('dropdownSprint');
            const dropdownSprintMenu = document.getElementById('dropdownSprintMenu');
            const dropdownSprintSelected = document.getElementById('dropdownSprintSelected');
            const sprintCheckboxes = dropdownSprintMenu.querySelectorAll('input[type="checkbox"]');

            dropdownSprint.addEventListener('click', function() {
                dropdownSprintMenu.classList.toggle('hidden');
            });

            sprintCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const selectedSprints = Array.from(sprintCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value)
                        .join(', ');
                    dropdownSprintSelected.textContent = `Sprint: ${selectedSprints}`;
                });
            });

            document.addEventListener('click', function(event) {
                if (!dropdownSprint.contains(event.target) && !dropdownSprintMenu.contains(event.target)) {
                    dropdownSprintMenu.classList.add('hidden');
                }
            });
        });

        // Year dashboard
        var options = {
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 0,
                    borderRadiusApplication: 'end'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                colors: ['#FFA533', '#60A563', '#DC5959']
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var columnChart = new ApexCharts(document.querySelector("#columnChart"), options);
        columnChart.render();

        // Pie chart

        var options = {
            series: [44, 55],
            chart: {
                type: 'donut',
            },
            labels: ['Pass', 'Fail'],
            colors: ['#60A563', '#DC5959'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var pieChart = new ApexCharts(document.querySelector("#pieChart"), options);
        pieChart.render();
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
