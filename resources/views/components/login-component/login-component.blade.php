<div class="login h-100 d-flex">
    <form class="d-flex flex-column login__form" action="/authenticate" method="post">
        @csrf
        <input class="m-1 form-control" type="text" name="name" placeholder="ოუზერი">
        <input class="m-1 form-control" type="password" name="password" placeholder="პაროლი">
        <button class="m-1 btn btn-success" type="submit">შესვლა</button>
    </form>
</div>
