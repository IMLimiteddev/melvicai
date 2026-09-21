<x-layouts::app :title="__('Models')">
    <div class="page-body" id="pageBody">

        <div class="container-fluid">
            <div class="page-title">
                <div class="row">

                    @if (session('error'))
                        <div
                            style="
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
                            <li class="breadcrumb-item active">All Workflows</li>
                        </ol>
                    </div>
                    <div class="col-5 d-none d-xl-block">

                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">


                <div class="card">

                    <div class="card-header"
                        style="background:#fff;border:0;padding:24px 30px 20px;display:flex;align-items:center;justify-content:center;position:relative;">

                        <div style="text-align:center;">

                            <div
                                style="font-size:12px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:#888;margin-bottom:6px;">
                                Configuration
                            </div>

                            <h4 style="margin:0;font-size:25px;font-weight:700;color:#222;letter-spacing:-0.3px;">
                                Manage Workflows
                            </h4>

                            <div
                                style="width:45px;height:3px;background:#AEF09D;border-radius:10px;margin:10px auto 0;">
                            </div>

                        </div>

                        <!-- RIGHT: Eye Icon -->
                        <div style="position:absolute;left:30px;top:50%;transform:translateY(-50%);">

                            <a href="{{ url()->previous() }}" wire:navigate aria-label="Go back to file builder"
                                title="Go back"
                                style="width:44px;height:44px;border-radius:50%;background:#000;color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745';this.style.transform='scale(1.08)'"
                                onmouseout="this.style.background='#000';this.style.transform='scale(1)'">

                                <i class="fas fa-arrow-left" style="font-size:16px;"></i>

                            </a>

                        </div>


                        {{-- <div style="position:absolute;right:30px;top:50%;transform:translateY(-50%);">

                            <button type="button" data-bs-toggle="modal" data-bs-target="#connectorManagerModal"
                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus plus-icon" style="transition:transform .3s ease;">
                                </i>

                                <span>Create Connectors</span>

                            </button>

                        </div> --}}

                    </div>
                    <div class="card-body">

                        <div
                            style="
                                width:100%;
                                overflow-x:auto;
                                padding-bottom:8px;
                            ">

                            <table class="table align-middle"
                                style="
                                        width:100%;
                                        min-width:1200px;
                                        border-collapse:separate;
                                        border-spacing:0 10px;
                                        table-layout:auto;
                                    ">

                                <thead>
                                    <tr style="background:#f8f9fa;">

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                white-space:nowrap;
                                            ">
                                            Batch
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                min-width:330px;
                                            ">
                                            Input Connector
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                min-width:200px;
                                            ">
                                            Configuration
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                min-width:330px;
                                            ">
                                            Output Connector
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                white-space:nowrap;
                                            ">
                                            Status
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                text-align:center;
                                                white-space:nowrap;
                                            ">
                                            Usage
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                min-width:150px;
                                            ">
                                            User
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                text-align:center;
                                                min-width:220px;
                                            ">
                                            Status Reports
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                text-align:center;
                                                min-width:220px;
                                            ">
                                            Use Parameters
                                        </th>

                                        <th
                                            style="
                                                padding:15px;
                                                border:none;
                                                text-align:center;
                                                min-width:220px;
                                            ">
                                            Action
                                        </th>

                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($workflows as $workflow)

                                        @php

                                            /*
                                            |--------------------------------------------------------------------------
                                            | Get every individual workflow belonging to this batch
                                            |--------------------------------------------------------------------------
                                            */
                                            $configurationGroups = $workflow->workflow_items
                                                ->groupBy('configuration_id')
                                                ->values();

                                        @endphp


                                        {{-- ================================================================
                                            ONE BATCH = ONE TABLE ROW
                                            ================================================================ --}}

                                        <tr class="workflow-row">

                                            {{-- ============================================================
                                                BATCH
                                                ============================================================ --}}

                                            <td
                                                    class="workflow-batch-cell"
                                                    style="
                                                        padding:18px;
                                                        vertical-align:top;
                                                        min-width:180px;
                                                        background:#ffffff;
                                                    "
                                                >

                                                    <div
                                                        style="
                                                            display:flex;
                                                            flex-direction:column;
                                                            align-items:flex-start;
                                                            gap:14px;
                                                            background:#f8f9fa;
                                                            border:1px solid #e5e7eb;
                                                            border-radius:12px;
                                                            padding:14px;
                                                            box-shadow:0 2px 6px rgba(0,0,0,0.04);
                                                        "
                                                    >

                                                        <!-- Batch label -->
                                                        <div
                                                            style="
                                                                width:100%;
                                                                display:flex;
                                                                flex-direction:column;
                                                                gap:5px;
                                                            "
                                                        >

                                                            <span
                                                                style="
                                                                    font-size:10px;
                                                                    font-weight:700;
                                                                    color:#9ca3af;
                                                                    text-transform:uppercase;
                                                                    letter-spacing:0.7px;
                                                                "
                                                            >
                                                                Batch
                                                            </span>

                                                            <span
                                                                style="
                                                                    font-size:14px;
                                                                    font-weight:700;
                                                                    color:#185fa5;
                                                                    overflow-wrap:anywhere;
                                                                    word-break:break-word;
                                                                    line-height:1.4;
                                                                "
                                                            >
                                                                {{ $workflow->batch }}
                                                            </span>

                                                        </div>


                                                        <!-- Divider -->
                                                        <div
                                                            style="
                                                                width:100%;
                                                                height:1px;
                                                                background:#e5e7eb;
                                                            "
                                                        ></div>


                                                        <!-- Activate button -->
                                                        <form
                                                            id="activateConfigurationForm-{{ $workflow?->id }}"
                                                            action="{{ route('admin.workflow.configuration.activate') }}"
                                                            method="POST"
                                                            style="
                                                                margin:0;
                                                                width:100%;
                                                            "
                                                        >

                                                            @csrf

                                                            <input
                                                                type="hidden"
                                                                name="batch"
                                                                value="{{ $workflow?->batch }}"
                                                            >

                                                            <button
                                                                type="button"
                                                                class="activate-workflow-btn"
                                                                data-form-id="activateConfigurationForm-{{ $workflow?->id }}"
                                                                data-batch="{{ $workflow?->batch }}"
                                                                style="
                                                                    display:flex;
                                                                    align-items:center;
                                                                    justify-content:center;
                                                                    gap:8px;
                                                                    width:100%;
                                                                    padding:9px 14px;
                                                                    border:1px solid #329b40;
                                                                    border-radius:22px;
                                                                    background:#ffffff;
                                                                    color:#329b40;
                                                                    font-size:13px;
                                                                    font-weight:600;
                                                                    white-space:nowrap;
                                                                    cursor:pointer;
                                                                    transition:all 0.2s ease;
                                                                    box-sizing:border-box;
                                                                "
                                                            >

                                                                <i
                                                                    class="fas fa-power-off"
                                                                    style="font-size:12px;"
                                                                ></i>

                                                                <span>
                                                                    Activate
                                                                </span>

                                                                <i
                                                                    class="fas fa-arrow-right activate-arrow"
                                                                    style="
                                                                        font-size:11px;
                                                                        transition:transform 0.2s ease;
                                                                    "
                                                                ></i>

                                                            </button>

                                                        </form>

                                                    </div>

                                            </td>


                                           {{-- ============================================================
                                                INPUT CONNECTORS
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    min-width:330px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        /*
                                                        * The database contains one row for every
                                                        * input/output combination.
                                                        *
                                                        * Example:
                                                        * 2 -> Config 14 -> 3
                                                        * 2 -> Config 14 -> 1
                                                        * 4 -> Config 14 -> 3
                                                        * 4 -> Config 14 -> 1
                                                        *
                                                        * For display, we only want:
                                                        * 2
                                                        * 4
                                                        *
                                                        * Therefore remove duplicate connector names.
                                                        */
                                                        $configInputs = $configItems
                                                            ->pluck('input_name')
                                                            ->filter()
                                                            ->unique()
                                                            ->values();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                height:114px;
                                                                max-height:114px;
                                                                overflow-y:auto;
                                                                overflow-x:hidden;
                                                                padding-right:5px;
                                                            "
                                                        >

                                                            <div
                                                                style="
                                                                    display:grid;
                                                                    grid-template-columns:repeat(3,minmax(0,1fr));
                                                                    gap:8px;
                                                                    width:100%;
                                                                "
                                                            >

                                                                @forelse ($configInputs as $input)

                                                                    <div
                                                                        style="
                                                                            display:flex;
                                                                            align-items:flex-start;
                                                                            gap:7px;
                                                                            padding:9px 10px;
                                                                            background:#f8f9fa;
                                                                            border:1px solid #e5e7eb;
                                                                            border-radius:8px;
                                                                            font-size:12px;
                                                                            font-weight:600;
                                                                            color:#222;
                                                                            min-width:0;
                                                                            overflow-wrap:anywhere;
                                                                            word-break:break-word;
                                                                            line-height:1.4;
                                                                            box-sizing:border-box;
                                                                        "
                                                                    >

                                                                        <span
                                                                            style="
                                                                                width:7px;
                                                                                height:7px;
                                                                                min-width:7px;
                                                                                border-radius:50%;
                                                                                background:#AEF09D;
                                                                                display:inline-block;
                                                                                margin-top:4px;
                                                                            "
                                                                        ></span>

                                                                        <span
                                                                            style="
                                                                                min-width:0;
                                                                                overflow-wrap:anywhere;
                                                                                word-break:break-word;
                                                                            "
                                                                        >
                                                                            {{ $input }}
                                                                        </span>

                                                                    </div>

                                                                @empty

                                                                    <span
                                                                        style="
                                                                            color:#888;
                                                                            font-size:13px;
                                                                        "
                                                                    >
                                                                        No input connector
                                                                    </span>

                                                                @endforelse

                                                            </div>

                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                CONFIGURATION
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    min-width:200px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                padding:11px 12px;
                                                                background:#f8f9fa;
                                                                border:1px solid #e5e7eb;
                                                                border-radius:8px;
                                                                overflow-wrap:anywhere;
                                                                word-break:break-word;
                                                            "
                                                        >

                                                            <div
                                                                style="
                                                                    font-weight:600;
                                                                    color:#111827;
                                                                    font-size:13px;
                                                                    overflow-wrap:anywhere;
                                                                    word-break:break-word;
                                                                "
                                                            >
                                                                {{ $config->config_name }}
                                                            </div>

                                                            <div
                                                                style="
                                                                    font-size:11px;
                                                                    color:#6c757d;
                                                                    margin-top:4px;
                                                                "
                                                            >
                                                                Configuration #{{ $config->configuration_id }}
                                                            </div>

                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                OUTPUT CONNECTORS
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    min-width:330px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        /*
                                                        * Same principle as inputs.
                                                        *
                                                        * The database contains the Cartesian-product rows,
                                                        * so duplicate output connectors must be removed
                                                        * for display.
                                                        *
                                                        * Example:
                                                        * 3
                                                        * 3
                                                        * 1
                                                        * 1
                                                        *
                                                        * becomes:
                                                        * 3
                                                        * 1
                                                        */
                                                        $configOutputs = $configItems
                                                            ->pluck('output_name')
                                                            ->filter()
                                                            ->unique()
                                                            ->values();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                height:114px;
                                                                max-height:114px;
                                                                overflow-y:auto;
                                                                overflow-x:hidden;
                                                                padding-right:5px;
                                                            "
                                                        >

                                                            <div
                                                                style="
                                                                    display:grid;
                                                                    grid-template-columns:repeat(3,minmax(0,1fr));
                                                                    gap:8px;
                                                                    width:100%;
                                                                "
                                                            >

                                                                @forelse ($configOutputs as $output)

                                                                    <div
                                                                        style="
                                                                            display:flex;
                                                                            align-items:flex-start;
                                                                            gap:7px;
                                                                            padding:9px 10px;
                                                                            background:#f8f9fa;
                                                                            border:1px solid #e5e7eb;
                                                                            border-radius:8px;
                                                                            font-size:12px;
                                                                            font-weight:600;
                                                                            color:#222;
                                                                            min-width:0;
                                                                            overflow-wrap:anywhere;
                                                                            word-break:break-word;
                                                                            line-height:1.4;
                                                                            box-sizing:border-box;
                                                                        "
                                                                    >

                                                                        <span
                                                                            style="
                                                                                width:7px;
                                                                                height:7px;
                                                                                min-width:7px;
                                                                                border-radius:50%;
                                                                                background:#E94E1B;
                                                                                display:inline-block;
                                                                                margin-top:4px;
                                                                            "
                                                                        ></span>

                                                                        <span
                                                                            style="
                                                                                min-width:0;
                                                                                overflow-wrap:anywhere;
                                                                                word-break:break-word;
                                                                            "
                                                                        >
                                                                            {{ $output }}
                                                                        </span>

                                                                    </div>

                                                                @empty

                                                                    <span
                                                                        style="
                                                                            color:#888;
                                                                            font-size:13px;
                                                                        "
                                                                    >
                                                                        No output connector
                                                                    </span>

                                                                @endforelse

                                                            </div>

                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>

                                            {{-- ============================================================
                                                STATUS
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    white-space:nowrap;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        @if ($config->status === 'active')

                                                            <span
                                                                style="
                                                                    display:inline-flex;
                                                                    align-items:center;
                                                                    gap:6px;
                                                                    color:#28a745;
                                                                    font-size:14px;
                                                                    font-weight:600;
                                                                "
                                                            >

                                                                <span
                                                                    style="
                                                                        width:8px;
                                                                        height:8px;
                                                                        border-radius:50%;
                                                                        background:#28a745;
                                                                    "
                                                                ></span>

                                                                Active

                                                            </span>

                                                        @else

                                                            <div
                                                                style="
                                                                    display:flex;
                                                                    align-items:center;
                                                                    gap:15px;
                                                                "
                                                            >

                                                                <span
                                                                    style="
                                                                        display:inline-flex;
                                                                        align-items:center;
                                                                        gap:6px;
                                                                        color:#dc3545;
                                                                        font-size:14px;
                                                                        font-weight:600;
                                                                    "
                                                                >

                                                                    <span
                                                                        style="
                                                                            width:8px;
                                                                            height:8px;
                                                                            border-radius:50%;
                                                                            background:#dc3545;
                                                                        "
                                                                    ></span>

                                                                    Inactive

                                                                </span>


                                                                {{-- <form
                                                                    id="activateConfigurationForm-{{ $config->id }}"
                                                                    action="{{ route('admin.workflow.configuration.activate') }}"
                                                                    method="POST"
                                                                    style="margin:0;"
                                                                >

                                                                    @csrf

                                                                    <input
                                                                        type="hidden"
                                                                        name="configuration_id"
                                                                        value="{{ $config->configuration_id }}"
                                                                    >

                                                                    <input
                                                                        type="hidden"
                                                                        name="batch"
                                                                        value="{{ $config->batch }}"
                                                                    >

                                                                    <a
                                                                        href="javascript:void(0)"
                                                                        onclick="
                                                                            Swal.fire({
                                                                                title: 'Activate Configuration?',
                                                                                text: 'A test will be run to verify that the configured email credentials are correct. The configuration will only be activated if the test succeeds.',
                                                                                icon: 'warning',
                                                                                showCancelButton: true,
                                                                                confirmButtonText: 'Yes, Test & Activate',
                                                                                cancelButtonText: 'Cancel',
                                                                                reverseButtons: true,
                                                                                buttonsStyling: false,
                                                                                customClass: {
                                                                                    confirmButton: 'swal-confirm-button',
                                                                                    cancelButton: 'swal-cancel-button'
                                                                                }
                                                                            }).then((result) => {

                                                                                if (result.isConfirmed) {

                                                                                    document
                                                                                        .getElementById('workflowActivationLoader')
                                                                                        .style.display = 'flex';

                                                                                    document
                                                                                        .getElementById('activateConfigurationForm-{{ $config->id }}')
                                                                                        .submit();

                                                                                }

                                                                            });
                                                                        "
                                                                        style="
                                                                            display:inline-flex;
                                                                            align-items:center;
                                                                            gap:7px;
                                                                            padding:8px 4px;
                                                                            color:#329b40;
                                                                            font-size:14px;
                                                                            font-weight:600;
                                                                            text-decoration:none;
                                                                            white-space:nowrap;
                                                                            cursor:pointer;
                                                                        "
                                                                    >

                                                                        <i class="fas fa-power-off"></i>

                                                                        <span>Activate</span>

                                                                        <i
                                                                            class="fas fa-arrow-right"
                                                                            style="font-size:12px;"
                                                                        ></i>

                                                                    </a>

                                                                </form> --}}

                                                            </div>

                                                        @endif

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                USAGE
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    text-align:center;
                                                    vertical-align:top;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <span
                                                            style="
                                                                display:inline-flex;
                                                                align-items:center;
                                                                justify-content:center;
                                                                min-width:35px;
                                                                padding:6px 10px;
                                                                border-radius:20px;
                                                                background:#f1f3f5;
                                                                color:#111827;
                                                                font-size:13px;
                                                                font-weight:600;
                                                            "
                                                        >
                                                            {{ $config->usage_count }}
                                                        </span>

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                USER
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    min-width:150px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                padding:9px 11px;
                                                                background:#f8f9fa;
                                                                border:1px solid #e5e7eb;
                                                                border-radius:8px;
                                                                font-size:13px;
                                                                font-weight:500;
                                                                color:#495057;
                                                                overflow-wrap:anywhere;
                                                                word-break:break-word;
                                                            "
                                                        >
                                                            {{ $config->user_identifier }}
                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                REPORT
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    min-width:150px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                padding:9px 11px;
                                                                background:#f8f9fa;
                                                                border:1px solid #e5e7eb;
                                                                border-radius:8px;
                                                                font-size:13px;
                                                                font-weight:500;
                                                                color:#495057;
                                                                overflow-wrap:anywhere;
                                                                word-break:break-word;
                                                            "
                                                        >
                                                            Link here
                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                USE
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    vertical-align:top;
                                                    min-width:150px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                display:flex;
                                                                justify-content:center;
                                                                align-items:center;
                                                            "
                                                        >

                                                            @if ($config->status == 'inactive')
                                                                <span style="font-style: italic; color: red">Not Set yet</span>
                                                           
                                                                @else

                                                                    <a
                                                                        href="{{ route('admin.workflow.configuration.use', ['pair_code'=>$config?->pair_code, 'batch'=> $workflow?->batch, 'config_id' => $config?->configuration_id]) }}"
                                                                        style="
                                                                            display:inline-flex;
                                                                            align-items:center;
                                                                            gap:7px;
                                                                            padding:8px 4px;
                                                                            color:#329b40;
                                                                            font-size:14px;
                                                                            font-weight:600;
                                                                            text-decoration:none;
                                                                            white-space:nowrap;
                                                                        "
                                                                    >

                                                                        <i class="fas fa-eye"></i>

                                                                        <span>Use</span>

                                                                        <i
                                                                            class="fas fa-arrow-right"
                                                                            style="font-size:12px;"
                                                                        ></i>

                                                                    </a>

                                                            @endif

                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>


                                            {{-- ============================================================
                                                ACTION
                                                ============================================================ --}}

                                            <td
                                                style="
                                                    padding:0;
                                                    text-align:center;
                                                    vertical-align:top;
                                                    min-width:220px;
                                                    background:#ffffff;
                                                "
                                            >

                                                @foreach ($configurationGroups as $configIndex => $configItems)

                                                    @php

                                                        $config = $configItems->first();

                                                        $configInputs = $configItems
                                                            ->pluck('input_name')
                                                            ->filter()
                                                            ->values();

                                                        $configOutputs = $configItems
                                                            ->pluck('output_name')
                                                            ->filter()
                                                            ->values();

                                                        $isFirstConfiguration = $configIndex === 0;

                                                        $rowBackground = $configIndex % 2 === 0
                                                            ? '#ffffff'
                                                            : '#f7f9fb';

                                                    @endphp


                                                    <div
                                                        style="
                                                            height:150px;
                                                            padding:18px;
                                                            background:{{ $rowBackground }};
                                                            {{ !$isFirstConfiguration ? 'border-top:12px solid #ffffff;' : '' }}
                                                            box-sizing:border-box;
                                                            overflow:hidden;
                                                        "
                                                    >

                                                        <div
                                                            style="
                                                                display:flex;
                                                                gap:14px;
                                                                justify-content:center;
                                                                align-items:center;
                                                                flex-wrap:wrap;
                                                            "
                                                        >

                                                            <a
                                                                href="{{ route('admin.workflow.single', ['id' => $config->id]) }}"
                                                                style="
                                                                    display:inline-flex;
                                                                    align-items:center;
                                                                    gap:7px;
                                                                    padding:8px 4px;
                                                                    color:#329b40;
                                                                    font-size:14px;
                                                                    font-weight:600;
                                                                    text-decoration:none;
                                                                    white-space:nowrap;
                                                                "
                                                            >

                                                                <i class="fas fa-eye"></i>

                                                                <span>View workflow</span>

                                                                <i
                                                                    class="fas fa-arrow-right"
                                                                    style="font-size:12px;"
                                                                ></i>

                                                            </a>


                                                            <a
                                                                href="javascript:void(0)"
                                                                onclick="openEditWorkflowModal(
                                                                    @js($config->batch),
                                                                    @js($config->configuration_id),
                                                                    @js($configInputs),
                                                                    @js($configOutputs)
                                                                )"
                                                                style="
                                                                    display:inline-flex;
                                                                    align-items:center;
                                                                    gap:7px;
                                                                    padding:8px 4px;
                                                                    color:#329b40;
                                                                    font-size:14px;
                                                                    font-weight:600;
                                                                    text-decoration:none;
                                                                    white-space:nowrap;
                                                                    cursor:pointer;
                                                                "
                                                            >

                                                                <i class="fas fa-edit"></i>

                                                                <span>Edit workflow</span>

                                                                <i
                                                                    class="fas fa-arrow-right"
                                                                    style="font-size:12px;"
                                                                ></i>

                                                            </a>

                                                        </div>

                                                    </div>

                                                @endforeach

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>


                        {{-- Bottom Center Button --}}
                        <div style="display:flex; justify-content:center; margin-top:30px;">



                            <button type="button" data-bs-toggle="modal" data-bs-target="#logicManagerModal"
                                style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus plus-icon" style="transition:transform .3s ease;">
                                </i>

                                <span>Create Workflow</span>

                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="logicManagerModal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-xl modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header" style="background:#fff;border-bottom:1px solid #eee;padding:20px 24px;">
                        <h4 class="modal-title" style="font-weight:700;color:#222;margin:0;">
                            <i class="fa fa-project-diagram me-2"></i>
                            Manage Workflow
                        </h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body" style="padding:24px;">

                        <form action="{{ route('admin.initiate.workflow') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                {{-- INPUT CONNECTOR --}}
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight:600;color:#333;margin-bottom:8px;">
                                        Input Connector
                                        <span style="color:#dc3545;">*</span>
                                    </label>

                                    <select name="input_connector" class="form-select" required
                                        style="height:48px;border-radius:10px;border:1px solid #dee2e6;padding:0 14px;">

                                        <option value="" selected disabled>
                                            Select input connector
                                        </option>

                                        @foreach ($workflowConnectors as $connector)
                                            @if ($connector->type === 'input')
                                                <option value="{{ $connector->id }}">
                                                    {{ $connector->name }}
                                                </option>
                                            @endif
                                        @endforeach



                                    </select>
                                </div>


                                {{-- CONFIGURATION --}}
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight:600;color:#333;margin-bottom:8px;">
                                        Configuration
                                        <span style="color:#dc3545;">*</span>
                                    </label>

                                    <select name="configuration_id" class="form-select" required
                                        style="height:48px;border-radius:10px;border:1px solid #dee2e6;padding:0 14px;">

                                        <option value="" selected disabled>
                                            Select configuration
                                        </option>

                                        @foreach ($configs as $config)
                                            <option value="{{ $config->id }}">
                                                Config ID: {{ $config->id }} -
                                                {{ $config->name ?? $config->config_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>


                                {{-- OUTPUT CONNECTOR --}}
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight:600;color:#333;margin-bottom:8px;">
                                        Output Connector
                                        <span style="color:#dc3545;">*</span>
                                    </label>

                                    <select name="output_connector" class="form-select" required
                                        style="height:48px;border-radius:10px;border:1px solid #dee2e6;padding:0 14px;">

                                        <option value="" selected disabled>
                                            Select output connector
                                        </option>

                                        @foreach ($workflowConnectors as $connector)
                                            @if ($connector->type === 'output')
                                                <option value="{{ $connector->id }}">
                                                    {{ $connector->name }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                            </div>


                            {{-- CREATE BUTTON --}}
                            <div style="display:flex;justify-content:flex-left;margin-top:25px;">

                                <button type="submit"
                                    style="height:48px;padding:0 22px;border-radius:24px;background:#000;color:#fff;border:none;display:flex;align-items:center;justify-content:center;gap:10px;font-size:15px;cursor:pointer;transition:background .3s ease,transform .3s ease;"
                                    onmouseover="this.style.background='#28a745';this.style.transform='translateY(-2px)'"
                                    onmouseout="this.style.background='#000';this.style.transform='translateY(0)'">

                                    <i class="fa fa-plus"></i>

                                    <span>Create Workflow</span>

                                </button>

                            </div>

                        </form>

                    </div>


                    <div class="modal-footer" style="border-top:1px solid #eee;padding:16px 24px;">

                        <button type="button" data-bs-dismiss="modal"
                            style="height:48px;padding:0 18px;border-radius:24px;background:#000;color:#fff;border:none;display:flex;align-items:center;justify-content:center;gap:10px;font-size:15px;cursor:pointer;transition:background .3s ease,transform .3s ease;"
                            onmouseover="this.style.background='#dc3545';this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.background='#000';this.style.transform='translateY(0)'">

                            <i class="fa fa-times"></i>

                            <span>Close</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="connectorManagerModal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-xl modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header" style="background:#fff;border-bottom:1px solid #eee;padding:20px 24px;">

                        <h4 class="modal-title" style="font-weight:700;color:#222;margin:0;">

                            <i class="fa fa-plug me-2"></i>
                            Create Connector

                        </h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                    </div>


                    <div class="modal-body" style="padding:24px;">

                        <form action="{{ route('admin.workflow.connector.store') }}" method="POST">

                            @csrf

                            <div class="row g-3">

                                {{-- CONNECTOR NAME --}}
                                <div class="col-md-6">

                                    <label class="form-label" style="font-weight:600;color:#333;margin-bottom:8px;">

                                        Connector Name
                                        <span style="color:#dc3545;">*</span>

                                    </label>

                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter connector name" value="{{ old('name') }}" required
                                        style="height:48px;border-radius:10px;border:1px solid #dee2e6;padding:0 14px;">

                                </div>


                                {{-- CONNECTOR TYPE --}}
                                <div class="col-md-6">

                                    <label class="form-label" style="font-weight:600;color:#333;margin-bottom:8px;">

                                        Connector Type
                                        <span style="color:#dc3545;">*</span>

                                    </label>

                                    <select name="type" class="form-select" required
                                        style="height:48px;border-radius:10px;border:1px solid #dee2e6;padding:0 14px;">

                                        <option value="" selected disabled>
                                            Select connector type
                                        </option>

                                        <option value="input">
                                            Input
                                        </option>

                                        <option value="output">
                                            Output
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- CREATE BUTTON --}}
                            <div style="display:flex;justify-content:flex-start;margin-top:25px;">

                                <button type="submit"
                                    style="height:48px;padding:0 22px;border-radius:24px;background:#000;color:#fff;border:none;display:flex;align-items:center;justify-content:center;gap:10px;font-size:15px;cursor:pointer;transition:background .3s ease,transform .3s ease;"
                                    onmouseover="this.style.background='#28a745';this.style.transform='translateY(-2px)'"
                                    onmouseout="this.style.background='#000';this.style.transform='translateY(0)'">

                                    <i class="fa fa-plus"></i>

                                    <span>Create Connector</span>

                                </button>

                            </div>

                        </form>

                    </div>


                    <div class="modal-footer" style="border-top:1px solid #eee;padding:16px 24px;">

                        <button type="button" data-bs-dismiss="modal"
                            style="height:48px;padding:0 18px;border-radius:24px;background:#000;color:#fff;border:none;display:flex;align-items:center;justify-content:center;gap:10px;font-size:15px;cursor:pointer;transition:background .3s ease,transform .3s ease;"
                            onmouseover="this.style.background='#dc3545';this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.background='#000';this.style.transform='translateY(0)'">

                            <i class="fa fa-times"></i>

                            <span>Close</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- EDIT WORKFLOW MODAL --}}
        <div class="modal fade" id="editWorkflowModal" tabindex="-1" aria-labelledby="editWorkflowModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-xl modal-dialog-centered">

                <div class="modal-content">

                    {{-- HEADER --}}
                    <div class="modal-header"
                        style="
                                background:#fff;
                                border-bottom:1px solid #eee;
                                padding:20px 24px;
                            ">

                        <div>

                            <h4 id="editWorkflowModalLabel"
                                style="
                                        font-weight:700;
                                        color:#222;
                                        margin:0;
                                    ">

                                <i class="fa fa-edit me-2"></i>
                                Edit Workflow

                            </h4>

                            <div id="editWorkflowBatch"
                                style="
                                        margin-top:5px;
                                        font-size:12px;
                                        color:#777;
                                        word-break:break-all;
                                    ">
                            </div>

                        </div>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                    </div>


                    {{-- BODY --}}
                    <div class="modal-body"
                        style="
                                padding:24px;
                                max-height:70vh;
                                overflow-y:auto;
                            ">

                        <form id="editWorkflowForm" action="{{ route('admin.workflow.update') }}" method="POST">

                            @csrf

                            <input type="hidden" name="batch" id="editWorkflowBatchInput">


                            {{-- INPUT CONNECTORS --}}
                            <div style="margin-bottom:30px;">

                                <div
                                    style="
                                        display:flex;
                                        align-items:center;
                                        justify-content:space-between;
                                        margin-bottom:15px;
                                    ">

                                    <div>

                                        <h5
                                            style="
                                                margin:0;
                                                font-weight:700;
                                                color:#222;
                                            ">
                                            Input Connectors
                                        </h5>

                                        <small style="color:#777;">
                                            Select an existing input connector or add a new one
                                        </small>

                                    </div>


                                    <button type="button" onclick="addEditConnector('input')"
                                        style="
                                                height:40px;
                                                padding:0 16px;
                                                border-radius:20px;
                                                background:#000;
                                                color:#fff;
                                                border:none;
                                                display:flex;
                                                align-items:center;
                                                gap:8px;
                                                font-size:14px;
                                                cursor:pointer;
                                                transition:all .3s ease;
                                            "
                                        onmouseover="
                                                this.style.background='#28a745';
                                                this.style.transform='translateY(-2px)';
                                            "
                                        onmouseout="
                                                this.style.background='#000';
                                                this.style.transform='translateY(0)';
                                            ">

                                        <i class="fa fa-plus"></i>

                                        Add Input

                                    </button>

                                </div>


                                <div id="editInputConnectors"></div>

                            </div>

                            {{-- CONFIGURATION --}}
                            <div style="margin-bottom:25px;">

                                <label class="form-label"
                                    style="font-weight:600;color:#333;margin-bottom:8px;">
                                    Configuration <span style="color:#dc3545;">*</span>
                                </label>

                                <select name="configuration_id"
                                    id="editWorkflowConfiguration"
                                    class="form-select"
                                    required
                                    style="height:48px;border-radius:10px;border:1px solid #dee2e6;padding:0 14px;cursor:pointer;">

                                    <option value="" selected disabled>
                                        Select configuration
                                    </option>

                                    @foreach ($configs as $config)

                                        <option value="{{ $config->id }}">
                                            {{ $config->config_name ?? $config->file_name ?? 'Configuration #'.$config->id }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            {{-- OUTPUT CONNECTORS --}}
                            <div>

                                <div
                                    style="
                                        display:flex;
                                        align-items:center;
                                        justify-content:space-between;
                                        margin-bottom:15px;
                                    ">

                                    <div>

                                        <h5
                                            style="
                                                margin:0;
                                                font-weight:700;
                                                color:#222;
                                            ">
                                            Output Connectors
                                        </h5>

                                        <small style="color:#777;">
                                            Select an existing output connector or add a new one
                                        </small>

                                    </div>


                                    <button type="button" onclick="addEditConnector('output')"
                                        style="
                                                height:40px;
                                                padding:0 16px;
                                                border-radius:20px;
                                                background:#000;
                                                color:#fff;
                                                border:none;
                                                display:flex;
                                                align-items:center;
                                                gap:8px;
                                                font-size:14px;
                                                cursor:pointer;
                                                transition:all .3s ease;
                                            "
                                        onmouseover="
                                                this.style.background='#28a745';
                                                this.style.transform='translateY(-2px)';
                                            "
                                        onmouseout="
                                                this.style.background='#000';
                                                this.style.transform='translateY(0)';
                                            ">

                                        <i class="fa fa-plus"></i>

                                        Add Output

                                    </button>

                                </div>


                                <div id="editOutputConnectors"></div>

                            </div>

                        </form>

                    </div>


                    {{-- FOOTER --}}
                    <div class="modal-footer"
                        style="
                                border-top:1px solid #eee;
                                padding:16px 24px;
                            ">

                        <button type="button" data-bs-dismiss="modal"
                            style="
                                    height:48px;
                                    padding:0 18px;
                                    border-radius:24px;
                                    background:#000;
                                    color:#fff;
                                    border:none;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    gap:10px;
                                    font-size:15px;
                                    cursor:pointer;
                                    transition:all .3s ease;
                                "
                            onmouseover="
                                    this.style.background='#dc3545';
                                    this.style.transform='translateY(-2px)';
                                "
                            onmouseout="
                                    this.style.background='#000';
                                    this.style.transform='translateY(0)';
                                ">

                            <i class="fa fa-times"></i>
                            <span>Close</span>

                        </button>


                        <button type="submit" form="editWorkflowForm"
                            style="
                                    height:48px;
                                    padding:0 22px;
                                    border-radius:24px;
                                    background:#000;
                                    color:#fff;
                                    border:none;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    gap:10px;
                                    font-size:15px;
                                    cursor:pointer;
                                    transition:all .3s ease;
                                "
                            onmouseover="
                                    this.style.background='#28a745';
                                    this.style.transform='translateY(-2px)';
                                "
                            onmouseout="
                                    this.style.background='#000';
                                    this.style.transform='translateY(0)';
                                ">

                            <i class="fa fa-save"></i>
                            <span>Save Changes</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- WORKFLOW ACTIVATION PRELOADER --}}
    <div
        id="workflowActivationLoader"
        style="
            display:none;
            position:fixed;
            inset:0;
            width:100%;
            height:100%;
            background:rgba(255,255,255,0.97);
            z-index:999999;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            text-align:center;
        ">

        {{-- Spinner --}}
        <div
            style="
                width:55px;
                height:55px;
                border:5px solid #e9e9e9;
                border-top:5px solid #329b40;
                border-radius:50%;
                animation:workflowLoaderSpin 1s linear infinite;
            ">
        </div>

        {{-- Title --}}
        <div
            style="
                margin-top:22px;
                font-size:20px;
                font-weight:700;
                color:#222;
            ">

            Testing Configuration

        </div>

        {{-- Description --}}
        <div
            style="
                margin-top:8px;
                font-size:14px;
                color:#777;
                max-width:430px;
                line-height:1.6;
            ">

            Please wait while we verify the email credentials
            and activate your workflow.

        </div>

        {{-- Small status --}}
        <div
            style="
                margin-top:18px;
                display:inline-flex;
                align-items:center;
                gap:7px;
                color:#329b40;
                font-size:13px;
                font-weight:600;
            ">

            <span
                style="
                    width:7px;
                    height:7px;
                    background:#329b40;
                    border-radius:50%;
                    display:inline-block;
                ">
            </span>

            Do not close this page

        </div>

    </div>


    <style>
        @keyframes workflowLoaderSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>


    <script>
        let editInputIndex = 0;
        let editOutputIndex = 0;


        function openEditWorkflowModal(batch, configurationId, inputs, outputs) {

            editInputIndex = 0;
            editOutputIndex = 0;

            document.getElementById('editWorkflowBatch').textContent =
                'Batch: ' + batch;

            document.getElementById('editWorkflowBatchInput').value =
                batch;

            document.getElementById('editWorkflowConfiguration').value =
                configurationId;

            document.getElementById('editInputConnectors').innerHTML = '';
            document.getElementById('editOutputConnectors').innerHTML = '';

            if (Array.isArray(inputs)) {

                inputs.forEach(function(input) {

                    addEditConnector('input', input);

                });

            }

            if (Array.isArray(outputs)) {

                outputs.forEach(function(output) {

                    addEditConnector('output', output);

                });

            }

            const modalElement =
                document.getElementById('editWorkflowModal');

            if (!modalElement) {

                console.error('editWorkflowModal not found');

                return;
            }

            const modal =
                new bootstrap.Modal(modalElement);

            modal.show();
        }


        function addEditConnector(type, selectedValue = '') {

            let container;


            if (type === 'input') {

                container =
                    document.getElementById('editInputConnectors');

                editInputIndex++;

            } else {

                container =
                    document.getElementById('editOutputConnectors');

                editOutputIndex++;

            }


            const row =
                document.createElement('div');


            row.style.cssText = `
                display:flex;
                align-items:center;
                gap:10px;
                margin-bottom:10px;
            `;


            /*
            |--------------------------------------------------------------------------
            | SELECT
            |--------------------------------------------------------------------------
            */

            const select =
                document.createElement('select');


            select.name =
                type + '_connectors[]';

            select.className =
                'form-select';

            select.required = true;


            select.style.cssText = `
                height:48px;
                border-radius:10px;
                border:1px solid #dee2e6;
                padding:0 14px;
                flex:1;
                cursor:pointer;
            `;


            /*
            |--------------------------------------------------------------------------
            | PLACEHOLDER
            |--------------------------------------------------------------------------
            */

            const placeholder =
                document.createElement('option');

            placeholder.value = '';

            placeholder.textContent =
                'Select ' + type + ' connector';

            placeholder.disabled = true;

            if (!selectedValue) {

                placeholder.selected = true;

            }

            select.appendChild(placeholder);


            /*
            |--------------------------------------------------------------------------
            | DATABASE CONNECTORS
            |--------------------------------------------------------------------------
            */

            @foreach ($workflowConnectors as $connector)

                if ('{{ $connector->type }}' === type) {

                    const option =
                        document.createElement('option');

                    option.value =
                        @js($connector->name);

                    option.textContent =
                        @js($connector->name);


                    if (
                        selectedValue ===
                        @js($connector->name)
                    ) {

                        option.selected = true;

                    }


                    select.appendChild(option);

                }
            @endforeach


            /*
            |--------------------------------------------------------------------------
            | ADD NEW CONNECTOR BUTTON
            |--------------------------------------------------------------------------
            */

            const addButton =
                document.createElement('button');


            addButton.type = 'button';


            addButton.innerHTML =
                '<i class="fa fa-plus"></i>';


            addButton.title =
                'Create new ' + type + ' connector';


            addButton.style.cssText = `
                width:42px;
                height:42px;
                border-radius:50%;
                background:#000;
                color:#fff;
                border:none;
                display:flex;
                align-items:center;
                justify-content:center;
                cursor:pointer;
                flex-shrink:0;
                transition:all .3s ease;
            `;


            addButton.onmouseover = function() {

                this.style.background = '#28a745';

                this.style.transform =
                    'rotate(90deg)';

            };


            addButton.onmouseout = function() {

                this.style.background = '#000';

                this.style.transform =
                    'rotate(0deg)';

            };


            addButton.onclick = function() {

                openCreateConnectorFromEdit(type);

            };


            /*
            |--------------------------------------------------------------------------
            | REMOVE BUTTON
            |--------------------------------------------------------------------------
            */

            const removeButton =
                document.createElement('button');


            removeButton.type = 'button';


            removeButton.innerHTML =
                '<i class="fa fa-times"></i>';


            removeButton.title =
                'Remove connector';


            removeButton.style.cssText = `
                width:42px;
                height:42px;
                border-radius:50%;
                background:#000;
                color:#fff;
                border:none;
                display:flex;
                align-items:center;
                justify-content:center;
                cursor:pointer;
                flex-shrink:0;
                transition:all .3s ease;
            `;


            removeButton.onmouseover = function() {

                this.style.background = '#dc3545';

                this.style.transform =
                    'rotate(90deg)';

            };


            removeButton.onmouseout = function() {

                this.style.background = '#000';

                this.style.transform =
                    'rotate(0deg)';

            };


            removeButton.onclick = function() {

                row.remove();

            };


            /*
            |--------------------------------------------------------------------------
            | BUILD ROW
            |--------------------------------------------------------------------------
            */

            row.appendChild(select);

            row.appendChild(addButton);

            row.appendChild(removeButton);

            container.appendChild(row);

        }


        /*
        |--------------------------------------------------------------------------
        | OPEN CREATE CONNECTOR MODAL
        |--------------------------------------------------------------------------
        */

        function openCreateConnectorFromEdit(type) {

            const editModal =
                bootstrap.Modal.getInstance(
                    document.getElementById('editWorkflowModal')
                );


            if (editModal) {

                editModal.hide();

            }


            const createModalElement =
                document.getElementById('connectorManagerModal');


            if (!createModalElement) {

                console.error(
                    'connectorManagerModal not found'
                );

                return;

            }


            /*
            | Set connector type automatically
            */

            const typeSelect =
                createModalElement.querySelector(
                    'select[name="type"]'
                );


            if (typeSelect) {

                typeSelect.value = type;

            }


            const createModal =
                new bootstrap.Modal(createModalElement);


            createModal.show();

        }


        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        /*
        |--------------------------------------------------------------------------
        | ACTIVATION SETTINGS
        |--------------------------------------------------------------------------
        */

        const workflowActivationSettings = {

            title: 'Activate Workflow Batch?',

            text: 'A test will be run to verify that the configured credentials are correct. The workflow will only be activated if the test succeeds.',

            icon: 'warning',

            confirmButtonText: 'Yes, Test & Activate',

            cancelButtonText: 'Cancel'

        };


        /*
        |--------------------------------------------------------------------------
        | ACTIVATE WORKFLOW
        |--------------------------------------------------------------------------
        */

        document.addEventListener('click', function (event) {

            const button =
                event.target.closest('.activate-workflow-btn');

            if (!button) {
                return;
            }


            const formId =
                button.dataset.formId;

            const form =
                document.getElementById(formId);

            if (!form) {
                return;
            }


            Swal.fire({

                title:
                    workflowActivationSettings.title,

                text:
                    workflowActivationSettings.text,

                icon:
                    workflowActivationSettings.icon,

                showCancelButton: true,

                confirmButtonText:
                    workflowActivationSettings.confirmButtonText,

                cancelButtonText:
                    workflowActivationSettings.cancelButtonText,

                reverseButtons: true,

                buttonsStyling: false,

                customClass: {

                    confirmButton:
                        'swal-confirm-button',

                    cancelButton:
                        'swal-cancel-button'

                }

            }).then((result) => {

                if (!result.isConfirmed) {
                    return;
                }


                const loader =
                    document.getElementById(
                        'workflowActivationLoader'
                    );

                if (loader) {
                    loader.style.display = 'flex';
                }


                form.submit();

            });

        });


        /*
        |--------------------------------------------------------------------------
        | BUTTON HOVER EFFECT
        |--------------------------------------------------------------------------
        */

        document.addEventListener('mouseover', function (event) {

            const button =
                event.target.closest('.activate-workflow-btn');

            if (!button) {
                return;
            }

            button.style.background = '#329b40';
            button.style.color = '#fff';
            button.style.transform = 'translateY(-1px)';

            const arrow =
                button.querySelector('.activate-arrow');

            if (arrow) {
                arrow.style.transform = 'translateX(3px)';
            }

        });


        document.addEventListener('mouseout', function (event) {

            const button =
                event.target.closest('.activate-workflow-btn');

            if (!button) {
                return;
            }

            button.style.background = '#fff';
            button.style.color = '#329b40';
            button.style.transform = 'translateY(0)';

            const arrow =
                button.querySelector('.activate-arrow');

            if (arrow) {
                arrow.style.transform = 'translateX(0)';
            }

        });

    </script>
    
</x-layouts::app>
