<x-layouts::app :title="__('Models')">
    <div class="page-body" id="pageBody">

        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Files Builder</h3>
                    </div>
                    <div class="col-5 d-none d-xl-block">

                    </div>
                    <div class="col-xl-3 col-sm-5 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">
                                    <svg class="stroke-icon">
                                        <use
                                            href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-home">
                                        </use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Files</li>
                            <li class="breadcrumb-item active">Files Builder</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-body">

                        {{-- Top Section --}}
                        <div
                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

                            <div>
                                <h5 style="margin:0; font-weight:700;">
                                    Configurations
                                </h5>
                                <small style="color:#6b7280;">
                                    Manage customer configurations
                                </small>
                            </div>

                            {{-- Plus Button --}}
                            <a href="{{ route('admin.add.customer.mapping',  [1, 'new']) }}" wire:navigate
                                style="width:48px; height:48px; border-radius:50%; background:#000; color:#fff; text-decoration:none; display:flex; align-items:center; justify-content:center; font-size:22px; transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.style.transform='rotate(90deg) scale(1.05)'"
                                onmouseout="this.style.background='#000'; this.style.transform='rotate(0deg) scale(1)'">

                                <i class="fa fa-plus"></i>
                            </a>

                        </div>


                        <div class="table-responsive">
                            <table class="table align-middle"
                                style="width:100%; border-collapse: separate; border-spacing:0 10px;">

                                <thead>
                                    <tr style="background:#f8f9fa;">
                                        <th style="padding:15px; border:none;">Customer ID</th>
                                        <th style="padding:15px; border:none;">Konfiguration</th>
                                        <th style="padding:15px; border:none;">Status</th>
                                        <th style="padding:15px; border:none;">Sample PDF</th>
                                        <th style="padding:15px; border:none;">Sample TXT</th>
                                        <th style="padding:15px; border:none; text-align:center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($customers as $c)
                                        <tr
                                            style="background:#fff; box-shadow:0 2px 12px rgba(0,0,0,0.05); border-radius:12px;">

                                            <td style="padding:18px; vertical-align:middle;">
                                                <div style="display:flex; align-items:center; gap:10px;">

                                                    <div
                                                        style="width:40px; height:40px; border-radius:50%; background:#e6f1fb; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:600; color:#185fa5;">
                                                        {{ $c?->customer_id }}
                                                    </div>

                                                    <strong>{{ $c?->customer_id }}</strong>
                                                </div>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <a href="{{ route('admin.customers.single', $c?->customer_name) }}"
                                                    wire:navigate
                                                    style="text-decoration:none; color:#111827; font-weight:600;">
                                                    {{ $c?->customer_name }}
                                                </a>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <span
                                                    style="display:inline-flex; align-items:center; gap:6px; color:#28a745; font-size:14px;">
                                                    <span
                                                        style="width:8px; height:8px; border-radius:50%; background:#28a745;"></span>
                                                    Active
                                                </span>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <a href="/dash/file_samples/schworer.pdf" target="_blank"
                                                    style="text-decoration:none; color:#dc3545; font-weight:500;">
                                                    <i class="fa fa-file-pdf"></i>
                                                    schworer.pdf
                                                </a>
                                            </td>

                                            <td style="padding:18px; vertical-align:middle;">
                                                <a href="/dash/file_samples/D & M KG-460854501479420_generated_mapping.txt"
                                                    target="_blank"
                                                    style="text-decoration:none; color:#6c757d; font-weight:500;">
                                                    <i class="fa fa-file-text"></i>
                                                    generated_mapping.txt
                                                </a>
                                            </td>

                                            <td style="padding:18px; text-align:center; vertical-align:middle;">

                                                <div
                                                    style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">

                                                    <a href="{{ route('admin.customers.single', $c?->customer_name) }}"
                                                        wire:navigate
                                                        style="padding:10px 16px; background:#000; color:#fff; border-radius:10px; text-decoration:none; font-size:14px; transition:all .3s ease;"
                                                        onmouseover="this.style.background='#28a745'; this.style.transform='translateY(-2px)'"
                                                        onmouseout="this.style.background='#000'; this.style.transform='translateY(0)'">
                                                        Konfiguration bearbeitan
                                                    </a>

                                                    <a href="{{ route('admin.customers.single', $c?->customer_name) }}"
                                                        wire:navigate
                                                        style="padding:10px 16px; background:#000; color:#fff; border-radius:10px; text-decoration:none; font-size:14px; transition:all .3s ease;"
                                                        onmouseover="this.style.background='#28a745'; this.style.transform='translateY(-2px)'"
                                                        onmouseout="this.style.background='#000'; this.style.transform='translateY(0)'">
                                                        Konfiguration kopieren
                                                    </a>

                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                        {{-- Bottom Center Button --}}
                        <div style="display:flex; justify-content:center; margin-top:30px;">

                            <a href="{{ route('admin.add.customer.mapping',  [1, 'new']) }}" wire:navigate
                                style="padding:14px 28px; background:#000; color:#fff; border-radius:14px; text-decoration:none; font-size:15px; font-weight:600; transition:all .3s ease;"
                                onmouseover="this.style.background='#28a745'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.background='#000'; this.style.transform='translateY(0)'">

                                <i class="fa fa-plus" style="margin-right:8px;"></i>
                                Add New Configuration
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
</x-layouts::app>
