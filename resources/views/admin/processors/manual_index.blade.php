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

                        <div class="table-responsive">

                            <form id="mappingForm"
                                action="{{ route('admin.process.manual')}}"
                                enctype="multipart/form-data"
                                method="POST">

                                @csrf

                                <div style="padding:20px;">

                                    <label style="display:block;font-weight:600;margin-bottom:12px;">
                                        Upload Files 
                                    </label>

                                    <div id="dropZone"
                                        onclick="document.getElementById('pdfInput').click();"
                                        style="
                                            border:2px dashed #198754;
                                            border-radius:12px;
                                            background:#f8fff9;
                                            padding:45px 20px;
                                            cursor:pointer;
                                            transition:.3s;
                                            text-align:center;
                                        ">

                                        <div style="font-size:55px;color:#198754;">
                                            <i class="fa fa-cloud-upload"></i>
                                        </div>

                                        <div style="font-size:22px;font-weight:600;color:#198754;margin-top:10px;">
                                            Drag & Drop your files here
                                        </div>

                                        <div style="margin:12px 0;color:#777;">
                                            or
                                        </div>

                                        <button type="button"
                                            class="btn btn-success"
                                            onclick="event.stopPropagation();document.getElementById('pdfInput').click();">

                                            <i class="fa fa-folder-open me-2"></i>
                                            Browse Device

                                        </button>

                                        <input type="file"
                                            id="pdfInput"
                                            name="files[]"
                                            multiple
                                            hidden>

                                        <div id="selectedFile"
                                            style="
                                                display:none;
                                                margin-top:20px;
                                                background:#ffffff;
                                                border:1px solid #198754;
                                                border-radius:8px;
                                                padding:12px;
                                                color:#198754;
                                                font-weight:600;
                                                text-align:left;
                                            ">

                                            <div style="margin-bottom:8px;">
                                                <i class="fa fa-files-o me-2"></i>
                                                Selected Files
                                            </div>

                                            <div id="fileName"></div>

                                        </div>

                                    </div>

                                </div>


                                {{-- Buttons --}}
                                <div style="
                                    display:flex;
                                    gap:15px;
                                    margin-top:20px;
                                    justify-content:center;
                                    flex-wrap:wrap;
                                ">

                                    {{-- Submit --}}
                                    <button type="submit"
                                        style="height:48px; padding:0 18px; border-radius:24px; background:#000; color:#fff; border:none; display:flex; align-items:center; justify-content:center; gap:10px; font-size:15px; cursor:pointer; transition:background .3s ease;"
                                        onmouseover="this.style.background='#28a745'; this.querySelector('.plus-icon').style.transform='rotate(90deg) scale(1.15)'"
                                        onmouseout="this.style.background='#000'; this.querySelector('.plus-icon').style.transform='rotate(0deg) scale(1)'">

                                        <i class="fa fa-plus plus-icon" style="transition:transform .3s ease;">
                                        </i>

                                        <span>Submit</span>

                                    </button>

                                </div>

                            </form>

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
