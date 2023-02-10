@extends('layouts.index')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Chapters</h5></div>
            <div class="btn-group">
              <button type="button" class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#basicModal">Add New Chapter</button>
            </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>State</th>
                  <th>Chapter Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($chapters as $chapter)
                   <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $chapter->state }}</td>
                    <td>{{ $chapter->chapter }}</td>
                    
                    <td>
                      <div class="btn-group">
                          <a href="{{ route('chapters.edit', $chapter->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-edit-alt' ></i> Edit</a>
                          <form method="post" action="{{ route('chapters.destroy', $chapter->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this chapter?')" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class='bx bx-trash'></i> Trash</button>
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
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Register New Chapter</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{ route('chapters.store') }}" method="POST">
            @csrf
            <div class="modal-body">
              <div class="row">

                <div class="col mb-3">
                  <label for="chapter" class="form-label">Chapter Name</label>
                  <input type="text" id="chapter" name="chapter" class="form-control" placeholder="Enter Name"  required/>
                </div>

                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">state</label>
                        <select id="state" name="state" class="form-select form-select-md" required>
                          <option>Abia</option>
                          <option>Adamawa</option>
                          <option>Akwa Ibom</option>
                          <option>Anambra</option>
                          <option>Bauchi</option>
                          <option>Bayelsa</option>
                          <option>Benue</option>
                          <option>Borno</option>
                          <option>Cross River</option>
                          <option>Delta</option>
                          <option>Ebonyi</option>
                          <option>Edo</option>
                          <option>Ekiti</option>
                          <option>Enugu</option>
                          <option>Gombe</option>
                          <option>Imo</option>
                          <option>Jigawa</option>
                          <option>Kaduna</option>
                          <option>Kano</option>
                          <option>Katsina</option>
                          <option>Kebbi</option>
                          <option>Kogi</option>
                          <option>Kwara</option>
                          <option>Lagos</option>
                          <option>Nasarawa</option>
                          <option>Niger</option>
                          <option>Ogun</option>
                          <option>Ondo</option>
                          <option>Osun</option>
                          <option>Oyo</option>
                          <option>Plateau</option>
                          <option>Rivers</option>
                          <option>Sokoto</option>
                          <option>Taraba</option>
                          <option>Yobe</option>
                          <option>Zamfara</option>
                          <option>Abuja FCT</option>
                        </select>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
          </div>
        </div>
      </div>
      
@endsection