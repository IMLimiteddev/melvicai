<x-layouts::app :title="__('Models')">
    <style>
    .tab-link.active {
        color: #0d6efd;
        border-bottom: 2px solid #0d6efd;
        padding-bottom: 5px;
    }

    .tab-link:hover {
        opacity: 0.7;
    }
    </style>
    <div class="page-body" id="pageBody">

        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Mapping results</h3>
                    </div>
                    <div class="col-5 d-none d-xl-block">
                        <!-- Page Sub Header Start-->
                        <div class="left-header main-sub-header p-0">

                            <div class="left-menu-header">

                                {{-- <ul class="header-left"
                                    style="display:flex; gap:20px; list-style:none; margin:0; padding:10px 0;">

                                    <li>
                                        <span class="tab-link active" data-tab="header"
                                            style="cursor:pointer; font-weight:700;">
                                            Header
                                        </span>
                                    </li>

                                    <li>
                                        <span class="tab-link" data-tab="map-body"
                                            style="cursor:pointer; font-weight:700;">
                                            Body
                                        </span>
                                    </li>

                                    <li>
                                        <span class="tab-link" data-tab="map-color"
                                            style="cursor:pointer; font-weight:700;">
                                            Color
                                        </span>
                                    </li>

                                    <li>

                                    </li>
                                </ul> --}}

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
                            <h4>Mapping</h4>
                            <div
                                style="display:flex; align-items:center; justify-content:space-between; padding:10px 0;">

                                <!-- RIGHT: Eye Icon -->
                                <div class="m-5">
                                    <a href="" title="view file">
                                    </a>
                                </div>

                                {{-- @if($fileUrl) --}}
                                <div class="mt-3">

                                    @if(!empty($data['Generated_text_file']))
                                        <a href="{{ route('admin.download.txt', ['filename' => $data['Generated_text_file']]) }}" class="btn btn-success">
                                            download the txt file ⬇
                                        </a>
                                    @endif

                                    {{-- <a href="" target="_blank" class="btn btn-info">
                                        <i data-feather="eye" style="cursor:pointer;"></i>
                                    </a> --}}

                                    {{-- @php
                                        dd($data);
                                    @endphp

                                    <a href="{{ route('admin.download.txt', ['filename' => $data['Generated_text_file']]) }}" class="btn btn-success">
                                        download the txt file ⬇
                                    </a> --}}

                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>


    </div>

  
    
</x-layouts::app>