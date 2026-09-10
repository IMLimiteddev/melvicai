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

                            {{-- <div
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

                            </div> --}}

                        </div>

                            {{-- Connector Tables --}}
                            <div style="display:flex;flex-direction:column;gap:25px;">

                                {{-- ================= INPUT CONNECTORS ================= --}}
                                <div style="background:#fff;border:1px solid #eee;border-radius:16px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,0.05);">

                                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:15px;gap:15px;flex-wrap:wrap;">
                                        <div>
                                            <div style="font-size:18px;font-weight:700;color:#111827;">
                                                Input Connectors
                                            </div>

                                            <div style="font-size:13px;color:#6c757d;margin-top:4px;">
                                                Connectors used to receive files or data into a workflow.
                                            </div>
                                        </div>

                                        <div style="display:inline-flex;align-items:center;gap:7px;padding:7px 12px;border-radius:20px;background:#AEF09D;color:#1f5f2a;font-size:13px;font-weight:600;">
                                            <i class="fas fa-sign-in-alt"></i>
                                            {{ $connectors->where('type', 'input')->count() }} Inputs
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle" style="width:100%;border-collapse:separate;border-spacing:0 10px;">
                                            <thead>
                                                <tr style="background:#f8f9fa;">
                                                    <th style="padding:14px;">ID</th>
                                                    <th style="padding:14px;">Connector Name</th>
                                                    <th style="padding:14px;">Account Email</th>
                                                    <th style="padding:14px;">Created</th>
                                                    <th style="padding:14px;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @forelse ($connectors->where('type', 'input') as $connector)

                                                    <tr style="background:#fff;border:1px solid #f1f1f1;">

                                                        <td style="padding:14px;font-weight:600;">
                                                            {{ $connector->id }}
                                                        </td>

                                                        <td style="padding:14px;font-weight:600;color:#222;">
                                                            {{ $connector->name }}
                                                        </td>

                                                        <td style="padding:14px;color:#6c757d;">
                                                            {{ $connector->account_email ?? '—' }}
                                                        </td>

                                                        <td style="padding:14px;color:#6c757d;">
                                                            {{ $connector->created_at?->format('d M Y') }}
                                                        </td>

                                                        <td style="padding:14px;">
                                                            <div style="display:flex;align-items:center;gap:18px;">

                                                                {{-- EDIT --}}
                                                                <a href="javascript:void(0)"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editConnectorModal{{ $connector->id }}"
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
                                                                        cursor:pointer;
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

                                                                    <span>Edit connector</span>

                                                                    <i class="fas fa-arrow-right action-arrow"
                                                                        style="
                                                                            font-size:12px;
                                                                            transition:transform .25s ease;
                                                                        ">
                                                                    </i>

                                                                </a>


                                                                {{-- DELETE --}}
                                                                <form
                                                                    action="{{ route('admin.workflow.connector.delete', $connector->id) }}"
                                                                    method="POST"
                                                                    style="margin:0;"
                                                                    onsubmit="return confirm('Are you sure you want to delete this connector?');"
                                                                >
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <a href="javascript:void(0)"
                                                                        onclick="this.closest('form').submit();"
                                                                        style="
                                                                            display:inline-flex;
                                                                            align-items:center;
                                                                            gap:7px;
                                                                            padding:8px 4px;
                                                                            color:#dc3545;
                                                                            font-size:14px;
                                                                            font-weight:600;
                                                                            text-decoration:none;
                                                                            border-bottom:1px solid transparent;
                                                                            transition:all .25s ease;
                                                                            white-space:nowrap;
                                                                            cursor:pointer;
                                                                        "
                                                                        onmouseover="
                                                                            this.style.color='#b02a37';
                                                                            this.style.borderBottomColor='#dc3545';
                                                                            this.querySelector('.delete-arrow').style.transform='translateX(4px)';
                                                                        "
                                                                        onmouseout="
                                                                            this.style.color='#dc3545';
                                                                            this.style.borderBottomColor='transparent';
                                                                            this.querySelector('.delete-arrow').style.transform='translateX(0)';
                                                                        ">

                                                                        <i class="fas fa-trash"></i>

                                                                        <span>Delete connector</span>

                                                                        <i class="fas fa-arrow-right delete-arrow"
                                                                            style="
                                                                                font-size:12px;
                                                                                transition:transform .25s ease;
                                                                            ">
                                                                        </i>

                                                                    </a>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                @empty

                                                    <tr>
                                                        <td colspan="5" style="padding:35px;text-align:center;color:#999;">
                                                            <i class="fas fa-plug" style="font-size:25px;margin-bottom:10px;"></i>
                                                            <div>No input connectors found.</div>
                                                        </td>
                                                    </tr>

                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                {{-- ================= OUTPUT CONNECTORS ================= --}}
                                <div style="background:#fff;border:1px solid #eee;border-radius:16px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,0.05);">

                                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:15px;gap:15px;flex-wrap:wrap;">
                                        <div>
                                            <div style="font-size:18px;font-weight:700;color:#111827;">
                                                Output Connectors
                                            </div>

                                            <div style="font-size:13px;color:#6c757d;margin-top:4px;">
                                                Connectors used to send processed workflow results.
                                            </div>
                                        </div>

                                        <div style="display:inline-flex;align-items:center;gap:7px;padding:7px 12px;border-radius:20px;background:#f1f3f5;color:#495057;font-size:13px;font-weight:600;">
                                            <i class="fas fa-sign-out-alt"></i>
                                            {{ $connectors->where('type', 'output')->count() }} Outputs
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle" style="width:100%;border-collapse:separate;border-spacing:0 10px;">
                                            <thead>
                                                <tr style="background:#f8f9fa;">
                                                    <th style="padding:14px;">ID</th>
                                                    <th style="padding:14px;">Connector Name</th>
                                                    <th style="padding:14px;">Account Email</th>
                                                    <th style="padding:14px;">Created</th>
                                                    <th style="padding:14px;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @forelse ($connectors->where('type', 'output') as $connector)

                                                    <tr style="background:#fff;border:1px solid #f1f1f1;">

                                                        <td style="padding:14px;font-weight:600;">
                                                            {{ $connector->id }}
                                                        </td>

                                                        <td style="padding:14px;font-weight:600;color:#222;">
                                                            {{ $connector->name }}
                                                        </td>

                                                        <td style="padding:14px;color:#6c757d;">
                                                            {{ $connector->account_email ?? '—' }}
                                                        </td>

                                                        <td style="padding:14px;color:#6c757d;">
                                                            {{ $connector->created_at?->format('d M Y') }}
                                                        </td>

                                                        <td style="padding:14px;">
                                                            <div style="display:flex;align-items:center;gap:18px;">

                                                                {{-- EDIT --}}
                                                                <a href="javascript:void(0)"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editConnectorModal{{ $connector->id }}"
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
                                                                        cursor:pointer;
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

                                                                    <span>Edit connector</span>

                                                                    <i class="fas fa-arrow-right action-arrow"
                                                                        style="
                                                                            font-size:12px;
                                                                            transition:transform .25s ease;
                                                                        ">
                                                                    </i>

                                                                </a>


                                                                {{-- DELETE --}}
                                                                <form
                                                                    action="{{ route('admin.workflow.connector.delete', $connector->id) }}"
                                                                    method="POST"
                                                                    style="margin:0;"
                                                                    onsubmit="return confirm('Are you sure you want to delete this connector?');"
                                                                >
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <a href="javascript:void(0)"
                                                                        onclick="this.closest('form').submit();"
                                                                        style="
                                                                            display:inline-flex;
                                                                            align-items:center;
                                                                            gap:7px;
                                                                            padding:8px 4px;
                                                                            color:#dc3545;
                                                                            font-size:14px;
                                                                            font-weight:600;
                                                                            text-decoration:none;
                                                                            border-bottom:1px solid transparent;
                                                                            transition:all .25s ease;
                                                                            white-space:nowrap;
                                                                            cursor:pointer;
                                                                        "
                                                                        onmouseover="
                                                                            this.style.color='#b02a37';
                                                                            this.style.borderBottomColor='#dc3545';
                                                                            this.querySelector('.delete-arrow').style.transform='translateX(4px)';
                                                                        "
                                                                        onmouseout="
                                                                            this.style.color='#dc3545';
                                                                            this.style.borderBottomColor='transparent';
                                                                            this.querySelector('.delete-arrow').style.transform='translateX(0)';
                                                                        ">

                                                                        <i class="fas fa-trash"></i>

                                                                        <span>Delete connector</span>

                                                                        <i class="fas fa-arrow-right delete-arrow"
                                                                            style="
                                                                                font-size:12px;
                                                                                transition:transform .25s ease;
                                                                            ">
                                                                        </i>

                                                                    </a>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                @empty

                                                    <tr>
                                                        <td colspan="5" style="padding:35px;text-align:center;color:#999;">
                                                            <i class="fas fa-sign-out-alt" style="font-size:25px;margin-bottom:10px;"></i>
                                                            <div>No output connectors found.</div>
                                                        </td>
                                                    </tr>

                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
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

                                            {{-- <input type="text"
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
                                                "> --}}

                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="connectorName"
                                                    placeholder="Connector name"
                                                    required
                                                >

                                                <button
                                                    type="button"
                                                    onclick="suggestConnectorNames()"
                                                >
                                                    ✨ Suggest
                                                </button>

                                        </div>

                                        {{-- Account Email --}}
                                        <div style="margin-bottom:20px;">

                                            <label
                                                style="
                                                    display:block;
                                                    margin-bottom:8px;
                                                    font-size:14px;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                                Account Email
                                            </label>

                                            <input type="email"
                                                name="account_email"
                                                placeholder="e.g. user@example.com"
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

                                        {{-- Email Client ID --}}
                                        <div style="margin-bottom:20px;">

                                            <label
                                                style="
                                                    display:block;
                                                    margin-bottom:8px;
                                                    font-size:14px;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                                Email Client ID
                                            </label>

                                            <input type="text"
                                                name="email_client_id"
                                                placeholder="e.g. client_id"
                                               

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

                                       

                                        {{--Email  client secret--}}
                                        <div style="margin-bottom:20px;">

                                            <label
                                                style="
                                                    display:block;
                                                    margin-bottom:8px;
                                                    font-size:14px;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                                Email Client Secret
                                            </label>

                                            <input type="text"
                                                name="email_client_secret"
                                                placeholder="e.g. client_secret"
                                                

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

        {{-- ================= EDIT CONNECTOR MODALS ================= --}}

        @foreach ($connectors as $connector)

        <div
            class="modal fade"
            id="editConnectorModal{{ $connector->id }}"
            tabindex="-1"
            aria-labelledby="editConnectorLabel{{ $connector->id }}"
            aria-hidden="true"
            data-bs-backdrop="false"
            data-bs-keyboard="true"
        >
            <div class="modal-dialog modal-dialog-centered" style="max-width:650px;">

                <div
                    class="modal-content"
                    style="border:0;border-radius:18px;box-shadow:0 15px 45px rgba(0,0,0,0.15);overflow:hidden;"
                >

                    {{-- HEADER --}}
                    <div
                        style="background:#fff;padding:22px 25px;border-bottom:1px solid #eee;display:flex;align-items:center;justify-content:space-between;"
                    >

                        <div>
                            <div style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:#888;margin-bottom:4px;">
                                Connector Settings
                            </div>

                            <h5
                                id="editConnectorLabel{{ $connector->id }}"
                                style="margin:0;font-size:21px;font-weight:700;color:#222;"
                            >
                                Edit Connector
                            </h5>
                        </div>

                        {{-- CLOSE --}}
                        <button
                            type="button"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            style="width:38px;height:38px;border:0;border-radius:50%;background:#000;color:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .3s ease;"
                            onmouseover="this.style.background='#dc3545';this.style.transform='rotate(90deg) scale(1.08)'"
                            onmouseout="this.style.background='#000';this.style.transform='rotate(0deg) scale(1)'"
                        >
                            <i class="fas fa-times"></i>
                        </button>

                    </div>


                    {{-- BODY --}}
                    <form
                        action="{{ route('admin.workflow.connector.update', $connector->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')

                        <div style="padding:25px;">

                            {{-- Connector Name --}}
                            <div style="margin-bottom:18px;">
                                <label
                                    style="display:block;font-size:13px;font-weight:700;color:#333;margin-bottom:7px;"
                                >
                                    Connector Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ $connector->name }}"
                                    required
                                    style="width:100%;height:46px;border:1px solid #ddd;border-radius:10px;padding:0 14px;font-size:14px;outline:none;"
                                >
                            </div>


                            {{-- Account Email --}}
                            <div style="margin-bottom:18px;">
                                <label
                                    style="display:block;font-size:13px;font-weight:700;color:#333;margin-bottom:7px;"
                                >
                                    Account Email
                                </label>

                                <input
                                    type="email"
                                    name="account_email"
                                    value="{{ $connector->account_email }}"
                                    required
                                    style="width:100%;height:46px;border:1px solid #ddd;border-radius:10px;padding:0 14px;font-size:14px;outline:none;"
                                >
                            </div>


                            {{-- Client ID + Secret --}}
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:18px;">

                                <div>
                                    <label
                                        style="display:block;font-size:13px;font-weight:700;color:#333;margin-bottom:7px;"
                                    >
                                        Email Client ID
                                    </label>

                                    <input
                                        type="text"
                                        name="email_client_id"
                                        value="{{ $connector->email_client_id }}"
                                        style="width:100%;height:46px;border:1px solid #ddd;border-radius:10px;padding:0 14px;font-size:14px;outline:none;"
                                    >
                                </div>

                                <div>
                                    <label
                                        style="display:block;font-size:13px;font-weight:700;color:#333;margin-bottom:7px;"
                                    >
                                        Email Client Secret
                                    </label>

                                    <input
                                        type="text"
                                        name="email_client_secret"
                                        value="{{ $connector->email_client_secret }}"
                                        style="width:100%;height:46px;border:1px solid #ddd;border-radius:10px;padding:0 14px;font-size:14px;outline:none;"
                                    >
                                </div>

                            </div>


                            {{-- Connector Type --}}
                            <div style="margin-bottom:5px;">
                                <label
                                    style="display:block;font-size:13px;font-weight:700;color:#333;margin-bottom:7px;"
                                >
                                    Connector Type
                                </label>

                                <select
                                    name="type"
                                    required
                                    style="width:100%;height:46px;border:1px solid #ddd;border-radius:10px;padding:0 14px;font-size:14px;background:#fff;outline:none;"
                                >
                                    <option value="input" {{ $connector->type === 'input' ? 'selected' : '' }}>
                                        Input
                                    </option>

                                    <option value="output" {{ $connector->type === 'output' ? 'selected' : '' }}>
                                        Output
                                    </option>
                                </select>
                            </div>

                        </div>


                        {{-- FOOTER --}}
                        <div
                            style="padding:18px 25px;border-top:1px solid #eee;display:flex;justify-content:flex-end;gap:10px;"
                        >

                            <button
                                type="button"
                                data-bs-dismiss="modal"
                                style="height:44px;padding:0 20px;border:0;border-radius:22px;background:#000;color:#fff;font-weight:600;cursor:pointer;transition:all .3s ease;"
                                onmouseover="this.style.background='#dc3545'"
                                onmouseout="this.style.background='#000'"
                            >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                style="height:44px;padding:0 22px;border:0;border-radius:22px;background:#000;color:#fff;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:8px;transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'"
                                onmouseout="this.style.background='#000'"
                            >
                                <i class="fas fa-save"></i>
                                Update Connector
                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>

        @endforeach
       

    </div>

    <script>
        function suggestConnectorNames() {

            const type = document.querySelector(
                '#createConnectorModal select[name="type"]'
            ).value;

            if (!type) {
                alert('Please select connector type first.');
                return;
            }

            fetch("{{ route('admin.workflow.connector.suggestions') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    type: type
                })
            })
            .then(response => response.json())
            .then(data => {

                const name = document.getElementById('connectorName');

                if (data.suggestions?.length) {
                    name.value = data.suggestions[0];
                }

            })
            .catch(error => {
                console.error(error);
                alert('Unable to generate connector suggestion.');
            });
        }
    </script>
</x-layouts::app>
