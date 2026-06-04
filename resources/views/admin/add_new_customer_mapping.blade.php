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

        <x-stage active="1" />

        <div class="container-fluid">
            <div class="page-title">

                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Work area</h3>
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

                                    {{-- <li>
                                        <span class="tab-link" data-tab="map-history"
                                            style="cursor:pointer; font-weight:700;">
                                            History
                                        </span>
                                    </li> --}}

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
                            <h4>Create New Rules.</h4>
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">

                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- @php
                            dd($data);
                        @endphp --}}

                        <form id="mappingForm" action="{{ route('admin.new.rule') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf

                            <input type="hidden" name="payload" id="payload">
                            <!-- <input type="text"> -->


                            <div style="display:flex; gap:10px; align-items:center; width:60%; padding:20px">
                                <label><strong>Upload a [name] file.</strong></label>
                                <input type="file" class="form-control" name="file" id="pdfInput"
                                    style="max-width:300px;">
                            </div>



                            <div class="row p-3">

                                <label><strong>Work area: Enter the details for the new rule.</strong></label>


                                <div class="col-md-6 mb-3">
                                    <label><strong>Customer</strong></label>
                                    <input type="text" id="summary_customer" class="form-control"
                                        placeholder="Enter customer name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label><strong>Order ID</strong></label>
                                    <input type="text" id="summary_order_id" class="form-control"
                                        placeholder="Enter order ID">
                                </div>

                            </div>

                            <!-- Header -->

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
                                        style="display:none; border:1px solid #ddd; border-radius:10px; padding:15px; background:#fafafa;">

                                        <div
                                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">

                                            <strong id="pdfFileName" style="color:#222;"></strong>

                                            <button type="button" id="removePdfBtn"
                                                style="background:#dc3545; color:#fff; border:none; padding:7px 12px; border-radius:6px; cursor:pointer;">
                                                Delete PDF
                                            </button>
                                        </div>

                                        <iframe id="pdfViewer" src=""
                                            style="width:100%; height:1000px; border:1px solid #ccc; border-radius:8px; background:#fff;">
                                        </iframe>
                                    </div>

                                </div>

                                <div class="col-lg-12" id="mappingColumn">

                                    <div class="card-body tab-content active" id="header">
                                         <button type="button" onclick="addHeaderRow()"
                                            style="background:#28a745;color:#fff;border:none;padding:8px 14px;border-radius:6px;margin-bottom:15px;cursor:pointer;font-size:18px;">
                                            + Add Header 
                                        </button>

                                        <table class="table table-bordered" id="headerMappingTable">
                                            <thead>
                                                <tr>
                                                    <th>Col</th>
                                                    <th>Field</th>
                                                    <th>Type</th>
                                                    <th>Logic</th>
                                                    <th style="display:none;">Output</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>

                                            <tbody id="headerMappingBody">
                                                {{-- Rows will be added here --}}
                                            </tbody>
                                        </table>
                                    </div>



                                    <div class="card-body tab-content" id="map-body" style="display:none;">

                                         <button type="button" onclick="addPositionBlock()"
                                            style="background:#28a745;color:#fff;border:none;padding:8px 14px;border-radius:6px;margin-bottom:15px;cursor:pointer;font-size:18px;">
                                            + Add Position
                                        </button>

                                        <div id="positionsContainer"></div>


                                        {{-- @foreach ($data['Positions_Mapping'] as $pIndex => $position)
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
                                                            <th style="display:none;">Output</th>
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

                                                                <td><input class="field"
                                                                        value="{{ $item['Field'] }}"></td>
                                                                <td><input class="logic"
                                                                        value="{{ $item['Logic'] }}"></td>
                                                                <td style="display:none;"><input class="output"
                                                                        type="hidden" value="{{ $item['Output'] }}">
                                                                </td>
                                                                <td><input type="hidden" class="type"
                                                                        value="{{ $item['Type'] }}"></td>
                                                                <td><input class="output"
                                                                        value="{{ $item['Output'] }}"></td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        @endforeach --}}
                                    </div>


                                    <div class="card-body tab-content" id="map-color" style="display:none;">

                                            <button type="button" onclick="addColorRow()"
                                                style="background:#28a745;color:#fff;border:none;padding:8px 14px;border-radius:6px;margin-bottom:15px;cursor:pointer;font-size:18px;">
                                                + Add Color
                                            </button>

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Input Contains</th>
                                                        <th>Output Result</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="colorMappingBody">
                                                    {{-- Color rows added here --}}
                                                </tbody>
                                            </table>

                                        {{-- <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Input Contains</th>
                                                    <th style="display:none;">Output Result</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data['Panzer_Color_Mapping'] as $item)
                                                    <tr class="color-row">
                                                        <td>
                                                            <input class="form-control input"
                                                                value="{{ $item['Input_Contains'] }}">
                                                        </td>
                                                        <td style="display:none;">
                                                            <input type="hidden" class="form-control output"
                                                                value="{{ $item['Output_Result'] }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table> --}}
                                    </div>


                                   


                                    <!-- ================= SUBMIT ================= -->
                                    <div style="padding:20px; text-align:right;">
                                        <button type="submit" class="btn btn-success">
                                            Send New Rule configuration
                                        </button>
                                    </div>

                                </div>
                            </div>


                        </form>

                        <!-- Container-fluid Ends-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let headerIndex = 0;
         let positionIndex = 0;
            let colorIndex = 0;

            function addPositionBlock() {
                let container = document.getElementById('positionsContainer');

                let currentPositionIndex = positionIndex;

                let block = document.createElement('div');
                block.id = `position_block_${currentPositionIndex}`;
                block.style = 'margin-bottom:20px;border:1px solid #ddd;border-radius:6px;padding:15px;background:#fafafa;';

                block.innerHTML = `
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
                        <input class="form-control"
                            name="Positions_Mapping[${currentPositionIndex}][Position_ID]"
                            value="Sample"
                            placeholder="Position ID"
                            style="max-width:250px;">

                        <div>
                            <button type="button" onclick="addPositionRow(${currentPositionIndex})"
                                style="background:#28a745;color:#fff;border:none;padding:6px 10px;border-radius:5px;cursor:pointer;">
                                + Add Row
                            </button>

                            <button type="button" onclick="document.getElementById('position_block_${currentPositionIndex}').remove()"
                                style="background:#dc3545;color:#fff;border:none;padding:6px 10px;border-radius:5px;cursor:pointer;">
                                Remove Position
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Col</th>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Logic</th>
                                <th style="display:none;">Output</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="position_mapping_body_${currentPositionIndex}">
                            {{-- Position rows added here --}}
                        </tbody>
                    </table>
                `;

                container.appendChild(block);

                addPositionRow(currentPositionIndex);

                positionIndex++;
            }

            function addPositionRow(posIndex) {
                let tbody = document.getElementById(`position_mapping_body_${posIndex}`);
                let rowIndex = tbody.children.length;

                let row = document.createElement('tr');
                row.className = 'position-row';

                row.innerHTML = `
                    <td>
                        <input class="form-control col"
                            name="Positions_Mapping[${posIndex}][Mapping][${rowIndex}][Col]"
                            value="${rowIndex + 1}"
                            type="number">
                    </td>

                    <td>
                        <input class="form-control field"
                            name="Positions_Mapping[${posIndex}][Mapping][${rowIndex}][Field]"
                            placeholder="Field">
                    </td>

                    <td>
                        <select class="form-control type"
                            name="Positions_Mapping[${posIndex}][Mapping][${rowIndex}][Type]">
                            <option value="D">D - Default</option>
                            <option value="T">T - Text Logic</option>
                            <option value="E">E - Empty</option>
                        </select>
                    </td>

                    <td>
                        <input class="form-control logic"
                            name="Positions_Mapping[${posIndex}][Mapping][${rowIndex}][Logic]"
                            placeholder="Logic">
                    </td>

                    <td style="display:none;">
                        <input class="form-control output"
                            name="Positions_Mapping[${posIndex}][Mapping][${rowIndex}][Output]"
                            type="hidden"
                            value="">
                    </td>

                    <td>
                        <button type="button" onclick="this.closest('tr').remove()"
                            style="background:#dc3545;color:#fff;border:none;padding:6px 10px;border-radius:5px;cursor:pointer;">
                            Remove
                        </button>
                    </td>
                `;

                tbody.appendChild(row);
            }

            function addColorRow() {
                let tbody = document.getElementById('colorMappingBody');
                let currentColorIndex = colorIndex;

                let row = document.createElement('tr');
                row.className = 'color-row';

                row.innerHTML = `
                    <td>
                        <input class="form-control input"
                            name="Panzer_Color_Mapping[${currentColorIndex}][Input_Contains]"
                            placeholder="anthrazit">
                    </td>

                    <td>
                        <input class="form-control output"
                            name="Panzer_Color_Mapping[${currentColorIndex}][Output_Result]"
                            placeholder="Anthrazit">
                    </td>

                    <td>
                        <button type="button" onclick="this.closest('tr').remove()"
                            style="background:#dc3545;color:#fff;border:none;padding:6px 10px;border-radius:5px;cursor:pointer;">
                            Remove
                        </button>
                    </td>
                `;

                tbody.appendChild(row);

                colorIndex++;
            }

            function addHeaderRow() {
                headerIndex++;

                let tbody = document.getElementById('headerMappingBody');

                let row = document.createElement('tr');
                row.className = 'header-row';

                row.innerHTML = `
                    <td>
                        <input class="form-control col" 
                            name="Header_Mapping[${headerIndex}][Col]" 
                            value="${headerIndex}" 
                            type="number">
                    </td>

                    <td>
                        <input class="form-control field" yp
                            name="Header_Mapping[${headerIndex}][Field]" 
                            placeholder="Field">
                    </td>

                    <td>
                        <select class="form-control type" 
                            name="Header_Mapping[${headerIndex}][Type]">
                            <option value="D">D - Default</option>
                            <option value="T">T - Text Logic</option>
                            <option value="E">E - Empty</option>
                        </select>
                    </td>

                    <td>
                        <input class="form-control logic" 
                            name="Header_Mapping[${headerIndex}][Logic]" 
                            placeholder="Logic">
                    </td>

                    <td style="display:none;">
                        <input class="form-control output" 
                            name="Header_Mapping[${headerIndex}][Output]" 
                            type="hidden" 
                            value="">
                    </td>

                    <td>
                        <button type="button" onclick="this.closest('tr').remove()"
                            style="background:#dc3545;color:#fff;border:none;padding:6px 10px;border-radius:5px;cursor:pointer;">
                            Remove
                        </button>
                    </td>
                `;

                tbody.appendChild(row);
            }
    </script>

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
                Positions_Mapping: [],
                History: []
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

    <script>
        const pdfInput = document.getElementById('pdfInput');
        const pdfPreviewBox = document.getElementById('pdfPreviewBox');
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFileName = document.getElementById('pdfFileName');
        const removePdfBtn = document.getElementById('removePdfBtn');
        const mappingColumn = document.getElementById('mappingColumn');

        let pdfObjectUrl = null;

        pdfInput.addEventListener('change', function() {
            const file = this.files[0];

            if (!file) {
                return;
            }

            if (file.type !== 'application/pdf') {
                alert('Please upload only a PDF file.');
                this.value = '';
                return;
            }

            if (pdfObjectUrl) {
                URL.revokeObjectURL(pdfObjectUrl);
            }

            pdfObjectUrl = URL.createObjectURL(file);

            pdfViewer.src = pdfObjectUrl;
            pdfFileName.textContent = file.name;
            pdfPreviewBox.style.display = 'block';
            mappingColumn.classList.remove('col-lg-12');
            mappingColumn.classList.add('col-lg-6');
        });

        removePdfBtn.addEventListener('click', function() {
            if (pdfObjectUrl) {
                URL.revokeObjectURL(pdfObjectUrl);
                pdfObjectUrl = null;
            }

            pdfInput.value = '';
            pdfViewer.src = '';
            pdfFileName.textContent = '';
            pdfPreviewBox.style.display = 'none';
            mappingColumn.classList.remove('col-lg-6');
            mappingColumn.classList.add('col-lg-12');
        });
    </script>

</x-layouts::app>
