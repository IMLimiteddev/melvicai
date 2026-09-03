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
    </style>

    <div class="page-body" id="pageBody">

        <div class="container-fluid">

            <div class="page-title">
                <div class="row">

                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Warnings/Download Area</h3>
                    </div>

                </div>
            </div>

        </div>


        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-12">

                    <div class="card">

                        <div class="card-body">

                            {{-- ========================= --}}
                            {{-- TABS --}}
                            {{-- ========================= --}}

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

                                {{-- TAB 1 --}}
                                <a
                                    href="#"
                                    class="tab-link active"
                                    onclick="return false;"
                                >
                                    Validation Rule
                                </a>


                                {{-- TAB 2 --}}
                                <a
                                    href="{{ route('admin.download.output', ['filename' => $originalName ?? '']) }}"
                                    target="_blank"
                                    class="tab-link"
                                >
                                    Processed File
                                </a>


                                {{-- TAB 3 --}}
                                <a
                                    href="#"
                                    class="tab-link"
                                    onclick="return false;"
                                >
                                    Other
                                </a>

                            </div>


                            {{-- ========================= --}}
                            {{-- TAB CONTENT --}}
                            {{-- ========================= --}}

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

                                        <p
                                            class="text-muted mb-0"
                                        >
                                            View the validation results generated for this configuration.
                                        </p>

                                    </div>


                                    {{-- VALIDATION BUTTON --}}

                                    <button
                                        type="button"
                                        class="our-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#validationModal"
                                        onmouseover="this.querySelector('i').style.transform='rotate(10deg) scale(1.15)'"
                                        onmouseout="this.querySelector('i').style.transform='rotate(0deg) scale(1)'"
                                    >

                                        <i
                                            class="fa fa-shield-alt"
                                        ></i>

                                        View Validation Rule

                                    </button>

                                </div>

                            </div>


                            {{-- ========================= --}}
                            {{-- DOWNLOAD BUTTON --}}
                            {{-- ========================= --}}

                            <div
                                style="
                                    display:flex;
                                    justify-content:flex-end;
                                    margin-top:20px;
                                "
                            >

                                <a
                                    href="{{ route('admin.download.output', ['filename' => $originalName ?? '']) }}"
                                    target="_blank"
                                    class="our-btn"
                                    title="Open processed file"
                                >

                                    <i class="fa fa-eye"></i>

                                    View File

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================================================= --}}
    {{-- VALIDATION MODAL --}}
    {{-- ================================================= --}}

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
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                <div class="modal-body">

                    @forelse($response['Validation_Warnings'] ?? [] as $warning)

                        <div
                            class="alert {{ $warning['severity'] == 'warning' ? 'alert-warning' : 'alert-info' }} mb-3"
                        >

                            <div
                                class="d-flex justify-content-between"
                            >

                                <strong>
                                    {{ strtoupper($warning['severity']) }}
                                </strong>

                                <span class="text-muted">
                                    {{ $warning['section'] }}
                                </span>

                            </div>

                            <hr>

                            <p class="mb-2">
                                <strong>Location:</strong>
                                {{ $warning['location'] }}
                            </p>

                            <p class="mb-2">
                                <strong>Issue:</strong>
                                {{ $warning['message'] }}
                            </p>

                            <p class="mb-0">
                                <strong>Suggestion:</strong>
                                {{ $warning['suggestion'] }}
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
                        data-bs-dismiss="modal"
                    >

                        <i class="fa fa-times"></i>

                        Close

                    </button>

                </div>

            </div>

        </div>

    </div>

</x-layouts::app>