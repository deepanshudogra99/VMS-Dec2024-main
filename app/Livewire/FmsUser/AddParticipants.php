<?php

namespace App\Livewire\FmsUser;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\VcMaster;
use App\Models\VcMain;
use Livewire\WithPagination;

class AddParticipants extends Component
{
  public $selectedVc;

  public $name;
  public $designation;
  public $mobileno;
  public $tableData;
  public function render()
  {
    $statecode = Auth::user()->statecode;
    $distcode = Auth::user()->districtcode;
    $vc = VcMaster::where('statecode', $statecode)
      ->where('districtcode', $distcode)->
      get();
    return view('livewire.fms-user.add-participants', ['vc' => $vc]);
  }
  public function getvcdetails()
  {
    // Ensure a valid VC is selected before fetching details
    if ($this->selectedVc != 0) {
      $this->tableData = VcMaster::find($this->selectedVc);
    } else {
      $this->tableData = null; // Clear tableData if no valid VC is selected
    }
  }

  public function addParticipant()
  {
    // $statecode = Auth::user()->statecode;
    // $distcode = Auth::user()->districtcode;
    // $officecode = Auth::user()->officecode;
    $userid = Auth::user()->userid;

    $participants = VcMain::create([
      'vcid' => $this->selectedVc,
      'name' => $this->name,
      'designation' => $this->designation,
      'mobile' => $this->mobileno,
      'userid' => $userid,
    ]);
    $this->reset();
    session()->flash('success', 'Participant added successfully.');
  }
}
