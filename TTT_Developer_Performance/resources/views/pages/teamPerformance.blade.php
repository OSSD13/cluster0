@extends('layouts.tester')

@section('title')
<title>Team Performance</title>
@endsection

@section('pagename')
<div class="flex items-end gap-[10px] mb-4">
    {{-- Main Menu --}}
    <h2 class="text-2xl font-bold">Dashboard</h2>
    {{-- Sub Menu --}}
    <p class="font-bold text-neutral-400">Team Performance</p>
</div>
@endsection

@section('contents')
    <div class="bg-white rounded-lg shadow-md p-6 shadow-lg">
        <!-- ฺBox Team performance -->
        <div class="w-full h-20 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-6">
            <div class="text-3xl font-bold text-[var(--primary-color)] mb-4">
                <p>Team Performance</p>
            </div>
        </div><br>
        
        
        <!-- Filter -->
        <div class="w-full h-15 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4">
            <div class="flex items-center text-xl font-bold text-[var(--primary-color)] mb-4 justify-between">
                <p class="flex"> <img src="{{ asset('resources/Images/Icons/filter (1).png') }}" alt="Filter" class="w-5 h-5 mr-2"> Filter</p>
                <button class="flex items-center bg-zinc-400 text-white px-5 py-1 rounded text-[12px] font-bold">
                    Clear
            </button>
            </div>
        </div><br>
        
        
        <!-- Team -->
        <div class="w-full h-15 bg-[var(--primary-color)] border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4">
            <div class="flex justify-between items-center">
                <p class="text-xl font-bold text-white">Team A</p>
                <span class="text-sm  text-white">Last update: 03/01/2025, 15.45</span>
            </div>
        </div>
        <br>
        
        <!-- Box All point -->
        <div class="grid grid-cols-3 gap-2">
            <div
                class="w-full h-60 flex justify-center col-span-2 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4">
                <div class="grid grid-cols-2 gap-2">
        
                    <div class="bg-[var(--primary-color)] w-70   h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Plan Point</p>
                        </div>
        
                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class="text-[var(--primary-color)] font-bold">37</p>
                        </div>
                    </div>
        
        
                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Actual Point</p>
                        </div>
        
                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">38</p>
                        </div>
                    </div>
        
                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Surpass</p>
                        </div>
        
                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class="text-green-400 font-bold">2.70%</p>
                        </div>
                    </div>
        
                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div class="bg-[var(--primary-color)] flex-1 h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Percent</p>
                        </div>
        
                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">100.70%</p>
                        </div>
                    </div>
        
                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div
                            class="bg-[var(--primary-color)] flex-1 text-center h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Point Current Sprint</p>
                        </div>
        
                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">37</p>
                        </div>
                    </div>
        
                    <div class="bg-[var(--primary-color)] w-70 h-13 rounded-xl flex justify-between items-center">
                        <div
                            class="bg-[var(--primary-color)] flex-1 text-center h-[35px] rounded-lg flex justify-center items-center">
                            <p class="text-white font-bold">Actual Point Current Sprint</p>
                        </div>
        
                        <div class="bg-white w-35 h-10 rounded-lg flex justify-center items-center m-1">
                            <p class=" text-[var(--primary-color)] font-bold">37</p>
                        </div>
                    </div>
        
                </div>
            </div>
        
            <!-- Box Chart-->
            <div class="w-full h-full bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-4">
                <div id="chart"></div>
        
            </div>
        </div><br>
        
        
        <!-- Team Member Table -->
        <div class="w-full h-50 bg-white border-gray-300 rounded-lg shadow-xl shadow-md shadow-lg p-6">
            <div class="text-xl font-bold mb-4 text-blue-900 flex justify-between items-center">
                <p>Team Members</p>
                <button class="flex items-center bg-blue-900 text-white px-2 py-1 rounded text-[12px] font-bold">
                    <img src="{{ asset('resources/Images/Icons/image-gallery.png') }}" alt="Add" class="w-5 h-5 mr-2">
                    Add New
            </button>
            </div>
            
        
            <table class="w-full text-[10px] text-left rtl:text-right text-gray-500 ">
                <!-- Table header -->
            <thead class="border-t border-gray-400 text-l text-gray-400 uppercase border-b "> 
            <tr>
                <!-- Table header -->
                        <th scope="col" class="px-3 py-3 text-center">#</th>
                        <th scope="col" class="px-3 py-3 text-center">Member</th>
                        <th scope="col" class="px-3 py-3 text-center">
                            <div class="flex items-center"> Point Personal
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
        
                        <th scope="col" class="px-3 py-3 text-center">
                            <div class="flex items-center"> Test Pass
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
        
                        <th scope="col" class="px-3 py-3 text-center">
                            <div class="flex items-center"> Bug
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
        
                        <th scope="col" class="px-3 py-3 text-center">
                            <div class="flex items-center"> Final Pass Point
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
                
                        <th scope="col" class="px-3 py-3 text-center">
                            <div class="flex items-center"> Cancel
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
        
                        <th scope="col" class="px-3 py-3 text-center">
                            <div class="flex items-center"> Sum Final 
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
                      
                        <th scope="col" class="px-3 py-3 text-center">Day Off</th>
                       
                        <th scope="col" class="px-3 py-3 text-center">Assign</th>
        
                        <th scope="col" class="px-3 py-3 text-center">
                            Actions
                        </th>
        
                    </tr>
                </thead>
                </div>
    </div>
@endsection

@section('javascripts')
<script>

var options = {
    series: [{
        name: 'Plan', // Updated name
        data: [44]
    }, {
        name: 'Actual', // Updated name
        data: [53]
    }],
    chart: {
        type: 'bar',
        height: 193
    },
        labels : ['Plan', 'Actual'],
        colors: ['#FFA533', '#60A563'],
        plotOptions: {
          bar: {
            horizontal: true,
            dataLabels: {
              position: 'top',
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetX: -6,
          style: {
            fontSize: '12px',
            colors: ['#fff']
          }
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },
        tooltip: {
          shared: true,
          intersect: false
        },
        xaxis: {
          categories: ['Point'],
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

      
      

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