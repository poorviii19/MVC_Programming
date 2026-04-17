<h1> All the blogs are here</h1>

@foreach($blog as $blg)
    <ul>
       <h1><B> Blog:</B></h1>
        <li>Title: {{$blg['Title']}}</li>
        <li>Author: {{$blg['Author']}}</li>
        <li>Content: {{$blg['Content']}}</li>
    </ul>
@endforeach
