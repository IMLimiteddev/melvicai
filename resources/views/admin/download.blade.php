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

    <div class="page-body" id="pageBody">

        <x-stage active="1" />

        <div class="container-fluid">
            <div class="page-title">

                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Review/Download area</h3>
                    </div>
                    <div class="col-5 d-none d-xl-block">
                        <!-- Page Sub Header Start-->
                        <div class="left-header main-sub-header p-0">

                            <div class="left-menu-header">

                                <ul class="header-left"
                                    style="display:flex; gap:20px; list-style:none; margin:0; padding:10px 0;">



                                    <li>

                                    </li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            {{-- <h4>Create New Rules.</h4> --}}
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">

                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">

                            {{-- Success --}}
                            <div class="alert alert-success">

                                <h5 class="mb-1">
                                    <i class="fa fa-check-circle me-2"></i>
                                    {{ $response['Message'] ?? 'Rule generated successfully.' }}
                                </h5>

                            </div>

                            {{-- Summary --}}
                            <div class="row mb-4">

                                <div class="col-md-4">

                                    <div class="card border">

                                        <div class="card-body">

                                            <small class="text-muted">Customer</small>

                                            <h6 class="mt-2 mb-0">
                                                {{ $response['Submitted_config_json']['Summary']['Customer'] ?? '-' }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="card border">

                                        <div class="card-body">

                                            <small class="text-muted">
                                                Processed PDF
                                            </small>

                                            <h6 class="mt-2 mb-0">
                                                {{ $response['Processed_file'] ?? '-' }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="card border">

                                        <div class="card-body">

                                            <small class="text-muted">
                                                Saved Configuration
                                            </small>

                                            <h6 class="mt-2 mb-0">
                                                {{ $response['Saved_config_file'] ?? '-' }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- Validation Warnings --}}
                            <div class="card">

                                <div class="card-header pb-0">

                                    <h5>

                                        Validation Results

                                        <span class="badge bg-warning text-dark ms-2">

                                            {{ count($response['Validation_Warnings'] ?? []) }}

                                        </span>

                                    </h5>

                                </div>

                                <div class="card-body">

                                    @forelse($response['Validation_Warnings'] ?? [] as $warning)
                                        <div
                                            class="alert {{ $warning['severity'] == 'warning' ? 'alert-warning' : 'alert-info' }} mb-3">

                                            <div class="d-flex justify-content-between">

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

                            </div>

                            {{-- Actions --}}
                            <div class="d-flex justify-content-between mt-4">

                                <a href="" class="btn btn-warning">

                                    <i class="fa fa-pencil me-2"></i>

                                    Re-edit Rules

                                </a>

                                <a href="{{ route('admin.download.output', ['filename' => $response['Mapped_txt_file'] ?? '']) }}"
                                    class="btn btn-success" download>

                                    <i class="fa fa-download me-2"></i>

                                    Download Mapping File

                                </a>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts::app>
