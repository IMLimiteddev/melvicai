<?php

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

new class extends Component
{
    public $roles = [];
    public $permissions = [];

    public $selectedRole;
    public $selectedPermission;

    protected $listeners = ['refreshData' => 'mount'];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function assign()
    {
        if (!$this->selectedRole || !$this->selectedPermission) {
             $this->dispatch('notify', type: 'warning', message: 'Role already exists');
            return;
        }

        $role = Role::findById($this->selectedRole);
        $permission = Permission::findById($this->selectedPermission);

        $role->givePermissionTo($permission);

        $this->dispatch('notify', type: 'success', message: 'Permission assigned to role successfully');
        $this->reset(['selectedRole', 'selectedPermission']);
    }
};
?>

<div class="row">

    <!-- ROLE -->
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Role</label>
            <select class="form-select" wire:model="selectedRole">
                <option value="">Choose a role</option>

                @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- PERMISSION -->
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Assign Permission</label>
            <select class="form-select" wire:model="selectedPermission">
                <option value="">Choose a permission</option>

                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}">
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- BUTTON -->
    <div class="text-left mt-2">
        <button wire:click="assign" class="btn btn-success me-3">
            Connect both
        </button>
    </div>

</div>