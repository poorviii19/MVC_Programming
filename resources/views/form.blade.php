<form action = "/resource/5" method = "post">
    @csrf
    <!-- @method('DELETE') -->
    @method('DELETE')
    <br>
    <br>
    User Name: <input type = "text" name = "uname" required>
    <br>
    <br>
    Email: <input type = "email" name = "email" required>
    <br>
    <br>
    Password: <input type = "password" name = "password" required>
    <br>
    <br>
    <button>Submit</button>
</form>
@error('uname')
<p>{{ $message }}</p>
@enderror

@if($errors->any())
    <div>
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
