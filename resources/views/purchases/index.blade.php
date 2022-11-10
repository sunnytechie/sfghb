<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Payments</h5></div>
            <div class="btn-group">
              <a href="#" class="btn btn-sm btn-success p-2">Manually Make payment</a>
              
            </div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name <br>Phone </th>
                  <th>No. <br> Copies</th>
                  <th>Reason</th>
                  <th>Payment <br> Method</th>
                  <th>Transaction <br> Reference</th>
                  <th>Amount</th>
                  <th>Date <br> Paid</th>
                  <th>Downloadable</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($purchases as $purchase)
                   <tr>
                    
                    <td>{{ $id++ }}</td>
                    <td><span>{{ $purchase->name }}</span><br><span>{{ $purchase->phone }}</span></td>
                    <td>{{ $purchase->no_copy }}</td>
                    <td>{{ $purchase->for_who }}</td>
                    <td>{{ $purchase->method }}</td>
                    <td>{{ $purchase->tx_ref }}</td>
                    <td>{{ $purchase->currency }} {{ $purchase->amount }}</td>
                    <td>{{ $purchase->created_at->diffForHumans()  }}</td>
                    <td><a target="blank" href="/storage/{{ $purchase->thumbnail }}" download>
                        <img height="40" width="40" src="/storage/{{ $purchase->thumbnail }}" alt="No File">
                      </a>
                    </td>
                  </tr> 
                @endforeach
                  
              </tbody>
            </table>
          </div>

          <nav aria-label="Page navigation example" class="mx-3">
            <ul class="pagination">
              {!! $purchases->links() !!}
            </ul>
          </nav>
        </div>
        <!--/ Basic Bootstrap Table -->

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>