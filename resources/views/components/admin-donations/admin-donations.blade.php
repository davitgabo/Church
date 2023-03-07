<div class="donation-section">
    <div class="my-3">
        <form action="/donations/visibility" method="post">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center">
                <h5>დონაციების გვერდის გამოჩენა</h5>
                {{--            ეს დამალვა--}}
                <label class="switch mx-2">
                    <button type="submit" class="donation-visibility" value="0" name="hide">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </button>
                </label>

                {{--            ეს გამოჩენა--}}
                <label class="switch mx-2">
                    <button type="submit" class="donation-visibility" value="1" name="hide">
                        <input type="checkbox" class="active">
                        <span class="slider round"></span>
                    </button>
                </label>
            </div>
        </form>
    </div>
    <div class="donation-sub-section my-3">
        <h3>გადაწყვეტის მოლოდინში</h3>
        @foreach($donations as $donation)
            @if($donation->status == 'pending')
                <div class="card my-2">
                    <div class="card-body">
                        <div>გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}</div>
                        <div>თანხა: {{$donation->amount}}</div>
                        <div>ერთჯერადი კოდი: {{$donation->payment_title}}</div>
                        <div>კომენტარი: {{$donation->comment ? : '-'}}</div>
                    </div>
                    <form action="/donations/status/{{$donation->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success m-2" value="1" name="approved"> დადასტურება </button>
                        <button type="submit" class="btn btn-danger m-2" value="0" name="approved"> უარყოფა </button>
                    </form>
                </div>

            @endif
        @endforeach
    </div>
    <div class="donation-sub-section my-3">
        <h3>დადასტურებული</h3>
        @foreach($donations as $donation)
            @if($donation->status == 'approved')
                <div class="card my-2">
                    <div class="card-body">
                        <div>გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}</div>
                        <div>თანხა: {{$donation->amount}}</div>
                        <div>ერთჯერადი კოდი: {{$donation->payment_title}}</div>
                        <div>კომენტარი: {{$donation->comment ? : '-'}}</div>
                    </div>
                    <form action="/donations/status/{{$donation->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger m-2" value="0" name="approved"> უარყოფა </button>
                    </form>
                </div>

            @endif
        @endforeach
    </div>

    <div class="donation-sub-section my-3">
        <h3>უარყოფილი</h3>
        @foreach($donations as $donation)
            @if($donation->status == 'rejected')
                <div class="card">
                    <div class="card-body">
                        <div>გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}</div>
                        <div>თანხა: {{$donation->amount}}</div>
                        <div>ერთჯერადი კოდი: {{$donation->payment_title}}</div>
                        <div>კომენტარი: {{$donation->comment ? : '-'}}</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="/donations/status/{{$donation->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success m-2" value="1" name="approved"> დადასტურება </button>
                        </form>
                        <form action="/donations/delete/{{$donation->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2"> წაშლა </button>
                        </form>
                    </div>

                </div>

            @endif
        @endforeach
    </div>
</div>
