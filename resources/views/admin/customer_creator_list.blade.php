<x-layouts::app :title="__('Models')">


    <div class="page-body" id="pageBody">

        {{-- <x-stage active="1" /> --}}

        <div class="container-fluid">
            <div class="page-title">

                <div class="row">
                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Creators List</h3>
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
                            <h4> Creators</h4>

                        </div>

                        <!-- Header -->
                        <div class="card-body tab-content active" id="header">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Version</th>
                                        <th>Ersteller</th>
                                        <th>Erstellt am</th>
                                        <th>Aktionen</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($creators as $index => $item)
                                        <tr class="header-row">

                                            <td>
                                                {{ $item?->order }}
                                            </td>
                                            
                                            <td>
                                                {{ $item?->user_id }}
                                            </td>
                                            <td>
                                                {{ $item?->created_at }}
                                            </td>
                                           
                                            <td>
                                                <div style="display: flex; gap: 10px;">
                                                    <a href="{{route('admin.modify.mapping', $item?->id)}}" wire:navigate
                                                        class="btn btn-primary btn-sm">
                                                        Details ansehen 
                                                    </a>
                                                    <a href="#"
                                                        class="btn btn-primary btn-sm">
                                                        Als aktive Version setzen
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
