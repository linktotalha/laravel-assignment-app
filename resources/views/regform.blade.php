<form action="{{url('regform')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="text" name="password">
    <input type="submit" value="ok">
</form>