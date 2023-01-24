<div>
    <form action="/authenticate" method="post">
        @csrf
        <input type="text" name="name" placeholder="user">
        <input type="password" name="password" placeholder="password">
        <button type="submit">submit</button>
    </form>
</div>
