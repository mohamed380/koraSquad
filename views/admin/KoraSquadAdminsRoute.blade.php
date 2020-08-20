
@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-12 col-lg-12 col-md-offset-3 col-lg-offset-3">
<div class="jumbotron" >
            <h1 id="addtag" style="text-align:center; color:cornflowerblue"><b>Add Tag </b></h1>
            <hr style="width:50%">
        <div class="row" >
        <div class="col-2"></div>
            <form action="{{ route('uplaodTag') }}" method="POST" enctype="multipart/form-data" class="AddPostForm col-8">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" name="tagName" type="text" placeholder="#" required></input>
                </div>


                <div class="card-columns"></div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Tag</button>
                <input type="hidden" name="id"/>

            </form>
        </div>
                <h1 id="AddClubComp" style="text-align:center; color:cornflowerblue"><b>Add Club To Competition</b></h1>
            <hr style="width:50%">
        <div class="row" >
        <div class="col-2"></div>
            <form action="{{ route('AddClubToComp') }}" method="POST" enctype="multipart/form-data" class="AddPostForm col-8">
                {{ csrf_field() }}
                 <div class="input-group" style="font-size: 23px;">
                    <select name='comp' class="custom-select custom-select-sm">
                        <option disabled selected value>  select Competiton </option>
                        @foreach($competition as $comp)
                            <option value="{{$comp->id}}">{{$comp->compName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group" style="font-size: 23px;">
                    <select name='club' class="custom-select custom-select-sm">
                    <option disabled selected value>  select Club  </option>
                        @foreach($clubs as $club)
                            <option value="{{$club->id}}">{{$club->clubName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-columns"></div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Club</button>
            </form>
        </div>
               <h1 style="text-align:center; color:cornflowerblue"><b>Update Competition</b></h1>
            <hr style="width:50%">
        <div class="row" id="UpdateComp">
        <div class="col-2"></div>
            <form action="{{ route('CompetationUpdateView') }}" method="get" enctype="multipart/form-data" class="AddPostForm col-8">
                {{ csrf_field() }}
                <div class="input-group" style="font-size: 23px;">
                    <select name='comp' class="custom-select custom-select-sm">
                        <option disabled selected value>  select Competition  </option>
                        @foreach($competition as $comp)
                            <option value="{{$comp->id}}">{{$comp->compName}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="card-columns"></div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">Start</button>
                <input type="hidden" name="id"/>

            </form>
        </div>
            <hr style="width:50%">
                  <h1 style="text-align:center; color:cornflowerblue"><b>Update Club</b></h1>
            <hr style="width:50%">
        <div class="row">
        <div class="col-2"></div>
            <form id="updateclub" action="{{ route('UpdateClubView') }}" method="get" enctype="multipart/form-data" class="AddPostForm col-8 justify-content-center row">
                {{ csrf_field() }}
                <div class="input-group">
                    <input class="col-12" type="text" placeholder="الاهلي" name="clubName" required/>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">search</button>
            </form>
        </div>
            <hr style="width:50%">
            <h1 style="text-align:center; color:cornflowerblue"><b>Add Post </b></h1>
            <hr style="width:50%">
        <div class="row" id="addpost">
        <div class="col-2"></div>
        <form action="{{ route('uplaodpost') }}" method="POST" enctype="multipart/form-data" class="AddPostForm col-8">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea  dir="rtl" class="form-control" name="content" rows="3" placeholder="المحتوى" required></textarea>
            </div>
            <div class="form-group">
                   <input dir="rtl" type="text" class="form-control" name="title" placeholder="العنوان" required> 
            </div>
            
            <div class="input-group">
                <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" required>
                        <label class="custom-file-label"></label> 
                </div>
            </div>
            <br>
            <div class="form-group  row  col-md-12 col-sm-12 " style="font-size: 23px;">
               <div class="row col-12 TagsField original" style="margin-top: 5px;margin-bottom: 5px;">
                    <select name='tag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value>  select tag  </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                    <select name='tag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value>  select tag  </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                    <select name='tag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value>  select tag  </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-outline-success AddTag" id="">More</button>
                </div>
            </div>
                    
            <div class="card-columns"></div>
            <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Post</button>
            <input type="hidden" value="{{Auth::user()->id}}" name="id"/>
            
        </form>
        </div>
        <hr style="width:50%">
            <h1 style="text-align:center; color:cornflowerblue"><b>Add Video</b></h1>
            <hr style="width:50%">
    <div class="row" id="addvideo">
        <div class="col-2"></div>
        <form action="{{ route('UploadVideo') }}" method="POST" enctype="multipart/form-data" class="AddPostForm col-8">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" name="frame" rows="3" placeholder="embed code" required></textarea>
            </div>
                <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" required>
                        <label class="custom-file-label"></label> 
                </div>
            <div class="form-group">
                   <input type="text" class="form-control" name="title" placeholder="العنوان" required> 
            </div>
            <div class="form-group  row  col-md-12 col-sm-12 ">
               <div class="row col-12 TagsField original" style="margin-top: 5px;margin-bottom: 5px;font-size: 23px;">
                    <select name='tag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value> select tag </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                    <select name='tag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value>  select tag  </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                    <select name='tag[]' class="custom-select custom-select-sm col-4">
                        <option disabled selected value> select tag </option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tagName}}</option>
                                @endforeach
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-outline-success AddTag" id="">More</button>
                </div>
            </div>
            <div class="card-columns"></div>
            <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Video</button>
            <input type="hidden" value="{{Auth::user()->id}}" name="id"/>
            
        </form>
        </div>
    <hr style="width:50%">
        <h1 style="text-align:center; color:cornflowerblue"><b>Add Club </b></h1>
            <hr style="width:50%">
        <div class="row" id="addclub">
            <div class="col-2"></div>
            <form action="{{ route('AddClub') }}" method="POST" enctype="multipart/form-data" class="col-8">
                {{ csrf_field() }}
                <div class="form-group">

                </div>
                <div class="form-group">
                       <input type="text" class="form-control" name="clubName" placeholder="Club name" required> 
                </div>

                <div class="input-group">
                    <div class="custom-file">
                            <input type="file" class="custom-file-input" name="background" >
                            <label class="custom-file-label">background</label> 
                    </div>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                            <input type="file" class="custom-file-input" name="bar" >
                            <label class="custom-file-label">bar</label> 
                    </div>
                </div>
                   <div class="input-group">
                    <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo" required>
                            <label class="custom-file-label">logo</label> 
                    </div>
                </div>
                <br>

                <div class="card-columns"></div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Club</button>
            </form>
        </div>
    <hr style="width:50%">
     <h1 style="text-align:center; color:cornflowerblue"><b>Add Competition </b></h1>
            <hr style="width:50%">
        <div class="row" id="addcomp">
            <div class="col-2"></div>
            <form action="{{ route('AddComp') }}" method="POST" enctype="multipart/form-data" class="col-8">
                {{ csrf_field() }}
                <div class="form-group">

                </div>
                <div class="form-group">
                       <input type="text" class="form-control" name="compName" placeholder="Competition name" required> 
                </div>

                <div class="input-group">
                    <div class="custom-file">
                            <input type="file" class="custom-file-input" name="background" >
                            <label class="custom-file-label">background</label> 
                    </div>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                            <input type="file" class="custom-file-input" name="bar" >
                            <label class="custom-file-label">bar</label> 
                    </div>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo" required>
                            <label class="custom-file-label">logo</label> 
                    </div>
                </div>
                <br>

                <div class="card-columns"></div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Competition</button>
            </form>
        </div>
    <hr style="width:50%">
    <h1 style="text-align:center; color:cornflowerblue"><b>Add Match </b></h1>
            <hr style="width:50%">
        <div class="row" id="addmatch">
            <div class="col-2"></div>
            <form action="{{ route('AddMatch') }}" method="POST" enctype="multipart/form-data" class="col-8">
                {{ csrf_field() }}
                <div class="form-group">
                       <input type="text" class="form-control" name="status" placeholder="status" required> 
                </div>
                <div class="form-group">
                       <input type="text" class="form-control" name="location" placeholder="stadium" required> 
                </div>
                <div class="form-group">
                       <input type="text" class="form-control" name="FCG" value="0" >
                       <input type="text" class="form-control" name="SCG" value="0" >
                </div>
                <div class="form-group">
                       <input type="date" class="form-control" name="date" placeholder="" required> 
                </div>
                
                <div class="form-group">
                       <input type="time" class="form-control" name="time" placeholder="" required> 
                </div>
                <div class="input-group" style="font-size: 23px;">
                    <select name='comp' class="custom-select custom-select-sm matchComp" >
                    <option disabled selected value>  select Competition  </option>
                        @foreach($competition as $comp)
                            <option value="{{$comp->id}}">{{$comp->compName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group" style="font-size: 23px;">
                    <select name='fc' class="custom-select custom-select-sm fct">
                        <option disabled selected value>  select 1st club  </option>
                        
                    </select>
                </div>
            <div class="input-group" style="font-size: 23px;">
                    <select name='sc' class="custom-select custom-select-sm sct">
                    <option disabled selected value>  select 2nd club  </option>
                        
                    </select>
                </div>
            
                <br>

                <div class="card-columns"></div>
                <button name="submit" type="submit" class="btn btn-primary btn-lg">Add Match</button>
            </form>
        </div>
</div>
</div>


</div>
@endsection
