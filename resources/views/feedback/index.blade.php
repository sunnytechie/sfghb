<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="card-header">
          <h4>Feedbacks</h4>
        </div>
        @foreach ($feedbacks as $feedback)
        
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $feedback->title }}</h5>
                <p class="card-text">{!! $feedback->body !!}</p>
                
                <div class="btn-group">
                  {{-- <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-warning btn-sm"><i class='bx bx-see' ></i> Edit</a> --}}
                  <form method="post" action="{{ route('feedback.destroy', $feedback->id) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this feedback?')" class="btn btn-danger btn-sm" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class='bx bx-trash'></i> Trash</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>