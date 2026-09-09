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

                        <div style="position:absolute;right:30px;top:50%;transform:translateY(-50%);">

                                <button
                                type="button"
                                onclick="saveWorkflow()"
                                style="
                                    background:#000;
                                    color:#fff;
                                    border:1px solid #000;
                                    border-radius:24px;
                                    padding:10px 24px;
                                    font-size:14px;
                                    font-weight:600;
                                    cursor:pointer;
                                    transition:all 0.2s ease;
                                "
                                onmouseover="this.style.background='#28a745'; this.style.borderColor='#AEF09D';"
                                onmouseout="this.style.background='#000'; this.style.borderColor='#000';"
                            >
                                Save Workflow
                            </button>

                        </div>

                        

                    </div>

                    <div class="card-body"
                        style="
                            padding:0;
                            min-height:680px;
                            height:680px;
                            display:flex;
                            position:relative;
                            overflow:hidden;
                            background:#fff;
                        ">

                        {{-- LEFT COMPONENTS --}}
                        <div style="
                            width:225px;
                            min-width:225px;
                            background:#fafafa;
                            border-right:1px solid #e9e9e9;
                            padding:22px 16px;
                            z-index:20;
                        ">

                            <div style="
                                font-size:11px;
                                font-weight:700;
                                color:#999;
                                letter-spacing:1.4px;
                                text-transform:uppercase;
                                margin-bottom:18px;
                            ">
                                Workflow Components
                            </div>


                            {{-- INPUT --}}
                            <div
                                draggable="true"
                                ondragstart="startDrag(event, 'input')"
                                style="
                                    background:#fff;
                                    border:1px solid #e4e4e4;
                                    border-radius:13px;
                                    padding:13px;
                                    margin-bottom:12px;
                                    cursor:grab;
                                    display:flex;
                                    align-items:center;
                                    gap:11px;
                                    transition:all .2s ease;
                                    box-shadow:0 3px 10px rgba(0,0,0,.03);
                                "
                                onmouseover="
                                    this.style.borderColor='#AEF09D';
                                    this.style.transform='translateY(-2px)';
                                "
                                onmouseout="
                                    this.style.borderColor='#e4e4e4';
                                    this.style.transform='translateY(0)';
                                "
                            >

                                <div style="
                                    width:38px;
                                    height:38px;
                                    border-radius:10px;
                                    background:#f0f8ef;
                                    color:#28a745;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:15px;
                                ">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>

                                <div>
                                    <div style="
                                        font-size:13px;
                                        font-weight:700;
                                        color:#222;
                                    ">
                                        Input
                                    </div>

                                    <div style="
                                        font-size:10px;
                                        color:#999;
                                        margin-top:2px;
                                    ">
                                        Workflow starting point
                                    </div>
                                </div>

                            </div>


                            {{-- CONFIGURATION --}}
                            <div
                                draggable="true"
                                ondragstart="startDrag(event, 'configuration')"
                                style="
                                    background:#fff;
                                    border:1px solid #e4e4e4;
                                    border-radius:13px;
                                    padding:13px;
                                    margin-bottom:12px;
                                    cursor:grab;
                                    display:flex;
                                    align-items:center;
                                    gap:11px;
                                    transition:all .2s ease;
                                    box-shadow:0 3px 10px rgba(0,0,0,.03);
                                "
                                onmouseover="
                                    this.style.borderColor='#AEF09D';
                                    this.style.transform='translateY(-2px)';
                                "
                                onmouseout="
                                    this.style.borderColor='#e4e4e4';
                                    this.style.transform='translateY(0)';
                                "
                            >

                                <div style="
                                    width:38px;
                                    height:38px;
                                    border-radius:10px;
                                    background:#f5f5f5;
                                    color:#222;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:15px;
                                ">
                                    <i class="fas fa-cog"></i>
                                </div>

                                <div>
                                    <div style="
                                        font-size:13px;
                                        font-weight:700;
                                        color:#222;
                                    ">
                                        Configuration
                                    </div>

                                    <div style="
                                        font-size:10px;
                                        color:#999;
                                        margin-top:2px;
                                    ">
                                        Processing configuration
                                    </div>
                                </div>

                            </div>


                            {{-- OUTPUT --}}
                            <div
                                draggable="true"
                                ondragstart="startDrag(event, 'output')"
                                style="
                                    background:#fff;
                                    border:1px solid #e4e4e4;
                                    border-radius:13px;
                                    padding:13px;
                                    margin-bottom:12px;
                                    cursor:grab;
                                    display:flex;
                                    align-items:center;
                                    gap:11px;
                                    transition:all .2s ease;
                                    box-shadow:0 3px 10px rgba(0,0,0,.03);
                                "
                                onmouseover="
                                    this.style.borderColor='#AEF09D';
                                    this.style.transform='translateY(-2px)';
                                "
                                onmouseout="
                                    this.style.borderColor='#e4e4e4';
                                    this.style.transform='translateY(0)';
                                "
                            >

                                <div style="
                                    width:38px;
                                    height:38px;
                                    border-radius:10px;
                                    background:#fff4f0;
                                    color:#E94E1B;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:15px;
                                ">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>

                                <div>
                                    <div style="
                                        font-size:13px;
                                        font-weight:700;
                                        color:#222;
                                    ">
                                        Output
                                    </div>

                                    <div style="
                                        font-size:10px;
                                        color:#999;
                                        margin-top:2px;
                                    ">
                                        Workflow ending point
                                    </div>
                                </div>

                            </div>


                            {{-- INFORMATION --}}
                            <div style="
                                margin-top:28px;
                                padding:13px;
                                border:1px dashed #d8d8d8;
                                border-radius:12px;
                                background:#fff;
                            ">

                                <div style="
                                    font-size:11px;
                                    color:#888;
                                    line-height:1.7;
                                ">

                                    <i class="fas fa-info-circle"
                                        style="
                                            color:#28a745;
                                            margin-right:4px;
                                        ">
                                    </i>

                                    Drag components into the workspace.
                                    Click a node to configure it.
                                    Use the + connectors to create links.

                                </div>

                            </div>

                        </div>


                        {{-- WORKFLOW WORKSPACE --}}
                        <div id="workflowCanvas"
                            ondragover="allowDrop(event)"
                            ondrop="dropWorkflowNode(event)"
                            style="
                                position:relative;
                                flex:1;
                                min-width:500px;
                                height:680px;
                                overflow:auto;
                                background-color:#fff;
                                background-image:radial-gradient(#dedede 1px, transparent 1px);
                                background-size:22px 22px;
                            ">


                            {{-- CONNECTION LAYER --}}
                            <svg id="workflowConnections"
                                style="
                                    position:absolute;
                                    top:0;
                                    left:0;
                                    width:100%;
                                    height:100%;
                                    min-width:100%;
                                    min-height:100%;
                                    pointer-events:none;
                                    z-index:1;
                                    overflow:visible;
                                ">

                                <g id="workflowConnectionLines"></g>

                            </svg>


                            {{-- EMPTY STATE --}}
                            <div id="canvasEmpty"
                                style="
                                    position:absolute;
                                    top:50%;
                                    left:50%;
                                    transform:translate(-50%,-50%);
                                    text-align:center;
                                    pointer-events:none;
                                    z-index:2;
                                    width:300px;
                                ">

                                <div style="
                                    width:65px;
                                    height:65px;
                                    margin:0 auto 14px;
                                    border-radius:18px;
                                    background:#fafafa;
                                    border:1px solid #ededed;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                ">

                                    <i class="fas fa-project-diagram"
                                        style="
                                            font-size:23px;
                                            color:#28a745;
                                        ">
                                    </i>

                                </div>

                                <div style="
                                    font-size:15px;
                                    font-weight:700;
                                    color:#555;
                                    margin-bottom:5px;
                                ">
                                    Start building your workflow
                                </div>

                                <div style="
                                    font-size:12px;
                                    color:#999;
                                ">
                                    Drag Input, Configuration or Output into this area
                                </div>

                            </div>

                        </div>


                        {{-- SETTINGS SIDEBAR --}}
                        <div id="workflowSettings"
                            style="
                                width:0;
                                min-width:0;
                                height:680px;
                                overflow:hidden;
                                background:#fff;
                                border-left:1px solid #e9e9e9;
                                padding:0;
                                opacity:0;
                                pointer-events:none;
                                transition:
                                    width .3s ease,
                                    min-width .3s ease,
                                    padding .3s ease,
                                    opacity .25s ease;
                                z-index:30;
                            ">


                            {{-- SETTINGS HEADER --}}
                            <div style="
                                display:flex;
                                align-items:center;
                                justify-content:space-between;
                                padding-bottom:17px;
                                margin-bottom:20px;
                                border-bottom:1px solid #eee;
                                white-space:nowrap;
                            ">

                                <div>

                                    <div style="
                                        font-size:10px;
                                        color:#999;
                                        font-weight:700;
                                        letter-spacing:1.3px;
                                        text-transform:uppercase;
                                        margin-bottom:4px;
                                    ">
                                        Node Settings
                                    </div>

                                    <div style="
                                        font-size:18px;
                                        font-weight:700;
                                        color:#222;
                                    ">
                                        Configure Node
                                    </div>

                                </div>


                                <button
                                    type="button"
                                    onclick="closeSettings()"
                                    style="
                                        width:35px;
                                        height:35px;
                                        border:none;
                                        border-radius:50%;
                                        background:#000;
                                        color:#fff;
                                        cursor:pointer;
                                        transition:all .2s ease;
                                        flex-shrink:0;
                                    "
                                    onmouseover="
                                        this.style.background='#dc3545';
                                        this.style.transform='rotate(90deg)';
                                    "
                                    onmouseout="
                                        this.style.background='#000';
                                        this.style.transform='rotate(0deg)';
                                    "
                                >

                                    <i class="fas fa-times"></i>

                                </button>

                            </div>


                            
                            {{-- INPUT SETTINGS --}}
                         
                        
                                <div
                                    id="settings-input"
                                    class="workflow-settings-section"
                                    style="display:none;"
                                >

                                    <div style="
                                        font-size:14px;
                                        font-weight:700;
                                        color:#222;
                                        margin-bottom:15px;
                                    ">
                                        Input Connector
                                    </div>


                                    <!-- ========================================================= -->
                                    <!-- TABS -->
                                    <!-- ========================================================= -->

                                    <div style="
                                        display:flex;
                                        gap:6px;
                                        margin-bottom:15px;
                                        border-bottom:1px solid #eee;
                                        padding-bottom:8px;
                                    ">

                                        <button
                                            type="button"
                                            id="input-connector-existing-tab"
                                            onclick="switchConnectorTab('input','existing')"
                                            style="
                                                border:none;
                                                background:#000;
                                                color:#fff;
                                                padding:9px 16px;
                                                border-radius:20px;
                                                font-size:12px;
                                                font-weight:600;
                                                cursor:pointer;
                                                transition:all .2s ease;
                                            "
                                        >
                                            Existing Connector
                                        </button>

                                        <button
                                            type="button"
                                            id="input-connector-new-tab"
                                            onclick="switchConnectorTab('input','new')"
                                            style="
                                                border:1px solid #ddd;
                                                background:#fff;
                                                color:#222;
                                                padding:9px 16px;
                                                border-radius:20px;
                                                font-size:12px;
                                                font-weight:600;
                                                cursor:pointer;
                                                transition:all .2s ease;
                                            "
                                        >
                                            New Connector
                                        </button>

                                    </div>


                                    <!-- ========================================================= -->
                                    <!-- EXISTING CONNECTOR -->
                                    <!-- ========================================================= -->

                                    <div
                                        id="input-connector-existing"
                                        style="display:block;"
                                    >

                                        <label style="
                                            display:block;
                                            font-size:12px;
                                            font-weight:600;
                                            color:#555;
                                            margin-bottom:7px;
                                        ">
                                            Select Input
                                        </label>

                                        <select
                                            id="nodeInputConnector"
                                            onchange="updateSelectedNodeValue()"
                                            style="
                                                width:100%;
                                                height:46px;
                                                border:1px solid #ddd;
                                                border-radius:10px;
                                                padding:0 12px;
                                                background:#fff;
                                                color:#333;
                                                font-size:13px;
                                                outline:none;
                                            "
                                        >

                                            <option value="">
                                                Select connector
                                            </option>

                                            @foreach($connectors->where('type', 'input') as $connector)

                                                <option value="{{ $connector->id }}">
                                                    {{ $connector->name }}
                                                </option>

                                            @endforeach

                                        </select>

                                    </div>


                                    <!-- ========================================================= -->
                                    <!-- NEW CONNECTOR -->
                                    <!-- ========================================================= -->

                                    <div
                                        id="input-connector-new"
                                        style="
                                            display:none;
                                            margin-top:5px;
                                            padding:14px;
                                            border:1px solid #eee;
                                            border-radius:10px;
                                            background:#fafafa;
                                        "
                                    >

                                        <label style="
                                            display:block;
                                            font-size:12px;
                                            font-weight:600;
                                            color:#555;
                                            margin-bottom:7px;
                                        ">
                                            Connector Name
                                        </label>

                                        <input
                                            type="text"
                                            id="newInputConnectorName"
                                            placeholder="Enter input name"
                                            style="
                                                width:100%;
                                                height:42px;
                                                border:1px solid #ddd;
                                                border-radius:8px;
                                                padding:0 10px;
                                                font-size:13px;
                                                outline:none;
                                                margin-bottom:10px;
                                                background:#fff;
                                            "
                                        >


                                        <label style="
                                            display:block;
                                            font-size:12px;
                                            font-weight:600;
                                            color:#555;
                                            margin-bottom:7px;
                                        ">
                                            Account Email
                                        </label>

                                        <input
                                            type="email"
                                            id="newInputAccountEmail"
                                            placeholder="Enter account email"
                                            style="
                                                width:100%;
                                                height:42px;
                                                border:1px solid #ddd;
                                                border-radius:8px;
                                                padding:0 10px;
                                                font-size:13px;
                                                outline:none;
                                                margin-bottom:10px;
                                                background:#fff;
                                            "
                                        >


                                        <label style="
                                            display:block;
                                            font-size:12px;
                                            font-weight:600;
                                            color:#555;
                                            margin-bottom:7px;
                                        ">
                                            Email Client ID
                                        </label>

                                        <input
                                            type="text"
                                            id="newInputEmailClientId"
                                            placeholder="Enter email client ID"
                                            style="
                                                width:100%;
                                                height:42px;
                                                border:1px solid #ddd;
                                                border-radius:8px;
                                                padding:0 10px;
                                                font-size:13px;
                                                outline:none;
                                                margin-bottom:10px;
                                                background:#fff;
                                            "
                                        >


                                        <label style="
                                            display:block;
                                            font-size:12px;
                                            font-weight:600;
                                            color:#555;
                                            margin-bottom:7px;
                                        ">
                                            Email Client Secret
                                        </label>

                                        <input
                                            type="password"
                                            id="newInputEmailClientSecret"
                                            placeholder="Enter email client secret"
                                            style="
                                                width:100%;
                                                height:42px;
                                                border:1px solid #ddd;
                                                border-radius:8px;
                                                padding:0 10px;
                                                font-size:13px;
                                                outline:none;
                                                margin-bottom:12px;
                                                background:#fff;
                                            "
                                        >


                                        <input
                                            type="hidden"
                                            id="newInputConnectorType"
                                            value="input"
                                        >


                                        <div style="
                                            display:flex;
                                            gap:7px;
                                        ">

                                            <button
                                                type="button"
                                                id="save-input-connector"
                                                onclick="saveNewConnector('input')"
                                                style="
                                                    background:#000;
                                                    color:#fff;
                                                    border:none;
                                                    padding:9px 16px;
                                                    border-radius:20px;
                                                    font-size:12px;
                                                    font-weight:600;
                                                    cursor:pointer;
                                                    transition:all .2s ease;
                                                "
                                                onmouseover="this.style.background='#28a745';"
                                                onmouseout="this.style.background='#000';"
                                            >
                                                <i
                                                    class="fas fa-plus"
                                                    style="margin-right:6px;"
                                                ></i>

                                                Save Input
                                            </button>


                                            <button
                                                type="button"
                                                onclick="switchConnectorTab('input','existing')"
                                                style="
                                                    background:#000;
                                                    color:#fff;
                                                    border:none;
                                                    padding:9px 16px;
                                                    border-radius:20px;
                                                    font-size:12px;
                                                    font-weight:600;
                                                    cursor:pointer;
                                                    transition:all .2s ease;
                                                "
                                                onmouseover="this.style.background='#dc3545';"
                                                onmouseout="this.style.background='#000';"
                                            >
                                                Cancel
                                            </button>

                                        </div>

                                    </div>

                                </div>






                            {{-- CONFIGURATION SETTINGS --}}
                            <div
                                id="settings-configuration"
                                class="workflow-settings-section"
                                style="display:none;"
                            >

                                <div style="
                                    font-size:14px;
                                    font-weight:700;
                                    color:#222;
                                    margin-bottom:15px;
                                ">
                                    Configuration
                                </div>

                                <label style="
                                    display:block;
                                    font-size:12px;
                                    font-weight:600;
                                    color:#555;
                                    margin-bottom:7px;
                                ">
                                    Select Configuration
                                </label>

                                <select
                                    id="nodeConfiguration"
                                    onchange="updateSelectedNodeValue()"
                                    style="
                                        width:100%;
                                        height:46px;
                                        border:1px solid #ddd;
                                        border-radius:10px;
                                        padding:0 12px;
                                        background:#fff;
                                        color:#333;
                                        font-size:13px;
                                        outline:none;
                                    "
                                >

                                    <option value="">
                                        Select configuration
                                    </option>

                                    @foreach($configs as $config)

                                        <option value="{{ $config->id }}">
                                            {{ $config->name ?? $config->config_name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- OUTPUT SETTINGS --}}
                            <div
                                id="settings-output"
                                class="workflow-settings-section"
                                style="display:none;"
                            >

                                <div style="
                                    font-size:14px;
                                    font-weight:700;
                                    color:#222;
                                    margin-bottom:15px;
                                ">
                                    Output Connector
                                </div>


                                <!-- TABS -->

                                <div style="
                                    display:flex;
                                    gap:6px;
                                    margin-bottom:15px;
                                    border-bottom:1px solid #eee;
                                    padding-bottom:8px;
                                ">

                                    <button
                                        type="button"
                                        id="output-connector-existing-tab"
                                        onclick="switchConnectorTab('output','existing')"
                                        style="
                                            border:none;
                                            background:#000;
                                            color:#fff;
                                            padding:9px 16px;
                                            border-radius:20px;
                                            font-size:12px;
                                            font-weight:600;
                                            cursor:pointer;
                                        "
                                    >
                                        Existing Connector
                                    </button>

                                    <button
                                        type="button"
                                        id="output-connector-new-tab"
                                        onclick="switchConnectorTab('output','new')"
                                        style="
                                            border:1px solid #ddd;
                                            background:#fff;
                                            color:#222;
                                            padding:9px 16px;
                                            border-radius:20px;
                                            font-size:12px;
                                            font-weight:600;
                                            cursor:pointer;
                                        "
                                    >
                                        New Connector
                                    </button>

                                </div>


                                <!-- EXISTING OUTPUT -->

                                <div
                                    id="output-connector-existing"
                                    style="display:block;"
                                >

                                    <label style="
                                        display:block;
                                        font-size:12px;
                                        font-weight:600;
                                        color:#555;
                                        margin-bottom:7px;
                                    ">
                                        Select Output
                                    </label>

                                    <select
                                        id="nodeOutputConnector"
                                        onchange="updateSelectedNodeValue()"
                                        style="
                                            width:100%;
                                            height:46px;
                                            border:1px solid #ddd;
                                            border-radius:10px;
                                            padding:0 12px;
                                            background:#fff;
                                            color:#333;
                                            font-size:13px;
                                            outline:none;
                                        "
                                    >

                                        <option value="">
                                            Select connector
                                        </option>

                                        @foreach($connectors->where('type', 'output') as $connector)

                                            <option value="{{ $connector->id }}">
                                                {{ $connector->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                <!-- NEW OUTPUT -->

                                <div
                                    id="output-connector-new"
                                    style="
                                        display:none;
                                        margin-top:5px;
                                        padding:14px;
                                        border:1px solid #eee;
                                        border-radius:10px;
                                        background:#fafafa;
                                    "
                                >

                                    <label style="
                                        display:block;
                                        font-size:12px;
                                        font-weight:600;
                                        color:#555;
                                        margin-bottom:7px;
                                    ">
                                        Connector Name
                                    </label>

                                    <input
                                        type="text"
                                        id="newOutputConnectorName"
                                        placeholder="Enter output name"
                                        style="
                                            width:100%;
                                            height:42px;
                                            border:1px solid #ddd;
                                            border-radius:8px;
                                            padding:0 10px;
                                            font-size:13px;
                                            outline:none;
                                            margin-bottom:10px;
                                        "
                                    >


                                    <label style="
                                        display:block;
                                        font-size:12px;
                                        font-weight:600;
                                        color:#555;
                                        margin-bottom:7px;
                                    ">
                                        Account Email
                                    </label>

                                    <input
                                        type="email"
                                        id="newOutputAccountEmail"
                                        placeholder="Enter account email"
                                        style="
                                            width:100%;
                                            height:42px;
                                            border:1px solid #ddd;
                                            border-radius:8px;
                                            padding:0 10px;
                                            font-size:13px;
                                            outline:none;
                                            margin-bottom:10px;
                                        "
                                    >


                                    <label style="
                                        display:block;
                                        font-size:12px;
                                        font-weight:600;
                                        color:#555;
                                        margin-bottom:7px;
                                    ">
                                        Email Client ID
                                    </label>

                                    <input
                                        type="text"
                                        id="newOutputEmailClientId"
                                        placeholder="Enter email client ID"
                                        style="
                                            width:100%;
                                            height:42px;
                                            border:1px solid #ddd;
                                            border-radius:8px;
                                            padding:0 10px;
                                            font-size:13px;
                                            outline:none;
                                            margin-bottom:10px;
                                        "
                                    >


                                    <label style="
                                        display:block;
                                        font-size:12px;
                                        font-weight:600;
                                        color:#555;
                                        margin-bottom:7px;
                                    ">
                                        Email Client Secret
                                    </label>

                                    <input
                                        type="password"
                                        id="newOutputEmailClientSecret"
                                        placeholder="Enter email client secret"
                                        style="
                                            width:100%;
                                            height:42px;
                                            border:1px solid #ddd;
                                            border-radius:8px;
                                            padding:0 10px;
                                            font-size:13px;
                                            outline:none;
                                            margin-bottom:12px;
                                        "
                                    >


                                    <input
                                        type="hidden"
                                        id="newOutputConnectorType"
                                        value="output"
                                    >


                                    <div style="
                                        display:flex;
                                        gap:7px;
                                    ">

                                        <button
                                            type="button"
                                            id="save-output-connector"
                                            onclick="saveNewConnector('output')"
                                            style="
                                                background:#000;
                                                color:#fff;
                                                border:none;
                                                padding:9px 16px;
                                                border-radius:20px;
                                                font-size:12px;
                                                font-weight:600;
                                                cursor:pointer;
                                            "
                                            onmouseover="this.style.background='#28a745';"
                                            onmouseout="this.style.background='#000';"
                                        >
                                            <i
                                                class="fas fa-plus"
                                                style="margin-right:6px;"
                                            ></i>

                                            Save Output
                                        </button>


                                        <button
                                            type="button"
                                            onclick="switchConnectorTab('output','existing')"
                                            style="
                                                background:#000;
                                                color:#fff;
                                                border:none;
                                                padding:9px 16px;
                                                border-radius:20px;
                                                font-size:12px;
                                                font-weight:600;
                                                cursor:pointer;
                                            "
                                            onmouseover="this.style.background='#dc3545';"
                                            onmouseout="this.style.background='#000';"
                                        >
                                            Cancel
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
      
      

    </div>

        <script>

            let draggedType = null;

            let draggedNode = null;

            let selectedWorkflowNode = null;

            let dragOffsetX = 0;

            let dragOffsetY = 0;

            let nodeMoved = false;


            /*
            |--------------------------------------------------------------------------
            | CONNECTION STATE
            |--------------------------------------------------------------------------
            */

            let workflowConnections = [];

            let connectionSourceNode = null;


            /*
            |--------------------------------------------------------------------------
            | NODE COUNTER
            |--------------------------------------------------------------------------
            */

            let workflowNodeCounter = 0;


            /*
            |--------------------------------------------------------------------------
            | LEFT PANEL DRAG
            |--------------------------------------------------------------------------
            */

            function startDrag(event, type) {

                draggedType = type;

                event.dataTransfer.effectAllowed = 'copy';

                event.dataTransfer.setData(
                    'workflow-node-type',
                    type
                );

            }


            /*
            |--------------------------------------------------------------------------
            | ALLOW DROP
            |--------------------------------------------------------------------------
            */

            function allowDrop(event) {

                event.preventDefault();

                event.dataTransfer.dropEffect = 'copy';

            }


            /*
            |--------------------------------------------------------------------------
            | DROP NODE
            |--------------------------------------------------------------------------
            */

            function dropWorkflowNode(event) {

                event.preventDefault();


                const canvas =
                    document.getElementById(
                        'workflowCanvas'
                    );


                if (!canvas) {
                    return;
                }


                const type =
                    event.dataTransfer.getData(
                        'workflow-node-type'
                    ) || draggedType;


                if (!type) {
                    return;
                }


                const rect =
                    canvas.getBoundingClientRect();


                let x =
                    event.clientX -
                    rect.left +
                    canvas.scrollLeft -
                    95;


                let y =
                    event.clientY -
                    rect.top +
                    canvas.scrollTop -
                    42;


                x =
                    Math.max(
                        30,
                        x
                    );


                y =
                    Math.max(
                        80,
                        y
                    );


                createWorkflowNode(
                    type,
                    x,
                    y
                );


                draggedType =
                    null;

            }


            /*
            |--------------------------------------------------------------------------
            | CREATE NODE
            |--------------------------------------------------------------------------
            */

            function createWorkflowNode(
                type,
                x,
                y
            ) {

                const canvas =
                    document.getElementById(
                        'workflowCanvas'
                    );


                if (!canvas) {
                    return;
                }


                workflowNodeCounter++;


                const node =
                    document.createElement('div');


                node.className =
                    'workflow-node';


                node.dataset.nodeType =
                    type;


                node.dataset.nodeId =
                    'workflow_node_' +
                    workflowNodeCounter;


                node.style.position =
                    'absolute';


                node.style.left =
                    `${x}px`;


                node.style.top =
                    `${y}px`;


                node.style.width =
                    '195px';


                node.style.minHeight =
                    '82px';


                node.style.background =
                    '#fff';


                node.style.border =
                    '2px solid #111827';


                node.style.borderRadius =
                    '14px';


                node.style.boxShadow =
                    '0 6px 18px rgba(0,0,0,.09)';


                node.style.zIndex =
                    '5';


                node.style.cursor =
                    'grab';


                node.style.userSelect =
                    'none';


                let title = '';

                let icon = '';


                if (type === 'input') {

                    title =
                        'Input';

                    icon =
                        'fa-sign-in-alt';

                }


                if (type === 'configuration') {

                    title =
                        'Configuration';

                    icon =
                        'fa-cog';

                }


                if (type === 'output') {

                    title =
                        'Output';

                    icon =
                        'fa-sign-out-alt';

                }


                node.innerHTML = `

                    <!-- LEFT CONNECTOR -->

                    <button
                        type="button"
                        class="workflow-connect-point workflow-connect-left"
                        title="Connect to this node"
                        style="
                            position:absolute;
                            left:-12px;
                            top:50%;
                            transform:translateY(-50%);
                            width:24px;
                            height:24px;
                            padding:0;
                            border:2px solid #111827;
                            border-radius:50%;
                            background:#fff;
                            color:#111827;
                            cursor:pointer;
                            z-index:20;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:15px;
                            font-weight:700;
                            line-height:1;
                            transition:all .2s ease;
                        "
                    >
                        +
                    </button>


                    <!-- RIGHT CONNECTOR -->

                    <button
                        type="button"
                        class="workflow-connect-point workflow-connect-right"
                        title="Connect from this node"
                        style="
                            position:absolute;
                            right:-12px;
                            top:50%;
                            transform:translateY(-50%);
                            width:24px;
                            height:24px;
                            padding:0;
                            border:2px solid #111827;
                            border-radius:50%;
                            background:#fff;
                            color:#111827;
                            cursor:pointer;
                            z-index:20;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:15px;
                            font-weight:700;
                            line-height:1;
                            transition:all .2s ease;
                        "
                    >
                        +
                    </button>


                    <!-- NODE CONTENT -->

                    <div style="
                        position:relative;
                        padding:14px;
                    ">


                        <!-- DELETE -->

                        <button
                            type="button"
                            class="workflow-delete-node"
                            title="Remove node"
                            style="
                                position:absolute;
                                top:7px;
                                right:7px;
                                width:25px;
                                height:25px;
                                padding:0;
                                border:none;
                                border-radius:50%;
                                background:#000;
                                color:#fff;
                                cursor:pointer;
                                font-size:12px;
                                z-index:10;
                                transition:all .2s ease;
                            "
                        >
                            ×
                        </button>


                        <div style="
                            display:flex;
                            align-items:center;
                            gap:10px;
                            padding-right:25px;
                        ">


                            <!-- ICON -->

                            <div style="
                                width:38px;
                                height:38px;
                                flex-shrink:0;
                                border-radius:10px;
                                background:#f4f4f4;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                color:#222;
                            ">

                                <i class="fas ${icon}"></i>

                            </div>


                            <!-- TEXT -->

                            <div style="
                                min-width:0;
                            ">

                                <div style="
                                    font-size:13px;
                                    font-weight:700;
                                    color:#222;
                                ">
                                    ${title}
                                </div>


                                <div
                                    class="workflow-node-value"
                                    style="
                                        margin-top:3px;
                                        font-size:10px;
                                        color:#999;
                                        white-space:nowrap;
                                        overflow:hidden;
                                        text-overflow:ellipsis;
                                        max-width:110px;
                                    "
                                >
                                    Click to configure
                                </div>

                            </div>

                        </div>

                    </div>

                `;


                canvas.appendChild(node);


                /*
                |--------------------------------------------------------------------------
                | DELETE BUTTON
                |--------------------------------------------------------------------------
                */

                const deleteButton =
                    node.querySelector(
                        '.workflow-delete-node'
                    );


                deleteButton.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();

                        event.stopPropagation();


                        removeWorkflowConnections(
                            node
                        );


                        if (
                            selectedWorkflowNode ===
                            node
                        ) {

                            selectedWorkflowNode =
                                null;

                        }


                        node.remove();


                        updateWorkflowConnections();

                        checkEmptyCanvas();

                        closeSettings();

                    }
                );


                deleteButton.addEventListener(
                    'mouseenter',
                    function() {

                        this.style.background =
                            '#dc3545';

                    }
                );


                deleteButton.addEventListener(
                    'mouseleave',
                    function() {

                        this.style.background =
                            '#000';

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | CONNECTOR BUTTONS
                |--------------------------------------------------------------------------
                */

                const leftPoint =
                    node.querySelector(
                        '.workflow-connect-left'
                    );


                const rightPoint =
                    node.querySelector(
                        '.workflow-connect-right'
                    );


                leftPoint.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();

                        event.stopPropagation();


                        handleConnectionPointClick(
                            node,
                            'input'
                        );

                    }
                );


                rightPoint.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();

                        event.stopPropagation();


                        handleConnectionPointClick(
                            node,
                            'output'
                        );

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | CONNECTOR HOVER
                |--------------------------------------------------------------------------
                */

                [leftPoint, rightPoint].forEach(
                    function(point) {

                        point.addEventListener(
                            'mouseenter',
                            function() {

                                this.style.background =
                                    '#28a745';

                                this.style.color =
                                    '#fff';

                                this.style.borderColor =
                                    '#28a745';

                                this.style.transform =
                                    'translateY(-50%) scale(1.15)';

                            }
                        );


                        point.addEventListener(
                            'mouseleave',
                            function() {

                                if (
                                    !this.classList.contains(
                                        'workflow-connect-selected'
                                    )
                                ) {

                                    this.style.background =
                                        '#fff';

                                    this.style.color =
                                        '#111827';

                                    this.style.borderColor =
                                        '#111827';

                                    this.style.transform =
                                        'translateY(-50%) scale(1)';

                                }

                            }
                        );

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | NODE CLICK
                |--------------------------------------------------------------------------
                */

                node.addEventListener(
                    'click',
                    function(event) {

                        if (
                            event.target.closest(
                                '.workflow-delete-node'
                            )
                        ) {
                            return;
                        }


                        if (
                            event.target.closest(
                                '.workflow-connect-point'
                            )
                        ) {
                            return;
                        }


                        if (nodeMoved) {
                            return;
                        }


                        selectWorkflowNode(
                            node
                        );


                        openSettings(
                            node
                        );

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | NODE DRAG
                |--------------------------------------------------------------------------
                */

                node.addEventListener(
                    'mousedown',
                    function(event) {

                        if (
                            event.target.closest(
                                '.workflow-delete-node'
                            )
                        ) {
                            return;
                        }


                        if (
                            event.target.closest(
                                '.workflow-connect-point'
                            )
                        ) {
                            return;
                        }


                        event.preventDefault();


                        draggedNode =
                            node;


                        nodeMoved =
                            false;


                        node.style.cursor =
                            'grabbing';


                        const nodeRect =
                            node.getBoundingClientRect();


                        dragOffsetX =
                            event.clientX -
                            nodeRect.left;


                        dragOffsetY =
                            event.clientY -
                            nodeRect.top;


                        document.addEventListener(
                            'mousemove',
                            moveWorkflowNode
                        );


                        document.addEventListener(
                            'mouseup',
                            stopWorkflowNodeDrag
                        );

                    }
                );


                selectWorkflowNode(
                    node
                );


                openSettings(
                    node
                );


                checkEmptyCanvas();

            }


            /*
            |--------------------------------------------------------------------------
            | MOVE NODE
            |--------------------------------------------------------------------------
            */

            function moveWorkflowNode(event) {

                if (!draggedNode) {
                    return;
                }


                const canvas =
                    document.getElementById(
                        'workflowCanvas'
                    );


                if (!canvas) {
                    return;
                }


                const canvasRect =
                    canvas.getBoundingClientRect();


                let newLeft =
                    event.clientX -
                    canvasRect.left +
                    canvas.scrollLeft -
                    dragOffsetX;


                let newTop =
                    event.clientY -
                    canvasRect.top +
                    canvas.scrollTop -
                    dragOffsetY;


                const currentLeft =
                    parseFloat(
                        draggedNode.style.left
                    ) || 0;


                const currentTop =
                    parseFloat(
                        draggedNode.style.top
                    ) || 0;


                if (
                    Math.abs(
                        newLeft -
                        currentLeft
                    ) > 3 ||

                    Math.abs(
                        newTop -
                        currentTop
                    ) > 3
                ) {

                    nodeMoved =
                        true;

                }


                const nodeWidth =
                    draggedNode.offsetWidth;


                const nodeHeight =
                    draggedNode.offsetHeight;


                const maxLeft =
                    Math.max(
                        25,
                        canvas.scrollWidth -
                        nodeWidth -
                        25
                    );


                const maxTop =
                    Math.max(
                        80,
                        canvas.scrollHeight -
                        nodeHeight -
                        25
                    );


                newLeft =
                    Math.max(
                        25,
                        Math.min(
                            newLeft,
                            maxLeft
                        )
                    );


                newTop =
                    Math.max(
                        80,
                        Math.min(
                            newTop,
                            maxTop
                        )
                    );


                draggedNode.style.left =
                    `${newLeft}px`;


                draggedNode.style.top =
                    `${newTop}px`;


                updateWorkflowConnections();

            }


            /*
            |--------------------------------------------------------------------------
            | STOP DRAG
            |--------------------------------------------------------------------------
            */

            function stopWorkflowNodeDrag() {

                if (!draggedNode) {
                    return;
                }


                draggedNode.style.cursor =
                    'grab';


                document.removeEventListener(
                    'mousemove',
                    moveWorkflowNode
                );


                document.removeEventListener(
                    'mouseup',
                    stopWorkflowNodeDrag
                );


                setTimeout(
                    function() {

                        nodeMoved =
                            false;

                    },
                    50
                );


                draggedNode =
                    null;

            }


            /*
            |--------------------------------------------------------------------------
            | SELECT NODE
            |--------------------------------------------------------------------------
            */

            function selectWorkflowNode(node) {

                document
                    .querySelectorAll(
                        '#workflowCanvas .workflow-node'
                    )
                    .forEach(
                        function(item) {

                            item.style.border =
                                '2px solid #111827';

                            item.style.boxShadow =
                                '0 6px 18px rgba(0,0,0,.09)';

                        }
                    );


                node.style.border =
                    '2px solid #28a745';


                node.style.boxShadow =
                    '0 8px 24px rgba(40,167,69,.18)';


                selectedWorkflowNode =
                    node;

            }


            /*
            |--------------------------------------------------------------------------
            | OPEN SETTINGS
            |--------------------------------------------------------------------------
            */

            function openSettings(node) {

                const sidebar =
                    document.getElementById(
                        'workflowSettings'
                    );


                if (!sidebar) {
                    return;
                }


                selectedWorkflowNode =
                    node;


                const type =
                    node.dataset.nodeType;


                document
                    .querySelectorAll(
                        '.workflow-settings-section'
                    )
                    .forEach(
                        function(section) {

                            section.style.display =
                                'none';

                        }
                    );


                const section =
                    document.getElementById(
                        `settings-${type}`
                    );


                if (section) {

                    section.style.display =
                        'block';

                }


                loadNodeSetting(
                    node
                );


                sidebar.style.width =
                    '350px';


                sidebar.style.minWidth =
                    '350px';


                sidebar.style.padding =
                    '22px';


                sidebar.style.opacity =
                    '1';


                sidebar.style.pointerEvents =
                    'auto';

            }


            /*
            |--------------------------------------------------------------------------
            | LOAD NODE SETTING
            |--------------------------------------------------------------------------
            */

            function loadNodeSetting(node) {

                const type =
                    node.dataset.nodeType;


                let select =
                    null;


                if (type === 'input') {

                    select =
                        document.getElementById(
                            'nodeInputConnector'
                        );

                }


                if (type === 'configuration') {

                    select =
                        document.getElementById(
                            'nodeConfiguration'
                        );

                }


                if (type === 'output') {

                    select =
                        document.getElementById(
                            'nodeOutputConnector'
                        );

                }


                if (!select) {
                    return;
                }


                select.value =
                    node.dataset.selectedValue ||
                    '';

            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE NODE SETTING
            |--------------------------------------------------------------------------
            */

            function updateSelectedNodeValue() {

                if (!selectedWorkflowNode) {
                    return;
                }


                const type =
                    selectedWorkflowNode.dataset.nodeType;


                let select =
                    null;


                if (type === 'input') {

                    select =
                        document.getElementById(
                            'nodeInputConnector'
                        );

                }


                if (type === 'configuration') {

                    select =
                        document.getElementById(
                            'nodeConfiguration'
                        );

                }


                if (type === 'output') {

                    select =
                        document.getElementById(
                            'nodeOutputConnector'
                        );

                }


                if (!select) {
                    return;
                }


                const value =
                    select.value;


                const text =
                    select.options[
                        select.selectedIndex
                    ]?.text || '';


                selectedWorkflowNode.dataset.selectedValue =
                    value;


                selectedWorkflowNode.dataset.selectedName =
                    text;


                const valueElement =
                    selectedWorkflowNode.querySelector(
                        '.workflow-node-value'
                    );


                if (valueElement) {

                    valueElement.textContent =
                        text ||
                        'Click to configure';

                }

            }


            /*
            |--------------------------------------------------------------------------
            | CONNECTION POINT CLICK
            |--------------------------------------------------------------------------
            */

            function handleConnectionPointClick(
                node,
                pointType
            ) {


                /*
                |--------------------------------------------------------------------------
                | FIRST CLICK
                |--------------------------------------------------------------------------
                |
                | Right + = start connection
                |
                */

                if (!connectionSourceNode) {


                    if (
                        pointType !== 'output'
                    ) {

                        return;

                    }


                    connectionSourceNode =
                        node;


                    const sourcePoint =
                        node.querySelector(
                            '.workflow-connect-right'
                        );


                    if (sourcePoint) {

                        sourcePoint.classList.add(
                            'workflow-connect-selected'
                        );


                        sourcePoint.style.background =
                            '#28a745';


                        sourcePoint.style.color =
                            '#fff';


                        sourcePoint.style.borderColor =
                            '#28a745';


                        sourcePoint.style.transform =
                            'translateY(-50%) scale(1.15)';

                    }


                    node.style.border =
                        '2px solid #28a745';


                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | SECOND CLICK
                |--------------------------------------------------------------------------
                |
                | Left + = finish connection
                |
                */

                if (
                    pointType !== 'input'
                ) {

                    return;

                }


                const targetNode =
                    node;


                /*
                |--------------------------------------------------------------------------
                | Prevent self connection
                |--------------------------------------------------------------------------
                */

                if (
                    connectionSourceNode ===
                    targetNode
                ) {

                    cancelConnectionMode();

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Check duplicate
                |--------------------------------------------------------------------------
                */

                const duplicate =
                    workflowConnections.some(
                        function(connection) {

                            return (
                                connection.from ===
                                connectionSourceNode.dataset.nodeId
                                &&
                                connection.to ===
                                targetNode.dataset.nodeId
                            );

                        }
                    );


                /*
                |--------------------------------------------------------------------------
                | Create connection
                |--------------------------------------------------------------------------
                */

                if (!duplicate) {

                    workflowConnections.push({

                        id:
                            'connection_' +
                            Date.now() +
                            '_' +
                            Math.random()
                                .toString(36)
                                .substring(2, 8),

                        from:
                            connectionSourceNode.dataset.nodeId,

                        to:
                            targetNode.dataset.nodeId

                    });

                }


                cancelConnectionMode();


                updateWorkflowConnections();

            }


            /*
            |--------------------------------------------------------------------------
            | CANCEL CONNECTION MODE
            |--------------------------------------------------------------------------
            */

            function cancelConnectionMode() {

                if (connectionSourceNode) {

                    const point =
                        connectionSourceNode.querySelector(
                            '.workflow-connect-right'
                        );


                    if (point) {

                        point.classList.remove(
                            'workflow-connect-selected'
                        );


                        point.style.background =
                            '#fff';


                        point.style.color =
                            '#111827';


                        point.style.borderColor =
                            '#111827';


                        point.style.transform =
                            'translateY(-50%) scale(1)';

                    }

                }


                connectionSourceNode =
                    null;


                document
                    .querySelectorAll(
                        '.workflow-connect-point'
                    )
                    .forEach(
                        function(point) {

                            point.classList.remove(
                                'workflow-connect-selected'
                            );

                        }
                    );


                document
                    .querySelectorAll(
                        '#workflowCanvas .workflow-node'
                    )
                    .forEach(
                        function(node) {

                            node.style.border =
                                '2px solid #111827';

                        }
                    );


                if (selectedWorkflowNode) {

                    selectedWorkflowNode.style.border =
                        '2px solid #28a745';

                }

            }


            /*
            |--------------------------------------------------------------------------
            | REMOVE NODE CONNECTIONS
            |--------------------------------------------------------------------------
            */

            function removeWorkflowConnections(node) {

                const nodeId =
                    node.dataset.nodeId;


                workflowConnections =
                    workflowConnections.filter(
                        function(connection) {

                            return (
                                connection.from !==
                                nodeId
                                &&
                                connection.to !==
                                nodeId
                            );

                        }
                    );


                if (
                    connectionSourceNode ===
                    node
                ) {

                    cancelConnectionMode();

                }

            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE CONNECTIONS
            |--------------------------------------------------------------------------
            */

            function updateWorkflowConnections() {

                const canvas =
                    document.getElementById(
                        'workflowCanvas'
                    );


                const group =
                    document.getElementById(
                        'workflowConnectionLines'
                    );


                if (
                    !canvas ||
                    !group
                ) {
                    return;
                }


                group.innerHTML =
                    '';


                workflowConnections.forEach(
                    function(connection) {


                        const fromNode =
                            canvas.querySelector(
                                `[data-node-id="${connection.from}"]`
                            );


                        const toNode =
                            canvas.querySelector(
                                `[data-node-id="${connection.to}"]`
                            );


                        if (
                            !fromNode ||
                            !toNode
                        ) {

                            return;

                        }


                        drawWorkflowConnection(
                            canvas,
                            fromNode,
                            toNode,
                            group
                        );

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | DRAW CONNECTION
            |--------------------------------------------------------------------------
            */

            function drawWorkflowConnection(
                canvas,
                fromNode,
                toNode,
                group
            ) {

                const canvasRect =
                    canvas.getBoundingClientRect();


                const fromRect =
                    fromNode.getBoundingClientRect();


                const toRect =
                    toNode.getBoundingClientRect();


                /*
                |--------------------------------------------------------------------------
                | START
                |--------------------------------------------------------------------------
                */

                const startX =
                    fromRect.right -
                    canvasRect.left +
                    canvas.scrollLeft;


                const startY =
                    fromRect.top +
                    (fromRect.height / 2) -
                    canvasRect.top +
                    canvas.scrollTop;


                /*
                |--------------------------------------------------------------------------
                | END
                |--------------------------------------------------------------------------
                */

                const endX =
                    toRect.left -
                    canvasRect.left +
                    canvas.scrollLeft;


                const endY =
                    toRect.top +
                    (toRect.height / 2) -
                    canvasRect.top +
                    canvas.scrollTop;


                /*
                |--------------------------------------------------------------------------
                | CURVE
                |--------------------------------------------------------------------------
                */

                const horizontalDistance =
                    Math.abs(
                        endX -
                        startX
                    );


                const curve =
                    Math.max(
                        horizontalDistance *
                        0.45,
                        60
                    );


                const path =
                    document.createElementNS(
                        'http://www.w3.org/2000/svg',
                        'path'
                    );


                path.setAttribute(
                    'd',
                    `
                        M ${startX} ${startY}

                        C
                        ${startX + curve} ${startY},
                        ${endX - curve} ${endY},
                        ${endX} ${endY}
                    `
                );


                path.setAttribute(
                    'fill',
                    'none'
                );


                path.setAttribute(
                    'stroke',
                    '#111827'
                );


                path.setAttribute(
                    'stroke-width',
                    '2.5'
                );


                path.setAttribute(
                    'stroke-linecap',
                    'round'
                );


                group.appendChild(
                    path
                );

            }


            /*
            |--------------------------------------------------------------------------
            | EMPTY CANVAS
            |--------------------------------------------------------------------------
            */

            function checkEmptyCanvas() {

                const nodes =
                    document.querySelectorAll(
                        '#workflowCanvas .workflow-node'
                    );


                const empty =
                    document.getElementById(
                        'canvasEmpty'
                    );


                if (!empty) {
                    return;
                }


                if (
                    nodes.length === 0
                ) {

                    empty.style.display =
                        'block';

                } else {

                    empty.style.display =
                        'none';

                }


                updateWorkflowConnections();

            }


            /*
            |--------------------------------------------------------------------------
            | CLEAR WORKFLOW
            |--------------------------------------------------------------------------
            */

            function clearWorkflow() {

                document
                    .querySelectorAll(
                        '#workflowCanvas .workflow-node'
                    )
                    .forEach(
                        function(node) {

                            node.remove();

                        }
                    );


                workflowConnections =
                    [];


                connectionSourceNode =
                    null;


                selectedWorkflowNode =
                    null;


                const group =
                    document.getElementById(
                        'workflowConnectionLines'
                    );


                if (group) {

                    group.innerHTML =
                        '';

                }


                checkEmptyCanvas();


                closeSettings();

            }


            /*
            |--------------------------------------------------------------------------
            | CLOSE SETTINGS
            |--------------------------------------------------------------------------
            */

            function closeSettings() {

                const sidebar =
                    document.getElementById(
                        'workflowSettings'
                    );


                if (!sidebar) {
                    return;
                }


                sidebar.style.width =
                    '0';


                sidebar.style.minWidth =
                    '0';


                sidebar.style.padding =
                    '0';


                sidebar.style.opacity =
                    '0';


                sidebar.style.pointerEvents =
                    'none';

            }


            /*
            |--------------------------------------------------------------------------
            | WINDOW RESIZE
            |--------------------------------------------------------------------------
            */

            window.addEventListener(
                'resize',
                function() {

                    updateWorkflowConnections();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | CANVAS SCROLL
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'DOMContentLoaded',
                function() {

                    const canvas =
                        document.getElementById(
                            'workflowCanvas'
                        );


                    if (canvas) {

                        canvas.addEventListener(
                            'scroll',
                            function() {

                                updateWorkflowConnections();

                            }
                        );

                    }


                    checkEmptyCanvas();


                    updateWorkflowConnections();

                }
            );

        </script>

        {{--Saves workflow--}}
        <script>
            function saveWorkflow() {

                const nodes = Array.from(
                    document.querySelectorAll('#workflowCanvas .workflow-node')
                );

                if (nodes.length === 0) {
                    alert('Please add at least one workflow.');
                    return;
                }

                if (!workflowConnections || workflowConnections.length === 0) {
                    alert('Please connect your workflow nodes first.');
                    return;
                }

                /*
                |--------------------------------------------------------------------------
                | Create node map
                |--------------------------------------------------------------------------
                */
                const nodeMap = {};

                nodes.forEach(node => {
                    nodeMap[node.dataset.nodeId] = node;
                });

                const workflows = [];

                /*
                |--------------------------------------------------------------------------
                | Find every configuration
                |--------------------------------------------------------------------------
                */
                const configurationNodes = nodes.filter(node =>
                    node.dataset.nodeType === 'configuration'
                );

                configurationNodes.forEach(configNode => {

                    const configId = configNode.dataset.selectedValue;

                    /*
                    |--------------------------------------------------------------------------
                    | Find ALL inputs connected TO this configuration
                    |--------------------------------------------------------------------------
                    */
                    const inputConnections = workflowConnections.filter(connection => {

                        return (
                            connection.to === configNode.dataset.nodeId &&
                            nodeMap[connection.from] &&
                            nodeMap[connection.from].dataset.nodeType === 'input'
                        );

                    });

                    /*
                    |--------------------------------------------------------------------------
                    | Find ALL outputs connected FROM this configuration
                    |--------------------------------------------------------------------------
                    */
                    const outputConnections = workflowConnections.filter(connection => {

                        return (
                            connection.from === configNode.dataset.nodeId &&
                            nodeMap[connection.to] &&
                            nodeMap[connection.to].dataset.nodeType === 'output'
                        );

                    });

                    /*
                    |--------------------------------------------------------------------------
                    | Convert connections into connector IDs
                    |--------------------------------------------------------------------------
                    */
                    const inputConnectorIds = inputConnections.map(connection => {

                        const inputNode = nodeMap[connection.from];

                        return inputNode
                            ? inputNode.dataset.selectedValue
                            : null;

                    });

                    const outputConnectorIds = outputConnections.map(connection => {

                        const outputNode = nodeMap[connection.to];

                        return outputNode
                            ? outputNode.dataset.selectedValue
                            : null;

                    });

                    /*
                    |--------------------------------------------------------------------------
                    | Remove ONLY invalid values.
                    |
                    | Do NOT use Set here because two different nodes may legitimately
                    | reference the same connector.
                    |--------------------------------------------------------------------------
                    */
                    const validInputIds = inputConnectorIds.filter(id =>
                        id !== undefined &&
                        id !== null &&
                        id !== ''
                    );

                    const validOutputIds = outputConnectorIds.filter(id =>
                        id !== undefined &&
                        id !== null &&
                        id !== ''
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | Validate configuration
                    |--------------------------------------------------------------------------
                    */
                    if (
                        configId === undefined ||
                        configId === null ||
                        configId === ''
                    ) {
                        console.error(
                            'Configuration has no selected value:',
                            configNode
                        );

                        return;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | DEBUG
                    |--------------------------------------------------------------------------
                    */
                    console.log(
                        '======================================'
                    );

                    console.log(
                        'Configuration:',
                        configId
                    );

                    console.log(
                        'Input connections:',
                        inputConnections
                    );

                    console.log(
                        'Output connections:',
                        outputConnections
                    );

                    console.log(
                        'Input IDs:',
                        validInputIds
                    );

                    console.log(
                        'Output IDs:',
                        validOutputIds
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | CREATE EVERY INPUT × OUTPUT COMBINATION
                    |--------------------------------------------------------------------------
                    */
                    for (let i = 0; i < validInputIds.length; i++) {

                        for (let j = 0; j < validOutputIds.length; j++) {

                            workflows.push({

                                input_connector_id:
                                    validInputIds[i],

                                configuration_id:
                                    configId,

                                output_connector_id:
                                    validOutputIds[j]

                            });

                        }

                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Check expected number
                    |--------------------------------------------------------------------------
                    */
                    console.log(
                        'Expected workflows:',
                        validInputIds.length * validOutputIds.length
                    );

                    console.log(
                        'Generated workflows for this config:',
                        validInputIds.length * validOutputIds.length
                    );

                });

                /*
                |--------------------------------------------------------------------------
                | Final validation
                |--------------------------------------------------------------------------
                */
                if (workflows.length === 0) {

                    alert(
                        'No complete Input → Configuration → Output workflow was found.'
                    );

                    return;
                }

                /*
                |--------------------------------------------------------------------------
                | IMPORTANT DEBUG
                |--------------------------------------------------------------------------
                */
                console.log(
                    '======================================'
                );

                console.log(
                    'FINAL WORKFLOWS:',
                    workflows
                );

                console.log(
                    'TOTAL WORKFLOWS:',
                    workflows.length
                );

                /*
                |--------------------------------------------------------------------------
                | Save
                |--------------------------------------------------------------------------
                */
                fetch("{{ route('admin.workflow.save') }}", {

                    method: "POST",

                    headers: {

                        "Content-Type": "application/json",

                        "X-CSRF-TOKEN": "{{ csrf_token() }}",

                        "Accept": "application/json"

                    },

                    body: JSON.stringify({

                        workflows: workflows

                    })

                })

                .then(async response => {

                    const data = await response.json();

                    if (!response.ok) {

                        throw new Error(
                            data.message ||
                            'Unable to save workflow.'
                        );

                    }

                    return data;

                })

                .then(data => {

                    if (data.success) {

                        alert(data.message);

                        console.log(
                            'Saved workflow:',
                            data
                        );

                    } else {

                        alert(
                            data.message ||
                            'Unable to save workflow.'
                        );

                    }

                })

                .catch(error => {

                    console.error(
                        'Workflow save error:',
                        error
                    );

                    alert(
                        error.message ||
                        'An error occurred while saving the workflow.'
                    );

                });

            }
        </script>


        {{--Add new connector--}}
        <script>

            /*
            |--------------------------------------------------------------------------
            | OPEN ADD CONNECTOR FORM
            |--------------------------------------------------------------------------
            */
            function openAddConnector(type) {

                const box = document.getElementById(
                    'add-' + type + '-connector'
                );

                if (!box) {
                    return;
                }

                box.style.display = 'block';

                /*
                |--------------------------------------------------------------------------
                | Automatically set connector type
                |--------------------------------------------------------------------------
                */
                const typeSelect = document.getElementById(
                    'new' +
                    type.charAt(0).toUpperCase() +
                    type.slice(1) +
                    'ConnectorType'
                );

                if (typeSelect) {
                    typeSelect.value = type;
                }

                /*
                |--------------------------------------------------------------------------
                | Focus connector name
                |--------------------------------------------------------------------------
                */
                const nameInput = document.getElementById(
                    'new' +
                    type.charAt(0).toUpperCase() +
                    type.slice(1) +
                    'ConnectorName'
                );

                if (nameInput) {
                    nameInput.focus();
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CLOSE ADD CONNECTOR FORM
            |--------------------------------------------------------------------------
            */
            function closeAddConnector(type) {

                const box = document.getElementById(
                    'add-' + type + '-connector'
                );

                if (box) {
                    box.style.display = 'none';
                }
            }

            /*
            |--------------------------------------------------------------------------
            | SWITCH CONNECTOR TAB
            |--------------------------------------------------------------------------
            */

            function switchConnectorTab(type, tab) {

                const existingTab = document.getElementById(
                    type + '-connector-existing-tab'
                );

                const newTab = document.getElementById(
                    type + '-connector-new-tab'
                );

                const existingContent = document.getElementById(
                    type + '-connector-existing'
                );

                const newContent = document.getElementById(
                    type + '-connector-new'
                );

                if (
                    !existingTab ||
                    !newTab ||
                    !existingContent ||
                    !newContent
                ) {
                    return;
                }

                if (tab === 'existing') {

                    existingContent.style.display = 'block';
                    newContent.style.display = 'none';

                    existingTab.style.background = '#000';
                    existingTab.style.color = '#fff';

                    newTab.style.background = '#fff';
                    newTab.style.color = '#222';

                } else {

                    existingContent.style.display = 'none';
                    newContent.style.display = 'block';

                    existingTab.style.background = '#fff';
                    existingTab.style.color = '#222';

                    newTab.style.background = '#000';
                    newTab.style.color = '#fff';

                    /*
                    |--------------------------------------------------------------------------
                    | Focus connector name
                    |--------------------------------------------------------------------------
                    */

                    const nameInput = document.getElementById(
                        'new' +
                        type.charAt(0).toUpperCase() +
                        type.slice(1) +
                        'ConnectorName'
                    );

                    if (nameInput) {
                        nameInput.focus();
                    }
                }
            }


            /*
            |--------------------------------------------------------------------------
            | SAVE NEW CONNECTOR
            |--------------------------------------------------------------------------
            */
            function saveNewConnector(type) {

                const prefix =
                    type.charAt(0).toUpperCase() +
                    type.slice(1);


                /*
                |--------------------------------------------------------------------------
                | Get form fields
                |--------------------------------------------------------------------------
                */
                const nameInput = document.getElementById(
                    'new' + prefix + 'ConnectorName'
                );

                const accountEmailInput = document.getElementById(
                    'new' + prefix + 'AccountEmail'
                );

                const clientIdInput = document.getElementById(
                    'new' + prefix + 'EmailClientId'
                );

                const clientSecretInput = document.getElementById(
                    'new' + prefix + 'EmailClientSecret'
                );

                const typeInput = document.getElementById(
                    'new' + prefix + 'ConnectorType'
                );


                /*
                |--------------------------------------------------------------------------
                | Make sure required elements exist
                |--------------------------------------------------------------------------
                */
                if (
                    !nameInput ||
                    !accountEmailInput ||
                    !clientIdInput ||
                    !clientSecretInput
                ) {

                    console.error(
                        'Connector form fields could not be found.'
                    );

                    alert(
                        'Unable to find the connector form fields.'
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Get values
                |--------------------------------------------------------------------------
                */
                const name =
                    nameInput.value.trim();

                const accountEmail =
                    accountEmailInput.value.trim();

                const emailClientId =
                    clientIdInput.value.trim();

                const emailClientSecret =
                    clientSecretInput.value.trim();

                const connectorType =
                    typeInput
                        ? typeInput.value
                        : type;


                /*
                |--------------------------------------------------------------------------
                | Validate
                |--------------------------------------------------------------------------
                */
                if (!name) {

                    alert(
                        'Please enter a connector name.'
                    );

                    nameInput.focus();

                    return;
                }


                if (!accountEmail) {

                    alert(
                        'Please enter the account email.'
                    );

                    accountEmailInput.focus();

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Prevent double submission
                |--------------------------------------------------------------------------
                */
                const button =
                    document.getElementById(
                        'save-' + type + '-connector'
                    );

                if (button) {

                    button.disabled = true;

                    button.style.opacity = '0.6';

                    button.innerHTML =
                        '<i class="fas fa-spinner fa-spin" style="margin-right:6px;"></i> Saving...';
                }


                /*
                |--------------------------------------------------------------------------
                | Save connector without refreshing the page
                |--------------------------------------------------------------------------
                */
                fetch(
                    "{{ route('admin.workflow.connector.store') }}",
                    {
                        method: "POST",

                        headers: {

                            "Content-Type": "application/json",

                            "X-CSRF-TOKEN":
                                "{{ csrf_token() }}",

                            "Accept":
                                "application/json"

                        },

                        body: JSON.stringify({

                            name:
                                name,

                            account_email:
                                accountEmail,

                            email_client_id:
                                emailClientId,

                            email_client_secret:
                                emailClientSecret,

                            type:
                                connectorType

                        })
                    }
                )

                .then(async response => {

                    const data =
                        await response.json();

                    if (!response.ok) {

                        /*
                        |--------------------------------------------------------------------------
                        | Laravel validation errors
                        |--------------------------------------------------------------------------
                        */
                        if (
                            data.errors
                        ) {

                            const firstError =
                                Object.values(data.errors)[0];

                            if (
                                Array.isArray(firstError)
                            ) {

                                throw new Error(
                                    firstError[0]
                                );

                            }

                            throw new Error(
                                firstError
                            );
                        }

                        throw new Error(
                            data.message ||
                            'Unable to save connector.'
                        );
                    }

                    return data;
                })


                .then(data => {

                    if (!data.success) {

                        throw new Error(
                            data.message ||
                            'Unable to save connector.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Determine the correct dropdown
                    |--------------------------------------------------------------------------
                    */
                    const selectId =
                        connectorType === 'input'
                            ? 'nodeInputConnector'
                            : 'nodeOutputConnector';


                    const select =
                        document.getElementById(
                            selectId
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | Add connector to dropdown immediately
                    |--------------------------------------------------------------------------
                    */
                    if (select) {

                        const option =
                            document.createElement(
                                'option'
                            );

                        option.value =
                            data.connector.id;

                        option.textContent =
                            data.connector.name;

                        select.appendChild(
                            option
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | Automatically select new connector
                        |--------------------------------------------------------------------------
                        */
                        select.value =
                            data.connector.id;


                        /*
                        |--------------------------------------------------------------------------
                        | Update selected workflow node
                        |--------------------------------------------------------------------------
                        */
                        if (
                            typeof updateSelectedNodeValue ===
                            'function'
                        ) {

                            updateSelectedNodeValue();
                        }
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Close add connector area
                    |--------------------------------------------------------------------------
                    */
                    switchConnectorTab(
                        connectorType,
                        'existing'
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Clear form
                    |--------------------------------------------------------------------------
                    */
                    nameInput.value = '';

                    accountEmailInput.value = '';

                    clientIdInput.value = '';

                    clientSecretInput.value = '';


                    /*
                    |--------------------------------------------------------------------------
                    | Reset connector type
                    |--------------------------------------------------------------------------
                    */
                    if (typeInput) {

                        typeInput.value =
                            connectorType;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Success message
                    |--------------------------------------------------------------------------
                    */
                    alert(
                        data.message ||
                        'Connector added successfully.'
                    );

                })


                .catch(error => {

                    console.error(
                        'Connector save error:',
                        error
                    );

                    alert(
                        error.message ||
                        'Unable to save connector.'
                    );

                })


                .finally(() => {

                    /*
                    |--------------------------------------------------------------------------
                    | Restore button
                    |--------------------------------------------------------------------------
                    */
                    if (button) {

                        button.disabled =
                            false;

                        button.style.opacity =
                            '1';

                        button.innerHTML =
                            '<i class="fas fa-plus" style="margin-right:6px;"></i> Create Connector';
                    }

                });
            }

        </script>


</x-layouts::app>
