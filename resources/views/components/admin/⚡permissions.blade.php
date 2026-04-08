<?php

use Livewire\Component;

new class extends Component
{
    public $permission;
    public function create()
        {
            $this->validate([
                'permission' => 'required|string|max:255'
            ]);

            if (\Spatie\Permission\Models\Permission::where('name', $this->permission)->exists()) {
                $this->dispatch('notify', type: 'warning', message: 'Permission already exists');
                return;
            }

            \Spatie\Permission\Models\Permission::create([
                'name' => $this->permission
            ]);

            $this->dispatch('notify', type: 'success', message: 'Permission created successfully');
            $this->reset('permission');
            $this->dispatch('refreshData');
        }
};
?>

<div class="mb-3">
    <form wire:submit.prevent="create">

            <label>Permission</label>

            <input
                type="text"
                wire:model.defer="permission"
                class="form-control"
                placeholder="Enter permission"
            >

            @error('permission')
                <span style="color:red;">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-success mt-2">
                Create
            </button>

    </form>
</div>