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

    <div class="page-body" id="pageBody" style="padding-top: 120px;">

        {{-- <x-stage active="1" /> --}}

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Work-area (Create Configuration).</h4>
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">

                                    </a>
                                </div>
                            </div>
                        </div>

                        <form id="mappingForm" action="{{ route('admin.direct-process-2', ['id' => $data?->id]) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf

                            <input type="hidden" name="payload" id="payload">

                            <input type="hidden" id="summary_order_id" value="N/A" class="form-control"
                                placeholder="Enter order ID">
                            <input type="hidden" id="summary_customer" value={{ $data?->config_name }}
                                class="form-control" placeholder="Enter customer name">

                            <!-- =================== HEADER / BODY SWITCH =================== -->
                            <div class="d-flex justify-content-center my-4">

                                {{-- <div class="btn-group shadow-sm" role="group" aria-label="Section Switch">

                                    <input type="radio" class="btn-check" name="mappingSection" id="switchHeader" autocomplete="off">

                                    <label
                                        class="btn"
                                        for="switchHeader"
                                        style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                        onmouseover="this.style.background='#28a745'"
                                        onmouseout="if(!document.getElementById('switchHeader').checked)this.style.background='#000'"
                                    >
                                        <i class="fa fa-list-alt"></i>
                                        <span>Header</span>
                                    </label>


                                    <input type="radio" class="btn-check" name="mappingSection" id="switchBody" autocomplete="off">

                                    <label
                                        class="btn"
                                        for="switchBody"
                                        style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                        onmouseover="this.style.background='#28a745'"
                                        onmouseout="if(!document.getElementById('switchBody').checked)this.style.background='#000'"
                                    >
                                        <i class="fa fa-table"></i>
                                        <span>Body</span>
                                    </label>

                                    

                                </div> --}}

                                <div class="btn-group shadow-sm" role="group" aria-label="Section Switch"
                                    style="background:#f1f1f1; padding:4px; border-radius:28px; gap:4px;">

                                    <input type="radio" class="btn-check" name="mappingSection" id="switchHeader"
                                        autocomplete="off">

                                    <label class="btn" for="switchHeader"
                                        style="height:42px; min-width:125px; padding:0 20px; border-radius:22px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:8px; font-size:14px; font-weight:500; cursor:pointer; transition:all .25s ease;"
                                        onmouseover="if(!document.getElementById('switchHeader').checked){this.style.background='#28a745';this.style.color='#000';}"
                                        onmouseout="if(!document.getElementById('switchHeader').checked){this.style.background='#000';this.style.color='#fff';}">
                                        <i class="fa fa-list-alt"></i>
                                        <span>Header</span>
                                    </label>


                                    <input type="radio" class="btn-check" name="mappingSection" id="switchBody"
                                        autocomplete="off">

                                    <label class="btn" for="switchBody"
                                        style="height:42px; min-width:125px; padding:0 20px; border-radius:22px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:8px; font-size:14px; font-weight:500; cursor:pointer; transition:all .25s ease;"
                                        onmouseover="if(!document.getElementById('switchBody').checked){this.style.background='#28a745';this.style.color='#000';}"
                                        onmouseout="if(!document.getElementById('switchBody').checked){this.style.background='#000';this.style.color='#fff';}">
                                        <i class="fa fa-table"></i>
                                        <span>Body</span>
                                    </label>

                                </div>

                                <script>
                                    document.querySelectorAll('input[name="mappingSection"]').forEach(function(radio) {

                                        radio.addEventListener('change', function() {

                                            document.querySelectorAll('label[for^="switch"]').forEach(function(label) {

                                                if (document.getElementById(label.htmlFor).checked) {
                                                    label.style.background = '#28a745';
                                                    label.style.color = '#000';
                                                } else {
                                                    label.style.background = '#000';
                                                    label.style.color = '#fff';
                                                }

                                            });

                                        });

                                    });
                                </script>

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
                                        style="display:none; border:1px solid #ddd; border-radius:10px; padding:15px; background:#fafafa;">

                                        <div
                                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">

                                            <strong id="pdfFileName" style="color:#222;"></strong>

                                            {{-- <button type="button" id="removePdfBtn"
                                                style="background:#dc3545; color:#fff; border:none; padding:7px 12px; border-radius:6px; cursor:pointer;">
                                                Delete PDF
                                            </button> --}}

                                            <button type="button" id="removePdfBtn" {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#dc3545'; this.querySelector('.plus-icon').style.transform='rotate(180deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-trash plus-icon" style="transition:transform .3s ease;">
                                                </i>

                                                <span>Delete</span>

                                            </button>
                                        </div>

                                        {{-- <iframe id="pdfViewer" src=""
                                            style="width:100%; height:1000px; border:1px solid #ccc; border-radius:8px; background:#fff;">
                                        </iframe> --}}

                                        <div id="pdfViewer"
                                            style="
                                                width:100%;
                                                height:1000px;
                                                overflow:auto;
                                                border:1px solid #ddd;
                                                background:white;">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12" id="mappingColumn">


                                    {{-- // This is the Header Mapping Section --}}
                                    <div class="card-body tab-content active" id="header">

                                        <div class="d-flex justify-content-end align-items-center mb-3">

                                            {{-- ADD a new header here --}}



                                            <button type="submit" name="action" value="save" {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(360deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-download plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                <span>Save</span>

                                            </button>

                                        </div>

                                        <div style="width:100%;overflow-x:auto;overflow-y:hidden;">

                                            <table class="table table-bordered table-hover align-middle"
                                                id="headerMappingTable"
                                                style="min-width:1700px;width:100%;table-layout:auto;">

                                                <thead>

                                                    <tr>

                                                        <th style="width:90px;">Col</th>

                                                        <th style="width:250px;">Field</th>

                                                        <th style="min-width:1100px;">Logic</th>

                                                        <th style="width:140px;">Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody id="headerMappingBody">
                                                    {{-- Header rows will be added here --}}
                                                </tbody>

                                            </table>





                                        </div>
                                        {{-- //End buttons --}}
                                        <div class="d-flex justify-content-between"
                                            style="padding:20px; text-align:right;">

                                            <button type="button" onclick="addHeaderRow()" {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-plus plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                {{-- <span></span> --}}

                                            </button>




                                            <button type="submit" name="action" value="process"
                                                {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(270deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-send plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                <span>Configure</span>

                                            </button>


                                        </div>

                                    </div>

                                    {{-- // This is the Body Mapping Section --}}
                                    <div class="card-body tab-content" id="map-body" style="display:none;">

                                        <div class="d-flex justify-content-end align-items-center mb-3">

                                            {{-- <button type="button" onclick="addPositionBlock()"
                                                class="btn btn-success">

                                                <i class="fa fa-plus me-1"></i>
                                                Add Position

                                            </button> --}}



                                            <button type="submit" name="action" value="save"
                                                {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(360deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-download plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                <span>Save</span>

                                            </button>

                                        </div>

                                        <div id="positionsContainer"></div>


                                        <div class="d-flex justify-content-between"
                                            style="padding:20px; text-align:right;">

                                            <button type="button" onclick="addPositionBlock()" {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-plus plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                {{-- <span>Add NEW Position</span> --}}

                                            </button>


                                            <button type="submit" name="action" value="process"
                                                {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(270deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-send plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                <span>Configure</span>

                                            </button>


                                        </div>

                                    </div>



                                    <!-- ================= SUBMIT ================= -->


                                    {{-- <div style="padding:20px; text-align:right;">
                                        <button type="submit" name="action" value="save"
                                            class="btn btn-success">
                                            Save
                                        </button>
                                    </div> --}}

                                </div>
                            </div>




                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- =================== HEADER / BODY SWITCH =================== -->
    {{-- <div class="d-flex justify-content-center my-4">

            <div class="btn-group shadow-sm" role="group" aria-label="Section Switch">

                <input type="radio"
                    class="btn-check"
                    name="mappingSection"
                    id="switchHeader"
                    autocomplete="off"
                    checked>

                <label class="btn btn-outline-success px-5 py-2"
                    for="switchHeader">
                    <i class="fa fa-list-alt me-2"></i>
                    Header
                </label>

                <input type="radio"
                    class="btn-check"
                    name="mappingSection"
                    id="switchBody"
                    autocomplete="off">

                <label class="btn btn-outline-success px-5 py-2"
                    for="switchBody">
                    <i class="fa fa-table me-2"></i>
                    Body
                </label>

            </div>

        </div> --}}


    {{-- </div> --}}

    <div class="modal fade" id="logicManagerModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-xl modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">

                        <i class="fa fa-cogs me-2"></i>

                        Verb Manager

                    </h4>

                    <button class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <!-- LEFT PANEL -->

                        <div class="col-md-4">

                            <div class="card shadow-sm">

                                <div class="card-header">
                                    <strong>Add New Logic</strong>
                                </div>

                                <div class="card-body">

                                    <form action="{{ route('admin.verb.store') }}" method="POST">

                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Type <span>*</span></label>

                                            <select class="form-control" name="type" required>
                                                <option value="">Select Type</option>
                                                <option value="Operator"
                                                    {{ old('type') == 'Operator' ? 'selected' : '' }}>
                                                    Operator
                                                </option>
                                                <option value="Action" {{ old('type') == 'Action' ? 'selected' : '' }}>
                                                    Action
                                                </option>
                                            </select>

                                            @error('type')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Name <span>*</span></label>

                                            <input type="text" name="verb" class="form-control"
                                                placeholder="Contains" value="{{ old('verb') }}" required>

                                            @error('verb')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Meaning <span style="font-style: italic">This is
                                                    not neccessary and can be ignored.</span></label>

                                            <textarea name="meaning" class="form-control" rows="3" placeholder="Describe what this logic does...">{{ old('meaning') }}</textarea>

                                            @error('meaning')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success w-100">
                                            Save
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                        <!-- RIGHT PANEL -->

                        <div class="col-md-8">

                            <div class="card shadow-sm">

                                <div class="card-header">

                                    <strong>Existing Logic</strong>

                                </div>

                                <div class="card-body p-0">

                                    <table class="table table-bordered table-hover mb-0">

                                        <thead>

                                            <tr>

                                                <th width="60">

                                                    S/N

                                                </th>

                                                <th>

                                                    Type

                                                </th>

                                                <th>

                                                    Name

                                                </th>

                                                <th>

                                                    Meaning

                                                </th>

                                                <th>

                                                    Creator

                                                </th>

                                                <th width="170">

                                                    Action

                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            @forelse($verbs as $verb)
                                                <tr id="row-{{ $verb->id }}">

                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        <span class="view type-text">{{ $verb->type }}</span>

                                                        <select name="type" form="update-form-{{ $verb->id }}"
                                                            class="form-control form-control-sm edit type-input d-none"
                                                            style="border:1px solid #000000; outline:none;"
                                                            onfocus="this.style.boxShadow='0 0 0 .25rem rgba(13,110,253,.25)';"
                                                            onblur="this.style.boxShadow='none';">

                                                            <option value="Operator"
                                                                {{ $verb->type == 'Operator' ? 'selected' : '' }}>
                                                                Operator
                                                            </option>
                                                            <option value="Action"
                                                                {{ $verb->type == 'Action' ? 'selected' : '' }}>Action
                                                            </option>

                                                        </select>
                                                    </td>

                                                    <td>
                                                        <span class="view verb-text">{{ $verb->verb ?? '-' }}</span>

                                                        <input type="text" name="verb"
                                                            form="update-form-{{ $verb->id }}"
                                                            class="form-control form-control-sm edit verb-input d-none"
                                                            value="{{ $verb->verb }}"
                                                            style="border:1px solid #000000; outline:none;"
                                                            onfocus="this.style.boxShadow='0 0 0 .25rem rgba(13,110,253,.25)';"
                                                            onblur="this.style.boxShadow='none';">
                                                    </td>

                                                    <td>
                                                        <span
                                                            class="view meaning-text">{{ $verb->meaning ?? '-' }}</span>

                                                        <input type="text" name="meaning"
                                                            form="update-form-{{ $verb->id }}"
                                                            class="form-control form-control-sm edit meaning-input d-none"
                                                            value="{{ $verb->meaning }}"
                                                            style="border:1px solid #000000; outline:none;"
                                                            onfocus="this.style.boxShadow='0 0 0 .25rem rgba(13,110,253,.25)';"
                                                            onblur="this.style.boxShadow='none';">
                                                    </td>

                                                    <td>
                                                        {{ optional($verb->user)->name ?? ($verb->user_id ?? 'Unknown') }}
                                                    </td>

                                                    <td>

                                                        <form id="update-form-{{ $verb->id }}"
                                                            action="{{ route('admin.verb.edit', $verb->id) }}"
                                                            method="POST" class="d-inline">

                                                            @csrf

                                                            <button type="button"
                                                                class="btn btn-warning btn-sm edit-btn"
                                                                data-id="{{ $verb->id }}">

                                                                <i class="fas fa-edit"></i>

                                                            </button>

                                                            <button type="submit"
                                                                class="btn btn-success btn-sm save-btn d-none">

                                                                <i class="fas fa-check"></i>

                                                            </button>

                                                        </form>

                                                        <form action="{{ route('admin.verb.destroy', $verb->id) }}"
                                                            method="POST" class="d-inline">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>

                                                        </form>

                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted py-4">
                                                        No verbs have been added yet.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>



                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">

                        Close

                    </button>

                </div>

            </div>

        </div>

    </div>

    <script>
        let headerIndex = 0;
        let positionIndex = 0;


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
                                            style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                            onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(270deg) scale(1.15)'"
                                            onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                            <i class="fa fa-plus plus-icon" style="transition:transform .3s ease;">
                                            </i>

                                            <span>Add row</span>

                            </button>

                            
                        </div>
                    </div>

                    <div style="width:100%;overflow-x:auto;overflow-y:hidden;">

                        <table
                            class="table table-bordered table-hover align-middle"
                            style="min-width:1700px;width:100%;table-layout:auto;">

                            <thead>

                                <tr>

                                    <th style="width:90px;">Col</th>

                                    <th style="width:250px;">Field</th>

                                    <th style="min-width:1100px;">Logic</th>

                                    <th style="width:140px;">Action</th>

                                </tr>

                            </thead>

                            <tbody id="position_mapping_body_${currentPositionIndex}">
                                {{-- Position rows added here --}}
                            </tbody>

                        </table>

                    </div>
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
            row.setAttribute('data-position', posIndex);

            row.innerHTML = `

                        <td style="width:80px;">
                            <input class="form-control col"
                                value="${rowIndex + 1}"
                                type="number">
                        </td>

                        <td style="width:220px;">

                            <div class="mb-2"
                                style="font-size:11px;color:#6c757d;background:#f8f9fa;border-left:3px solid #0d6efd;padding:6px 8px;border-radius:4px;">

                                <i class="fa fa-info-circle me-1"></i>

                                <strong>Tip:</strong> Click this field first, then highlight the text in the PDF. The selected text will automatically be inserted here.

                            </div>

                            <input 
                                class="form-control field"
                                name="Positions_Mapping[${posIndex}][Mapping][${rowIndex}][Field]"
                                placeholder="Field to extract">

                        </td>

                        <td>

                            <div class="ifs-container">

                                <div class="if-then-row gap-2 mb-3"
                                    style="border:1px solid #dee2e6;border-radius:8px;padding:15px;background:#fafafa;">

                                    <div style="font-weight:600;color:#444;margin-bottom:8px;">
                                        IF (Condition)
                                    </div>

                                    <div class="mt-2 p-2"
                                                style="background:#f8f9fa;border-left:3px solid #0d6efd;border-radius:4px;">

                                                <div style="font-size:12px;">
                                                    <strong>How IF works</strong>
                                                </div>

                                                <div style="font-size:12px;color:#555;">
                                                    Logic is built as:
                                                    <code>IF Field + OPERATOR + VALUE</code>
                                                </div>

                                                <div style="font-size:12px;color:#555;margin-top:4px;">
                                                    Example:
                                                    <code>IF "Rolladen" + CONTAINS + "0011"</code>
                                                </div>

                                    </div>

                                    <div class="row g-3 align-items-end">

                                        <div class="col-auto">

                                            <div class="form-control-plaintext fw-bold">
                                                IF
                                            </div>

                                        </div>

                                        <div class="col-auto">

                                            <label class="form-label fw-bold mb-1">
                                                FIELD
                                            </label>

                                            <div>
                                                <span 
                                                
                                                class="other_field" style="background:#f8f9fa;border:1px solid #dee2e6;padding:8px;border-radius:4px;">
                                                    The field value displayed here
                                                </span>
                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <label class="form-label fw-bold mb-1">
                                                Verb - Operator
                                            </label>

                                            <select class="form-control operator">
                                                @foreach ($verbs->where('type', 'Operator') as $verb)
                                                    <option value="{{ $verb->verb }}">
                                                        {{ $verb->verb }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">

                                            <label class="form-label fw-bold mb-1">
                                                Value
                                            </label>

                                            <input
                                                class="form-control if"
                                                placeholder="0016, 0017, Rolladen">

                                        </div>

                                    </div>

                                    <div style="font-weight:600;color:#444;margin:15px 0 8px;">
                                        THEN (Action)
                                    </div>

                                    <div class="mt-2 p-2"
                                                style="background:#f8f9fa;border-left:3px solid #0d6efd;border-radius:4px;">

                                                <div style="font-size:12px;">
                                                    <strong>How THEN works</strong>
                                                </div>

                                                <div style="font-size:12px;color:#555;">
                                                    Logic is built as:
                                                    <code>THEN + ACTION + VALUE</code>
                                                </div>

                                                <div style="font-size:12px;color:#555;margin-top:4px;">
                                                    Example:
                                                    <code>THEN + PUT + "0011"</code>
                                                </div>

                                    </div>

                                    <div class="row g-3 align-items-end">

                                        <div class="col-auto">

                                            

                                            <div class="form-control-plaintext fw-bold">
                                                THEN
                                            </div>

                                        </div>

                                        

                                        <div class="col-md-3">

                                            <label class="form-label fw-bold mb-1">
                                                Verb - Action
                                            </label>

                                            <select class="form-control action">
                                                @foreach ($verbs->where('type', 'Action') as $verb)
                                                    <option value="{{ $verb->verb }}">
                                                        {{ $verb->verb }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">

                                            <label class="form-label fw-bold mb-1">
                                                Value
                                            </label>

                                            <input
                                                class="form-control then"
                                                placeholder="0011, +10, ABC123">

                                        </div>

                                    </div>

                                    <div class="text-end mt-3">

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="removeIfThen(this)">
                                           <i class="fas fa-trash"></i>
                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="d-flex gap-2 mt-3">

                                <button
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    onclick="addIfThen(this)">
                                    + IF/THEN
                                </button>

                                <button
                                    type="button"
                                    class="btn btn-warning btn-sm"
                                    onclick="addElseField(this)">
                                    + Else
                                </button>

                            </div>

                            <div class="else-container mt-3"></div>

                        </td>

                        <td style="width:110px;vertical-align:top;">

                            <button
                                type="button"
                                onclick="this.closest('tr').remove()"
                                class="btn btn-danger btn-sm w-100">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>

                    `;

            tbody.appendChild(row);
        }

        function addHeaderRow() {

            headerIndex++;

            let tbody = document.getElementById('headerMappingBody');

            let row = document.createElement('tr');
            row.className = 'header-row';

            row.innerHTML = `
                    <td>
                        <input class="form-control col"
                            value="${headerIndex}"
                            type="number">
                    </td>

                    <td style="width:220px;">

                            <div class="mb-2"
                                style="font-size:11px;color:#6c757d;background:#f8f9fa;border-left:3px solid #0d6efd;padding:6px 8px;border-radius:4px;">

                                <i class="fa fa-info-circle me-1"></i>

                                <strong>Tip:</strong> Click this field first, then highlight the text in the PDF. The selected text will automatically be inserted here.

                            </div>
                        <input class="form-control field"
                            name="Header_Mapping[${headerIndex}][Field]"
                            placeholder="Field to extract">
                    </td>

                    <td>

                            <div class="ifs-container">

                                <div class="if-then-row gap-2 mb-3"
                                    style="border:1px solid #dee2e6;border-radius:8px;padding:15px;background:#fafafa;">
                                    <hr>

                                    <div style="font-weight:600;color:#444;margin-bottom:8px;">
                                        IF (Condition)
                                    </div>
                                    <div class="mt-2 p-2"
                                                style="background:#f8f9fa;border-left:3px solid #0d6efd;border-radius:4px;">

                                                <div style="font-size:12px;">
                                                    <strong>How IF works</strong>
                                                </div>

                                                <div style="font-size:12px;color:#555;">
                                                    Logic is built as:
                                                    <code>IF + FIELD + OPERATOR + VALUE</code>
                                                </div>

                                                <div style="font-size:12px;color:#555;margin-top:4px;">
                                                    Example:
                                                    <code>IF + "Rolladen" + CONTAINS + "0011"</code>
                                                </div>

                                    </div>
                                    <div class="row g-3 align-items-end">

                                       
                                        <div class="col-auto">

                                            <div class="form-control-plaintext fw-bold">
                                                IF
                                            </div>

                                        </div>
                                             

                                        <div class="col-auto">

                                            <label class="form-label fw-bold mb-1">
                                                FIELD
                                            </label>

                                            <div>
                                                <span 
                                                
                                                class="other_field" style="background:#f8f9fa;border:1px solid #dee2e6;padding:8px;border-radius:4px;">
                                                    The field value displayed here
                                                </span>
                                            </div>

                                        </div>

                                      

                                        <div class="col-md-3">

                                            <label class="form-label fw-bold mb-1">
                                               Verb- Operator
                                            </label>

                                            <select class="form-control operator">
                                                @foreach ($verbs->where('type', 'Operator') as $verb)
                                                    <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">

                                            <label class="form-label fw-bold mb-1">
                                                VALUE
                                            </label>

                                            <input
                                                class="form-control if"
                                                placeholder="0016, 0017, Rolladen">

                                        </div>

                                    </div>

                                    <hr>

                                    <div style="font-weight:600;color:#444;margin:15px 0 8px;">
                                        THEN (Action)
                                    </div>

                                    <div class="mt-2 p-2"
                                                style="background:#f8f9fa;border-left:3px solid #0d6efd;border-radius:4px;">

                                                <div style="font-size:12px;">
                                                    <strong>How THEN works</strong>
                                                </div>

                                                <div style="font-size:12px;color:#555;">
                                                    Logic is built as:
                                                    <code>THEN + ACTION + VALUE</code>
                                                </div>

                                                <div style="font-size:12px;color:#555;margin-top:4px;">
                                                    Example:
                                                    <code>THEN + PUT + "0011"</code>
                                                </div>

                                    </div>

                                    <div class="row g-3 align-items-end">

                                        <div class="col-auto">

                                            <div class="form-control-plaintext fw-bold">
                                                THEN
                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <label class="form-label fw-bold mb-1">
                                                Verb- Action
                                            </label>

                                            <select class="form-control action">
                                                @foreach ($verbs->where('type', 'Action') as $verb)
                                                    <option value="{{ $verb->verb }}">
                                                        {{ $verb->verb }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col">

                                            <label class="form-label fw-bold mb-1">
                                                Value
                                            </label>

                                            <input
                                                class="form-control then"
                                                placeholder="e.g. 0011, +10, ABC123">

                                        </div>

                                    </div>

                                    <hr>

                                </div>

                            </div>

                            <div class="d-flex gap-2 mt-3">

                                

                                <button type="button"  onclick="addIfThen(this)"
                                               
                                    style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                    onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(180deg) scale(1.15)'"
                                    onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                    <i class="fa fa-plus plus-icon"
                                        style="transition:transform .3s ease;">
                                    </i>
                                    
                                    IF/THEN


                                </button>

                                <button type="button"  onclick="addElseField(this)"
                                               
                                    style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                    onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(180deg) scale(1.15)'"
                                    onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                    <i class="fa fa-plus plus-icon"
                                        style="transition:transform .3s ease;">
                                    </i>
                                    
                                    ELSE


                                </button>

                               

                            </div>

                            <div class="else-container mt-3"></div>

                        </td>

                        <td style="width:110px;vertical-align:top;">

                            

                             <button type="button"  onclick="this.closest('tr').remove()"
                                               
                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                onmouseover="this.style.background='#dc3545'; this.querySelector('.plus-icon').style.transform='rotate(180deg) scale(1.15)'"
                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-trash plus-icon"
                                    style="transition:transform .3s ease;">
                                </i>

                            </button>

                        </td>
                `;

            tbody.appendChild(row);
        }

        function addIfThen(button) {

            const container = button
                .closest('td')
                .querySelector('.ifs-container');

            const row = document.createElement('div');

            row.className = 'if-then-row gap-2 mb-3';

            row.innerHTML = `

                    <div style="border:1px solid #dee2e6;border-radius:8px;padding:15px;background:#fafafa;">

                        <div style="font-weight:600;color:#444;margin-bottom:8px;">
                            Or (you can add more follow up conditions to the above IF/THEN conditions.)
                        </div>

                        <div class="d-flex gap-2 align-items-center mb-3">

                            <div class="col-auto">

                                <div class="form-control-plaintext fw-bold">
                                    OR IF
                                </div>

                            </div>

                            <div>
                                <span 
                                
                                class="" style="background:#f8f9fa;border:1px solid #dee2e6;padding:8px;border-radius:4px;">
                                    FIELD
                                </span>
                            </div>

                            <select class="form-control operator" style="max-width:180px;">
                                @foreach ($verbs->where('type', 'Operator') as $verb)
                                    <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                @endforeach
                            </select>

                            <input
                                class="form-control if"
                                placeholder="Enter value">

                        </div>

                        

                            

                        <div class="d-flex gap-2 align-items-center">

                            <div class="col-auto">

                                <div class="form-control-plaintext fw-bold">
                                    THEN
                                </div>

                            </div>

                            <select class="form-control action" style="max-width:180px;">
                                @foreach ($verbs->where('type', 'Action') as $verb)
                                    <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                @endforeach
                            </select>

                            <input
                                class="form-control then"
                                placeholder="eg +10, 1060">

                        </div>

                        <div class="d-flex justify-content-end mt-3">

                            
                            <button type="button"  onclick="removeIfThen(this)"
                                               
                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                onmouseover="this.style.background='#dc3545'; this.querySelector('.plus-icon').style.transform='rotate(180deg) scale(1.15)'"
                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-trash plus-icon"
                                    style="transition:transform .3s ease;">
                                </i>

                            </button>

                        </div>

                    </div>

                `;

            container.appendChild(row);
        }

        function removeIfThen(button) {

            const container = button
                .closest('.ifs-container');

            if (container.querySelectorAll('.if-then-row').length <= 1) {
                return;
            }

            button.closest('.if-then-row').remove();
        }

        function addElseField(button) {

            const row = button.closest('tr');

            const container = row.querySelector('.else-container');

            if (container.querySelector('.else')) {
                return;
            }

            container.innerHTML = `

                    <div style="border:1px solid #dee2e6;border-radius:8px;padding:15px;background:#fafafa;">

                        <div style="font-weight:600;color:#444;margin-bottom:8px;">
                            Else (This acts as a fallback if none of the IF/THEN conditions are met.)
                        </div>

                        <div class="gap-2 mt-2">


                            <input
                                class="form-control else"
                                placeholder="Else">



                            <div class="d-flex justify-content-end mt-3">

                                
                                <button type="button"  onclick="this.parentElement.remove()"
                                                
                                    style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                    onmouseover="this.style.background='#dc3545'; this.querySelector('.plus-icon').style.transform='rotate(180deg) scale(1.15)'"
                                    onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                    <i class="fa fa-trash plus-icon"
                                        style="transition:transform .3s ease;">
                                    </i>

                                </button>

                            </div>

                        </div>

                    </div>
                `;
        }
    </script>

    {{-- payload script --}}
    <script>
        document.getElementById("mappingForm").addEventListener("submit", function(e) {

            let payload = {
                Summary: {},
                Header_Mapping: [],
                Positions_Mapping: [],

            };

            payload.Summary = {
                Customer: document.getElementById("summary_customer").value,
                Order_ID: document.getElementById("summary_order_id").value
            };


            // HEADER
            document.querySelectorAll(".header-row").forEach(row => {

                const field = row.querySelector(".field")?.value || "";

                const ifs = [];

                row.querySelectorAll(".if-then-row").forEach(ifRow => {

                    const operator = ifRow.querySelector(".operator")?.value || "";
                    const ifValue = ifRow.querySelector(".if")?.value || "";
                    const action = ifRow.querySelector(".action")?.value || "";
                    const thenValue = ifRow.querySelector(".then")?.value || "";

                    ifs.push({

                        If: `${field} ${operator} ${ifValue}`.trim(),

                        Then: `${action} ${thenValue}`.trim()

                    });

                });

                payload.Header_Mapping.push({

                    Col: parseInt(row.querySelector(".col").value),

                    Field_name: field,

                    Ifs: ifs,

                    Else: row.querySelector(".else")?.value || ""

                });

            });


            // POSITIONS
            let positionsMap = {};

            document.querySelectorAll(".position-row").forEach(row => {

                let positionId = row.getAttribute("data-position");

                if (!positionsMap[positionId]) {

                    positionsMap[positionId] = {
                        Position_ID: positionId,
                        Mapping: []
                    };

                }

                const ifs = [];

                const field = row.querySelector(".field")?.value || "";

                row.querySelectorAll(".if-then-row").forEach(ifRow => {

                    const ifValue = ifRow.querySelector(".if")?.value || "";
                    const operator = ifRow.querySelector(".operator")?.value || "";
                    const action = ifRow.querySelector(".action")?.value || "";
                    const thenValue = ifRow.querySelector(".then")?.value || "";

                    ifs.push({

                        If: `${field} ${operator} ${ifValue}`.trim(),

                        Then: `${action} ${thenValue}`.trim()

                    });

                });

                positionsMap[positionId].Mapping.push({

                    Col: parseInt(row.querySelector(".col").value),

                    Field_name: row.querySelector(".field")?.value || "",

                    Ifs: ifs,

                    Else: row.querySelector(".else")?.value || "",



                });

            });

            payload.Positions_Mapping = Object.values(positionsMap);

            document.getElementById("payload").value =
                JSON.stringify(payload);

            console.log(payload);
        });
    </script>

    <script src="{{ asset('pdfjs/pdf.js') }}"></script>

    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "{{ asset('pdfjs/pdf.worker.js') }}";
    </script>


    {{-- ----------------------------- --}}
    {{-- --- PDF UPLOAD PREVIEW SCRIPT --- --}}
    {{-- --------------------------- --}}
    {{-- <script>
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

            pdfViewer.innerHTML = '';

            const loadingTask = pdfjsLib.getDocument(pdfObjectUrl);

            loadingTask.promise.then(async function(pdf) {

                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {

                    const page = await pdf.getPage(pageNum);

                    const viewport = page.getViewport({
                        scale: 1.3
                    });

                    const pageDiv = document.createElement("div");

                    pageDiv.style.position = "relative";
                    pageDiv.style.margin = "20px auto";
                    pageDiv.style.width = viewport.width + "px";

                    const canvas = document.createElement("canvas");

                    const context = canvas.getContext("2d");

                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    pageDiv.appendChild(canvas);

                    const textLayer = document.createElement("div");

                    textLayer.className = "textLayer";

                    textLayer.style.position = "absolute";
                    textLayer.style.left = "0";
                    textLayer.style.top = "0";
                    textLayer.style.width = canvas.width + "px";
                    textLayer.style.height = canvas.height + "px";

                    pageDiv.appendChild(textLayer);

                    pdfViewer.appendChild(pageDiv);

                    await page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise;

                    const textContent = await page.getTextContent();

                    pdfjsLib.renderTextLayer({

                        textContent,

                        container: textLayer,

                        viewport,

                        textDivs: []

                    });

                }

            });
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
    </script> --}}

    <script>
        const pdfPreviewBox = document.getElementById('pdfPreviewBox');
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFileName = document.getElementById('pdfFileName');
        const removePdfBtn = document.getElementById('removePdfBtn');
        const mappingColumn = document.getElementById('mappingColumn');

        // Existing PDF uploaded previously
        const pdfUrl = @json(asset('storage/' . $data->input_file_path));

        let pdfObjectUrl = null;


        // Load existing PDF when the page loads
        function loadPdf(pdfUrl) {

            pdfViewer.innerHTML = '';

            const loadingTask = pdfjsLib.getDocument(pdfUrl);

            loadingTask.promise.then(async function(pdf) {

                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {

                    const page = await pdf.getPage(pageNum);

                    const viewport = page.getViewport({
                        scale: 1.3
                    });

                    const pageDiv = document.createElement("div");

                    pageDiv.style.position = "relative";
                    pageDiv.style.margin = "20px auto";
                    pageDiv.style.width = viewport.width + "px";

                    const canvas = document.createElement("canvas");

                    const context = canvas.getContext("2d");

                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    pageDiv.appendChild(canvas);

                    const textLayer = document.createElement("div");

                    textLayer.className = "textLayer";

                    textLayer.style.position = "absolute";
                    textLayer.style.left = "0";
                    textLayer.style.top = "0";
                    textLayer.style.width = canvas.width + "px";
                    textLayer.style.height = canvas.height + "px";

                    pageDiv.appendChild(textLayer);

                    pdfViewer.appendChild(pageDiv);

                    await page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise;

                    const textContent = await page.getTextContent();

                    pdfjsLib.renderTextLayer({

                        textContent,

                        container: textLayer,

                        viewport,

                        textDivs: []

                    });

                }

            }).catch(function(error) {

                console.error('PDF loading error:', error);

                alert('Unable to load the PDF.');

            });

            pdfFileName.textContent = "{{ basename($data->file) }}";

            pdfPreviewBox.style.display = 'block';

            mappingColumn.classList.remove('col-lg-12');
            mappingColumn.classList.add('col-lg-6');
        }


        // Load the already uploaded PDF
        loadPdf(pdfUrl);


        // Close/remove preview
        removePdfBtn.addEventListener('click', function() {

            if (pdfObjectUrl) {
                URL.revokeObjectURL(pdfObjectUrl);
                pdfObjectUrl = null;
            }

            pdfViewer.innerHTML = '';

            pdfFileName.textContent = '';

            pdfPreviewBox.style.display = 'none';

            mappingColumn.classList.remove('col-lg-6');
            mappingColumn.classList.add('col-lg-12');

        });
    </script>


    {{-- ----------------------------- --}}
    {{-- --- TAB SWITCHING SCRIPT --- --}}
    {{-- --------------------------- --}}
    {{-- <script>
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
    </script> --}}


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const headerSection = document.getElementById("header");
            const bodySection = document.getElementById("map-body");

            const switchHeader = document.getElementById("switchHeader");
            const switchBody = document.getElementById("switchBody");

            function showHeader() {
                headerSection.style.display = "block";
                bodySection.style.display = "none";

                headerSection.classList.add("fade", "show");
                bodySection.classList.remove("show");
            }

            function showBody() {
                headerSection.style.display = "none";
                bodySection.style.display = "block";

                bodySection.classList.add("fade", "show");
                headerSection.classList.remove("show");
            }

            switchHeader.addEventListener("change", function() {
                if (this.checked) {
                    showHeader();
                }
            });

            switchBody.addEventListener("change", function() {
                if (this.checked) {
                    showBody();
                }
            });

            // Initial state
            showHeader();

        });
    </script>


    {{-- - Verb manager The inline edit script- --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const rows = document.querySelectorAll('tbody tr');

            document.querySelectorAll('.edit-btn').forEach(function(btn) {

                btn.addEventListener('click', function() {


                    rows.forEach(function(row) {

                        row.querySelectorAll('.view').forEach(function(el) {
                            el.classList.remove('d-none');
                        });

                        row.querySelectorAll('.edit').forEach(function(el) {
                            el.classList.add('d-none');
                        });

                        const editBtn = row.querySelector('.edit-btn');
                        const saveBtn = row.querySelector('.save-btn');

                        if (editBtn) editBtn.classList.remove('d-none');
                        if (saveBtn) saveBtn.classList.add('d-none');

                    });


                    const row = document.getElementById('row-' + this.dataset.id);

                    row.querySelectorAll('.view').forEach(function(el) {
                        el.classList.add('d-none');
                    });

                    row.querySelectorAll('.edit').forEach(function(el) {
                        el.classList.remove('d-none');
                    });

                    row.querySelector('.edit-btn').classList.add('d-none');
                    row.querySelector('.save-btn').classList.remove('d-none');


                    const firstInput = row.querySelector('.edit:not(.d-none)');
                    if (firstInput) {
                        firstInput.focus();
                    }

                });

            });

        });
    </script>

    {{-- Display higlighted feild on the input feild --}}
    <script>
        let activeField = null;

        document.addEventListener("focusin", function(e) {

            if (
                e.target.matches('input[name^="Header_Mapping"][name$="[Field]"]') ||
                e.target.matches('input[name^="Positions_Mapping"][name$="[Field]"]')
            ) {
                activeField = e.target;

                console.log("Active:", activeField.name);

                const row = e.target.closest("tr");

                if (!row) return;

                const fieldDisplay = row.querySelector(".other_field");

                if (!fieldDisplay) return;

                fieldDisplay.textContent = e.target.value;
            }

        });


        document.addEventListener("mouseup", function() {

            if (!activeField) return;

            const text = window.getSelection().toString().trim();

            if (!text) return;

            activeField.value = text;

            const row = activeField.closest("tr");

            if (row) {
                const fieldDisplay = row.querySelector(".other_field");

                if (fieldDisplay) {
                    fieldDisplay.textContent = text;
                }
            }

            activeField.dispatchEvent(new Event("input", {
                bubbles: true
            }));

            activeField.dispatchEvent(new Event("change", {
                bubbles: true
            }));

        });
    </script>


    {{-- --- PDF UPLOAD PREVIEW SCRIPT --- --}}
    <script>
        const dropZone = document.getElementById('dropZone');
        const input = document.getElementById('pdfInput');

        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.background = '#e9f8ef';
            this.style.borderColor = '#157347';
        });

        dropZone.addEventListener('dragleave', function() {
            this.style.background = '#f8fff9';
            this.style.borderColor = '#198754';
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();

            this.style.background = '#f8fff9';
            this.style.borderColor = '#198754';

            input.files = e.dataTransfer.files;

            showSelectedFile();
        });

        input.addEventListener('change', showSelectedFile);

        function showSelectedFile() {

            if (!input.files.length) return;

            document.getElementById('selectedFile').style.display = 'block';

            document.getElementById('fileName').innerHTML =
                input.files[0].name;
        }
    </script>


    {{-- This is the save as draft function --}}
    <script>
        const draftStatus = @json($data->status);

        const draftConfiguredData = @json(is_string($data->configured_data) ? json_decode($data->configured_data, true) : $data->configured_data);


        function draftParseIf(text, operatorSelect) {

            if (!text) {
                return {
                    field: '',
                    operator: '',
                    value: ''
                };
            }

            text = String(text).trim();

            if (!operatorSelect) {
                return {
                    field: text,
                    operator: '',
                    value: ''
                };
            }

            const operators = Array.from(
                    operatorSelect.options
                )
                .map(option => ({
                    text: option.text.trim(),
                    value: option.value.trim()
                }))
                .filter(option => option.text.length > 0)
                .sort((a, b) => b.text.length - a.text.length);


            for (const operator of operators) {

                const escapedOperator =
                    operator.text.replace(
                        /[.*+?^${}()|[\]\\]/g,
                        '\\$&'
                    );

                const regex = new RegExp(
                    '\\s+' +
                    escapedOperator +
                    '\\s+',
                    'i'
                );

                const match =
                    text.match(regex);


                if (!match) {
                    continue;
                }


                const index =
                    match.index;


                const field =
                    text.substring(
                        0,
                        index
                    ).trim();


                const value =
                    text.substring(
                        index +
                        match[0].length
                    ).trim();


                return {
                    field: field,
                    operator: operator.value ||
                        operator.text,
                    value: value
                };
            }


            return {
                field: text,
                operator: '',
                value: ''
            };
        }


        function draftParseThen(text) {

            if (!text) {
                return {
                    action: '',
                    value: ''
                };
            }

            text = text.trim();

            const firstSpace =
                text.indexOf(' ');

            if (firstSpace === -1) {
                return {
                    action: text.toLowerCase(),
                    value: ''
                };
            }

            return {
                action: text.substring(
                        0,
                        firstSpace
                    )
                    .trim()
                    .toLowerCase(),

                value: text.substring(
                        firstSpace + 1
                    )
                    .trim()
            };
        }


        function draftSelectVerb(
            select,
            searchText
        ) {

            if (!select || !searchText) {
                return;
            }

            searchText =
                searchText
                .toLowerCase()
                .trim();

            let found = false;

            Array.from(
                select.options
            ).forEach(option => {

                const optionText =
                    option.text
                    .toLowerCase()
                    .trim();

                const optionValue =
                    option.value
                    .toLowerCase()
                    .trim();

                if (
                    optionValue === searchText ||
                    optionText === searchText ||
                    optionValue.includes(searchText) ||
                    optionText.includes(searchText)
                ) {
                    select.value =
                        option.value;

                    found = true;
                }
            });


            if (!found) {
                console.warn(
                    'Verb not found:',
                    searchText
                );
            }


            select.dispatchEvent(
                new Event('change')
            );
        }


        function draftPopulateIfThen(
            row,
            ifs
        ) {

            if (
                !ifs ||
                ifs.length === 0
            ) {
                return;
            }


            const addBtn =
                row.querySelector(
                    '.btn-success.btn-sm'
                );


            const existing =
                row.querySelectorAll(
                    '.if-then-row'
                );


            for (
                let i = existing.length - 1; i > 0; i--
            ) {
                existing[i].remove();
            }


            ifs.forEach(
                (item, index) => {

                    if (index > 0) {
                        addIfThen(addBtn);
                    }


                    const block =
                        row.querySelectorAll(
                            '.if-then-row'
                        )[index];


                    if (!block) {
                        return;
                    }


                    const operatorSelect =
                        block.querySelector(
                            '.operator'
                        );


                    /*
                     * Example:
                     *
                     * Dorfwiesen Doesn't Contain ddd
                     *
                     * becomes:
                     *
                     * field    = Dorfwiesen
                     * operator = Doesn't Contain
                     * value    = ddd
                     */
                    const parsedIf =
                        draftParseIf(
                            item.If,
                            operatorSelect
                        );


                    const ifInput =
                        block.querySelector(
                            '.if'
                        );


                    if (ifInput) {
                        ifInput.value =
                            parsedIf.value;
                    }


                    draftSelectVerb(
                        operatorSelect,
                        parsedIf.operator
                    );


                    /*
                     * The value after the IF operator
                     * belongs in the .then input.
                     */
                    const thenInput =
                        block.querySelector(
                            '.then'
                        );


                    if (thenInput) {
                        thenInput.value =
                            parsedIf.value;
                    }


                    /*
                     * If there is an actual THEN/action
                     * stored separately, populate it here.
                     */
                    if (item.Then) {

                        const parsedThen =
                            draftParseThen(
                                item.Then
                            );


                        draftSelectVerb(
                            block.querySelector(
                                '.action'
                            ),
                            parsedThen.action
                        );


                        /*
                         * Only overwrite .then with the
                         * actual THEN value when the saved
                         * THEN contains a real action.
                         */
                        if (
                            parsedThen.action &&
                            parsedThen.value
                        ) {
                            thenInput.value =
                                parsedThen.value;
                        }
                    }

                }
            );
        }


        function displayDraftResult() {

            if (draftStatus !== 'draft') {
                return;
            }


            if (!draftConfiguredData) {

                // alert(
                //     'No configured data found.'
                // );

                return;
            }


            const config =
                draftConfiguredData;


            document.getElementById(
                    'summary_customer'
                ).value =
                config.Summary?.Customer || '';


            document.getElementById(
                    'summary_order_id'
                ).value =
                config.Summary?.Order_ID || '';


            document.getElementById(
                'headerMappingBody'
            ).innerHTML = '';


            document.getElementById(
                'positionsContainer'
            ).innerHTML = '';


            headerIndex = 0;
            positionIndex = 0;


            (config.Header_Mapping || [])
            .forEach(item => {

                addHeaderRow();


                const rows =
                    document.querySelectorAll(
                        '#headerMappingBody .header-row'
                    );


                const row =
                    rows[rows.length - 1];


                row.querySelector('.col').value =
                    item.Col;


                row.querySelector('.field').value =
                    item.Field_name;


                draftPopulateIfThen(
                    row,
                    item.Ifs
                );


                if (item.Else) {

                    addElseField(
                        row.querySelector(
                            '.btn-warning'
                        )
                    );


                    row.querySelector(
                            '.else'
                        ).value =
                        item.Else;
                }

            });


            (config.Positions_Mapping || [])
            .forEach(position => {

                addPositionBlock();


                const currentPositionIndex =
                    positionIndex - 1;


                const positionBlock =
                    document.getElementById(
                        `position_block_${currentPositionIndex}`
                    );


                positionBlock.querySelector(
                        "input[name*='Position_ID']"
                    ).value =
                    position.Position_ID;


                document.getElementById(
                    `position_mapping_body_${currentPositionIndex}`
                ).innerHTML = '';


                (position.Mapping || [])
                .forEach(mapping => {

                    addPositionRow(
                        currentPositionIndex
                    );


                    const tbody =
                        document.getElementById(
                            `position_mapping_body_${currentPositionIndex}`
                        );


                    const row =
                        tbody.lastElementChild;


                    row.querySelector('.col').value =
                        mapping.Col;


                    row.querySelector('.field').value =
                        mapping.Field_name;


                    draftPopulateIfThen(
                        row,
                        mapping.Ifs
                    );


                    if (mapping.Else) {

                        addElseField(
                            row.querySelector(
                                '.btn-warning'
                            )
                        );


                        row.querySelector(
                                '.else'
                            ).value =
                            mapping.Else;
                    }

                });

            });


            const modal =
                bootstrap.Modal.getInstance(
                    document.getElementById(
                        'suggestionsResultModal'
                    )
                );


            if (modal) {
                modal.hide();
            }

        }


        document.addEventListener(
            'DOMContentLoaded',
            function() {

                if (draftStatus === 'draft') {
                    displayDraftResult();
                }

            }
        );
    </script>

</x-layouts::app>
