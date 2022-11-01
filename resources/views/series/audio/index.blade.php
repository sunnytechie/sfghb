<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Audio content</h5></div>
            <div class="btn-group">
              <a href="{{ route('audio.create') }}" class="btn btn-sm btn-success p-2">Add New</a>
            </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>S/N</th>
                  <th>thumbnail</th>
                  <th>Title</th>
                  <th>Series</th>
                  <th>Body</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($audio as $data)
                   <tr>
                    <td><input type="checkbox" name="delete" id="delete"></td>
                    <td>{{ $id++ }}</td>
                    <td>
                        <img height="40" width="40" src="/storage/{{ $data->thumbnail }}" alt="Thumbnail" class="rounded" />
                    </td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i>{{ Str::limit($data->title, 20) }}</td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i>{{ $data->audioserie->title }}</td>
                    <td>{!! Str::limit($data->body, 20) !!}</td>
                    
                    <td>
                      <div class="btn-group">
                          <a href="{{ route('audio.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-edit-alt' ></i> Edit</a>
                          <form method="post" action="{{ route('audio.destroy', $data->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this audio?')" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class='bx bx-trash'></i> Trash</button>
                          </form>
                        </div>
                    </td>
                  </tr> 
                @endforeach
                  
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example" class="mx-3">
            <ul class="pagination">
              {!! $audio->links() !!}
            </ul>
          </nav>
        </div>
        <!--/ Basic Bootstrap Table -->

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>