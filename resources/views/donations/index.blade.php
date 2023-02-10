@extends('layouts.index')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Donations</h5></div>
          </div>
          
          <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>Payment <br> Method</th>
                  <th>Transaction <br> Reference</th>
                  <th>Amount</th>
                  <th>Paid</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $id = 1;
                @endphp
                @foreach ($donations as $donation)
                   <tr>
                    
                    <td>{{ $id++ }}</td>
                    <td>{{ $donation->name }}</td>
                    <td>{{ $donation->email }}</td>
                    <td>{{ $donation->method }}</td>
                    <td>{{ $donation->tx_ref }}</td>
                    <td>{{ $donation->currency }} {{ $donation->amount }}</td>
                    <td>{{ $donation->created_at->diffForHumans()  }}</td>
                    <td>{{ $donation->reason }}</td>
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