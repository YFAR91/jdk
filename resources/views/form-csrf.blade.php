<form action="{{route('details')}}" method="POST" >
    @csrf
    <label>Email address</label>
    <input name="email" type="email">
    <label>Password</label>
    <input type="password" name="password" >
    <button type="submit">Submit</button>
    </form>
