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
                                Use Workflows
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

                            <a href="{{ route('admin.rule-service.index') }}" wire:navigate
                                style="width:48px; height:48px; border-radius:50%; background:#000; color:#fff; text-decoration:none; display:flex; align-items:center; justify-content:center; font-size:22px; transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.style.transform='rotate(90deg) scale(1.05)'"
                                onmouseout="this.style.background='#000'; this.style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus"></i>
                            </a>

                        </div>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <form id="mappingForm"
                                action="{{ route('admin.workflow.configuration.process.use', ['config_id' => $configuration?->id]) }}"
                                enctype="multipart/form-data"
                                method="POST">

                                @csrf

                                <div style="padding:20px;">

                                    <label style="display:block;font-weight:600;margin-bottom:12px;">
                                        Upload Config File
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
                                            Drag & Drop your file here
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
                                            name="file"
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
                                            ">

                                            <i class="fa fa-file-pdf-o me-2"></i>

                                            <span id="fileName"></span>

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
                                        class="btn btn-outline-success">

                                        <i class="fa fa-send me-2"></i>
                                        Submit

                                    </button>


                                    {{-- Download Result --}}
                                    @if(session('download_url'))

                                        <a href="{{ session('download_url') }}"
                                            download
                                            class="btn btn-success">

                                            <i class="fa fa-download me-2"></i>
                                            Download Result

                                        </a>

                                    @endif

                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    <script src="{{ asset('pdfjs/pdf.js') }}"></script>

    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "{{ asset('pdfjs/pdf.worker.js') }}";
    </script>


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

            loadingTask.promise.then(async function(pdf) {

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

            showSelectedFile();
        });

        input.addEventListener('change', showSelectedFile);

        function showSelectedFile() {

            if (!input.files.length) return;

            document.getElementById('selectedFile').style.display = 'block';

            document.getElementById('fileName').innerHTML =
                input.files[0].name;
        }
    </script>
</x-layouts::app>
