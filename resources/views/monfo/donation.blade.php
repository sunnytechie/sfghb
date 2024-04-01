@extends('layouts.index')
<title>Mummy Nches Foundation - donations</title>
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Monfo Donations</h5></div>
          </div>

          <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Amount</th>
                  <th>Reference</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">

                @foreach ($donations as $donation)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $donation->first_name }} {{ $donation->last_name }}</td>
                    <td>{{ $donation->email }}</td>
                    <td>{{ $donation->donate_amount }}</td>
                    <td>{{ $donation->reference }}</td>
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
