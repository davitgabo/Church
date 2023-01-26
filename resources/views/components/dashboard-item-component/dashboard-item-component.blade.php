<div class="row my-4">
    <div class="col-3">
        {{$item['title']}}:
    </div>
    <div class="col-9">
        <form action="/edit/{{$item['id']}}" method="post" class="d-flex" id="form_{{$item['id']}}">
            @csrf
            @method('PUT')
            @if(strlen($item['text']) > 30)
{{--           ::todo აქ დაწერე გრძელი ტექსტის ინფუთები --}}
            @else
            <div class="w-100">
                <div class="form__input my-1">
                    <span>GE:</span> <input class="w-50" type="text" name="text_ge" readonly onfocus="this.blur()" value="{{$item['text_ge']}}">
                </div>
                <div class="form__input my-1">
                    <span>EN:</span> <input class="w-50" type="text" name="text_en" readonly onfocus="this.blur()" value="{{$item['text']}}">
                </div>
            </div>
            <button type="button" class="btn btn-secondary edit-button" onclick="edit(this, {{$item['id']}})"> რედაქტირება</button>
            <button type="submit" class="btn btn-success" hidden> შეცვლა</button>
            @endif
        </form>
    </div>
</div>
