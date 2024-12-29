<?php

namespace App\Livewire\SuperAdmin;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Livewire\Component;

use App\Models\User;

class UserManagement extends Component
{
  public $user;
  public $search = "";

  public function render()
  {
    $statecode = Auth::user()->statecode;
    $users = User::where('statecode', $statecode)
    ->where('userrole', '<>', '0')
    ->orderBy('statecode', 'asc')
    ->orderBy('districtcode', 'asc')
    ->orderBy('usertypecode', 'asc')
    ->when($this->search, function ($query) {
        $query->where(function ($query) {
          $query->where('name', "ILIKE", "%$this->search %")
            ->orWhere('email', "ILIKE", "%$this->search %");
        });
      })
      ->paginate(3);
    return view('livewire.super-admin.user-management', ['users' => $users]);
  }

  public function mount()
  {
    //$this->statecode = Auth::user()->statecode;    
  }

  public function toggleStatus($userId)
  {
    // Find the user by ID
    $user = User::find($userId);
    // Toggle the status
    $user->status = $user->status == 1 ? 0 : 1;
    $user->save();
    // Optionally, you can trigger an event to notify the frontend or refresh the data
    $this->dispatch('statusUpdated');
  }

}
