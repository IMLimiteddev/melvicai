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
                            <li class="breadcrumb-item">Processor</li>
                            <li class="breadcrumb-item active">Use Manual</li>
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
                                Processor
                            </div>

                            <h4 style="margin:0;font-size:25px;font-weight:700;color:#222;letter-spacing:-0.3px;">
                                Manual
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

                            <a href="{{ route('admin.rule-service.index') }}" wire:navigate
                                style="width:48px; height:48px; border-radius:50%; background:#000; color:#fff; text-decoration:none; display:flex; align-items:center; justify-content:center; font-size:22px; transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.style.transform='rotate(90deg) scale(1.05)'"
                                onmouseout="this.style.background='#000'; this.style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus"></i>
                            </a>

                        </div> --}}

                    </div>
                    <div class="card-body">
                        <div style="
                                max-width:1100px;
                                margin:40px auto;
                                padding:0 20px;
                            ">

                                <div style="
                                    background:#fff;
                                    border:1px solid #e5e5e5;
                                    border-radius:14px;
                                    padding:25px;
                                ">

                                    {{-- Batch Header --}}
                                    <div style="
                                        display:flex;
                                        align-items:center;
                                        justify-content:space-between;
                                        gap:20px;
                                        flex-wrap:wrap;
                                        margin-bottom:25px;
                                    ">

                                        <div>

                                            <h3 style="
                                                margin:0;
                                                color:#000;
                                                font-size:22px;
                                                font-weight:600;
                                            ">
                                                Download Generated Files
                                            </h3>

                                            <div style="
                                                margin-top:6px;
                                                color:#777;
                                                font-size:14px;
                                            ">
                                                Batch: {{ $batchCode }}
                                            </div>

                                        </div>

                                    </div>


                                    {{-- LOOP THROUGH UPLOADS IN BATCH --}}
                                    @foreach($batch as $upload)

                                        <div style="
                                            margin-bottom:20px;
                                            border:1px solid #eee;
                                            border-radius:12px;
                                            overflow:hidden;
                                        ">

                                            {{-- Original Uploaded File --}}
                                            <div style="
                                                padding:15px 18px;
                                                background:#fafafa;
                                                border-bottom:1px solid #eee;
                                                display:flex;
                                                align-items:center;
                                                gap:12px;
                                            ">

                                                <i class="fa fa-file-text-o"
                                                    style="
                                                        font-size:20px;
                                                        color:#28a745;
                                                    ">
                                                </i>

                                                <div>

                                                    <div style="
                                                        font-size:15px;
                                                        font-weight:600;
                                                        color:#000;
                                                    ">
                                                        {{ $upload->original_name }}
                                                    </div>

                                                    <div style="
                                                        font-size:12px;
                                                        color:#888;
                                                        margin-top:3px;
                                                    ">
                                                        Generated Files
                                                    </div>

                                                </div>

                                            </div>


                                            {{-- TXT FILES --}}
                                            @if(!empty($upload->txt_files))

                                                @php
                                                    $txtFiles = [];

                                                    foreach (explode('|', $upload->txt_files) as $file) {

                                                        [$key, $value] = explode('=', $file, 2);

                                                        $txtFiles[$key] = $value;
                                                    }
                                                @endphp


                                                <div style="
                                                    display:grid;
                                                    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
                                                    gap:15px;
                                                    padding:18px;
                                                ">

                                                    @foreach($txtFiles as $key => $filename)

                                                        <div style="
                                                            display:flex;
                                                            align-items:center;
                                                            justify-content:space-between;
                                                            gap:15px;
                                                            padding:15px;
                                                            border:1px solid #eee;
                                                            border-radius:10px;
                                                            background:#fff;
                                                        ">

                                                            <div style="
                                                                display:flex;
                                                                align-items:center;
                                                                gap:12px;
                                                                min-width:0;
                                                            ">

                                                                <i class="fa fa-file-text-o"
                                                                    style="
                                                                        font-size:20px;
                                                                        color:#28a745;
                                                                    ">
                                                                </i>

                                                                <div style="min-width:0;">

                                                                    <div style="
                                                                        font-size:12px;
                                                                        color:#888;
                                                                        font-weight:600;
                                                                        text-transform:uppercase;
                                                                    ">
                                                                        {{ $key }}
                                                                    </div>

                                                                    <div style="
                                                                        font-size:14px;
                                                                        color:#333;
                                                                        white-space:nowrap;
                                                                        overflow:hidden;
                                                                        text-overflow:ellipsis;
                                                                    ">
                                                                        {{ $filename }}
                                                                    </div>

                                                                </div>

                                                            </div>


                                                            {{-- Download --}}
                                                            <a href=""
                                                                title="Download {{ $filename }}"
                                                                style="
                                                                    width:40px;
                                                                    height:40px;
                                                                    min-width:40px;
                                                                    border-radius:50%;
                                                                    background:#000;
                                                                    color:#fff;
                                                                    display:flex;
                                                                    align-items:center;
                                                                    justify-content:center;
                                                                    text-decoration:none;
                                                                    transition:background .3s ease;
                                                                "
                                                                onmouseover="
                                                                    this.style.background='#28a745';
                                                                    this.querySelector('.download-icon').style.transform='rotate(360deg)'
                                                                "
                                                                onmouseout="
                                                                    this.style.background='#000';
                                                                    this.querySelector('.download-icon').style.transform='rotate(0deg)'
                                                                ">

                                                                <i class="fa fa-download download-icon"
                                                                    style="transition:transform .4s ease;">
                                                                </i>

                                                            </a>

                                                        </div>

                                                    @endforeach

                                                </div>

                                            @endif

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    
    {{-- --- PDF UPLOAD PREVIEW SCRIPT --- --}}
    <script>
        const dropZone = document.getElementById('dropZone');
        const input = document.getElementById('pdfInput');

        dropZone.addEventListener('dragover', function (e) {
            e.preventDefault();

            this.style.background = '#e9f8ef';
            this.style.borderColor = '#157347';
        });

        dropZone.addEventListener('dragleave', function () {
            this.style.background = '#f8fff9';
            this.style.borderColor = '#198754';
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();

            this.style.background = '#f8fff9';
            this.style.borderColor = '#198754';

            input.files = e.dataTransfer.files;

            showSelectedFiles();
        });

        input.addEventListener('change', showSelectedFiles);

        function showSelectedFiles() {

            const selectedFile = document.getElementById('selectedFile');
            const fileName = document.getElementById('fileName');

            if (!input.files.length) {
                selectedFile.style.display = 'none';
                fileName.innerHTML = '';
                return;
            }

            selectedFile.style.display = 'block';

            let html = '';

            Array.from(input.files).forEach(function (file, index) {

                html += `
                    <div style="
                        display:flex;
                        align-items:center;
                        gap:8px;
                        padding:6px 0;
                        border-bottom:1px solid #eee;
                    ">
                        <i class="fa fa-file-pdf-o"></i>
                        <span>${index + 1}. ${file.name}</span>
                    </div>
                `;
            });

            fileName.innerHTML = html;
        }
    </script>
</x-layouts::app>
