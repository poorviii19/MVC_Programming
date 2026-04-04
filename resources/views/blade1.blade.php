<h1>Understanding blade templates</h1>
<!-- //blade template -->
 <h3>{{$name}}</h3> 

 <!-- normal php template -->
  <h1><?php echo $name ?></h1>

  <h1>{{rand()}}</h1> <!--displays random mathematical integer values--> 

 <h1>{{print_r($users)}}</h1>
<h2>{{$users[0]}}</h2>


<!-- if else conditions: -->

    <div>
        @if($name == 'anil')
        <h2>this is anil</h2>
        @elseif($name == 'sam')
        <h2>this is sam</h2>
        @else
        <h2>other user</h2>
        @endif
    </div>

    <div>
        @for($i = 1; $i<=10; $i++)
        <h4>{{$i}}</h4>
        @endfor
    </div>

    <div>
    @foreach($users as $user)
        <h2>{{ $user }}</h2>
    @endforeach
</div>   