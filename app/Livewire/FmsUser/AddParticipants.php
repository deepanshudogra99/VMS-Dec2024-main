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
  public $participantdata = [];

  protected $rules = [

    'name' => 'required|string|max:255',
    'designation' => 'nullable|string|max:255',
    'mobileno' => 'required|numeric|digits:10',  // Assuming 10-digit mobile number
    // Ensure the user exists in the users table
  ];
  public function render()
  {
    $statecode = Auth::user()->statecode;
    $distcode = Auth::user()->districtcode;
    $vc = VcMaster::where('statecode', $statecode)
      ->where('districtcode', $distcode)->
      get();
    $this->getvcdetails();
    return view('livewire.fms-user.add-participants', ['vc' => $vc]);
  }
  public function getvcdetails()
  {
    if ($this->selectedVc != 0) {
      $this->tableData = VcMaster::find($this->selectedVc);
      $this->participantdata = VcMain::where('vcid', $this->selectedVc)->get();
    } else {
      $this->tableData = null;
      $this->participantdata = [];
    }
  }

  public function addParticipant()
  {
    // $statecode = Auth::user()->statecode;
    // $distcode = Auth::user()->districtcode;
    // $officecode = Auth::user()->officecode;
    $userid = Auth::user()->userid;
    $this->validate();
    $participants = VcMain::create([
      'vcid' => $this->selectedVc,
      'name' => $this->name,
      'designation' => $this->designation,
      'mobile' => $this->mobileno,
      'userid' => $userid,
    ]);
    $this->reset(['name', 'designation', 'mobileno']);

    session()->flash('success', 'Participant added successfully.');
  }
}
