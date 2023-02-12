<div>
    <div>
        <form action="/donations/visibility" method="post">
            @csrf
            @method('PUT')
            <button type="submit" value="1" name="hide"> Hide </button>
            <button type="submit" value="0" name="hide"> Show </button>
        </form>
    </div>
    <div>
        <h3> დაუდასტურებელი</h3>
        @foreach($donations as $donation)
            @if($donation->status == 'pending')
                <div>
                    გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}
                    თანხა: {{$donation->amount}}
                    ერთჯერადი კოდი: {{$donation->payment_title}}
                    კომენტარი: {{$donation->comment}}
                </div>
                <form action="/donations/status/{{$donation->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" value="1" name="approved"> approve </button>
                    <button type="submit" value="0" name="approved"> reject </button>
                </form>
            @endif
        @endforeach
    </div>
    <div>
        <h3> დადასტურებული</h3>
        @foreach($donations as $donation)
            @if($donation->status == 'approved')
                <div>
                    გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}
                    თანხა: {{$donation->amount}}
                    ერთჯერადი კოდი: {{$donation->payment_title}}
                    კომენტარი: {{$donation->comment}}
                </div>
                <form action="/donations/status/{{$donation->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" value="0" name="approved"> reject </button>
                </form>
            @endif
        @endforeach
    </div>

    <div>
        <h3> უარყოფილი</h3>
        @foreach($donations as $donation)
            @if($donation->status == 'rejected')
                <div>
                    გადმომრიცხველი: {{$donation->first_name}} {{$donation->last_name}}
                    თანხა: {{$donation->amount}}
                    ერთჯერადი კოდი: {{$donation->payment_title}}
                    კომენტარი: {{$donation->comment}}
                </div>
                <form action="/donations/status/{{$donation->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" value="1" name="approved"> approve </button>
                </form>
                <form action="/donations/delete/{{$donation->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> DELETE </button>
                </form>
            @endif
        @endforeach
    </div>
</div>
