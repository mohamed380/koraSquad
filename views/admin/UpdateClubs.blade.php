@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 style="text-align:center; color:cornflowerblue"><b>Edit club</b></h1>
        <hr style="width:50%">
    <form action="{{ route('UpdateClub',$club->id) }}" method="POST" enctype="multipart/form-data" class="UpdateForm">
        {{ csrf_field() }}
        <!-- Laravel used method put/patch in update function, so it'll ignore post method above -->
        
        <div class="row">
                        <div class="row col-md-6">
                            <img style="width:100%" src="{{ asset('core') }}/backgrounds/{{ $club->background }}" alt="club background">
                        </div>
                <div class="col-6">
                    <label><h3>Choose New background</h3></label>
                    <div class="input-group col-">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="background" >
                                <label class="custom-file-label"></label>
                            </div>
                    </div>
                </div>
            </div>
        <div class="row">
                       
                        <div class="row col-md-6">
                            <img style="width:100%" src="{{ asset('core') }}/bars/{{ $club->bar }}" alt="club bar">
                        </div>
            <div class="col-6">
                    <label ><h3>Choose New bar</h3></label>
                    <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="bar" >
                                <label class="custom-file-label"></label>
                            </div>
                    </div>
            </div>
            </div>
        <div class="row">
                        
                        <div class="row col-md-6">
                            <img style="width:10%" src="{{ asset('core') }}/logos/{{ $club->logo }}" alt="club logo">
                        </div>
                    <div class="col-6">
                    <label ><h3>Choose New logo</h3></label>
                    <div class="input-group col-12">
                            <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" >
                                    <label class="custom-file-label"></label> 
                            </div>
                    </div>
            </div>
            </div>
        <div class="form-group">
            <label class=""><h4>club name</h4></label>
            <input type="text" class="form-control" name="name" value="{{$club->clubName}}" required> 
        </div>
         
        <button name="submit" type="submit" class="btn btn-primary btn-lg " >Edit club</button>
    </form>
    </div>
</div>
@endsection