@extends('layouts.index')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>YouTube</h5></div>
            <div class="btn-group">
              <a href="{{ route('feeds.create') }}" class="btn btn-sm btn-success p-2">Add New</a>
              <button type="submit" class="btn btn-sm btn-info">Unpublish selected</button>
              <button type="submit" class="btn btn-sm btn-primary">Publish selected</button>
            </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
              <thead>
                <tr>
                  <th></th>
                  <th>S/N</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($feeds as $feed)
                   <tr>
                    <td><input type="checkbox" name="delete" id="delete"></td>
                    <td>{{ $id++ }}</td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i>{{ Str::limit($feed->title, 60) }}</td>
                    <td>{{ $feed->url }}</td>
                    <td>
                      <div class="btn-group">
                          {{-- <a href="{{ route('feeds.edit', $feed->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-edit-alt' ></i> Edit</a> --}}
                          <form method="post" action="{{ route('feeds.destroy', $feed->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i> Trash</button>
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