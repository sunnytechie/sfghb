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
                  <th>Name</th>
                  <th>email</th>
                  <th>Payment <br> Method</th>
                  <th>Transaction <br> Reference</th>
                  <th>Amount</th>
                  <th>Paid</th>
                  <th>Validity</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($payments as $payment)
                   <tr>
                    
                    <td>{{ $id++ }}</td>
                    
                    <td>{{ $payment->name }}</td>
                    <td>{{ $payment->email }}</td>
                    <td>{{ $payment->method }}</td>
                    <td>{{ $payment->tx_ref }}</td>
                    <td>{{ $payment->currency }} {{ $payment->amount }}</td>
                    <td>{{ $payment->created_at->diffForHumans()  }}</td>
                    <td>{{ Carbon\Carbon::parse($payment->validity)->format('d-m-Y') }}</td>
                    
                    
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
</x-app-layout>