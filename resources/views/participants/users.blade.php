@extends('layouts.index')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Users</h5></div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
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
                @foreach ($users as $user)
                   <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->login_type }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                      <div class="btn-group">
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

    
@endsection