   @props(['active'=>1])


   <div style="width:100%; padding:40px 0; display:flex; justify-content:center; align-items:center;">
    <style>
        .c {
            background: #E94E1B;
            color: #fff;
        }
        .cc {
            background: #ddd;
            color: #666;
        }
    </style>
    <div style="display:flex; align-items:center; gap:20px; width:100%; max-width:900px;">

        <!-- Stage 1 -->
        <div style="flex:1; text-align:center;">
            <div class="{{ $active == 1 ? 'c' : 'cc' }}"
                 style="width:60px; height:60px; margin:0 auto; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:bold;">
                1
            </div>
            <div style="margin-top:10px; font-weight:bold;">Edit & Input Mapping</div>
        </div>

        <!-- Line -->
        <div class="cc" style="flex:1; height:3px;"></div>

        <!-- Stage 2 -->
        <a href="{{route('admin.temp_mappings')}}">

            <div style="flex:1; text-align:center;">
                <div class="{{ $active == 2 ? 'c' : 'cc' }}"
                    style="width:60px; height:60px; margin:0 auto; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:bold;">
                    2
                </div>
                <div style="margin-top:10px; font-weight:bold;">Output Result & Edit</div>
            </div>
        </a>

        <!-- Line -->
        <div class="cc" style="flex:1; height:3px;"></div>

        <!-- Stage 3 -->
        <div style="flex:1; text-align:center;">
            <div class="{{ $active == 3 ? 'c' : 'cc' }}"
                 style="width:60px; height:60px; margin:0 auto; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:bold;">
                3
            </div>
            <div style="margin-top:10px; font-weight:bold;">Download & Save</div>
        </div>

    </div>
</div>