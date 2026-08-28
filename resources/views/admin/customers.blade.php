<x-layouts::app :title="__('Models')">
    <div class="page-body" id="pageBody">

        <div class="container-fluid">
            <div class="page-title">
                <div class="row">

                    @if (session('error'))
                        <div style="
                            padding:12px 16px;
                            margin-bottom:20px;
                            border-radius:8px;
                            background:#f8d7da;
                            color:#842029;
                            border:1px solid #f5c2c7;
                        ">
                            <i class="fa fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif


                    <div class="col-xl-3 col-sm-5 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url()->previous() }}" wire:navigate aria-label="Go back to file builder"
                                    title="Go back">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Configurations</li>
                            <li class="breadcrumb-item active">All configurations</li>
                        </ol>
                    </div>
                    <div class="col-5 d-none d-xl-block">

                    </div>

                    {{-- <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Manage Configuration</h3>
                    </div> --}}

                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-body">

                        {{-- Top Section --}}
                        <div
                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

                            <div>
                                <h5 style="margin:0; font-weight:700;">
                                    Manage Configurations
                                </h5>
                                {{-- <small style="color:#6b7280;">
                                    Manage configurations
                                </small> --}}
                            </div>

                            {{-- Plus Button --}}
                            <a href="{{ route('admin.rule-service.index') }}" wire:navigate
                                style="width:48px; height:48px; border-radius:50%; background:#000; color:#fff; text-decoration:none; display:flex; align-items:center; justify-content:center; font-size:22px; transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.style.transform='rotate(90deg) scale(1.05)'"
                                onmouseout="this.style.background='#000'; this.style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus"></i>
                            </a>

                        </div>


                        <div class="table-responsive">
                            <table class="table align-middle"
                                style="width:100%; border-collapse: separate; border-spacing:0 10px;">

                                <thead>
                                    <tr style="background:#f8f9fa;">
                                        <th style="padding:15px; border:none;">Customer ID</th>
                                        <th style="padding:15px; border:none;">Konfiguration</th>
                                        <th style="padding:15px; border:none;">Status</th>
                                        <th style="padding:15px; border:none;">Sample PDF</th>
                                        <th style="padding:15px; border:none;">Sample TXT</th>
                                        <th style="padding:15px; border:none; text-align:center;">Sand-box</th>
                                        <th style="padding:15px; border:none; text-align:center;">Action</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($orders as $o)
                                        <tr
                                            style="background:#fff; box-shadow:0 2px 12px rgba(0,0,0,0.05); border-radius:12px;">

                                            <td style="padding:18px; vertical-align:middle;">
                                                <div style="display:flex; align-items:center; gap:10px;">

                                                    <div
                                                        style="width:40px; height:40px; border-radius:50%; background:#e6f1fb; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:600; color:#185fa5;">
                                                        {{ $o?->id }}
                                                    </div>

                                                    {{-- <strong>{{ $o?->id }}</strong> --}}
                                                </div>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <a href="{{ route('admin.customers.single', $o?->customer_name) }}"
                                                    wire:navigate
                                                    style="text-decoration:none; color:#111827; font-weight:600;">
                                                    {{ $o?->customer_name }}
                                                </a>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <span
                                                    style="display:inline-flex; align-items:center; gap:6px; color:#28a745; font-size:14px;">
                                                    <span
                                                        style="width:8px; height:8px; border-radius:50%; background:#28a745;"></span>
                                                    Active
                                                </span>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <a href="{{ $o->file_url }}" target="_blank"
                                                    style="text-decoration:none; color:#dc3545; font-weight:500;">
                                                    <i class="fa fa-file-pdf"></i>
                                                    schworer.pdf
                                                </a>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <a href="{{ Storage::url($o->txt_file) }}" target="_blank"
                                                    style="text-decoration:none; color:#6c757d; font-weight:500;">
                                                    <i class="fa fa-file-text"></i>
                                                    generated_mapping.txt
                                                </a>
                                            </td>

                                            <td style="padding:18px; text-align:center; vertical-align:middle;">

                                                <div
                                                    style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">


                                                    <a href="{{ route('admin.use.config.page', $o?->id) }}"
                                                        style="
                                                            display:inline-flex;
                                                            align-items:center;
                                                            gap:6px;
                                                            padding:8px 4px;
                                                            color:#329b40;
                                                            font-size:14px;
                                                            font-weight:600;
                                                            text-decoration:none;
                                                            border-bottom:1px solid transparent;
                                                            transition:all .25s ease;
                                                        "
                                                        onmouseover="
                                                            this.style.color='#267a32';
                                                            this.style.borderBottomColor='#329b40';
                                                            this.querySelector('.config-arrow').style.transform='translateX(4px)';
                                                        "
                                                        onmouseout="
                                                            this.style.color='#329b40';
                                                            this.style.borderBottomColor='transparent';
                                                            this.querySelector('.config-arrow').style.transform='translateX(0)';
                                                        ">
                                                        <span>Use config</span>

                                                        <i class="fas fa-arrow-right config-arrow"
                                                            style="
                                                                font-size:12px;
                                                                transition:transform .25s ease;
                                                            ">
                                                        </i>
                                                    </a>

                                                </div>

                                            </td>

                                            <td style="padding:18px; text-align:center; vertical-align:middle;">

                                               <div style="
                                                        display:flex;
                                                        gap:18px;
                                                        justify-content:center;
                                                        align-items:center;
                                                        flex-wrap:wrap;
                                                    ">

                                                        {{-- Bearbeiten --}}
                                                        <a href="{{ route('admin.customers.single', $o?->customer_name) }}"
                                                        wire:navigate
                                                        style="
                                                            display:inline-flex;
                                                            align-items:center;
                                                            gap:7px;
                                                            padding:8px 4px;
                                                            color:#329b40;
                                                            font-size:14px;
                                                            font-weight:600;
                                                            text-decoration:none;
                                                            border-bottom:1px solid transparent;
                                                            transition:all .25s ease;
                                                        "
                                                        onmouseover="
                                                            this.style.color='#267a32';
                                                            this.style.borderBottomColor='#329b40';
                                                            this.querySelector('.action-arrow').style.transform='translateX(4px)';
                                                        "
                                                        onmouseout="
                                                            this.style.color='#329b40';
                                                            this.style.borderBottomColor='transparent';
                                                            this.querySelector('.action-arrow').style.transform='translateX(0)';
                                                        "
                                                        >
                                                            <i class="fas fa-edit"></i>
                                                            <span>Konfiguration bearbeiten</span>
                                                            <i class="fas fa-arrow-right action-arrow"
                                                            style="font-size:12px; transition:transform .25s ease;">
                                                            </i>
                                                        </a>


                                                        {{-- Kopieren --}}
                                                        <a href="{{ route('admin.customers.single', $o?->customer_name) }}"
                                                        wire:navigate
                                                        style="
                                                            display:inline-flex;
                                                            align-items:center;
                                                            gap:7px;
                                                            padding:8px 4px;
                                                            color:#329b40;
                                                            font-size:14px;
                                                            font-weight:600;
                                                            text-decoration:none;
                                                            border-bottom:1px solid transparent;
                                                            transition:all .25s ease;
                                                        "
                                                        onmouseover="
                                                            this.style.color='#267a32';
                                                            this.style.borderBottomColor='#329b40';
                                                            this.querySelector('.action-arrow').style.transform='translateX(4px)';
                                                        "
                                                        onmouseout="
                                                            this.style.color='#329b40';
                                                            this.style.borderBottomColor='transparent';
                                                            this.querySelector('.action-arrow').style.transform='translateX(0)';
                                                        "
                                                        >
                                                            <i class="fas fa-copy"></i>
                                                            <span>Konfiguration kopieren</span>
                                                            <i class="fas fa-arrow-right action-arrow"
                                                            style="font-size:12px; transition:transform .25s ease;">
                                                            </i>
                                                        </a>

                                                    </div>

                                            </td>




                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                        {{-- Bottom Center Button --}}
                        <div style="display:flex; justify-content:center; margin-top:30px;">

                            {{-- <a href="{{ route('admin.rule-service.index') }}" wire:navigate
                                style="padding:14px 28px; background:#000; color:#fff; border-radius:14px; text-decoration:none; font-size:15px; font-weight:600; transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.background='#000'; this.style.transform='translateY(0)'">

                                <i class="fa fa-plus" style="margin-right:8px;"></i>
                                Add New Configuration
                            </a> --}}

                            {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#logicManagerModal">

                                
                                Add new configuration

                            </button> --}}

                            <button type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#logicManagerModal"
                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus plus-icon"
                                    style="transition:transform .3s ease;">
                                </i>

                                <span>Add new configuration</span>

                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->


        <!-- Modal -->

        <div class="modal fade" id="logicManagerModal" tabindex="-1" aria-hidden="true">
        {{-- <div class="modal fade {{ session('error') ? 'show' : '' }}"
    id="logicManagerModal"
    tabindex="-1"
    aria-hidden="{{ session('error') ? 'false' : 'true' }}"
    style="{{ session('error') ? 'display:block;' : '' }}"> --}}



            <div class="modal-dialog modal-xl modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">

                            <i class="fa fa-plus me-2"></i>

                            Create Configuration

                        </h4>

                        <button class="btn-close" data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <!-- LEFT PANEL -->

                            <div class="col-md-12">

                                <div class="card shadow-sm">

                                    {{-- <div class="card-header">
                                        <strong>Create Configuration</strong>
                                    </div> --}}

                                    <div class="card-body">

                                        <form action="{{ route('admin.initiate.config')}}" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            {{-- Configuration Name --}}
                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Configuration Name <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" name="config_name" class="form-control"
                                                    placeholder="Enter configuration name"
                                                    value="{{ old('configuration_name') }}" required>

                                                @error('configuration_name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror

                                            </div>


                                            {{-- File --}}
                                            <div class="mb-3">

                                                <label class="form-label">
                                                    File <span class="text-danger">*</span>
                                                </label>

                                                <input type="file" name="input_file" class="form-control"
                                                    accept=".pdf,.txt,.csv,.xlsx" required>

                                                <small class="text-muted">
                                                    Upload the file you want to use for this configuration.
                                                </small>

                                                @error('file')
                                                    <small class="text-danger d-block">
                                                        {{ $message }}
                                                    </small>
                                                @enderror

                                            </div>


                                            {{-- Action --}}
                                            <div class="mb-4">

                                                <label class="form-label">
                                                    What would you like to do?
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="border rounded p-3">




                                                    {{-- Direct Rules --}}
                                                    <div class="form-check">

                                                        <input class="form-check-input" type="radio" name="action"
                                                            id="create_rules_directly" value="direct"
                                                            {{ old('action', 'direct') == 'direct' ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="create_rules_directly">
                                                            <strong>Create rules directly</strong>

                                                            <small class="d-block text-muted">
                                                                Skip the scanning process and create
                                                                the rules directly from the file.
                                                            </small>
                                                        </label>

                                                    </div>

                                                    {{-- Scan --}}
                                                    <div class="form-check mb-3">

                                                        <input class="form-check-input" type="radio" name="action"
                                                            id="scan_before_rules" value="scan"
                                                            {{ old('action') == 'scan' ? 'checked' : '' }} required>

                                                        <label class="form-check-label" for="scan_before_rules">
                                                            <strong>Scan before creating rules</strong>

                                                            <small class="d-block text-muted">
                                                                Scan the uploaded file first and review
                                                                the results before creating rules.
                                                            </small>
                                                        </label>

                                                    </div>

                                                </div>

                                                @error('action')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror

                                            </div>


                                            {{-- Submit --}}
                                            {{-- <button type="submit" class="btn btn-success w-100">

                                                <i class="fas fa-plus me-1"></i>
                                                Create

                                            </button> --}}

                                            <button type="submit"
                                                {{-- data-bs-toggle="modal"
                                                data-bs-target="#logicManagerModal" --}}
                                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                                <i class="fa fa-plus plus-icon"
                                                    style="transition:transform .3s ease;">
                                                </i>

                                                <span>Create</span>

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="modal-footer">


                        <button type="button"
                            data-bs-dismiss="modal"
                            style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                            onmouseover="this.style.background='#dc3545'; this.querySelector('.close-icon').style.transform='rotate(90deg) scale(1.15)'"
                            onmouseout="this.style.background='#000'; this.querySelector('.close-icon').style.transform='rotate(0deg) scale(1)'">

                            <i class="fa fa-times close-icon"
                                style="transition:transform .3s ease;">
                            </i>

                            <span>Close</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-layouts::app>
