<?php

namespace App\Livewire\FmsUser;

use App\Models\VcMain;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\VcMaster;
use Livewire\WithPagination;

class AddVc extends Component
{
  public $vcid;
  public $vcdate;
  public $purpose;
  public $timein;
  public $timeout;
  public $id;
  public $editModal = false;
  public $addmodal = false;


  protected $rules = [
    'vcid' => 'required|string',
    'vcdate' => 'required|date',
    'purpose' => 'required|string',
    'timein' => 'required',
    'timeout' => 'required',
  ];
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
    $statecode = Auth::user()->statecode;
    $tabledata = VcMaster::where('statecode', $statecode)
      ->where('districtcode', $distcode)
      ->orderBy('vcdate', 'desc')
      ->orderBy('id', 'desc')
      ->paginate(8);
    return view('livewire.fms-user.add-vc', compact('tabledata'));
  }

  public function submitForm()
  {
    // $this->vcid = null;
    // $this->vcdate = null;
    // $this->purpose = null;
    // $this->timein = null;
    // $this->timeout = null;
    // dd($this->vcid);
    $this->statecode = Auth::user()->statecode;
    $this->districtcode = Auth::user()->districtcode;
    $this->officecode = Auth::user()->officecode;
    $this->userid = Auth::user()->userid;
    $this->validate();
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
    $this->reset();
    $this->showModal = false;
    session()->flash('message', 'VC Entered Successfully!');

  }
  public function edit($editvc)
  {
    $this->toggleModal('edit');
    $vctobeEdited = VcMaster::findOrFail($editvc);
    $this->id = $vctobeEdited->id;
    $this->vcid = $vctobeEdited->vcid;
    $this->vcdate = $vctobeEdited->vcdate;
    $this->purpose = $vctobeEdited->purpose;
    $this->timein = $vctobeEdited->timein;
    $this->timeout = $vctobeEdited->timeout;
  }

  public function update()
  {
    $this->validate();
    $vctobeEdited = VcMaster::findOrFail($this->id);
    $vctobeEdited->vcid = $this->vcid;
    $vctobeEdited->vcdate = $this->vcdate;
    $vctobeEdited->purpose = $this->purpose;
    $vctobeEdited->timein = $this->timein;
    $vctobeEdited->timeout = $this->timeout;
    // Save the changes to the database
    $vctobeEdited->save();
    $this->resetFields();
    session()->flash('message', 'Entry updated successfully.');
  }
  private function resetFields()
  {
    $this->vcid = null;
    $this->vcdate = null;
    $this->purpose = null;
    $this->timein = null;
    $this->timeout = null;
  }

  public function toggleModal($modalType)
  {
    switch ($modalType) {
      case 'show':
        $this->addmodal = !$this->addmodal;
        break;
      case 'edit':
        $this->editModal = !$this->editModal;
        break;

    }
  }
}
