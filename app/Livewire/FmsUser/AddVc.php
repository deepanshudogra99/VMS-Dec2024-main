<?php

namespace App\Livewire\FmsUser;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\VcMaster;

class AddVc extends Component
{
  public $vcid;
  public $vcdate;
  public $purpose;
  public $timein;
  public $timeout;

  public $showModal = false;




  // protected $rules = [
  //   'vcid' => 'required|string|max:255',
  //   'vcdate' => 'required|string|max:255',
  //   'purpose' => 'required|string|max:255',
  //   'timein' => 'required|date_format:H:i:s',
  //   'timeout' => 'required|date_format:H:i:s|after:timein',
  // ];

  public function render()
  {
    $distcode = Auth::user()->districtcode;

    $tabledata = VcMaster::where('districtcode', $distcode)->get();
    //dd($tabledata);
    return view('livewire.fms-user.add-vc', compact('tabledata'));
  }

  public function submitForm()
  {
    $this->statecode = Auth::user()->statecode;
    $this->districtcode = Auth::user()->districtcode;
    $this->officecode = Auth::user()->officecode;
    $this->userid = Auth::user()->userid;
    // $this->validate();
    VcMaster::create([
      'statecode' => $this->statecode,
      'districtcode' => $this->districtcode,
      'officecode' => $this->officecode,
      'vcid' => $this->vcid,
      'vcdate' => $this->vcdate,
      'purpose' => $this->purpose,
      'timein' => $this->timein,
      'timeout' => $this->timeout,
      'userid' => $this->userid
    ]);

    // Optionally, reset the form fields after successful submission
    $this->reset();
    $this->showModal = false;

    session()->flash('message', 'VC Entered Successfully!');

  }



  public function toggleModal()
  {
    $this->showModal = !$this->showModal; // Toggling the boolean value
  }
}
