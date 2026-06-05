<h1>hi! my name is {{$name}}</h1>
<h1>My age is {{$age}}</h1>

<!-- if condition -->
 @if($age>18)
    <p>Adult</p>
@else
    <p>Minor</p>
@endif