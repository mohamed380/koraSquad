@extends('layouts.app')

@section('content')


<div class="container admin-content" lang="ar">
    <section class="hero--area section-padding-80">
        
        <div class="row  justify-content-end">
            <div class="col-12">
                
                    <div class="CompNameOrder" style="text-align: right;">
                        <h3>{{$club->compName}}</h3>
                    </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">تعديل</th>
                          <th scope="col">مسح</th>
                          <th scope="col">نقاط</th>
                          <th scope="col">عليه</th>
                          <th scope="col">له</th>
                          <th scope="col">تعادل</th>
                          <th scope="col">هزيمه</th>
                          <th scope="col">فوز</th>
                          <th scope="col">خارج</th>
                          <th scope="col">داخل</th>
                          <th scope="col">لعب</th>
                       
                          <th scope="col" colspan="6">الفريق</th>
                          <th scope="col">الترتيب</th>
                        </tr>
                      </thead>
                      <tbody>
                          @php $i = 1; @endphp
                      @foreach($compOrder as $row)
                      <tr class="" id="{{$row->id}}">
                          <td><button type="submit" class="btn btn-success updateCompClub" >Update</button></td>
                          <td><button class="btn btn-danger deleteCompClub"  type="button">delete</button></td>
                          <td ><input type="text" name="points" value="{{$row->points}}"></td>
                          <td ><input type="text" name="outgoals" value="{{$row->ingoals}}"></td>
                          <td ><input type="text" name="ingoals" value="{{$row->outgoals}}"></td>
                          <td ><input type="text" name="draw" value="{{$row->draw}}"></td>
                          <td><input type="text" name="defeat" value="{{$row->defeat}}"></td>
                          <td><input type="text" name="win"  value="{{$row->win}}"></td>
                          <td><input type="text" name="out" value="{{$row->out}}"></td>
                          <td><input name="in" type="text" value="{{$row->in}}"></td>
                          <td><input name="played" type="text" value="{{$row->played}}"></td>
                          <td colspan="6">{{$row->Club->clubName}}</td>
                          <th scope="row">{{$i}}</th>
                        </tr>
                          @php $i++; @endphp
                      @endforeach
                      </tbody>
                    </table>
                </div>
    <div class="row compDetailsUpdate justify-content-center mb-30">
                <form action="{{route('updateCompLogo',$club->id)}}" enctype="multipart/form-data" method="post">
                      {{ csrf_field() }}
                    
                        <label ><h4>Choose New logo</h4></label>
                        <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" required>  
                                    <label class="custom-file-label"></label>
                                </div>
                        </div>
                   
                  <button name="submit" type="submit" class="btn btn-primary btn-lg" >Update logo</button>
                </form>
            <form action="{{route('UpdateCompName',$club->id)}}" enctype="multipart/form-data" method="post">
                      {{ csrf_field() }}
                <div class="form-group">
                    <label class=""><h4>Competition name</h4></label>
                    <input type="text" class="form-control" name="compName" value="{{$club->compName}}" required> 
                </div>
                
                <button name="submit" type="submit" class="btn btn-primary btn-lg" >Update Name</button>
            </form>
                
    </div>
            <div class="row col-12 justify-content-center">
                <form class="col-12 row justify-content-center" action="{{route('deleteComp',$club->id)}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger deleteCompetition col-4" id="{{$club->id}}">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </section>
</div>

@endsection