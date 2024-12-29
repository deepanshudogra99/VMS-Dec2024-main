<div class="container-fluid mt-2">
  <h2 class="mb-2 text-center">Users Management</h2>
  {{-- <div>
    <input type="text" wire:model.debounce.500ms="search" class="form-control" placeholder="Search by name or email...">
  </div> --}}

  <table class="table table-bordered table-striped mt-2">
    <thead class="table-dark text-center">
      <tr>
        <th>District Name</th>
        <th>Office Name</th>
        <th>User Type</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $u)
      <tr class="">
      <td>{{getdist($u->districtcode)}}</td>
      <td>{{getoffice($u->officecode)}}</td>
      <td>{{getusertype($u->usertypecode)}}</td>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
      <td class="text-center">
        <button class="btn btn-sm text-white rounded-pill p-2  {{ $u->status == 1 ? 'bg-success' : 'bg-danger' }}">
        {{ $u->status == 1 ? 'Enabled' : 'Disabled' }}
        </button>
      </td>
      <!-- <td>
      <button class="btn btn-primary btn-sm">Edit</button>
      </td> -->
      <td class="text-center">
        <button wire:click="toggleStatus({{ $u->id }})"
        class="btn {{ $u->status == 1 ? 'btn-danger' : 'btn-success' }} btn-sm rounded-pill p-2">
        {{ $u->status == 1 ? 'Disable' : 'Enable' }}
        </button>
      </td>

      </tr>
    @endforeach


      <!-- Add more rows as needed -->
    </tbody>

  </table>
  {{ $users->links() }}
</div>