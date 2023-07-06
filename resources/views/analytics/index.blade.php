<div class="col-md-12 mb-4">
    <form class="card p-4 m-0 pb-4" action="{{ route('dashboard') }}" method="GET">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div><strong>Analytics</strong></div>
                <span>showing {{ $dayCount }} days</span><br>
            </div>
        </div>
        <div class="row mb-4">
            <div class="form-group col-md-3">
                <label for="from">From date:</label>
                <input class="form-control" type="date" value="{{ old('from') ?? $fromDate }}" name="from" id="from">
            </div>
            <div class="form-group col-md-3">
                <label for="to">To date:</label>
                <input class="form-control" type="date" value="{{ old('to') ?? $toDate }}" name="to" id="to">
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn border-0 mt-4" style="background: #F16C69; color: #fff">Apply</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div style="border-radius: 6px; background: #343A40; color: #fff" class="py-3 px-2">
                    <div class="d-flex align-items-center">
                        <div style="margin-right: 8px; margin-top: -3px"><i class='bx bxs-bible' ></i></div>            
                        <div>Devotion</div>
                    </div>
                    <div>{{ $countDevotions }} views</div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div style="border-radius: 6px; background: #343A40; color: #fff" class="py-3 px-2">
                    <div class="d-flex align-items-center">
                        <div style="margin-right: 8px; margin-top: -3px"><i class='bx bxs-video' ></i></div>            
                        <div>Reels</div>
                    </div>
                    <div>{{ $countReels }} views</div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div style="border-radius: 6px; background: #343A40; color: #fff" class="py-3 px-2">
                    <div class="d-flex align-items-center">
                        <div style="margin-right: 8px; margin-top: -3px"><i class='bx bxs-book' ></i></div>            
                        <div>Ebook</div>
                    </div>
                    <div>{{ $countEbook }} views</div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div style="border-radius: 6px; background: #343A40; color: #fff" class="py-3 px-2">
                    <div class="d-flex align-items-center">
                        <div style="margin-right: 8px; margin-top: -3px"><i class='bx bxs-news' ></i></div>            
                        <div>News</div>
                    </div>
                    <div>{{ $countNews }} views</div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div style="border-radius: 6px; background: #343A40; color: #fff" class="py-3 px-2">
                    <div class="d-flex align-items-center">
                        <div style="margin-right: 8px; margin-top: -3px"><i class='bx bxs-calendar-event' ></i></div>            
                        <div>Event</div>
                    </div>
                    <div>{{$countEvent}} views</div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div style="border-radius: 6px; background: #343A40; color: #fff" class="py-3 px-2">
                    <div class="d-flex align-items-center">
                        <div style="margin-right: 8px; margin-top: -3px"><i class='bx bx-plus-medical' ></i></div>            
                        <div>Health</div>
                    </div>
                    <div>{{ $countHealth }} views</div>
                </div>
            </div>
        </div>
    </form>
</div>
