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
                        <h3>Workk area</h3>
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

                                        {{-- <iframe id="pdfViewer" src=""
                                            style="width:100%; height:1000px; border:1px solid #ccc; border-radius:8px; background:#fff;">
                                        </iframe> --}}

                                        <div
                                            id="pdfViewer"
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

                                    <div class="d-flex justify-content-end mb-3">

                                        <button
                                            type="button"
                                            class="btn btn-dark"
                                            data-bs-toggle="modal"
                                            data-bs-target="#logicManagerModal">

                                            <i class="fa fa-cogs me-2"></i>

                                            Manage Logic

                                        </button>

                                    </div>

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
                                                    <th>Logic</th>
                                                    <th>Action</th>
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

    <div class="modal fade"
            id="logicManagerModal"
            tabindex="-1"
            aria-hidden="true">

            <div class="modal-dialog modal-xl modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">

                            <i class="fa fa-cogs me-2"></i>

                            Logic Manager

                        </h4>

                        <button
                            class="btn-close"
                            data-bs-dismiss="modal">
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
                                                <option value="Operator" {{ old('type') == 'Operator' ? 'selected' : '' }}>
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

                                            <input
                                                type="text"
                                                name="verb"
                                                class="form-control"
                                                placeholder="Contains"
                                                value="{{ old('verb') }}"
                                                required>

                                            @error('verb')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Meaning <span style="font-style: italic">This is not neccessary and can be ignored.</span></label>

                                            <textarea
                                                name="meaning"
                                                class="form-control"
                                                rows="3"
                                                placeholder="Describe what this logic does...">{{ old('meaning') }}</textarea>

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

                                                        <select
                                                            name="type"
                                                            form="update-form-{{ $verb->id }}"
                                                            class="form-control form-control-sm edit type-input d-none"
                                                            
                                                            style="border:1px solid #000000; outline:none;"
                                                            onfocus="this.style.boxShadow='0 0 0 .25rem rgba(13,110,253,.25)';"
                                                            onblur="this.style.boxShadow='none';">

                                                            <option value="Operator" {{ $verb->type=='Operator'?'selected':'' }}>Operator</option>
                                                            <option value="Action" {{ $verb->type=='Action'?'selected':'' }}>Action</option>

                                                        </select>
                                                    </td>

                                                    <td>
                                                        <span class="view verb-text">{{ $verb->verb ?? '-' }}</span>

                                                        <input
                                                            type="text"
                                                            name="verb"
                                                            form="update-form-{{ $verb->id }}"
                                                            class="form-control form-control-sm edit verb-input d-none"
                                                            value="{{ $verb->verb }}"
                                                            style="border:1px solid #000000; outline:none;"
                                                            onfocus="this.style.boxShadow='0 0 0 .25rem rgba(13,110,253,.25)';"
                                                            onblur="this.style.boxShadow='none';">
                                                    </td>

                                                    <td>
                                                         <span class="view meaning-text">{{ $verb->meaning ?? '-' }}</span>

                                                        <input
                                                            type="text"
                                                            name="meaning"
                                                            form="update-form-{{ $verb->id }}"
                                                            class="form-control form-control-sm edit meaning-input d-none"
                                                            value="{{ $verb->meaning }}"
                                                            style="border:1px solid #000000; outline:none;"
                                                            onfocus="this.style.boxShadow='0 0 0 .25rem rgba(13,110,253,.25)';"
                                                            onblur="this.style.boxShadow='none';">
                                                    </td>

                                                     <td>
                                                        {{ optional($verb->user)->name ?? $verb->user_id ?? 'Unknown' }}
                                                    </td>

                                                    <td>

                                                        <form
                                                            id="update-form-{{ $verb->id }}"
                                                            action="{{ route('admin.verb.edit', $verb->id) }}"
                                                            method="POST"
                                                            class="d-inline">

                                                            @csrf

                                                            <button
                                                                type="button"
                                                                class="btn btn-warning btn-sm edit-btn"
                                                                data-id="{{ $verb->id }}">

                                                                <i class="fas fa-edit"></i>

                                                            </button>

                                                            <button
                                                                type="submit"
                                                                class="btn btn-success btn-sm save-btn d-none">

                                                                <i class="fas fa-check"></i>

                                                            </button>

                                                        </form>

                                                        <form
                                                            action="{{ route('admin.verb.destroy', $verb->id) }}"
                                                            method="POST"
                                                            class="d-inline">

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

                        <button
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

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
                                
                                <th>Logic</th>
                               
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
                row.setAttribute('data-position', posIndex);

                row.innerHTML = `

                        <td style="width:80px;">
                            <input class="form-control col"
                                value="${rowIndex + 1}"
                                type="number">
                        </td>

                        <td style="width:220px;">
                            <input class="form-control field"
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
                                                    <code>IF + OPERATOR + FIELD</code>
                                                </div>

                                                <div style="font-size:12px;color:#555;margin-top:4px;">
                                                    Example:
                                                    <code>IF + CONTAINS + "Rolladen"</code>
                                                </div>

                                    </div>

                                    <div class="d-flex gap-2 align-items-center">

                                        <span class="form-control-static"> IF</span>

                                        <select class="form-control operator" style="max-width:180px;">
                                            @foreach($verbs->where('type', 'Operator') as $verb)
                                                <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                            @endforeach
                                        </select>

                                        <input
                                            class="form-control if"
                                            placeholder="Enter value">

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

                                    <div class="d-flex gap-2 align-items-center">

                                        <span class="form-control-static"> THEN</span>
                                        <select class="form-control action" style="max-width:180px;">
                                            @foreach($verbs->where('type', 'Action') as $verb)
                                                <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                            @endforeach
                                        </select>

                                        <input
                                            class="form-control then"
                                            placeholder="eg +10, 1060">

                                    </div>

                                    <div class="text-end mt-3">

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="removeIfThen(this)">
                                            Remove Condition
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
                                Remove
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

                    <td>
                        <input class="form-control field"
                            name="Header_Mapping[${headerIndex}][Field]"
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
                                                    <code>IF + OPERATOR + FIELD</code>
                                                </div>

                                                <div style="font-size:12px;color:#555;margin-top:4px;">
                                                    Example:
                                                    <code>IF + CONTAINS + "Rolladen"</code>
                                                </div>

                                    </div>
                                    <div class="d-flex gap-2 align-items-center">

                                       <span class="form-control-static"> IF</span>

                                       <select class="form-control operator" style="max-width:180px;">
                                            @foreach($verbs->where('type', 'Operator') as $verb)
                                                <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                            @endforeach
                                        </select>

                                        <input
                                            class="form-control if"
                                            placeholder="Enter value">

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

                                    <div class="d-flex gap-2 align-items-center">

                                        <span class="form-control-static"> THEN</span>

                                        <select class="form-control action" style="max-width:180px;">
                                            @foreach($verbs->where('type', 'Action') as $verb)
                                                <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                            @endforeach
                                        </select>

                                        <input
                                            class="form-control then"
                                            placeholder="eg +10, 1060">

                                    </div>

                                    <div class="text-end mt-3">

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="removeIfThen(this)">
                                            Remove Condition
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
                                Remove
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
                            IF (Condition)
                        </div>

                        <div class="d-flex gap-2 align-items-center">

                            <select class="form-control operator" style="max-width:180px;">
                                @foreach($verbs->where('type', 'Operator') as $verb)
                                    <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                @endforeach
                            </select>

                            <input
                                class="form-control if"
                                placeholder="Enter value">

                        </div>

                        <div style="font-weight:600;color:#444;margin:15px 0 8px;">
                            THEN (Action)
                        </div>

                        <div class="d-flex gap-2 align-items-center">

                            <select class="form-control action" style="max-width:180px;">
                                @foreach($verbs->where('type', 'Action') as $verb)
                                    <option value="{{ $verb->verb }}">{{ $verb->verb }}</option>
                                @endforeach
                            </select>

                            <input
                                class="form-control then"
                                placeholder="eg +10, 1060">

                        </div>

                        <div class="text-end mt-3">

                            <button
                                type="button"
                                class="btn btn-danger btn-sm"
                                onclick="removeIfThen(this)">
                                Remove Condition
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
                    <div class="d-flex gap-2 mt-2">

                        <input
                            class="form-control else"
                            placeholder="Else">

                        <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            onclick="this.parentElement.remove()">
                            X
                        </button>

                    </div>
                `;
            }
    </script>

    {{--payload script--}}
    <script>
            document.getElementById("mappingForm").addEventListener("submit", function(e) {

            let payload = {
                Summary: {},
                Header_Mapping: [],
                Positions_Mapping: [],
                History: []
            };

            payload.Summary = {
                Customer: document.getElementById("summary_customer").value,
                Order_ID: document.getElementById("summary_order_id").value
            };

            // HEADER
            document.querySelectorAll(".header-row").forEach(row => {

            const operator = row.querySelector(".operator")?.value || "";
            const ifValue = row.querySelector(".if")?.value || "";
            const action = row.querySelector(".action")?.value || "";
            const thenValue = row.querySelector(".then")?.value || "";
            const field = row.querySelector(".field")?.value || "";

            payload.Header_Mapping.push({

                Col: parseInt(row.querySelector(".col").value),

                Field: row.querySelector(".field")?.value || "",

                If: `${field} ${ifValue} ${operator}`.trim(),

                Then: `${action} ${thenValue}`.trim(),

                Else: row.querySelector(".else")?.value || "",

                Type: row.querySelector(".type")?.value || "T"

            });

        });

            // COLORS
            document.querySelectorAll(".color-row").forEach(row => {

                payload.Panzer_Color_Mapping.push({
                    Input_Contains: row.querySelector(".input").value,
                    Output_Result: row.querySelector(".output").value
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

                    Field: row.querySelector(".field")?.value || "",

                    Ifs: ifs,

                    Else: row.querySelector(".else")?.value || "",

                    Type: row.querySelector(".type")?.value || "T"

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


    {{---------------------------------}}
    {{----- PDF UPLOAD PREVIEW SCRIPT -----}}
    {{-------------------------------}}
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

            pdfViewer.innerHTML = '';

            const loadingTask = pdfjsLib.getDocument(pdfObjectUrl);

            loadingTask.promise.then(async function(pdf){

                for(let pageNum = 1; pageNum <= pdf.numPages; pageNum++){

                    const page = await pdf.getPage(pageNum);

                    const viewport = page.getViewport({ scale: 1.3 });

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
    </script>


    {{---------------------------------}}
    {{----- TAB SWITCHING SCRIPT -----}}
    {{-------------------------------}}
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


    {{---The inline edit script---}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const rows = document.querySelectorAll('tbody tr');

            document.querySelectorAll('.edit-btn').forEach(function(btn){

                btn.addEventListener('click', function(){

                    
                    rows.forEach(function(row){

                        row.querySelectorAll('.view').forEach(function(el){
                            el.classList.remove('d-none');
                        });

                        row.querySelectorAll('.edit').forEach(function(el){
                            el.classList.add('d-none');
                        });

                        const editBtn = row.querySelector('.edit-btn');
                        const saveBtn = row.querySelector('.save-btn');

                        if(editBtn) editBtn.classList.remove('d-none');
                        if(saveBtn) saveBtn.classList.add('d-none');

                    });

                  
                    const row = document.getElementById('row-' + this.dataset.id);

                    row.querySelectorAll('.view').forEach(function(el){
                        el.classList.add('d-none');
                    });

                    row.querySelectorAll('.edit').forEach(function(el){
                        el.classList.remove('d-none');
                    });

                    row.querySelector('.edit-btn').classList.add('d-none');
                    row.querySelector('.save-btn').classList.remove('d-none');

                    
                    const firstInput = row.querySelector('.edit:not(.d-none)');
                    if(firstInput){
                        firstInput.focus();
                    }

                });

            });

        });
    </script>

</x-layouts::app>
