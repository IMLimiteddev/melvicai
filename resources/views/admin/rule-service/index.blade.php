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

    <div class="page-body" id="pageBody" style="padding-top: 120px;">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>Create New Config.</h4>
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">

                                    </a>
                                </div>
                            </div>
                        </div>

                        <div style="padding: 20px;">
                            <div class="row g-3">

                                <!-- Option 1: Scan first -->
                                <div class="col-md-6">
                                    <div style="border: 1px solid #e0e0e0; border-radius: 10px; padding: 20px; height: 100%;"
                                        onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                                        onmouseout="this.style.boxShadow='none'">
                                        <i class="fa fa-file-pdf" style="font-size: 22px; color: #E94E1B; margin-bottom: 10px;"></i>
                                        <h5 style="margin-bottom: 6px;">Scan PDF first</h5>
                                        <p style="color: #6c757d; font-size: 13.5px; margin-bottom: 16px;">
                                            Upload a sample PDF, review a suggested field mapping, then save it as a rule.
                                        </p>
                                        <a href="{{ route('admin.rule-service.scan-pdf') }}" class="btn btn-outline-primary" style="width: 100%;">
                                            Scan PDF
                                        </a>
                                    </div>
                                </div>

                                <!-- Option 2: Create rule directly -->
                                <div class="col-md-6">
                                    <div style="border: 1px solid #e0e0e0; border-radius: 10px; padding: 20px; height: 100%;"
                                        onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                                        onmouseout="this.style.boxShadow='none'">
                                        <i class="fa fa-file-circle-plus" style="font-size: 22px; color: #E94E1B; margin-bottom: 10px;"></i>
                                        <h5 style="margin-bottom: 6px;">Create rule directly</h5>
                                        <p style="color: #6c757d; font-size: 13.5px; margin-bottom: 16px;">
                                            Skip the suggestion step. Define the mapping yourself and save it as a new rule right away.
                                        </p>
                                        <a href="{{ route('admin.add.customer.mapping',  [1, 'new']) }}" class="btn btn-outline-primary" style="width: 100%;">
                                            Create rule
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Container-fluid Ends-->
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layouts::app>