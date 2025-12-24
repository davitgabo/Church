<div class="row my-4">
    <div class="col-2">
        {{$item['title']}}:
    </div>
    <div class="col-10">
        <form action="/edit/{{$item['id']}}" method="post" class="d-flex" id="form_{{$item['id']}}">
            @csrf
            @method('PUT')
            <div class="w-100">
                @if(in_array($item['text'],['Facebook','Instagram','Twitter']))
                    <div class="form__input">
                        <span>LINK:</span> <input class="w-50 form-control" type="text" name="link" readonly onfocus="this.blur()" value="{{$item['uri']}}">
                    </div>
                @elseif(strlen($item['text']) > 40 || strlen($item['text_ge']) > 40)
                    <div class="form__textarea">
                        <span>GE:</span> <textarea class="w-50 form-control" name="text_ge" cols="20" rows="5" readonly onfocus="this.blur()">{{$item['text_ge']}}</textarea>
                    </div>
                    <div class="form__textarea my-2">
                        <span>EN:</span> <textarea class="w-50 form-control" name="text_en" cols="20" rows="5" readonly onfocus="this.blur()">{{$item['text']}}</textarea>
                    </div>
                    <div class="form__textarea my-2">
                        <span>RU:</span> <textarea class="w-50 form-control" name="text_ru" cols="20" rows="5" readonly onfocus="this.blur()">{{$item['text_ru']}}</textarea>
                    </div>
                @else
                    <div class="form__input">
                        <span>GE:</span> <input class="w-50 form-control" type="text" name="text_ge" readonly onfocus="this.blur()" value="{{$item['text_ge']}}">
                    </div>
                    <div class="form__input my-2">
                        <span>EN:</span> <input class="w-50 form-control" type="text" name="text_en" readonly onfocus="this.blur()" value="{{$item['text']}}">
                    </div>
                    <div class="form__input my-2">
                        <span>RU:</span> <input class="w-50 form-control" type="text" name="text_ru" readonly onfocus="this.blur()" value="{{$item['text_ru']}}">
                    </div>
               @endif
            @if($item['title'] == 'სლაიდერის ტექსტი')
                <div class="form__input">
                    <span>სათაური GE:</span> <input class="w-50 form-control" type="text" name="news_title_ge" readonly onfocus="this.blur()" value="{{$item['news_title_ge']}}">
                </div>
                <div class="form__input my-2">
                    <span>სათაური EN:</span> <input class="w-50 form-control" type="text" name="news_title_en" readonly onfocus="this.blur()" value="{{$item['news_title_en']}}">
                </div>
                <div class="form__input my-2">
                    <span>სათაური RU:</span> <input class="w-50 form-control" type="text" name="news_title_ru" readonly onfocus="this.blur()" value="{{$item['news_title_ru']}}">
                </div>
                <div class="form__input my-2">
                    <span>ქვესათაური GE:</span> <input class="w-50 form-control" name="subheader_ge" readonly onfocus="this.blur()" value="{{$item['subheader_ge']}}"></input>
                </div>
                <div class="form__input my-2">
                    <span>ქვესათაური EN:</span> <input class="w-50 form-control" name="subheader_en" readonly onfocus="this.blur()" value="{{$item['subheader_en']}}"></input>
                </div>
                <div class="form__input my-2">
                    <span>ქვესათაური RU:</span> <input class="w-50 form-control" name="subheader_ru" readonly onfocus="this.blur()" value="{{$item['subheader_ru']}}"></input>
                </div>
                <div class="form__input my-3">
                    <span>სლაიდერზე გამოჩენა:</span> <input
                        type="checkbox"
                        name="is_slider"
                        disabled
                        value="1"
                        @checked(!empty($item['is_slider']))
                    >
                </div>
                <div class="form__input my-3">
                    <span>Youtube:</span> <input class="w-50 form-control" type="text" name="video_url" readonly onfocus="this.blur()" value="{{$item['video_id']}}">
                </div>
            @endif
            </div>
            <button type="button" class="btn btn-secondary edit-button" onclick="edit(this, {{$item['id']}})"> რედაქტირება</button>
            <button type="submit" class="btn btn-success submit-button" hidden> შეცვლა</button>
            <button type="button" class="btn btn-danger cancel-button" onclick="cancelEdit(this, {{$item['id']}})" hidden>X</button>
        </form>
        @if($item['title'] == 'სლაიდერის ტექსტი')
        <form action="/delete/{{$item['id']}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">წაშლა</button>
        </form>
        @endif
    </div>
</div>
