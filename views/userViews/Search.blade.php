@extends('layouts.UI')

@section('content')
    <div class="vizew-grid-posts-area mb-80 container">
        <div class=" row">
<div class="col-12 col-lg-9 col-md-12 mb-30">
                    <div class="archive-catagory-view mb-50 d-flex justify-content-end">
                        <!-- Catagory -->
                        
                        <div class="col-12 row justify-content-end">
                            <h4 class="token">{{$token}}</h4><i class="fas fa-search" aria-hidden="true"></i>
                        </div>
                        <!-- View Options -->

                    </div>
<ul class="nav nav-tabs searchnav flex-row-reverse justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" >
        <a class="nav-link active" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="true">أخبار</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">فيديوهات</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="Tags-tab" data-toggle="tab" href="#Tags" role="tab" aria-controls="Tags" aria-selected="false">#</a>
      </li>
</ul>
<div class="tab-content searchresults  col-12 " id="myTabContent">
  <div class="tab-pane  fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
         
                @foreach($sposts as $spost)        
                    <div class="single-post-area style-2">
                        <div class="row align-items-center flex-row-reverse">
                            <div class="col-12 col-md-6">
                               <a href="../ViewPost/{{$spost->id}}" class="post-title"> <div class="post-thumbnail" >
                                    <img style="width: 100%; height:12rem;" src="{{ asset('uploads') }}/post/{{ $spost->img }}" alt="">
                                    <span class="video-duration">{{$spost->created_at->toDateString()}}</span>
                                   
                                   </div>   </a>   
                            </div>
                            <div class="col-12 col-md-6">
                                 <div class="postContent container"> 
                                    <div class="row flex-row-reverse">  
                                      @foreach($spost->Tag as $tag)
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                      @endforeach
                                    </div>
                                    <div class="row flex-row-reverse">
                                        <a href="../ViewPost/{{$spost->id}}" class="post-title"><b>{{$spost->title}}</b></a>
                                    </div>     
                                  </div>  
                            </div>

                        </div>
                    </div>
               @endforeach
         <input type="hidden" class="c"  value="3"/>
        <div class="row justify-content-center">
         <button type="button" class="btn btn-primary col-6 morePosts">المزيد</button>
        </div>
  </div>
  <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
            @foreach($svideos as $svideo)        
                    <div class="single-post-area style-2">
                        <div class="row align-items-center flex-row-reverse">
                            <div class="col-12 col-md-6">
                               <a href="../ViewVideo/{{$svideo->id}}" class="post-title"> 
                                   <div class="post-thumbnail" >
                                    <img style="width: 100%; height:12rem;" src="{{ asset('uploads') }}/video/{{ $svideo->img }}" alt="">
                                       <i class="fas fa-2x fa-play"></i>
                                    <span class="video-duration">{{$svideo->created_at->toDateString()}}</span>
                                   
                                   </div>  
                                </a>   
                            </div>
                            <div class="col-12 col-md-6">
                                 <div class="postContent container"> 
                                    <div class="row flex-row-reverse">  
                                      @foreach($svideo->Tag as $tag)
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                      @endforeach
                                    </div>
                                    <div class="row flex-row-reverse">
                                        <a href="../ViewVideo/{{$svideo->id}}" class="post-title"><b>{{$svideo->title}}</b></a>
                                    </div>     
                                  </div>  
                            </div>
                        </div>
                    </div>
               @endforeach  
        <input type="hidden" class="c"  value="3"/>
        <div class="row justify-content-center">
         <button type="button" class="btn btn-primary col-6 moreVideos">المزيد</button>
        </div>
  </div>
  <div class="tab-pane fade justify-content-right" id="Tags" role="tabpanel" aria-labelledby="contact-tab">
     <div class="row justify-content-center flex-row-reverse stags">  
             @foreach($stags as $tag)
                    <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
             @endforeach
    </div>
  </div>
</div>
            </div>
<div class="col-12 col-lg-3 col-md-12">
            
                </div>
               
            
        </div>
    </div>
  @endsection