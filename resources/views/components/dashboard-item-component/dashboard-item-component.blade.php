<div class="row my-4">
    <div class="col-2">
        {{$item['title']}}:
    </div>
    <div class="col-10">
        <form action="/edit/{{$item['id']}}" method="post" class="d-flex" id="form_{{$item['id']}}">
            @csrf
            @method('PUT')
            @if(strlen($item['text']) > 40 || strlen($item['text_ge']) > 40)
            <div class="w-100">
                <div class="form__textarea">
                    <span>GE:</span> <textarea class="w-50" name="text_ge" cols="20" rows="5" readonly onfocus="this.blur()">{{$item['text_ge']}}</textarea>
                </div>
                <div class="form__textarea my-2">
                    <span>EN:</span> <textarea class="w-50" name="text_en" cols="20" rows="5" readonly onfocus="this.blur()">{{$item['text']}}</textarea>
                </div>
            </div>

            @else
            <div class="w-100">
                <div class="form__input">
                    <span>GE:</span> <input class="w-50" type="text" name="text_ge" readonly onfocus="this.blur()" value="{{$item['text_ge']}}">
                </div>
                <div class="form__input my-2">
                    <span>EN:</span> <input class="w-50" type="text" name="text_en" readonly onfocus="this.blur()" value="{{$item['text']}}">
                </div>
            </div>
            @endif
            <button type="button" class="btn btn-secondary edit-button" onclick="edit(this, {{$item['id']}})"> რედაქტირება</button>
            <button type="submit" class="btn btn-success submit-button" hidden> შეცვლა</button>
            <button type="button" class="btn btn-danger cancel-button" onclick="cancelEdit(this, {{$item['id']}})" hidden>X</button>
        </form>
    </div>
</div>
