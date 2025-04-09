<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Weekly Developer Report</title>
    <style>
    * {
        box-sizing: border-box;
    }


    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 12px;
        margin: 40px;
        color: #333;
        background-color: #fefefe;
    }

    .logo-title-wrapper {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .logo-left img {
        width: 50px;
        height: auto;
    }

    .header-title {
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        color: #0d47a1;
    }

    .section-title {
        font-size: 13px;
        font-weight: bold;
        margin: 30px 0 10px;
        color: #1a237e;
        border-left: 5px solid #1a237e;
        padding-left: 10px;
    }

    .table-container {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table-container {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table-container th,
    .table-container td {
        border: 1px solid #bbb;
        padding: 6px;
        text-align: center;
        vertical-align: middle;
        font-size: 11px;
        /* ปรับขนาดตัวหนังสือในตารางให้เล็กลง */
    }

    .table-container th {
        background-color: #e3f2fd;
        font-weight: bold;
        color: #000;
    }


    .summary-row {
        background-color: #f1f8e9;
        font-weight: bold;
    }

    tr:nth-child(even) td {
        background-color: #f9f9f9;
    }

    tr:hover td {
        background-color: #e3f2fd;
    }

    td[colspan] {
        text-align: left;
        font-weight: bold;
    }

    .highlight-orange {
        background-color: #ffe0b2;
    }

    .highlight-purple {
        background-color: #e1bee7;
        color: #4a148c;
    }

    .highlight-gray {
        background-color: #eeeeee;
        color: #212121;
    }

    .signature-table {
            width: 100%;
            text-align: center;
            font-size: 12px;
            border: none;
            margin-top: 40px;
            background-color: transparent; /* ลบพื้นหลังสีเทา */
        }

        .signature-table td {
            padding: 30px 10px;
            vertical-align: top;
        }

        .signature-table td[colspan="2"] {
            text-align: center; /* จัดกลางในลายเซ็นทั้งหมด */
        }
    .spacer {
        margin: 20px 0;
    }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="logo-title-wrapper">
        <div class="logo-left">
            <img src="../resources/Images/ttt_logo.jpg" alt="Logo">
        </div>
        <div class="header-title">Weekly Developer Report</div>
    </div>

    <!-- Author Info -->
    <table class="table-container">
        <tbody>
            <tr class="summary-row">
                <td>Author</td>
                <td>Mr. Akrad Osatanukoo</td>
                <td>Date Start</td>
                <td>6/1/2025</td>
            </tr>
            <tr class="summary-row">
                <td>Date Finish</td>
                <td>10/1/2025</td>
                <td>Last Update</td>
                <td>11/01/2025, 22:40</td>
            </tr>
        </tbody>
    </table>

    <!-- Sprint Info -->
    <table class="table-container">
        <tbody>
            <tr class="summary-row">
                <td>Sprint</td>
                <td>#68-02</td>
                <td>Team</td>
                <td>Raizeros Team</td>
            </tr>
            <tr class="summary-row">
                <td>Plan Point</td>
                <td>36.75</td>
                <td>Actual Point</td>
                <td>36.75</td>
            </tr>
            <tr class="summary-row">
                <td>Remain</td>
                <td>0.00%</td>
                <td>Percent</td>
                <td>100.00%</td>
            </tr>
        </tbody>
    </table>

    <!-- Sprint Table -->
    <div class="section-title">Points from Current Sprint</div>
    <table class="table-container">
        <thead>
            <tr>
                <th>Member</th>
                <th>Point Personal</th>
                <th>Test Pass</th>
                <th>Bug</th>
                <th>Final Pass Point</th>
                <th>Cancel</th>
                <th>Sum Final</th>
                <th>Remark</th>
                <th>Day Off</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lek</td>
                <td>7.75</td>
                <td>7.75</td>
                <td>0</td>
                <td>100%</td>
                <td>0</td>
                <td>7.75</td>
                <td></td>
                <td>Not Test</td>
            </tr>
            <tr>
                <td>Toomtam</td>
                <td>9.5</td>
                <td>9.5</td>
                <td>0</td>
                <td>100%</td>
                <td>0</td>
                <td>9.5</td>
                <td></td>
                <td>Not Test</td>
            </tr>
            <tr>
                <td>Zrot</td>
                <td>4.5</td>
                <td>4.5</td>
                <td>0</td>
                <td>100%</td>
                <td>0</td>
                <td>4.5</td>
                <td></td>
                <td>Not Test</td>
            </tr>
            <tr>
                <td>T</td>
                <td>8</td>
                <td>8</td>
                <td>0</td>
                <td>100%</td>
                <td>0</td>
                <td>8</td>
                <td></td>
                <td>Not Test</td>
            </tr>
            <tr>
                <td>Wave</td>
                <td>6.5</td>
                <td>6.5</td>
                <td>0</td>
                <td>100%</td>
                <td>0</td>
                <td>6.5</td>
                <td></td>
                <td>Not Test</td>
            </tr>
            <tr class="summary-row">
                <td>Sum</td>
                <td>36.25</td>
                <td>36.25</td>
                <td>0</td>
                <td>100%</td>
                <td>0</td>
                <td>36.25</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <!-- Backlog & Minor -->
    <div class="section-title"></div>
    <table class="table-container"> 
        <thead>
            <tr class="summary-row">
                <th class="highlight-orange">Backlog</th>
                <th>#Sprint</th>
                <th>Personal</th>
                <th>Point All</th>
                <th>Test Pass</th>
                <th>Bug</th>
                <th>Cancel</th>
                <th class="highlight-purple">Extra Point</th>
                <th>Personal</th>
                <th>Point</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <!-- Minorcase -->
                <td class=""> </td>
                <td></td>
                <td>0.5</td>
            </tr>
        </tbody>
    </table>

    <table class="table-container">
        <thead>
            <tr class="summary-row">
                <th class="highlight-gray">Minor Case</th>
                <th>Sprint</th>
                <th>Card Detail</th>
                <th>Defect Detail</th>
                <th>Personal</th>
                <th>Point</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>

    <!-- Signatures -->
    <table class="signature-table">
        <tr>
            <td>
                Software Tester<br><br>
                Name: (....................................................)<br>
                Date: ....................................................
            </td>
            <td>
                Developer Team ........<br><br>
                Name: (....................................................)<br>
                Date: ....................................................
            </td>
        </tr>
        
        <!-- Added Product Manager Signature -->
        <tr>
            <td colspan="2">
                Product Manager<br><br>
                Name: (....................................................)<br>
                Date: ....................................................
            </td>
        </tr>
    </table>
</body>

</html>