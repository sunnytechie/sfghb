<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Push Notification Sent</h5></div>
            <div class="btn-group">
              <a href="{{ route('push.notication.create') }}" class="btn btn-sm btn-success p-2"><i class='bx bx-notification'></i> Create Push Notification.</a>
              
            </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Created_at</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($push_notifications as $push_notification)
                   <tr>
                    
                    <td>{{ $id++ }}</td>
                    <td>{{ $push_notification->title }}</td>
                    <td>{!! $push_notification->body !!}</td>
                    <td>{{ $push_notification->created_at->diffForHumans() }}</td>
                  </tr> 
                @endforeach
                  
              </tbody>
            </table>
          </div>

          <nav aria-label="Page navigation example" class="mx-3">
            <ul class="pagination">
              {!! $push_notifications->links() !!}
            </ul>
          </nav>
        </div>
        <!--/ Basic Bootstrap Table -->

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>