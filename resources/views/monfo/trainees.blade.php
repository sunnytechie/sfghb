@extends('layouts.index')
<title>Mummy Nches Foundation - Registerations</title>
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Monfo Trainee Registeration</h5></div>
          </div>

          <div class="table-responsive text-nowrap">
            <table id="myTable" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Course</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $courses = [
                        '1' => 'Creative Art & Design',
                        '2' => 'Information Technology',
                        '3' => 'Catering',
                        '4' => 'Food Processing',
                        '5' => 'Health & Wellness',
                        '6' => 'Financial Literacy',
                        '7' => 'Relationships',
                        '8' => 'Parenting',
                        '9' => 'Mental Health',
                        '10' => 'Business Strategies',
                        '11' => 'Cosmetology',
                        '12' => 'Fashion Design',
                        '13' => 'Agriculture',
                        '14' => 'Photography',
                        '15' => 'Music',
                        '16' => 'Dance',
                        '17' => 'Film Making',
                        '18' => 'Acting',
                        '19' => 'Public Speaking',
                        '20' => 'Dietary Consultancy',
                    ];
                @endphp

                @foreach ($trainees as $trainee)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trainee->name }}</td>
                    <td>{{ $trainee->email }}</td>
                    <td>{{ $trainee->phone }}</td>
                    <td>{{ $trainee->address }}</td>
                    <td>
                        @foreach ($courses as $key => $course)
                            @if ($key == $trainee->course)
                                {{ $course }}
                            @endif
                        @endforeach
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
