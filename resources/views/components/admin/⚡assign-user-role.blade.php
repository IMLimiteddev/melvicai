<?php

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;

new class extends Component
{
    public $roles = [];
    public $users = [];

    public $selectedRole;
    public $selectedUser;

    public function mount()
    {
        $this->roles = Role::all();
        $this->users = User::all();
    }

    public function assign()
    {
        if (!$this->selectedRole || !$this->selectedUser) {
            $this->dispatch('notify', 
                type:'warning',
                message: 'Please select both user and role'
            );
            return;
        }

        

        $user = User::find($this->selectedUser);
        $role = Role::findById($this->selectedRole);

        if ($user->hasRole($role->name)) {
            $this->dispatch('notify', 
                type:'warning',
                message: 'User already has this role'
            );
            return;
        }

        $user->assignRole($role);

        $this->dispatch('notify', 
                type:'success',
                message: 'User assigned to role successfully'
            );
        $this->reset(['selectedRole', 'selectedUser']);
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

    <!-- USER -->
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Assign a user to role</label>
            <select class="form-select" wire:model="selectedUser">
                <option value="">Choose a user</option>

                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }} ({{ $user->email }})
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