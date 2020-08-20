@extends('layouts.UI')

@section('content')
    @if($comp->compName != null)
        @include('userViews.navPartial',[$Comp=$comp]);
    @endif

<section class="trending-posts-area margin-bottom">
        <div class="container">
               <div class="section-heading">
                     <h4>فيديوهات</h4>
               </div>
               <div class="container">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7 col-lg-8">

                            <div class="tab-content">
                                @php $count = 1 @endphp
                                @foreach(array_slice($videos,0,4) as $video)

                                <div class="tab-pane fade <?php if($count == 1) {echo 'show active';} ?>" id="video-{{$video->id}}" role="tabpanel" aria-labelledby="video-{{$video->id}}-tab">
                                    <!-- Single Feature Post -->
                                    <div class="single-feature-post video-post bg-img">
                                        <!-- Play Button -->
                                                <iframe width="100%" height="100%" src="{{$video->frame}}?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allow="accelerometer;" allowfullscreen></iframe>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-title">{{$video->title}}</a>
                                            <br/>
                                            <br/>
                                            @foreach($video->Tag as $tag)

                                            <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>

                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                 @php $count++ @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4">
                            <ul class="nav vizew-nav-tab" role="tablist">
                                @php $count = 1 @endphp
                                @foreach($videos as $video)
                                     @if($count == 5)
                                      @break;
                                     @endif 
                                <li class="nav-item col-12">
                                    <a class="nav-link <?php if($count== 1) {echo 'active';} ?>" id="video-{{$video->id}}-tap" data-toggle="pill" href="#video-{{$video->id}}" role="tab" aria-controls="video-{{$video->id}}" aria-selected="<?php if($count== 1) {echo 'true';}else{echo 'false';} ?>">
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post style-2 d-flex align-items-center row">
                                            <div class="post-content col-6">
                                                <h6 class="post-title">{{$video->title}}</h6>
                                            </div>
                                            <div class="post-thumbnail imgslid">
                                                <img src="{{ asset('uploads') }}/video/{{ $video->img }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @php $count++ @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
              </div>
         </div>
    </section>
<div class=" margin-bottom  container">
    <div class="row">
  <div class="col-lg-3 col-md-4 order-first left-remove">
                    <div class="sidebar-area">
                   
                      <div class="single-widget latest-video-widget mb-50">
                            <div class="single-post-area mb-30 container">
                                <div class="post-thumbnail">
                                    <img src="{{ asset('uploads') }}/post/{{ $posts[14]->img }}" alt="">
                                    <span class="video-duration">{{$posts[14]->created_at->toDateString()}}</span>
                                </div>
                              <div class="postContent container">
                                       
                                         <div class="row flex-row-reverse">  
                                            
                                        @foreach($posts[14]->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                          
                                         <a href="../ViewPost/{{$posts[14]->id}}" class="post-title">{{$posts[14]->title}}</a>
                                        </div>
                                          
                                </div>
                            </div>
                        </div>

                        <!-- ***** ads ***** -->
                   
                    <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>موضوعات هامة</h4>
                               <hr/>
                            </div>
                        <div class="single-post-area mb-30">
                            <div class="single-post-area mb-30 container">
                                <div class="post-thumbnail">
                                    <img src="{{ asset('uploads') }}/post/{{ $posts[15]->img }}" alt="">
                                    <span class="video-duration">{{$posts[15]->created_at->toDateString()}}</span>
                                </div>
                                          <div class="postContent container">
                                       
                                         <div class="row flex-row-reverse">  
                                            
                                        @foreach($posts[15]->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                          
                                         <a href="../ViewPost/{{$posts[15]->id}}" class="post-title">{{$posts[15]->title}}</a>
                                        </div>
                                          
                                </div>
                            </div>
                        </div>


                        <div class="single-post-area mb-30">
                            <div class="single-post-area mb-30 container">
                                <div class="post-thumbnail">
                                    <img src="{{ asset('uploads') }}/post/{{ $posts[16]->img }}" alt="">
                                    <span class="video-duration">{{$posts[16]->created_at->toDateString()}}</span>
                                </div>
                                          <div class="postContent container">
                                       
                                         <div class="row flex-row-reverse">  
                                            
                                        @foreach($posts[16]->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                          
                                         <a href="../ViewPost/{{$posts[16]->id}}" class="post-title">{{$posts[16]->title}}</a>
                                        </div>
                                          
                                </div>
                            </div>
                        </div>
                 </div>
                    </div>
    </div>
<div class="container col-9">
                @php $i = 0; @endphp
                        @foreach(array_chunk(array_slice($videos,4,4),2) as $row)
                        <div class="row flex-row-reverse"> 
                               <div class="col-12 row flex-row-reverse">
                               @foreach($row as $video)
                                 <a href="../ViewViedo/{{$video->id}}">
                                 <div class="single-post-area  col-6 videoTop">

                                    <div class="post-thumbnail">
                                        <img  src="{{ asset('uploads') }}/video/{{ $video->img }}" alt="">
                                        <i class="fas fa-2x fa-play"></i>
                                        <span class="video-duration">{{$video->created_at->toDateString()}}</span>
                                    </div>
                                    <div class="postContent container"> 
                                        <div class="row flex-row-reverse">   
                                            @foreach($video->Tag as $tag)
                                                <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                            @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                           <a href="../ViewViedo/{{$video->id}}" class="video-title">{{$video->title}}</a>
                                        </div>     
                                    </div>

                                </div>
                                 </a>
                               @endforeach
                             </div>
                            @php $i = $i + 2; if($i > 4) break; @endphp
                        </div>
                        @endforeach
</div>
        </div>
</div>
@endsection