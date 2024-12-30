<div>
  <div class="container">
    <div class="row">
      <div class="p-2 rounded-pill" style="background-color: #008080">
        <h3 class="text-center text-white">Participants of Video Conferences</h3>
      </div>
      <div class="col-12 mt-2 mb-2 p-1 d-flex align-items-center justify-content-start">

        <label for="vcSelect" class="me-3">Select VC:</label>
        <select id="vcSelect" class="form-select me-3" wire:model="selectedVc" wire:change="getvcdetails">
          <option value="">Select VC</option>
          @foreach ($vc as $v)
        <option value="{{ $v->id }}">{{ $v->vcid }}</option>
      @endforeach
        </select>


      </div>
      <div class="col-12 text-center">
        @if ($tableData)
      <div class="mt-4">
        <h5 class="mt-2 text-white p-1 rounded-pill" style="background-color: #008080">Add Participants to VC ID:
        {{ $tableData->vcid }}
        </h5>

        <form wire:submit.prevent="addParticipant" class="d-flex flex-column align-items-center">
        <div class="row mb-3">
          <div class="col-md-4">
          <label for="participantName" class="form-label">Participant Name:</label>
          <input type="text" id="participantName" class="form-control" wire:model="name" required>
          </div>
          <div class="col-md-4">
          <label for="participantRole" class="form-label">Participant Designation:</label>
          <input type="text" id="participantRole" class="form-control" wire:model="designation" required>
          </div>
          <div class="col-md-4">
          <label for="participantMobile" class="form-label">Participant's Mobile Number:</label>
          <input type="text" id="participantMobile" class="form-control" wire:model="mobileno" required>
          </div>
        </div>
        <!-- Button aligned horizontally with form -->
        <div class="row mb-3">
          <div class="col-12">
          <button type="submit" wire:click="addParticipant" class="btn btn-primary w-100">Add Participant</button>
          </div>
        </div>
        </form>

      </div>
    @endif
        @if($participantdata)
      <table class="table table-striped ">
        <thead class="bg-dark text-white">
        <tr>
          <th>Name</th>
          <th>Designation</th>
          <th>Mobile Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($participantdata as $p)
      <tr>
        <td>{{$p->name}}</td>
        <td>{{$p->designation}}</td>
        <td>{{$p->mobile}}</td>
      </tr>
    @endforeach

        </tbody>
      </table>
    @endif
      </div>
    </div>
  </div>
</div>