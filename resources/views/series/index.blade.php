<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Audio Series</h5></div>
            <div class="btn-group">
              <a href="{{ route('audioseries.create') }}" class="btn btn-sm btn-success p-2">Add New</a>
            </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>S/N</th>
                  <th>Title</th>
                  <th>Audio</th>
                  <th>Body</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($series as $serie)
                
                   <tr>
                    <td><input type="checkbox" name="delete" id="delete"></td>
                    <td>{{ $id++ }}</td>
                    
                    <td><i class="fab fa-angular fa-lg text-danger"></i>{{ Str::limit($serie->title, 20) }}</td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i>{{ $serie->audio->count() }}</td>
                    <td>{!! Str::limit($serie->body, 20) !!}</td>
                    <td>
                      <div class="btn-group">
                          <a href="{{ route('audioseries.edit', $serie->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-edit-alt' ></i> Edit</a>
                          <form method="post" action="{{ route('audioseries.destroy', $serie->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this series?')" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class='bx bx-trash'></i> Trash</button>
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
              {!! $series->links() !!}
            </ul>
          </nav>
        </div>
        <!--/ Basic Bootstrap Table -->

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>