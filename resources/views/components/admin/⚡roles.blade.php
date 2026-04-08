<?php

use Livewire\Component;

new class extends Component
{
    public $role;
    
    public function create()
        {
            $this->validate([
                'role' => 'required|string|max:255'
            ]);

            if (\Spatie\Permission\Models\Role::where('name', $this->role)->exists()) {
                $this->dispatch('notify', type: 'warning', message: 'Role already exists');
                return;
            }

            \Spatie\Permission\Models\Role::create([
                'name' => $this->role
            ]);

            $this->dispatch('notify', type: 'success', message: 'Role created successfully');
            $this->reset('role');
            $this->dispatch('refreshData');
        }
};
?>

<div class="mb-3">
    <form wire:submit.prevent="create">

            <label>Role</label>

            <input
                type="text"
                wire:model.defer="role"
                class="form-control"
                placeholder="Enter role"
            >

            @error('role')
                <span style="color:red;">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-success mt-2">
                Create
            </button>

    </form>
</div>