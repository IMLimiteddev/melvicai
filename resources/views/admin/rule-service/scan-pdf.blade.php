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
                            <h4>Upload file for scanning</h4>
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">

                                    </a>
                                </div>
                            </div>
                        </div>

                     

                        <form id="mappingForm" action="#" enctype="multipart/form-data"
                            method="POST">
                            @csrf

                            <input type="hidden" name="payload" id="payload">
                            <!-- <input type="text"> -->


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

                                <input
                                    type="file"
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

                            <div style="
                                display:flex;
                                gap:15px;
                                margin-top:20px;
                                justify-content:center;
                                flex-wrap:wrap;
                            ">

                                <button type="button"
                                    class="btn btn-outline-success">
                                    <i class="fa fa-desktop me-2"></i>
                                    Device
                                </button>

                                <button type="button"
                                    class="btn btn-outline-success">
                                    <i class="fa fa-cloud me-2"></i>
                                    SharePoint
                                </button>

                                <button type="button"
                                    class="btn btn-outline-success">
                                    <i class="fa fa-envelope me-2"></i>
                                    Outlook
                                </button>

                            </div>

                        </div>


                        </form>

                        <!-- Container-fluid Ends-->
                    </div>
                </div>
            </div>
        </div>

       
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
