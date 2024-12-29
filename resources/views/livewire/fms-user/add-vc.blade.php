<div>
  <div>

    @if ($showModal)
    <div class="modal-overlay"
      style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1040;">
    </div>
    <div class="modal fade show" tabindex="-1" style="display: block;" aria-hidden="false">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title mx-auto" id="addVCModalLabel">+Add New VC</h5>

        </div>
        <div class="modal-body">
        <form wire:submit.prevent="submitForm" class="d-flex flex-column align-items-center">
          <div class="mb-3 w-100">
          <label for="vcId" class="form-label"><b>VC ID:</b></label>
          <input type="text" wire:model="vcid" class="form-control mx-auto" name="vcid" placeholder="Enter VC ID"
            required>
          </div>
          <div class="mb-3 w-100">
          <label for="vcId" class="form-label"><b>VC Date:</b></label>
          <input type="date" wire:model="vcdate" class="form-control mx-auto" name="vcdate"
            placeholder="Enter VC ID" required>
          </div>

          <div class="mb-3 w-100">
          <label for="vcPurpose" class="form-label"><b>VC Purpose:</b></label>
          <input type="text" wire:model="purpose" class="form-control mx-auto" name="purpose"
            placeholder="Enter VC Purpose" required>
          </div>
          <div class="mb-3 w-100">
          <label for="vcStartTime" class="form-label"><b>VC Start Time:</b></label>
          <input type="time" wire:model="timein" class="form-control mx-auto" name="timein" required>
          </div>
          <div class="mb-3 w-100">
          <label for="vcEndTime" class="form-label"><b>VC End Time:</b></label>
          <input type="time" wire:model="timeout" class="form-control mx-auto" name="timeout" required>
          </div>
          <button type="submit" class="btn btn-md btn-primary text-center">Submit</button>
        </form>
        <div class="text-end">
          <button type="button" wire:click="toggleModal" class="btn btn-info text-end">Cancel</button>
        </div>

        </div>
      </div>

      </div>
    </div>
  @endif

    <!-- Success Message -->
    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
      {{ session('message') }}
      <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
    </div>

  @endif
  </div>
  <div class="container mt-1 mb-4" style="overflow-y: auto;">  
    <div class="row">
      <div class="p-2 rounded-pill" style="background-color: #008080">
        <h3 class="text-center text-white">Video Conferences</h3>  
      </div>
        <!-- Add VC Button -->
      <div class="mt-2 mb-2 p-1">
        <button class="btn btn-success float-left rounded-pill" wire:click="toggleModal">+ Add New VC</button>
      </div>  
      <div class="mt-2 mb-2">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover shadow-sm rounded mb-2">
            <thead class="bg-dark text-white">
              <tr>
                <th>VC ID</th>
                <th>VC Date</th>
                <th>VC Purpose</th>
                <th>VC Start Time</th>
                <th>VC End Time</th>
                <th>Entered By</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tabledata as $data)
                <tr>
                  <td>{{ $data->vcid }}</td>
                  <td>{{parseDate($data->vcdate) }}</td>
                  <td>{{ $data->purpose }}</td>
                  <td>{{ $data->timein }}</td>
                  <td>{{ $data->timeout }}</td>
                  <td>{{ $data->userid }}</td>
                  <td>
                    <button class="btn btn-primary rounded-pill">Edit</button>
                    <button class="btn btn-danger rounded-pill">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>