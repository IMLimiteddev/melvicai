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
                                            Action
                                        </th>

                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($workflows as $workflow)
                                        <tr
                                            style="
                                                background:#fff;
                                                box-shadow:0 2px 12px rgba(0,0,0,0.05);
                                                border-radius:12px;
                                            ">

                                            {{-- BATCH --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    vertical-align:top;
                                                    min-width:160px;
                                                ">

                                                <div
                                                    style="
                                                        background:#f8f9fa;
                                                        border:1px solid #e5e7eb;
                                                        border-radius:8px;
                                                        padding:9px 11px;
                                                    ">

                                                    <span
                                                        style="
                                                            font-size:12px;
                                                            font-weight:600;
                                                            color:#185fa5;
                                                            overflow-wrap:anywhere;
                                                            word-break:break-word;
                                                        ">
                                                        {{ $workflow->batch }}
                                                    </span>

                                                </div>

                                            </td>


                                            {{-- INPUT CONNECTORS --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    vertical-align:top;
                                                    min-width:330px;
                                                ">

                                                <div
                                                    style="
                                                        max-height:180px;
                                                        overflow-y:auto;
                                                        overflow-x:hidden;
                                                        padding-right:5px;
                                                    ">

                                                    <div
                                                        style="
                                                            display:grid;
                                                            grid-template-columns:repeat(3, minmax(0, 1fr));
                                                            gap:8px;
                                                            width:100%;
                                                        ">

                                                        @forelse ($workflow->inputs as $input)
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
                                                                ">

                                                                <span
                                                                    style="
                                                                        width:7px;
                                                                        height:7px;
                                                                        min-width:7px;
                                                                        border-radius:50%;
                                                                        background:#AEF09D;
                                                                        display:inline-block;
                                                                        margin-top:4px;
                                                                    "></span>

                                                                <span
                                                                    style="
                                                                        min-width:0;
                                                                        overflow-wrap:anywhere;
                                                                        word-break:break-word;
                                                                    ">
                                                                    {{ $input }}
                                                                </span>

                                                            </div>

                                                        @empty

                                                            <span
                                                                style="
                                                                    color:#888;
                                                                    font-size:13px;
                                                                ">
                                                                No input connector
                                                            </span>
                                                        @endforelse

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- CONFIGURATION --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    vertical-align:top;
                                                    min-width:200px;
                                                ">

                                                <div
                                                    style="
                                                        display:flex;
                                                        flex-direction:column;
                                                        gap:7px;
                                                    ">

                                                    <div
                                                        style="
                                                            padding:9px 11px;
                                                            background:#f8f9fa;
                                                            border:1px solid #e5e7eb;
                                                            border-radius:8px;
                                                        ">

                                                        <div
                                                            style="
                                                                font-weight:600;
                                                                color:#111827;
                                                                font-size:13px;
                                                                overflow-wrap:anywhere;
                                                                word-break:break-word;
                                                            ">
                                                            {{ $workflow->config_name }}
                                                        </div>

                                                        <div
                                                            style="
                                                                font-size:11px;
                                                                color:#6c757d;
                                                                margin-top:4px;
                                                            ">
                                                            Configuration #{{ $workflow->configuration_id }}
                                                        </div>

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- OUTPUT CONNECTORS --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    vertical-align:top;
                                                    min-width:330px;
                                                ">

                                                <div
                                                    style="
                                                        max-height:180px;
                                                        overflow-y:auto;
                                                        overflow-x:hidden;
                                                        padding-right:5px;
                                                    ">

                                                    <div
                                                        style="
                                                            display:grid;
                                                            grid-template-columns:repeat(3, minmax(0, 1fr));
                                                            gap:8px;
                                                            width:100%;
                                                        ">

                                                        @forelse ($workflow->outputs as $output)
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
                                                                ">

                                                                <span
                                                                    style="
                                                                        width:7px;
                                                                        height:7px;
                                                                        min-width:7px;
                                                                        border-radius:50%;
                                                                        background:#E94E1B;
                                                                        display:inline-block;
                                                                        margin-top:4px;
                                                                    "></span>

                                                                <span
                                                                    style="
                                                                        min-width:0;
                                                                        overflow-wrap:anywhere;
                                                                        word-break:break-word;
                                                                    ">
                                                                    {{ $output }}
                                                                </span>

                                                            </div>

                                                        @empty

                                                            <span
                                                                style="
                                                                    color:#888;
                                                                    font-size:13px;
                                                                ">
                                                                No output connector
                                                            </span>
                                                        @endforelse

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- STATUS --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    vertical-align:top;
                                                    white-space:nowrap;
                                                ">

                                                @if ($workflow->status === 'active')
                                                    <span
                                                        style="
                                                            display:inline-flex;
                                                            align-items:center;
                                                            gap:6px;
                                                            color:#28a745;
                                                            font-size:14px;
                                                            font-weight:600;
                                                        ">

                                                        <span
                                                            style="
                                                                width:8px;
                                                                height:8px;
                                                                border-radius:50%;
                                                                background:#28a745;
                                                            "></span>

                                                        Active

                                                    </span>
                                                @else
                                                    <span
                                                        style="
                                                            display:inline-flex;
                                                            align-items:center;
                                                            gap:6px;
                                                            color:#dc3545;
                                                            font-size:14px;
                                                            font-weight:600;
                                                        ">

                                                        <span
                                                            style="
                                                                width:8px;
                                                                height:8px;
                                                                border-radius:50%;
                                                                background:#dc3545;
                                                            "></span>

                                                        Inactive

                                                    </span>
                                                @endif

                                            </td>


                                            {{-- USAGE --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    text-align:center;
                                                    vertical-align:top;
                                                ">

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
                                                    ">
                                                    {{ $workflow->usage_count }}
                                                </span>

                                            </td>


                                            {{-- USER --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    vertical-align:top;
                                                    min-width:150px;
                                                ">

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
                                                    ">
                                                    {{ $workflow->user_identifier }}
                                                </div>

                                            </td>


                                            {{-- ACTION --}}
                                            <td
                                                style="
                                                    padding:18px;
                                                    text-align:center;
                                                    vertical-align:top;
                                                ">

                                                <div
                                                    style="
                                                        display:flex;
                                                        gap:14px;
                                                        justify-content:center;
                                                        align-items:center;
                                                        flex-wrap:wrap;
                                                    ">

                                                    {{-- VIEW --}}
                                                    <a href="#"
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
                                                                white-space:nowrap;
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
                                                            ">

                                                        <i class="fas fa-eye"></i>

                                                        <span>View workflow</span>

                                                        <i class="fas fa-arrow-right action-arrow"
                                                            style="
                                                                    font-size:12px;
                                                                    transition:transform .25s ease;
                                                                ">
                                                        </i>

                                                    </a>


                                                    {{-- EDIT --}}
                                                    <a href="#"
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
                                                                white-space:nowrap;
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
                                                            ">

                                                        <i class="fas fa-edit"></i>

                                                        <span>Edit workflow</span>

                                                        <i class="fas fa-arrow-right action-arrow"
                                                            style="
                                                                    font-size:12px;
                                                                    transition:transform .25s ease;
                                                                ">
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

    </div>
</x-layouts::app>
