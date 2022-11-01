<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>News</h5></div>
            <div class="btn-group">
              <a href="{{ route('news.create') }}" class="btn btn-sm btn-success p-2">Add New</a>
              <button type="submit" class="btn btn-sm btn-info">Unpublish selected</button>
              <button type="submit" class="btn btn-sm btn-primary">Publish selected</button>
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
                  <th>Body</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($news as $new)
                   <tr>
                    <td><input type="checkbox" name="delete" id="delete"></td>
                    <td>{{ $id++ }}</td>
                    <td>
                        <img height="40" width="40" src="/storage/{{ $new->thumbnail }}" alt="Thumbnail" class="rounded" />
                    </td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i>{{ Str::limit($new->title, 20) }}</td>
                    <td>{!! Str::limit($new->body, 20) !!}</td>
                    <td><span class="badge bg-label-primary me-1">
                        @if ($new->published == 1)
                            PUBLISHED
                        @else
                            UNPUBLISHED
                        @endif  
                    </span></td>
                    <td>
                      <div class="btn-group">
                          <a href="{{ route('news.edit', $new->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-edit-alt' ></i> Edit</a>
                          <form method="post" action="{{ route('news.destroy', $new->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this new?')" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class='bx bx-trash'></i> Trash</button>
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
              {!! $news->links() !!}
            </ul>
          </nav>
        </div>
        <!--/ Basic Bootstrap Table -->

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>