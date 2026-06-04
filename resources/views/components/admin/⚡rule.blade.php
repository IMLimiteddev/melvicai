<?php

use Livewire\Component;
use Illuminate\Support\Facades\Http;

new class extends Component {

    public $activeTab = 'header';
    public $data = [];

    public function mount()
    {
        $this->activeTab = session('activeTab', 'header');
        $this->ruleSingle();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
        session(['activeTab' => $tab]);
    }

    public function ruleSingle()
    {
        try {
            $response = Http::get('http://31.97.126.130:1000/docs/schworer/visualize');

            if ($response->successful()) {
                $this->data = $response->json();
            } else {
                $this->data = [];
            }

        } catch (\Exception $e) {
            $this->data = [];
        }
    }

};

?>

<div> <!-- ✅ SINGLE ROOT ELEMENT -->

    <style>
        .tab-link.active {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 5px;
        }

        .tab-content {
            transition: all 0.3s ease-in-out;
        }
    </style>

    <div class="page-body">

        <!-- HEADER -->
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">

                    <div class="col-xl-4 col-sm-7 box-col-3">
                        <h3>Mapping Sample</h3>
                    </div>

                    <div class="col-5 d-none d-xl-block">
                        <ul style="display:flex; gap:20px; list-style:none; padding:10px 0;">

                            <li>
                                <span wire:click="setTab('header')" 
                                    class="tab-link {{ $activeTab === 'header' ? 'active' : '' }}">
                                    Header
                                </span>
                            </li>

                            <li>
                                <span wire:click="setTab('body')" 
                                    class="tab-link {{ $activeTab === 'body' ? 'active' : '' }}">
                                    Body
                                </span>
                            </li>

                            <li>
                                <span wire:click="setTab('footer')" 
                                    class="tab-link {{ $activeTab === 'footer' ? 'active' : '' }}">
                                    Footer
                                </span>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="container-fluid">

            <div class="card">

                <!-- HEADER TAB -->
                @if($activeTab === 'header')
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Col</th>
                                <th>Field</th>
                                <th>Logic</th>
                                <th>Output</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data['Header_Mapping'] ?? [] as $item)
                            <tr>
                                <td>{{ $item['Col'] ?? '' }}</td>
                                <td>{{ $item['Field'] ?? '' }}</td>
                                <td>{{ $item['Logic'] ?? '' }}</td>
                                <td><input class="form-control" type="text"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                <!-- BODY TAB -->
                @if($activeTab === 'body')
                <div class="card-body">
                    <h5>Body Section</h5>
                </div>
                @endif

                <!-- FOOTER TAB -->
                @if($activeTab === 'footer')
                <div class="card-body">
                    <h5>Footer Section</h5>
                </div>
                @endif

            </div>

        </div>

    </div>

</div>