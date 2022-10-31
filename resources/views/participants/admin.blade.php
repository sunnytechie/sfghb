<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Users</h5></div>
            <div class="btn-group">
                
                <button type="button"
                data-bs-toggle="modal"
                          data-bs-target="#basicModal"
                class="btn btn-sm btn-warning"><i class='bx bx-dialpad-alt'></i> Create New Admin</button>
              </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Login Type</th>
                  <th>Joined</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($admins as $user)
                   <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->login_type }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-edit-alt' ></i> Edit</a>
                          <form method="post" action="{{ route('users.destroy', $user->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class='bx bx-trash'></i> Trash</button>
                          </form>
                        </div>
                    </td>
                  </tr> 
                @endforeach
                  
              </tbody>
            </table>
          </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
       <!-- Modal -->
       <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Admin Authentication</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <div class="modal-body">

              <div class="row">
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label">Name</label>
                  <input type="text" id="nameBasic" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" required />
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row g-2">
                <div class="col mb-3">
                  <label for="emailBasic" class="form-label">Email</label>
                  <input type="text" id="emailBasic" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="xxxx@xxx.xx" required />
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="xxxxxxx" required />
                </div>
              </div>
            </div>

            
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Authorize</button>
            </div>
          </div>
            </form>
          
        </div>
      </div>
</x-app-layout>