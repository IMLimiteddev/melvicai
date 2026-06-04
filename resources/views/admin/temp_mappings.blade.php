<x-layouts::app :title="__('Models')">
    <style>
        .tab-link.active {
            color: #0d6efd;
            border-bottom: 2px solid #E94E1B;
            padding-bottom: 5px;
        }

        .tab-link:hover {
            opacity: 0.7;
        }
    </style>
    <div class="page-body" id="pageBody">

        {{-- <x-stage /> --}}
        {{-- @php
            dd($data);
        @endphp --}}

        <x-stage active="2" />

        <div class="container-fluid">
            <div class="page-title">

                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Mapping Sample</h3>
                    </div>
                    <div class="col-5 d-none d-xl-block">
                        <!-- Page Sub Header Start-->
                        <div class="left-header main-sub-header p-0">

                            <div class="left-menu-header">

                                <ul class="header-left"
                                    style="display:flex; gap:20px; list-style:none; margin:0; padding:10px 0;">

                                    <li>
                                        <span class="tab-link active" data-tab="header"
                                            style="cursor:pointer; font-weight:700;">
                                            Header
                                        </span>
                                    </li>

                                    <li>
                                        <span class="tab-link" data-tab="map-body"
                                            style="cursor:pointer; font-weight:700;">
                                            Body
                                        </span>
                                    </li>

                                    <li>
                                        <span class="tab-link" data-tab="map-color"
                                            style="cursor:pointer; font-weight:700;">
                                            Color
                                        </span>
                                    </li>

                                    <li>

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Mapping</h4>
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- LEFT: Input + Button -->

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">
                                    </a>
                                </div>



                            </div>
                        </div>

                        <form id="mappingForm" action="{{ route('admin.rule.send') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf

                            <input type="hidden" name="payload" id="payload">
                            <!-- <input type="text"> -->






                            <div style="display:flex; gap:10px; align-items:center; width:60%; padding:20px">
                                <label><strong>Upload a Schwörer file here that the mapping rule should
                                        follow.</strong></label>
                                <input type="file" class="form-control" name="file" style="max-width:300px;">
                            </div>

                            <div class="row p-3">

                                <label><strong>Edit area: This is the static rule sample of Schwörer file that can be
                                        EDITED and then passed as a payload. to get a download link for the whole
                                        process. The processing time is around 4mins so please be
                                        patient.</strong></label>
                            </div>

                            <div class="row">
                                <div class="col-lg-6"
                                    style="
                                            position: sticky;
                                            top: 20px;
                                            align-self: flex-start;
                                            height: fit-content;
                                            z-index: 10;
                                        ">



                                    <div id="pdfPreviewBox"
                                        style="display:block; border:1px solid #ddd; border-radius:10px; padding:15px; background:#fafafa;">
                                        <iframe src="{{ asset('storage/uploaded_mappings/' . $mapping->pdf) }}"
                                            style="width:100%; height:700px; border:none; border-radius:10px;">
                                        </iframe>

                                    </div>

                                </div>
                                <div class="col-lg-6" id="mappingColumn">

                                    <!-- Header -->
                                    <div class="card-body tab-content active" id="header">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Col</th>
                                                    <th>Field</th>
                                                    <th>Logic</th>
                                                    <th>Output</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>

                                            </thead>

                                            <tbody>
                                                @foreach ($data['Mapping_report']['Header_Mapping'] as $index => $item)
                                                    <tr class="header-row">

                                                        <td>
                                                            {{ $item['Col'] }}
                                                            <input type="hidden" class="col"
                                                                value="{{ $item['Col'] }}">
                                                            <input type="hidden" class="type"
                                                                value="{{ $item['Type'] }}">
                                                        </td>

                                                        <td>
                                                            <input class="form-control field"
                                                                value="{{ $item['Field'] }}">
                                                        </td>

                                                        <td>
                                                            @php
                                                                $logicDisplay = '';
                                                                if ($item['Type'] === 'D') {
                                                                    $parts = explode('Default:', $item['Logic']);
                                                                    $logicDisplay = isset($parts[1])
                                                                        ? trim($parts[1])
                                                                        : '';
                                                                } elseif ($item['Type'] === 'T') {
                                                                    $logicDisplay = $item['Logic'];
                                                                }
                                                            @endphp

                                                            <input class="form-control logic"
                                                                value="{{ $logicDisplay }}">
                                                        </td>

                                                        <td>
                                                            <input class="form-control output"
                                                                value="{{ $item['Output'] }}">
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Positions --}}
                                    <div class="card-body tab-content" id="map-body">
                                        {{-- Mapping_report --}}
                                        @foreach ($data['Mapping_report']['Positions_Mapping'] as $pIndex => $position)
                                            <div onclick="togglePosition('pos_{{ $pIndex }}')"
                                                style="background:#1e293b;color:#fff;padding:12px 16px;margin-bottom:5px;border-radius:6px;cursor:pointer;">
                                                Position {{ $position['Position_ID'] }}
                                            </div>

                                            <div id="pos_{{ $pIndex }}"
                                                style="display: {{ $pIndex == 0 ? 'block' : 'none' }}; margin-bottom:15px; border:1px solid #ddd;">
                                                <table class="table table-bordered" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Col</th>
                                                            <th>Field</th>
                                                            <th>Logic</th>
                                                            <th>Output</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($position['Mapping'] as $item)
                                                            <tr class="position-row"
                                                                data-position="{{ $position['Position_ID'] }}">

                                                                <td>
                                                                    {{ $item['Col'] }}
                                                                    <input type="hidden" class="col"
                                                                        value="{{ $item['Col'] }}">
                                                                </td>

                                                                <td><input class="field" value="{{ $item['Field'] }}">
                                                                </td>
                                                                <td><input class="logic" value="{{ $item['Logic'] }}">
                                                                </td>
                                                                <td><input class="output"
                                                                        value="{{ $item['Output'] }}"></td>
                                                                <td><input class="output" type="hidden"
                                                                        value="{{ $item['Output'] }}"></td>
                                                                {{-- <td><input class="type"  value="{{ $item['Type'] }}"></td> --}}

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Color --}}
                                    <div class="card-body tab-content" id="map-color">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Input Contains</th>
                                                    <th>Output Result</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data['Mapping_report']['Panzer_Color_Mapping'] as $item)
                                                    <tr class="color-row">
                                                        <td>
                                                            <input class="form-control input"
                                                                value="{{ $item['Input_Contains'] }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control output"
                                                                value="{{ $item['Output_Result'] }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>


                        </form>


                        <!-- ================= SUBMIT ================= -->
                        <div style="display: flex">

                            <form action="{{ route('admin.save.mapping', $id) }}" method="POST">

                                @csrf
                                <div style="padding:20px; text-align:right;">
                                    <button type="submit" class="btn btn-success">
                                        Save This Mapping (without sending to AI)
                                    </button>
                                </div>

                            </form>

                            <div style="padding:20px; text-align:right;">
                                <button type="submit" class="btn btn-success">
                                    Send back to AI, get the result and save the mapping (the whole process takes
                                    around 4 mins, please be patient)
                                </button>
                            </div>
                        </div>



                        <!-- Container-fluid Ends-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const tabs = document.querySelectorAll('.tab-link');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {

                    const target = this.dataset.tab;


                    tabs.forEach(t => {
                        const tabName = t.dataset.tab;


                        t.classList.remove('active');


                        const content = document.getElementById(tabName);
                        if (content) content.style.display = 'none';
                    });


                    this.classList.add('active');


                    const activeContent = document.getElementById(target);
                    if (activeContent) activeContent.style.display = 'block';

                });
            });

        });

        function togglePosition(id) {
            const el = document.getElementById(id);

            if (el.style.display === "none") {
                el.style.display = "block";
            } else {
                el.style.display = "none";
            }
        }
    </script>

    <script>
        document.getElementById("mappingForm").addEventListener("submit", function(e) {

            let payload = {
                Summary: {}, // ✅ ADD THIS
                Header_Mapping: [],
                Panzer_Color_Mapping: [],
                Positions_Mapping: []
            };

            // ================= SUMMARY =================
            payload.Summary = {
                Customer: document.getElementById("summary_customer").value,
                Order_ID: document.getElementById("summary_order_id").value
            };

            // ================= HEADER =================
            document.querySelectorAll(".header-row").forEach(row => {
                payload.Header_Mapping.push({
                    Col: parseInt(row.querySelector(".col").value),
                    Field: row.querySelector(".field").value,
                    Logic: row.querySelector(".logic").value,
                    Type: row.querySelector(".type").value,
                    Output: row.querySelector(".output").value
                });
            });

            // ================= COLOR =================
            document.querySelectorAll(".color-row").forEach(row => {
                payload.Panzer_Color_Mapping.push({
                    Input_Contains: row.querySelector(".input").value,
                    Output_Result: row.querySelector(".output").value
                });
            });

            // ================= POSITIONS =================
            let positionsMap = {};

            document.querySelectorAll(".position-row").forEach(row => {

                let positionId = row.getAttribute("data-position");

                if (!positionsMap[positionId]) {
                    positionsMap[positionId] = {
                        Position_ID: positionId,
                        Mapping: []
                    };
                }

                positionsMap[positionId].Mapping.push({
                    Col: parseInt(row.querySelector(".col").value),
                    Field: row.querySelector(".field").value,
                    Logic: row.querySelector(".logic").value,
                    Type: row.querySelector(".type").value,
                    Output: row.querySelector(".output").value
                });
            });

            payload.Positions_Mapping = Object.values(positionsMap);

            // ================= FINAL =================
            document.getElementById("payload").value = JSON.stringify(payload);

        });
    </script>

</x-layouts::app>
