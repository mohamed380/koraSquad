
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 style="text-align:center; color:cornflowerblue"><b>Edit Post</b></h1>
        <hr style="width:50%">
    <form action="{{ route('update',[$post->id]) }}" method="POST" enctype="multipart/form-data" class="UpdateForm">
        {{ csrf_field() }}
        <!-- Laravel used method put/patch in update function, so it'll ignore post method above -->
        <input type="hidden" name="_method" value="put">
        <label ><h4>Post Image</h4></label>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="row col-md-8">
                <img style="width:100%" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="Post Img">
            </div>
            <div class="col-md-2"></div>
        </div>
        <br><br>
        <label ><h3>Choose New Photo</h3></label>
        <div class="input-group">
                <div class="custom-file col-4">
                <input type="file" class="custom-file-input" name="image" >
                        <label class="custom-file-label"></label> 
                </div>
        </div>
        <br><br>
        <div class="form-group">
            <label class="Right"><h4>العنوان</h4></label>
            <input dir="rtl" type="text" class="form-control" name="title" value="{{$post->title}}" required> 
        </div>
        <div class="form-group">
        <label dir="rtl" class="Right"><h4>المحتوى</h4></label>
        <textarea type="text" class="form-control"  name="content" required>{{$post->content}}</textarea>
        </div>
        <div class="row tagSettingSection justify-content-end">
            <!--{{$k = 1}} -->
            @foreach($post->Tag as $tag)
                  <div class="dropdown dropleft">
                      <input name="tag[{{$k}}]" value="{{$tag->id}}" type="hidden">
                      <input name="" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="{{$tag->tagName}}"/>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                       <button class="dropdown-item deleteTag" type="button">Delete</button>
                      </div>
                  </div>
            <!--{{$k++}}-->
            @endforeach
        </div>
             <div class="form-group  row  col-md-12 col-sm-12 ">
               <div class="row col-12 TagsField original" style="margin-top: 5px;margin-bottom: 5px;">
                    <select name='newtag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value> -- select tag -- </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                    <select name='newtag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value> -- select tag -- </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                    <select name='newtag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value> -- select tag -- </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-outline-success AddTag" id="">More</button>
                </div>
            </div>
            <div class="form-group col-4">
             <label><h4>Rank</h4></label>
            <input type="number" class="form-control" name="rank" value="{{$post->rank}}" required> 
                
            </div>
         
        <button name="submit" type="submit" class="btn btn-primary btn-lg ">Edit Post</button>
    </form>
    </div>
</div>

@endsection
