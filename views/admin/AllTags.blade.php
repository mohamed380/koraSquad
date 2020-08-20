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
      
      
      <th scope="col">update</th>
      <th scope="col">delete</th>
    <th scope="col">name</th>
    <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
            <?php $i = 1?>
            @foreach ($tags as $tag)
                    <tr id="{{$tag->id}}">  
                                <td>
                                   <button class="btn btn-danger updateTag"  type="submit">update</button>
                                </td>
                                <td>
                                   <button class="btn btn-danger deleteWholeTag"  type="submit">delete</button>
                                </td>
                        <td><input type="text" value="{{$tag->tagName}}" name="tagName"/></td>
                        <th scope="row"><?php echo($i) ?></th>
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