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
                                Connectors
                            </div>

                            <h4 style="margin:0;font-size:25px;font-weight:700;color:#222;letter-spacing:-0.3px;">
                                Manage Connectors
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
                                background:#fff;
                                border:1px solid #eee;
                                border-radius:16px;
                                padding:24px;
                                box-shadow:0 2px 12px rgba(0,0,0,0.05);
                                margin-bottom:25px;
                            ">

                            <div
                                style="
                                    display:flex;
                                    align-items:center;
                                    justify-content:space-between;
                                    gap:20px;
                                    flex-wrap:wrap;
                                ">

                                <div>

                                    <div
                                        style="
                                            font-size:18px;
                                            font-weight:700;
                                            color:#111827;
                                            margin-bottom:5px;
                                        ">
                                        Create Connector
                                    </div>

                                    <div
                                        style="
                                            font-size:14px;
                                            color:#6c757d;
                                        ">
                                        Create an input or output connector for your workflows.
                                    </div>

                                </div>


                                <button type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#createConnectorModal"

                                    style="
                                        height:48px;
                                        padding:0 20px;
                                        border-radius:24px;
                                        background:#000;
                                        color:#fff;
                                        border:none;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        gap:10px;
                                        font-size:15px;
                                        font-weight:600;
                                        cursor:pointer;
                                        transition:background .3s ease;
                                    "

                                    onmouseover="
                                        this.style.background='#28a745';
                                        this.querySelector('.connector-plus').style.transform='rotate(90deg) scale(1.15)';
                                    "

                                    onmouseout="
                                        this.style.background='#000';
                                        this.querySelector('.connector-plus').style.transform='rotate(0deg) scale(1)';
                                    ">

                                    <i class="fa fa-plus connector-plus"
                                        style="transition:transform .3s ease;">
                                    </i>

                                    <span>Create Connector</span>

                                </button>

                            </div>

                        </div>


                        <div
                            style="
                                background:#fff;
                                border:1px solid #eee;
                                border-radius:16px;
                                padding:24px;
                                box-shadow:0 2px 12px rgba(0,0,0,0.05);
                            ">

                            <div
                                style="
                                    display:flex;
                                    align-items:center;
                                    justify-content:space-between;
                                    margin-bottom:15px;
                                    gap:15px;
                                    flex-wrap:wrap;
                                ">

                                <div>

                                    <div
                                        style="
                                            font-size:18px;
                                            font-weight:700;
                                            color:#111827;
                                        ">
                                        Workflow Connectors
                                    </div>

                                    <div
                                        style="
                                            font-size:13px;
                                            color:#6c757d;
                                            margin-top:4px;
                                        ">
                                        Manage the input and output connectors available to workflows.
                                    </div>

                                </div>

                                <div
                                    style="
                                        display:inline-flex;
                                        align-items:center;
                                        gap:7px;
                                        padding:7px 12px;
                                        border-radius:20px;
                                        background:#f1f3f5;
                                        color:#495057;
                                        font-size:13px;
                                        font-weight:600;
                                    ">

                                    <i class="fas fa-plug"></i>

                                    {{ $connectors->count() }} Connectors

                                </div>

                            </div>


                            <div class="table-responsive">

                                <table class="table align-middle"
                                    style="
                                        width:100%;
                                        border-collapse:separate;
                                        border-spacing:0 10px;
                                    ">

                                    <thead>

                                        <tr style="background:#f8f9fa;">

                                            <th style="padding:15px; border:none;">
                                                ID
                                            </th>

                                            <th style="padding:15px; border:none;">
                                                Connector Name
                                            </th>

                                            <th style="padding:15px; border:none;">
                                                Type
                                            </th>

                                            <th style="padding:15px; border:none;">
                                                Created
                                            </th>

                                            <th style="padding:15px; border:none; text-align:center;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse ($connectors as $connector)

                                            <tr
                                                style="
                                                    background:#fff;
                                                    box-shadow:0 2px 12px rgba(0,0,0,0.05);
                                                    border-radius:12px;
                                                ">

                                                {{-- ID --}}
                                                <td style="padding:18px; vertical-align:middle;">

                                                    <div
                                                        style="
                                                            width:40px;
                                                            height:40px;
                                                            border-radius:50%;
                                                            background:#e6f1fb;
                                                            display:flex;
                                                            align-items:center;
                                                            justify-content:center;
                                                            font-size:13px;
                                                            font-weight:600;
                                                            color:#185fa5;
                                                        ">

                                                        {{ $connector->id }}

                                                    </div>

                                                </td>


                                                {{-- NAME --}}
                                                <td style="padding:18px; vertical-align:middle;">

                                                    <span
                                                        style="
                                                            font-size:15px;
                                                            font-weight:600;
                                                            color:#111827;
                                                        ">

                                                        {{ $connector->name }}

                                                    </span>

                                                </td>


                                                {{-- TYPE --}}
                                                <td style="padding:18px; vertical-align:middle;">

                                                    @if ($connector->type === 'input')

                                                        <span
                                                            style="
                                                                display:inline-flex;
                                                                align-items:center;
                                                                gap:7px;
                                                                padding:7px 12px;
                                                                border-radius:20px;
                                                                background:#eaf7ed;
                                                                color:#28a745;
                                                                font-size:13px;
                                                                font-weight:600;
                                                            ">

                                                            <i class="fas fa-sign-in-alt"></i>

                                                            Input

                                                        </span>

                                                    @else

                                                        <span
                                                            style="
                                                                display:inline-flex;
                                                                align-items:center;
                                                                gap:7px;
                                                                padding:7px 12px;
                                                                border-radius:20px;
                                                                background:#f1f3f5;
                                                                color:#495057;
                                                                font-size:13px;
                                                                font-weight:600;
                                                            ">

                                                            <i class="fas fa-sign-out-alt"></i>

                                                            Output

                                                        </span>

                                                    @endif

                                                </td>


                                                {{-- CREATED --}}
                                                <td style="padding:18px; vertical-align:middle;">

                                                    <span
                                                        style="
                                                            font-size:13px;
                                                            color:#6c757d;
                                                        ">

                                                        {{ $connector->created_at?->format('d M Y') }}

                                                    </span>

                                                </td>


                                                {{-- ACTION --}}
                                                <td
                                                    style="
                                                        padding:18px;
                                                        text-align:center;
                                                        vertical-align:middle;
                                                    ">

                                                    <div
                                                        style="
                                                            display:flex;
                                                            gap:18px;
                                                            justify-content:center;
                                                            align-items:center;
                                                            flex-wrap:wrap;
                                                        ">


                                                        {{-- EDIT --}}
                                                        <button type="button"

                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editConnectorModal{{ $connector->id }}"

                                                            style="
                                                                display:inline-flex;
                                                                align-items:center;
                                                                gap:7px;
                                                                padding:8px 4px;
                                                                color:#329b40;
                                                                background:transparent;
                                                                border:none;
                                                                font-size:14px;
                                                                font-weight:600;
                                                                cursor:pointer;
                                                                border-bottom:1px solid transparent;
                                                                transition:all .25s ease;
                                                            "

                                                            onmouseover="
                                                                this.style.color='#267a32';
                                                                this.style.borderBottomColor='#329b40';
                                                            "

                                                            onmouseout="
                                                                this.style.color='#329b40';
                                                                this.style.borderBottomColor='transparent';
                                                            ">

                                                            <i class="fas fa-edit"></i>

                                                            <span>Edit</span>

                                                        </button>


                                                        {{-- DELETE --}}
                                                        <form
                                                            action="{{ route('admin.workflow.connector.delete', $connector->id) }}"
                                                            method="POST"
                                                            style="display:inline;">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"

                                                                onclick="return confirm('Are you sure you want to delete this connector?');"

                                                                style="
                                                                    display:inline-flex;
                                                                    align-items:center;
                                                                    gap:7px;
                                                                    padding:8px 4px;
                                                                    color:#dc3545;
                                                                    background:transparent;
                                                                    border:none;
                                                                    font-size:14px;
                                                                    font-weight:600;
                                                                    cursor:pointer;
                                                                    border-bottom:1px solid transparent;
                                                                    transition:all .25s ease;
                                                                "

                                                                onmouseover="
                                                                    this.style.color='#b02a37';
                                                                    this.style.borderBottomColor='#dc3545';
                                                                "

                                                                onmouseout="
                                                                    this.style.color='#dc3545';
                                                                    this.style.borderBottomColor='transparent';
                                                                ">

                                                                <i class="fas fa-trash"></i>

                                                                <span>Delete</span>

                                                            </button>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>


                                            {{-- =====================================================
                                                EDIT CONNECTOR MODAL
                                            ====================================================== --}}

                                            <div class="modal fade"
                                                id="editConnectorModal{{ $connector->id }}"
                                                tabindex="-1"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">

                                                    <div class="modal-content"
                                                        style="
                                                            border:none;
                                                            border-radius:18px;
                                                            overflow:hidden;
                                                            box-shadow:0 10px 40px rgba(0,0,0,.15);
                                                        ">


                                                        {{-- HEADER --}}
                                                        <div
                                                            style="
                                                                padding:20px 24px;
                                                                display:flex;
                                                                align-items:center;
                                                                justify-content:space-between;
                                                                border-bottom:1px solid #eee;
                                                            ">

                                                            <div>

                                                                <div
                                                                    style="
                                                                        font-size:18px;
                                                                        font-weight:700;
                                                                        color:#111827;
                                                                    ">
                                                                    Edit Connector
                                                                </div>

                                                                <div
                                                                    style="
                                                                        font-size:13px;
                                                                        color:#6c757d;
                                                                        margin-top:3px;
                                                                    ">
                                                                    Update this connector's details.
                                                                </div>

                                                            </div>


                                                            <button type="button"
                                                                data-bs-dismiss="modal"

                                                                style="
                                                                    width:36px;
                                                                    height:36px;
                                                                    border-radius:50%;
                                                                    border:none;
                                                                    background:#000;
                                                                    color:#fff;
                                                                    display:flex;
                                                                    align-items:center;
                                                                    justify-content:center;
                                                                    cursor:pointer;
                                                                    transition:background .25s ease;
                                                                "

                                                                onmouseover="
                                                                    this.style.background='#dc3545';
                                                                "

                                                                onmouseout="
                                                                    this.style.background='#000';
                                                                ">

                                                                <i class="fas fa-times"></i>

                                                            </button>

                                                        </div>


                                                        {{-- BODY --}}
                                                        <form
                                                            action="{{ route('admin.workflow.connector.update', $connector->id) }}"
                                                            method="POST">

                                                            @csrf
                                                            @method('PUT')

                                                            <div style="padding:24px;">

                                                                {{-- NAME --}}
                                                                <div style="margin-bottom:20px;">

                                                                    <label
                                                                        style="
                                                                            display:block;
                                                                            margin-bottom:8px;
                                                                            font-size:14px;
                                                                            font-weight:600;
                                                                            color:#111827;
                                                                        ">
                                                                        Connector Name
                                                                    </label>

                                                                    <input type="text"
                                                                        name="name"
                                                                        value="{{ $connector->name }}"
                                                                        required

                                                                        style="
                                                                            width:100%;
                                                                            height:46px;
                                                                            padding:0 14px;
                                                                            border:1px solid #ddd;
                                                                            border-radius:10px;
                                                                            outline:none;
                                                                            font-size:14px;
                                                                            color:#111827;
                                                                        ">

                                                                </div>


                                                                {{-- TYPE --}}
                                                                <div style="margin-bottom:5px;">

                                                                    <label
                                                                        style="
                                                                            display:block;
                                                                            margin-bottom:8px;
                                                                            font-size:14px;
                                                                            font-weight:600;
                                                                            color:#111827;
                                                                        ">
                                                                        Connector Type
                                                                    </label>

                                                                    <select name="type"
                                                                        required

                                                                        style="
                                                                            width:100%;
                                                                            height:46px;
                                                                            padding:0 14px;
                                                                            border:1px solid #ddd;
                                                                            border-radius:10px;
                                                                            outline:none;
                                                                            font-size:14px;
                                                                            color:#111827;
                                                                            background:#fff;
                                                                        ">

                                                                        <option value="input"
                                                                            {{ $connector->type === 'input' ? 'selected' : '' }}>
                                                                            Input
                                                                        </option>

                                                                        <option value="output"
                                                                            {{ $connector->type === 'output' ? 'selected' : '' }}>
                                                                            Output
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>


                                                            {{-- FOOTER --}}
                                                            <div
                                                                style="
                                                                    padding:18px 24px;
                                                                    border-top:1px solid #eee;
                                                                    display:flex;
                                                                    justify-content:flex-end;
                                                                    gap:10px;
                                                                ">

                                                                <button type="button"
                                                                    data-bs-dismiss="modal"

                                                                    style="
                                                                        height:44px;
                                                                        padding:0 18px;
                                                                        border-radius:22px;
                                                                        background:#000;
                                                                        color:#fff;
                                                                        border:none;
                                                                        font-size:14px;
                                                                        font-weight:600;
                                                                        cursor:pointer;
                                                                        transition:background .25s ease;
                                                                    "

                                                                    onmouseover="
                                                                        this.style.background='#dc3545';
                                                                    "

                                                                    onmouseout="
                                                                        this.style.background='#000';
                                                                    ">

                                                                    Close

                                                                </button>


                                                                <button type="submit"

                                                                    style="
                                                                        height:44px;
                                                                        padding:0 20px;
                                                                        border-radius:22px;
                                                                        background:#000;
                                                                        color:#fff;
                                                                        border:none;
                                                                        font-size:14px;
                                                                        font-weight:600;
                                                                        cursor:pointer;
                                                                        transition:background .25s ease;
                                                                    "

                                                                    onmouseover="
                                                                        this.style.background='#28a745';
                                                                    "

                                                                    onmouseout="
                                                                        this.style.background='#000';
                                                                    ">

                                                                    <i class="fas fa-save"
                                                                        style="margin-right:6px;">
                                                                    </i>

                                                                    Save Changes

                                                                </button>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        @empty

                                            <tr>

                                                <td colspan="5"
                                                    style="
                                                        padding:45px 20px;
                                                        text-align:center;
                                                        color:#6c757d;
                                                    ">

                                                    <div
                                                        style="
                                                            width:55px;
                                                            height:55px;
                                                            margin:0 auto 12px;
                                                            border-radius:50%;
                                                            background:#f1f3f5;
                                                            display:flex;
                                                            align-items:center;
                                                            justify-content:center;
                                                            font-size:20px;
                                                            color:#6c757d;
                                                        ">

                                                        <i class="fas fa-plug"></i>

                                                    </div>

                                                    <div
                                                        style="
                                                            font-size:15px;
                                                            font-weight:600;
                                                            color:#495057;
                                                        ">
                                                        No connectors found
                                                    </div>

                                                    <div
                                                        style="
                                                            font-size:13px;
                                                            margin-top:4px;
                                                        ">
                                                        Create your first input or output connector.
                                                    </div>

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================================
                        CREATE CONNECTOR MODAL
                    ========================================================= --}}

                    <div class="modal fade"
                        id="createConnectorModal"
                        tabindex="-1"
                        aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content"
                                style="
                                    border:none;
                                    border-radius:18px;
                                    overflow:hidden;
                                    box-shadow:0 10px 40px rgba(0,0,0,.15);
                                ">


                                {{-- HEADER --}}
                                <div
                                    style="
                                        padding:20px 24px;
                                        display:flex;
                                        align-items:center;
                                        justify-content:space-between;
                                        border-bottom:1px solid #eee;
                                    ">

                                    <div>

                                        <div
                                            style="
                                                font-size:18px;
                                                font-weight:700;
                                                color:#111827;
                                            ">
                                            Create Connector
                                        </div>

                                        <div
                                            style="
                                                font-size:13px;
                                                color:#6c757d;
                                                margin-top:3px;
                                            ">
                                            Add a new input or output connector.
                                        </div>

                                    </div>


                                    <button type="button"
                                        data-bs-dismiss="modal"

                                        style="
                                            width:36px;
                                            height:36px;
                                            border-radius:50%;
                                            border:none;
                                            background:#000;
                                            color:#fff;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            cursor:pointer;
                                            transition:background .25s ease;
                                        "

                                        onmouseover="
                                            this.style.background='#dc3545';
                                        "

                                        onmouseout="
                                            this.style.background='#000';
                                        ">

                                        <i class="fas fa-times"></i>

                                    </button>

                                </div>


                                {{-- FORM --}}
                                <form action="{{ route('admin.workflow.connector.store') }}"
                                    method="POST">

                                    @csrf

                                    <div style="padding:24px;">

                                        {{-- NAME --}}
                                        <div style="margin-bottom:20px;">

                                            <label
                                                style="
                                                    display:block;
                                                    margin-bottom:8px;
                                                    font-size:14px;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                                Connector Name
                                            </label>

                                            <input type="text"
                                                name="name"
                                                placeholder="e.g. PDF Input"
                                                required

                                                style="
                                                    width:100%;
                                                    height:46px;
                                                    padding:0 14px;
                                                    border:1px solid #ddd;
                                                    border-radius:10px;
                                                    outline:none;
                                                    font-size:14px;
                                                    color:#111827;
                                                ">

                                        </div>


                                        {{-- TYPE --}}
                                        <div>

                                            <label
                                                style="
                                                    display:block;
                                                    margin-bottom:8px;
                                                    font-size:14px;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                                Connector Type
                                            </label>

                                            <select name="type"
                                                required

                                                style="
                                                    width:100%;
                                                    height:46px;
                                                    padding:0 14px;
                                                    border:1px solid #ddd;
                                                    border-radius:10px;
                                                    outline:none;
                                                    font-size:14px;
                                                    color:#111827;
                                                    background:#fff;
                                                ">

                                                <option value="">
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


                                    {{-- FOOTER --}}
                                    <div
                                        style="
                                            padding:18px 24px;
                                            border-top:1px solid #eee;
                                            display:flex;
                                            justify-content:flex-end;
                                            gap:10px;
                                        ">

                                        <button type="button"
                                            data-bs-dismiss="modal"

                                            style="
                                                height:44px;
                                                padding:0 18px;
                                                border-radius:22px;
                                                background:#000;
                                                color:#fff;
                                                border:none;
                                                font-size:14px;
                                                font-weight:600;
                                                cursor:pointer;
                                                transition:background .25s ease;
                                            "

                                            onmouseover="
                                                this.style.background='#dc3545';
                                            "

                                            onmouseout="
                                                this.style.background='#000';
                                            ">

                                            Close

                                        </button>


                                        <button type="submit"

                                            style="
                                                height:44px;
                                                padding:0 20px;
                                                border-radius:22px;
                                                background:#000;
                                                color:#fff;
                                                border:none;
                                                font-size:14px;
                                                font-weight:600;
                                                cursor:pointer;
                                                transition:background .25s ease;
                                            "

                                            onmouseover="
                                                this.style.background='#28a745';
                                            "

                                            onmouseout="
                                                this.style.background='#000';
                                            ">

                                            <i class="fas fa-plus"
                                                style="margin-right:6px;">
                                            </i>

                                            Create Connector

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
      
        <!-- Modal -->
       

    </div>
</x-layouts::app>
