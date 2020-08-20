@extends('layouts.app')
@section('content')
    <div class="container">
         <div class="col-md-12 col-lg-12 col-md-offset-3 col-lg-offset-3">
        
    <div class="panel panel-primary" id="posts" >
           
       <h2 class="panel-heading" style="text-align:center;"> Here is all posts </h2>
        <div class="panel-body" > 
 <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">date</th>
      <th scope="col">Rank</th>
      <th scope="col">Tags</th>
      <th scope="col">update</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
            <?php $i = 1?>
            @foreach ($posts as $post)
                    <tr id="{{$post->id}}">
                                  <th scope="row"><?php echo($i) ?></th>
                                  <td><a href="/ViewPost/{{ $post->id }}" >{{$post->title}} </a></td>
                                  <td>{{$post->created_at}}</td>
                                  <td>{{$post->rank}}</td>
                                  <td>
                                     <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            tags
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            @foreach ($post->Tag as $tag)
                                              
                                              <button class="dropdown-item" type="button" style="text-align: right;">{{$tag->tagName}}</button>
                                              
                                            @endforeach
                                          </div>
                                    </div>
                                  </td>
                                  <td>
                                    <button class="btn btn-primary"  type="submit">
                                        <a style="color:white;text-decoration:none;"
                                           href="/editPostView/{{$post->id}}">Update
                                        </a>
                                    </button>
                                 </td>
                                <td>
                                   <button class="btn btn-danger deletePost"  type="submit">delete</button>
                                </td>
                    </tr>
                <!--{{$i = $i+1}}-->   
            @endforeach
    </tbody>

</table>    
        </div>
    </div>

</div>
    </div>
@endsection