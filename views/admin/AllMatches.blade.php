@extends('layouts.app')

@section('content')


<div class="container admin-content" lang="ar">
    <section class="hero--area section-padding-80 ">
        
        <div class="row  ">
            <div class="col-12">
                     <div class="CompNameOrder" style="text-align: right;">
                         
                            @if($Comp == null)
                             
                                <h3>جميع البطولات</h3>
                             @else
                                    <h3>{{$Comp->compName}}</h3>
                                  
                            @endif
                        
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                البطولات
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              @foreach($comps as $comp)
                               <a class="dropdown-item" href="/UpdateMatchView/{{$comp->id}}">{{$comp->compName}}</a>
                              @endforeach
                          </div>
                        </div>
                    </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">تعديل</th>
                          <th scope="col">مسح</th>
                          <th scope="col">المكان</th>
                          <th scope="col">التريخ</th>
                          <th scope="col">الوقت</th>
                          <th scope="col">الحاله</th>
                          <th scope="col">اهداف الثاني</th>  
                          <th scope="col">الفريق الثاني</th>
                          <th scope="col">اهداف الاول</th>
                          <th scope="col">الفريق الاول</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($matches as $match)
                          <tr class="" id="{{$match->id}}">
                                  <td><button type="submit" class="btn btn-success UpdateMatch" >Update</button></td>
                                  <td><button type="button" class="btn btn-danger deleteMatch" >Delete</button></td>
                                  <td ><input type="text" name="location" value="{{$match->location}}"></td>
                                  <td ><input type="text" name="date" value="{{$match->date}}"></td>
                                  <td ><input type="text" name="time" value="{{$match->time}}"></td>
                                  <td ><input type="text" name="status" value="{{$match->status}}"></td>
                                  <td ><input type="text" name="SCG" value="{{$match->SCGoals}}"></td>
                                   <td >{{$match->SC->clubName}}</td>
                                   <td ><input type="text" name="FCG" value="{{$match->FCGoals}}"></td>
                                   <td >{{$match->FC->clubName}}</td>
                            </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection