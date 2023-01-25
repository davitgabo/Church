<div class="login h-100 d-flex">
    <form class="d-flex flex-column login__form" action="/authenticate" method="post">
        @csrf
        <input class="m-1" type="text" name="name" placeholder="user">
        <input class="m-1" type="password" name="password" placeholder="password">
        <button class="m-1" type="submit">Log in</button>
    </form>
</div>
