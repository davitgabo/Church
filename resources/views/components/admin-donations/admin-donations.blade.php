<div>
    <div>
        <h1> დაუდასტურებელი</h1>
        @foreach($donations as $donation)
            @if($donation->status == 'pending')
                <div>
                    გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}
                    თანხა: {{$donation->amount}}
                    ერთჯერადი კოდი: {{$donation->payment_title}}
                </div>
                <form action="/donations/change" method="post">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="">
                </form>
            @endif
        @endforeach
    </div>
</div>
