<x-layouts::app :title="__('Models')">


    <div class="page-body" id="pageBody">

        {{-- <x-stage active="1" /> --}}

        <div class="container-fluid">
            <div class="page-title">

                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Mapping List</h3>
                    </div>
                </div>


            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">



                        {{-- Top Section --}}
                        <div
                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

                            <div class="card-header pb-0">
                                <h4> Schowere</h4>

                            </div>


                           <div style="margin: 10px;">
                                {{-- Plus Button --}}
                                <a href="{{ route('admin.add.customer.mapping',  [1, 'new']) }}" wire:navigate
                                    style="width:48px; height:48px; border-radius:50%; background:#000; color:#fff; text-decoration:none; display:flex; align-items:center; justify-content:center; font-size:22px; transition:all .3s ease;"
                                    onmouseover="this.style.background='#28a745'; this.style.transform='rotate(90deg) scale(1.05)'"
                                    onmouseout="this.style.background='#000'; this.style.transform='rotate(0deg) scale(1)'">

                                    <i class="fa fa-plus"></i>
                                </a>
                           </div>


                        </div>



                        <!-- Header -->
                        <div class="card-body tab-content active" id="header">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mapping ID</th>
                                        <th>Customer</th>
                                        <th>Editor</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($mappings as $index => $item)
                                        <tr class="header-row">

                                            <td>
                                                {{ $item?->mapping_id }}
                                            </td>
                                            <td>
                                                {{ $item?->customer }}
                                            </td>
                                            <td>
                                                {{ $item?->user_id }}
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" {{ $item->status == 1 ? 'checked' : '' }}
                                                        disabled>
                                                    <span class="slider"></span>
                                                </label>

                                                <style>
                                                    .switch {
                                                        position: relative;
                                                        display: inline-block;
                                                        width: 50px;
                                                        height: 26px;
                                                    }

                                                    .switch input {
                                                        opacity: 0;
                                                        width: 0;
                                                        height: 0;
                                                    }

                                                    .slider {
                                                        position: absolute;
                                                        cursor: pointer;
                                                        inset: 0;
                                                        background-color: #dc3545;
                                                        transition: .3s;
                                                        border-radius: 34px;
                                                    }

                                                    .slider:before {
                                                        position: absolute;
                                                        content: "";
                                                        height: 20px;
                                                        width: 20px;
                                                        left: 3px;
                                                        bottom: 3px;
                                                        background: white;
                                                        transition: .3s;
                                                        border-radius: 50%;
                                                    }

                                                    input:checked+.slider {
                                                        background-color: #28a745;
                                                    }

                                                    input:checked+.slider:before {
                                                        transform: translateX(24px);
                                                    }
                                                </style>
                                            </td>
                                            <td>
                                                {{ $item?->created_at }}
                                            </td>
                                            <td>
                                                {{ $item?->updated_at }}
                                            </td>
                                            <td>
                                                <div style="display: flex; gap: 10px;">
                                                    <a href="{{ route('admin.modify.mapping', $item?->id) }}"
                                                        wire:navigate class="btn btn-primary btn-sm">
                                                        Edit this mapping
                                                    </a>
                                                    <a href="#" class="btn btn-primary btn-sm">
                                                        Set as default
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layouts::app>
