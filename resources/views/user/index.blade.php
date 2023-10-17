<h1>User Page</h1>
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    @method('POST')
    <input type="text" name="name">
    <input type="text" name="username">
    <input type="text" name="password">
    <button type="submit">Save</button>
</form>
