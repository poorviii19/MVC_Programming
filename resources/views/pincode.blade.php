<form action="/submit-pincode" method="POST">
    @csrf

    <label>Pincode:</label>
    <input type="text" name="pincode" value="{{ old('pincode') }}">

    <button type="submit">Submit</button>
</form>

@error('pincode')
    <p style="color:red;">{{ $message }}</p>
@enderror

@if($errors->any())
    <div>
        @foreach($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
    </div>
@endif