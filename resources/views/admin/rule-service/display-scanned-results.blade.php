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

    <div class="page-body" id="pageBody"  style="padding-top: 120px;">

        {{-- <x-stage active="1" /> --}}

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Create New Config.</h4>
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

                        <form id="mappingForm" action="{{ route('admin.create.after.scan', ['id' => $id] ) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf

                            <input type="file" id="pdfInput" name="file" hidden>
                            <input type="hidden" name="payload" id="payload">

                            <div style="padding:20px;">

                                <div style="
                                        display:flex;
                                        gap:15px;
                                        margin-top:20px;
                                        justify-content:center;
                                        flex-wrap:wrap;
                                    ">

                                    <button type="button" class="btn btn-outline-success">
                                        <i class="fa fa-arrow-left me-2"></i>
                                        Scan another Pdf
                                    </button>

                                    <button type="button" class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#scanResultModal">
                                        <i class="fa fa-eye me-2"></i>
                                        Scan result
                                    </button>

                                    <button type="button" class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#suggestionsResultModal">
                                        <i class="fa fa-eye me-2"></i>
                                        Suggestions result
                                    </button>

                                </div>

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

                                    <div class="card-body tab-content active" id="header">

                                        <div class="d-flex justify-content-between align-items-center mb-3">

                                            <button type="button" onclick="addHeaderRow()" class="btn btn-success">

                                                <i class="fa fa-plus me-1"></i>
                                                Add Header

                                            </button>

                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal">

                                                <i class="fa fa-plus me-2"></i>
                                                Verb

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

                                    </div>


                                    <div class="card-body tab-content" id="map-body" style="display:none;">

                                        <div class="d-flex justify-content-between align-items-center mb-3">

                                            <button type="button" onclick="addPositionBlock()" class="btn btn-success">

                                                <i class="fa fa-plus me-1"></i>
                                                Add Position

                                            </button>

                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal">

                                                <i class="fa fa-plus me-2"></i>
                                                Verb

                                            </button>

                                        </div>

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

        <!-- =================== HEADER / BODY SWITCH =================== -->
        <div class="d-flex justify-content-center my-4">

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

        </div>

       
    </div>

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

    {{-- @php
        dd($result);
    @endphp --}}


    <!-- Scan Result Modal -->
    <div class="modal fade" id="scanResultModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-file-alt me-2"></i>
                        Scan result
                    </h4>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                {{-- <div class="modal-body">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <strong>Extracted data</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th width="60">S/N</th>
                                        <th>Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($scanResult ?? [] as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-4">
                                                No scan result available yet.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}

                <div class="modal-body">

                @php
                    $scan = is_string($result->scanned_data) ? json_decode($result->scanned_data, true) : $result->scanned_data;

                    // dd($scan);
                @endphp

                @if($scan)

                    {{-- Message --}}
                    <div class="alert alert-success">
                        {{ $scan['Message'] ?? '' }}
                    </div>

                    {{-- Summary --}}
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card border-success">
                                <div class="card-body text-center">
                                    <h3 class="mb-0">{{ $scan['Total_fields_found'] ?? 0 }}</h3>
                                    <small>Total Fields Found</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Header Fields --}}
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            Header Fields
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Field</th>
                                    <th>Sample Value</th>
                                    <th>Suggested Condition</th>
                                    <th>Suggested Then</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($scan['Header_fields'] ?? [] as $field)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $field['name'] }}</td>
                                        <td>{{ $field['sample_value'] }}</td>
                                        <td>{{ $field['suggested_condition'] }}</td>
                                        <td>{{ $field['suggested_then'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Position Fields --}}
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Position Fields
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Field</th>
                                    <th>Sample Value</th>
                                    <th>Suggested Condition</th>
                                    <th>Suggested Then</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($scan['Position_fields'] ?? [] as $field)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $field['name'] }}</td>
                                        <td>{{ $field['sample_value'] }}</td>
                                        <td>{{ $field['suggested_condition'] }}</td>
                                        <td>{{ $field['suggested_then'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Raw Field Map --}}
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Raw Extracted Fields
                        </div>

                        <div class="table-responsive" style="max-height:400px;">
                            <table class="table table-striped table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Extracted Value</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($scan['Raw_field_map'] ?? [] as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @else

                    <div class="text-center py-5 text-muted">
                        No scan result available.
                    </div>

                @endif

            </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Suggestions Result Modal -->
    <div class="modal fade" id="suggestionsResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-lightbulb me-2"></i>
                    Suggestions result
                </h4>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

            @php
                $suggestion = is_string($result->suggested_data)
                    ? json_decode($result->suggested_data, true)
                    : $result->suggested_data;
            @endphp

            @if($suggestion)

                <div class="alert alert-info">
                    {{ $suggestion['Message'] }}
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Customer</strong><br>
                        {{ $suggestion['Customer'] }}
                    </div>

                    <div class="col-md-8">
                        <strong>File</strong><br>
                        {{ $suggestion['Filename'] }}
                    </div>
                </div>

                {{-- Summary --}}
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        Summary
                    </div>

                    <table class="table table-bordered mb-0">
                        @foreach($suggestion['Suggested_config']['Summary'] ?? [] as $k=>$v)
                            <tr>
                                <th width="250">{{ $k }}</th>
                                <td>{{ $v }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                {{-- Header Mapping --}}
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        Header Mapping
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">

                            <thead>
                            <tr>
                                <th>Col</th>
                                <th>Field</th>
                                <th>If(s)</th>
                                <th>Else</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($suggestion['Suggested_config']['Header_Mapping'] ?? [] as $row)

                                <tr>

                                    <td>{{ $row['Col'] }}</td>

                                    <td>{{ $row['Field_name'] }}</td>

                                    <td>
                                        @foreach($row['Ifs'] as $if)
                                            <div class="mb-2">
                                                <strong>If:</strong> {{ $if['If'] }}<br>
                                                <strong>Then:</strong> {{ $if['Then'] }}
                                            </div>
                                        @endforeach
                                    </td>

                                    <td>{{ $row['Else'] }}</td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

                {{-- Position Mapping --}}
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Position Mapping
                    </div>

                    @foreach($suggestion['Suggested_config']['Positions_Mapping'] ?? [] as $position)

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover mb-4">

                                <thead>

                                <tr>
                                    <th>Col</th>
                                    <th>Field</th>
                                    <th>If(s)</th>
                                    <th>Else</th>
                                </tr>

                                </thead>

                                <tbody>

                                @foreach($position['Mapping'] as $map)

                                    <tr>

                                        <td>{{ $map['Col'] }}</td>

                                        <td>{{ $map['Field_name'] }}</td>

                                        <td>

                                            @foreach($map['Ifs'] as $if)

                                                <div class="mb-2">
                                                    <strong>If:</strong> {{ $if['If'] }}<br>
                                                    <strong>Then:</strong> {{ $if['Then'] }}
                                                </div>

                                            @endforeach

                                        </td>

                                        <td>{{ $map['Else'] }}</td>

                                    </tr>

                                @endforeach

                                </tbody>

                            </table>

                        </div>

                    @endforeach

            @else

                <div class="text-center py-5 text-muted">
                    No suggestions available.
                </div>

            @endif

        </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" onclick="transferSuggestionsToForm()">
                    <i class="fas fa-exchange-alt"></i> Transfer
                </button>
            </div>
        </div>
    </div>
    


    <script>
        const suggestionData = @json(
            is_string($result->suggested_data)
                ? json_decode($result->suggested_data, true)
                : $result->suggested_data
        );

        // =============================
        // Parse IF string
        // Example:
        // contains 'Bestnr.'
        // -> operator = contains
        // -> value = Bestnr.
        // =============================
        function parseIf(text) {

            if (!text) return {
                operator: '',
                value: ''
            };

            const match = text.match(/^(.+?)\s+'(.+)'$/);

            if (match) {
                return {
                    operator: match[1].trim(),
                    value: match[2].trim()
                };
            }

            return {
                operator: '',
                value: text.trim()
            };
        }


        // =============================
        // Parse THEN string
        // Example:
        // extract number after 'Bestnr.'
        // -> action = extract number after
        // -> value = Bestnr.
        // =============================
        function parseThen(text) {

            if (!text) {
                return {
                    action: '',
                    value: ''
                };
            }

            text = text.trim();

            const firstSpace = text.indexOf(' ');

            // Only one word
            if (firstSpace === -1) {
                return {
                    action: text.toLowerCase(),
                    value: ''
                };
            }

            return {
                action: text.substring(0, firstSpace).trim().toLowerCase(),
                value: text.substring(firstSpace + 1).trim()
            };
        }


        // =============================
        // Find matching verb in dropdown
        // =============================
        function selectVerb(select, searchText) {

            if (!select || !searchText) return;

            searchText = searchText.toLowerCase().trim();

            let found = false;

            Array.from(select.options).forEach(option => {

                const optionText = option.text.toLowerCase().trim();
                const optionValue = option.value.toLowerCase().trim();

                if (
                    optionValue === searchText ||
                    optionText === searchText ||
                    optionValue.includes(searchText) ||
                    optionText.includes(searchText)
                ) {
                    select.value = option.value;
                    found = true;
                }

            });

            if (!found) {
                console.warn("Verb not found:", searchText);
            }

            select.dispatchEvent(new Event('change'));

        }


        // =============================
        // Populate IF / THEN
        // =============================
        function populateIfThen(row, ifs) {

            if (!ifs || ifs.length === 0) return;

            const addBtn = row.querySelector('.btn-success.btn-sm');

            // Remove additional rows
            const existing = row.querySelectorAll('.if-then-row');

            for (let i = existing.length - 1; i > 0; i--) {
                existing[i].remove();
            }

            ifs.forEach((item, index) => {

                if (index > 0) {
                    addIfThen(addBtn);
                }

                const block = row.querySelectorAll('.if-then-row')[index];

                const parsedIf = parseIf(item.If);
                const parsedThen = parseThen(item.Then);

                // Operator
                selectVerb(
                    block.querySelector('.operator'),
                    parsedIf.operator
                );

                // IF value
                block.querySelector('.if').value = parsedIf.value;

                // Action
                selectVerb(
                    block.querySelector('.action'),
                    parsedThen.action
                );

                // THEN value
                block.querySelector('.then').value = parsedThen.value;

            });

        }

        // =============================
        // Main Transfer Function
        // =============================
        function transferSuggestionsToForm() {

            if (!suggestionData || !suggestionData.Suggested_config) {
                alert('No suggestion data found.');
                return;
            }

            const config = suggestionData.Suggested_config;

            // =============================
            // SUMMARY
            // =============================
            document.getElementById('summary_customer').value =
                config.Summary.Customer || '';

            document.getElementById('summary_order_id').value =
                config.Summary.Order_ID || '';

            // =============================
            // CLEAR OLD DATA
            // =============================
            document.getElementById('headerMappingBody').innerHTML = '';
            document.getElementById('positionsContainer').innerHTML = '';

            headerIndex = 0;
            positionIndex = 0;

            // =============================
            // HEADER MAPPING
            // =============================
            config.Header_Mapping.forEach(item => {

                addHeaderRow();

                const rows = document.querySelectorAll(
                    '#headerMappingBody .header-row'
                );

                const row = rows[rows.length - 1];

                // Basic fields
                row.querySelector('.col').value =
                    item.Col;

                row.querySelector('.field').value =
                    item.Field_name;

                // IF / THEN
                populateIfThen(row, item.Ifs);

                // ELSE
                if (item.Else) {

                    addElseField(
                        row.querySelector('.btn-warning')
                    );

                    row.querySelector('.else').value =
                        item.Else;
                }
            });

            // =============================
            // POSITION MAPPING
            // =============================
            config.Positions_Mapping.forEach(position => {

                // Create block
                addPositionBlock();

                const currentPositionIndex = positionIndex - 1;

                const positionBlock = document.getElementById(
                    `position_block_${currentPositionIndex}`
                );

                // Set Position ID
                positionBlock.querySelector(
                    "input[name*='Position_ID']"
                ).value = position.Position_ID;

                // Remove default row
                document.getElementById(
                    `position_mapping_body_${currentPositionIndex}`
                ).innerHTML = '';

                // Add real rows
                position.Mapping.forEach(mapping => {

                    addPositionRow(currentPositionIndex);

                    const tbody = document.getElementById(
                        `position_mapping_body_${currentPositionIndex}`
                    );

                    const row = tbody.lastElementChild;

                    // Basic fields
                    row.querySelector('.col').value =
                        mapping.Col;

                    row.querySelector('.field').value =
                        mapping.Field_name;

                    // IF / THEN
                    populateIfThen(row, mapping.Ifs);

                    // ELSE
                    if (mapping.Else) {

                        addElseField(
                            row.querySelector('.btn-warning')
                        );

                        row.querySelector('.else').value =
                            mapping.Else;
                    }
                });
            });

            // Close modal
            const modal = bootstrap.Modal.getInstance(
                document.getElementById('suggestionsResultModal')
            );

            if (modal) {
                modal.hide();
            }

            alert('Suggestion transferred successfully!');
        }
    </script>

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

                                           

                                            <div class="form-control-plaintext fw-bold">
                                                FIELD
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

                                             <div class="form-control-plaintext fw-bold">
                                                FIELD
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
                                @foreach ($verbs->where('type', 'Operator') as $verb)
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
                                @foreach ($verbs->where('type', 'Action') as $verb)
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
                                <i class="fas fa-trash"></i>
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
                            <i class="fas fa-trash"></i>
                        </button>

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


    <script>
            document.addEventListener("DOMContentLoaded", function () {

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

            switchHeader.addEventListener("change", function () {
                if (this.checked) {
                    showHeader();
                }
            });

            switchBody.addEventListener("change", function () {
                if (this.checked) {
                    showBody();
                }
            });

            // Initial state
            showHeader();

        });

    </script>


    {{-- -The inline edit script- --}}
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

    <script>
        let activeField = null;

        document.addEventListener("focusin", function(e) {

            if (
                e.target.matches('input[name^="Header_Mapping"][name$="[Field]"]') ||
                e.target.matches('input[name^="Positions_Mapping"][name$="[Field]"]')
            ) {
                activeField = e.target;

                console.log("Active:", activeField.name);
            }

        });


        document.addEventListener("mouseup", function() {

            if (!activeField) return;

            const text = window.getSelection().toString().trim();

            if (!text) return;

            activeField.value = text;

            activeField.dispatchEvent(new Event("input", {
                bubbles: true
            }));
            activeField.dispatchEvent(new Event("change", {
                bubbles: true
            }));

        });
    </script>

    
    {{-- <script>
        const existingPdfUrl = @json($result->file_url ?? null);

        const pdfPreviewBox = document.getElementById('pdfPreviewBox');
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFileName = document.getElementById('pdfFileName');
        const removePdfBtn = document.getElementById('removePdfBtn');
        const mappingColumn = document.getElementById('mappingColumn');

        // ===========================================
        // Render PDF
        // ===========================================
        async function renderPdf(pdfUrl, fileName = "PDF") {

            if (!pdfUrl) return;

            pdfViewer.innerHTML = "";

            try {

                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                const pdf = await loadingTask.promise;

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

                pdfFileName.textContent = fileName;
                pdfPreviewBox.style.display = "block";

                mappingColumn.classList.remove("col-lg-12");
                mappingColumn.classList.add("col-lg-6");

            } catch (e) {
                console.error(e);
                alert("Unable to load PDF.");
            }
        }

        // ===========================================
        // Remove Preview
        // ===========================================
        removePdfBtn.addEventListener("click", function () {

            pdfViewer.innerHTML = "";
            pdfFileName.textContent = "";
            pdfPreviewBox.style.display = "none";

            mappingColumn.classList.remove("col-lg-6");
            mappingColumn.classList.add("col-lg-12");
        });

        // ===========================================
        // Automatically load the PDF on page load
        // ===========================================
        document.addEventListener("DOMContentLoaded", function () {

            if (!existingPdfUrl) return;

            const fileName = existingPdfUrl.split("/").pop();

            renderPdf(existingPdfUrl, fileName);

        });

    </script> --}}


    <script>
        const existingPdfUrl = @json($result->file_url ?? null);

        const pdfPreviewBox = document.getElementById('pdfPreviewBox');
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFileName = document.getElementById('pdfFileName');
        const removePdfBtn = document.getElementById('removePdfBtn');
        const mappingColumn = document.getElementById('mappingColumn');
        const pdfInput = document.getElementById('pdfInput');

        // ===========================================
        // Render PDF
        // ===========================================
        async function renderPdf(pdfUrl, fileName = "PDF") {

            if (!pdfUrl) return;

            pdfViewer.innerHTML = "";

            try {

                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                const pdf = await loadingTask.promise;

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

                pdfFileName.textContent = fileName;
                pdfPreviewBox.style.display = "block";

                mappingColumn.classList.remove("col-lg-12");
                mappingColumn.classList.add("col-lg-6");

            } catch (e) {
                console.error(e);
                alert("Unable to load PDF.");
            }
        }

        // ===========================================
        // Remove Preview
        // ===========================================
        removePdfBtn.addEventListener("click", function () {

            pdfViewer.innerHTML = "";
            pdfFileName.textContent = "";
            pdfPreviewBox.style.display = "none";

            mappingColumn.classList.remove("col-lg-6");
            mappingColumn.classList.add("col-lg-12");

            if (pdfInput) {
                pdfInput.value = "";
            }
        });

        // ===========================================
        // Automatically load the PDF on page load
        // ===========================================
        document.addEventListener("DOMContentLoaded", async function () {

            if (!existingPdfUrl) return;

            const fileName = existingPdfUrl.split("/").pop();

            await renderPdf(existingPdfUrl, fileName);

            // Attach the existing PDF to the hidden file input
            try {

                const response = await fetch(existingPdfUrl);
                const blob = await response.blob();

                const file = new File([blob], fileName, {
                    type: "application/pdf"
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);

                if (pdfInput) {
                    pdfInput.files = dataTransfer.files;
                }

            } catch (error) {
                console.error("Unable to attach PDF to form:", error);
            }

        });

    </script>

</x-layouts::app>
