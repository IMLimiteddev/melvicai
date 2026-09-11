<x-layouts::app :title="__('Models')">

    <style>

        .tab-link {
            color: #444;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 24px;
            transition: all .3s ease;
        }

        .tab-link:hover {
            background: #f1f1f1;
            color: #000;
        }

        .tab-link.active {
            background: #000;
            color: #fff;
        }

        .our-btn {
            height: 48px;
            padding: 0 18px;
            border-radius: 24px;
            background: #000;
            color: #fff;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: background .3s ease, transform .2s ease;
        }

        .our-btn:hover {
            background: #28a745;
            color: #fff;
        }

        .our-btn i {
            transition: transform .3s ease;
        }

        .our-btn:hover i {
            transform: scale(1.15);
        }


        /* =====================================================
           PROCESSING PRELOADER
        ====================================================== */

        #processingOverlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.97);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 30px;
        }

        #processingSpinner {
            width: 58px;
            height: 58px;
            border: 5px solid #e5e5e5;
            border-top: 5px solid #000;
            border-radius: 50%;
            animation: processingSpin 1s linear infinite;
            margin-bottom: 25px;
        }

        #processingOverlay h3 {
            margin: 0 0 10px 0;
            font-weight: 600;
            color: #222;
        }

        #processingMessage {
            margin: 0;
            color: #777;
            font-size: 15px;
        }

        #processingBarContainer {
            margin-top: 22px;
            width: 280px;
            height: 5px;
            background: #e9e9e9;
            border-radius: 10px;
            overflow: hidden;
        }

        #processingBar {
            width: 40%;
            height: 100%;
            background: #000;
            border-radius: 10px;
            animation: processingBarMove 1.5s ease-in-out infinite;
        }

        @keyframes processingSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes processingBarMove {
            0% {
                transform: translateX(-120%);
            }

            100% {
                transform: translateX(350%);
            }
        }

    </style>


    {{-- ========================================================= --}}
    {{-- PROCESSING PRELOADER --}}
    {{-- ONLY SHOW WHEN STATUS IS INACTIVE --}}
    {{-- ========================================================= --}}

    @if(($configuration?->status ?? 'draft') === 'inactive')

        <div id="processingOverlay">

            <div id="processingSpinner"></div>

            <h3>
                Processing Configuration
            </h3>

            <p id="processingMessage">
                Takes ~ 1-2 mins. Please wait while your configuration is being processed...
            </p>

            <div id="processingBarContainer">
                <div id="processingBar"></div>
            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- MAIN PAGE --}}
    {{-- ========================================================= --}}

    <div class="page-body" id="pageBody">

        <div class="container-fluid">

            <div class="page-title">

                <div class="row">

                    <div class="col-xl-4 col-sm-7 box-col-3">

                        <h3>
                            Warnings/Download Area
                        </h3>

                    </div>

                </div>

            </div>

        </div>


        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-12">

                    <div class="card">

                        <div class="card-body">


                            {{-- ================================================= --}}
                            {{-- TABS --}}
                            {{-- ================================================= --}}

                            <div
                                style="
                                    display:flex;
                                    justify-content:center;
                                    align-items:center;
                                    gap:15px;
                                    margin-bottom:30px;
                                    flex-wrap:wrap;
                                "
                            >

                                {{-- VALIDATION TAB --}}

                                <a
                                    href="#"
                                    class="tab-link active"
                                    onclick="return false;"
                                >
                                    Validation Rule
                                </a>


                                {{-- DOWNLOAD TAB --}}

                                @if (!empty($configuration?->output_file_path))

                                    <a
                                        href="{{ route('admin.download.output', [
                                            'filename' => basename($configuration->output_file_path),
                                        ]) }}"
                                        class="tab-link"
                                    >
                                        Download File
                                    </a>

                                @else

                                    <a
                                        href="#"
                                        class="tab-link"
                                        onclick="return false;"
                                        style="
                                            opacity:0.5;
                                            cursor:not-allowed;
                                        "
                                    >
                                        Download File
                                    </a>

                                @endif


                                {{-- OTHER TAB --}}

                                <a
                                    href="#"
                                    class="tab-link"
                                    onclick="return false;"
                                >
                                    Other
                                </a>

                            </div>


                            {{-- ================================================= --}}
                            {{-- VALIDATION CONTENT --}}
                            {{-- ================================================= --}}

                            <div
                                style="
                                    border:1px solid #dee2e6;
                                    border-radius:8px;
                                    padding:25px;
                                    background:#fafafa;
                                "
                            >

                                <div
                                    style="
                                        display:flex;
                                        justify-content:space-between;
                                        align-items:center;
                                        gap:15px;
                                        flex-wrap:wrap;
                                    "
                                >

                                    <div>

                                        <h5 style="margin-bottom:5px;">
                                            Validation Rule
                                        </h5>

                                        <p class="text-muted mb-0">
                                            View the validation results generated for this configuration.
                                        </p>

                                    </div>


                                    {{-- VALIDATION BUTTON --}}

                                    <button
                                        type="button"
                                        class="our-btn"
                                        onclick="openValidationModal()"
                                        onmouseover="
                                            this.querySelector('i').style.transform='rotate(10deg) scale(1.15)'
                                        "
                                        onmouseout="
                                            this.querySelector('i').style.transform='rotate(0deg) scale(1)'
                                        "
                                    >

                                        <i class="fa fa-shield-alt"></i>

                                        View Validation Rule

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- VALIDATION MODAL --}}
    {{-- ========================================================= --}}

    <div
        class="modal fade"
        id="validationModal"
        tabindex="-1"
        aria-labelledby="validationModalLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="validationModalLabel"
                    >
                        Validation Rule
                    </h5>


                    <button
                        type="button"
                        class="btn-close"
                        onclick="closeValidationModal()"
                        aria-label="Close"
                    >
                    </button>

                </div>


                <div class="modal-body">

                    @forelse($validation ?? [] as $warning)

                        <div
                            class="alert {{
                                ($warning['severity'] ?? '') === 'warning'
                                    ? 'alert-warning'
                                    : 'alert-info'
                            }} mb-3"
                        >

                            <div class="d-flex justify-content-between">

                                <strong>
                                    {{ strtoupper($warning['severity'] ?? 'INFO') }}
                                </strong>

                                <span class="text-muted">
                                    {{ $warning['section'] ?? 'N/A' }}
                                </span>

                            </div>


                            <hr>


                            <p class="mb-2">

                                <strong>
                                    Location:
                                </strong>

                                {{ $warning['location'] ?? 'N/A' }}

                            </p>


                            <p class="mb-2">

                                <strong>
                                    Issue:
                                </strong>

                                {{ $warning['message'] ?? 'N/A' }}

                            </p>


                            <p class="mb-0">

                                <strong>
                                    Suggestion:
                                </strong>

                                {{ $warning['suggestion'] ?? 'N/A' }}

                            </p>

                        </div>

                    @empty

                        <div class="alert alert-success mb-0">

                            <i class="fa fa-check-circle me-2"></i>

                            No validation warnings were found.

                        </div>

                    @endforelse

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="our-btn"
                        onclick="closeValidationModal()"
                    >

                        <i class="fa fa-times"></i>

                        Close

                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- VALIDATION MODAL SCRIPT --}}
    {{-- ========================================================= --}}

    <script>

        function openValidationModal() {

            const modalElement =
                document.getElementById('validationModal');

            if (!modalElement) {
                return;
            }

            const modal =
                bootstrap.Modal.getOrCreateInstance(modalElement);

            modal.show();
        }


        function closeValidationModal() {

            const modalElement =
                document.getElementById('validationModal');

            if (!modalElement) {
                return;
            }

            const modal =
                bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }
        }

    </script>


    {{-- ========================================================= --}}
    {{-- QUEUE PROCESS STATUS CHECK --}}
    {{-- ========================================================= --}}
    {{-- 
        STATUS VALUES:

        draft    = normal draft
        inactive = processing/not finished
        active   = processing finished

        The queue itself does NOT refresh the browser.
        The browser checks the database status every 3 seconds.
    --}}
    {{-- ========================================================= --}}

    @if(($configuration?->status ?? 'draft') === 'inactive')

        <script>

            document.addEventListener('DOMContentLoaded', function () {

                const overlay =
                    document.getElementById('processingOverlay');

                const message =
                    document.getElementById('processingMessage');


                if (!overlay) {
                    return;
                }


                const statusUrl =
                    "{{ route('admin.final-process-status', [
                        'id' => $configuration->id
                    ]) }}";


                let checking = true;


                function checkProcessingStatus() {

                    if (!checking) {
                        return;
                    }


                    fetch(statusUrl, {

                        method: 'GET',

                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },

                        cache: 'no-store'

                    })


                    .then(function (response) {

                        if (!response.ok) {

                            throw new Error(
                                'Unable to check processing status.'
                            );

                        }

                        return response.json();

                    })


                    .then(function (data) {

                        console.log(
                            'Configuration status:',
                            data.status
                        );


                        /*
                         * ==========================================
                         * INACTIVE
                         * ==========================================
                         *
                         * Processing has not finished.
                         *
                         * Keep the preloader visible and check
                         * again after 3 seconds.
                         */

                        if (data.status === 'inactive') {

                            if (message) {

                                message.innerText =
                                    'Your configuration is still being processed. Please wait...';

                            }


                            setTimeout(
                                checkProcessingStatus,
                                3000
                            );

                            return;
                        }


                        /*
                         * ==========================================
                         * ACTIVE
                         * ==========================================
                         *
                         * Processing is finished.
                         *
                         * Stop polling and refresh the page.
                         */

                        if (data.status === 'active') {

                            checking = false;


                            if (message) {

                                message.innerText =
                                    'Processing complete. Loading your results...';

                            }


                            setTimeout(function () {

                                window.location.reload();

                            }, 700);


                            return;
                        }


                        /*
                         * ==========================================
                         * DRAFT
                         * ==========================================
                         *
                         * Draft is not an active background
                         * processing state.
                         */

                        if (data.status === 'draft') {

                            checking = false;

                            overlay.style.display = 'none';

                            return;
                        }


                        /*
                         * If something unexpected is returned,
                         * simply check again.
                         */

                        setTimeout(
                            checkProcessingStatus,
                            3000
                        );

                    })


                    .catch(function (error) {

                        console.error(
                            'Processing status check failed:',
                            error
                        );


                        /*
                         * Do not remove the preloader for a temporary
                         * connection problem.
                         *
                         * Try again after 5 seconds.
                         */

                        if (message) {

                            message.innerText =
                                'Still checking the processing status...';

                        }


                        setTimeout(
                            checkProcessingStatus,
                            5000
                        );

                    });

                }


                /*
                 * Start polling immediately.
                 */

                checkProcessingStatus();

            });

        </script>

    @endif


</x-layouts::app>

