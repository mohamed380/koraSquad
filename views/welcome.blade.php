@if(Auth::guest() || !Auth::guest())

@extends('layouts.UI')

@section('content')
    <div class="fixedAd leftAd">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- leftFixedAd -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:120px;height:530px"
             data-ad-client="ca-pub-4008898419355748"
             data-ad-slot="4297779990"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class="fixedAd rightAd">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- rightFixedAd -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:120px;height:530px"
             data-ad-client="ca-pub-4008898419355748"
             data-ad-slot="8189757698"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
 <div class="container">
     <div id="tab-posts"></div>
  @include('userViews.MatchesNav',[$matches=$matches])
    <section class="hero--area mb-30" >
 
        <div class="row flex-row-reverse" >
            <div class="row no-gutters  col-md-8 col-lg-8 col-12 mb-10">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="tab-content" >
                        @php $count = 1 @endphp
                        @if(count($posts) > 7)
                            
                            @foreach(array_slice($posts,0,7) as $post)

                            <div class="tab-pane fade <?php if($count == 1) {echo 'show active';} ?>" id="post-{{$post->id}}" role="tabpanel" aria-labelledby="post-{{$post->id}}-tab">
                                <!-- Single Feature Post -->
                               <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">
                                   <div class="single-feature-post video-post bg-img" >
                                   <img style="width:100%;height:100%"  class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}">

                                    <div class="post-content">
                                        <div class="row flex-row-reverse">
                                        <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title">
                                            <pre dir="rtl">{{$post->title}}</pre>
                                        </a>
                                        </div>
                                        <div class="row flex-row-reverse">
                                        @foreach($post->Tag as $tag)

                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>

                                        @endforeach
                                        </div>
                                    </div>

                                    <!-- Video Duration -->
                                    <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                   </div>
                                </a>
                            </div>
                             @php $count++ @endphp
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <ul class="nav vizew-nav-tab" role="tablist" style="height:326px">
                        @php $count = 1 @endphp
                        @foreach(array_slice($posts,0,7) as $post)
                        <li class="nav-item col-12 WelcomeLi" onclick="window.location='#tab-posts';">
                            <a class="nav-link <?php if($count== 1) {echo 'active';} ?>" id="post-{{$post->id}}-tap" data-toggle="pill" href="#post-{{$post->id}}" role="tab" aria-controls="post-{{$post->id}}" aria-selected="<?php if($count== 1) {echo 'true';}else{echo 'false';} ?>">
                                <div class="single-blog-post style-2 d-flex align-items-center row">
                                    <div class="post-content col-6">
                                        <h6 class="post-title"><pre dir="rtl">{{$post->title}}</pre></h6>
                                    </div>
                                    <div class="post-thumbnail imgslid">
                                        <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </li>
                        @php $count++ @endphp
                        @endforeach
                    </ul>
                </div>
                
                    <ul class="row WelcomeBottomUl">
                        @php $count = 1 @endphp
                        @foreach(array_slice($posts,0,3) as $post)
                        <li class="col-4 ">
                           <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">
                                <div class="single-blog-post row justify-content-center">
                                    <div class="post-thumbnail">
                                        <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="" style="width:auto;">
                                    </div>
                                    <div class="post-content col-12">
                                        <h6 class="post-title"><pre dir="rtl">{{$post->title}}</pre></h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @php $count++ @endphp
                        @endforeach
                    </ul>
                
            </div>
            <div class="col-md-4 col-lg-4 col-12 welUlDiv">
                <h2 style="text-align: center;background: gray;margin-bottom: 0px;color: white;padding: 10px;">موضوعات هامه</h2>
                <ul class="welcUl">
                    @foreach(array_slice($posts,7,4) as $postli)
                       <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">
                        <li>
                            {{$postli->title}}
                        </li>
                       </a>
                    @endforeach
                <div class="row justify-content-center">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- welcUlAd -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:350px;height:90px;margin-top:5px;"
                     data-ad-client="ca-pub-4008898419355748"
                     data-ad-slot="3340061165"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                </div>
                </ul>
               
            </div>
        </div>
    </section>
      <div class="container mb-10 hide-ad">
          <div class="row justify-content-center">
         <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- mainVideosAd -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-4008898419355748"
             data-ad-slot="3534813929"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
     </div>
     </div>
    <div class="trending-posts-area margin-bottom container">
        
            <div class="row col-12 justify-content-center" style="margin:0px;">
                        <div class="section-heading style-2 col-12 col-lg-4 col-md-6 col-sm-12 row justify-content-center">
                            <h4>فيديوهات</h4>
                        </div>
            </div>
            
             <div class="row col-12 flex-row-reverse" style="margin:0px;">
                 <a href="/ViewViedo/{{$videos[0]->id}}" class="video-title">
                   <div class="col-12 col-lg-5 col-md-5 col-sm-12">
                             <div class="single-post-area videoTop">
                                <div class="post-thumbnail">
                                    <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/video/{{ $videos[0]->img }}" data-srcset="{{ asset('uploads') }}/video/{{ $videos[0]->img }}" alt="">
                                        <i class="fas fa-3x fa-play"></i>
                                    <span class="video-duration">{{$videos[0]->created_at->toDateString()}}</span>
                                </div>
                                <div class="postContent container"> 
                                    <div class="row flex-row-reverse">   
                                        @foreach($videos[0]->Tag as $tag)
                                            <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        @endforeach
                                    </div>
                                    <div class="row flex-row-reverse">
                                       <a href="/ViewViedo/{{$videos[0]->id}}" class="video-title">{{$videos[0]->title}}</a>
                                    </div>     
                                </div>
                            </div>
                   </div>
                 </a>
                   <div class="row col-12 col-lg-7 col-md-7 col-sm-12">
                       
                       @foreach(array_chunk(array_slice($videos,1),2) as $row)
                         <div class="col-12 row flex-row-reverse">
                           @foreach($row as $video)
                             <a href="/ViewViedo/{{$video->id}}">
                             <div class="single-post-area  col-6 videoTop">
                              
                                <div class="post-thumbnail">
                                    <img  class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/video/{{ $video->img }}" data-srcset="{{ asset('uploads') }}/video/{{ $video->img }}"  alt="" style="width: 18rem; height:7rem">
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
                                       <a href="/ViewViedo/{{$video->id}}" class="video-title">{{$video->title}}</a>
                                    </div>     
                                </div>
                                
                            </div>
                             </a>
                           @endforeach
                         </div>
                       @endforeach
                   </div>
                
              </div>
             <div class="row col-12 justify-content-center more-bnt-row">
                    <a href="/MoreVideos/{{$club->clubName}}"><button type="button" class="btn btn-secondary">المزيد</button></a>
                 </div>
             
         
    </div>
<div class=" container">
  <div class="row ndSecRow">
    <div class="col-lg-3 col-md-4 order-first left-remove">
                    <div class="sidebar-area">

            

                        <!-- ***** Single Widget ***** -->
                      <div class="single-widget latest-video-widget mb-30">
                            <div class="single-post-area mb-30 container">
                              <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" > <div class="post-thumbnail">
                                    <img   class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[14]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[14]->img }}" alt="">
                                    <span class="video-duration">{{$posts[14]->created_at->toDateString()}}</span>
                                  </div></a>
                              <div class="postContent container">
                                       
                                         <div class="row flex-row-reverse">  
                                            
                                        @foreach($posts[14]->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                            <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title">
                                                <pre dir="rtl">{{$posts[14]->title}}</pre>
                                            </a>
                                        </div>
                                          
                                </div>
                            </div>
                        </div>

                        <!-- ***** ads ***** -->
                         
                        <div class="row justify-content-center mb-30">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- mainLeft1 -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:247px;height:300px"
                                 data-ad-client="ca-pub-4008898419355748"
                                 data-ad-slot="1656957175"></ins>
                            <script>
                                 (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
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
                               <a href="/ViewPost/{{$posts[15]->id}}/{{$club->clubName}}"> <div class="post-thumbnail">
                                    <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[15]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[15]->img }}" alt="">
                                    <span class="video-duration">{{$posts[15]->created_at->toDateString()}}</span>
                                   </div></a>
                                          <div class="postContent container">
                                       
                                         <div class="row flex-row-reverse">  
                                            
                                        @foreach($posts[15]->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                          
                                         <a href="/ViewPost/{{$posts[15]->id}}/{{$club->clubName}}" class="post-title"><pre dir="rtl">{{$posts[15]->title}}</pre>
                                            </a>
                                        </div>
                                          
                                </div>
                            </div>
                        </div>


                        <div class="single-post-area mb-30">
                            <div class="single-post-area mb-30 container">
                                <a href="/ViewPost/{{$posts[16]->id}}/{{$club->clubName}}">
                                <div class="post-thumbnail">
                                    <img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[16]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[16]->img }}"  alt="">
                                    <span class="video-duration">{{$posts[14]->created_at->toDateString()}}</span>
                                    </div></a>
                                          <div class="postContent container">
                                       
                                         <div class="row flex-row-reverse">  
                                            
                                        @foreach($posts[16]->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                          
                                         <a href="/ViewPost/{{$posts[16]->id}}/{{$club->clubName}}" class="post-title"><pre dir="rtl">{{$posts[16]->title}}</pre>
                                            </a>
                                        </div>
                                          
                                </div>
                            </div>
                        </div>
                 </div>
                    </div>
    </div>
    <section class="vizew-post-area mb-50 col-12 col-lg-6 col-md-8 ">
        <div class="container">
                <div class="col-12">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4 style="text-align: center;">الاخبار</h4>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                           @php $sposts = array_slice($posts,8,2); @endphp
                           @foreach( $sposts as $post)
                            <div class="single-feature-post video-post bg-img" >
                                <img style="width:100%;height:100%;" class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}">
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="row flex-row-reverse">
                                    @foreach($post->Tag as $tag)
                                    
                                    <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                   
                                    @endforeach
                                    </div>
                                    <div class="row flex-row-reverse">
                                        <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title">
                                            <b><pre dir="rtl">{{$post->title}}</pre></b></a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                            </div>
                            @endforeach
                        </div>
            
                        <!-- need here 2 rows each with 2 posts-->
                        
                       
                        <div class="row flex-row-reverse style-2 WelcNewsDiv"> 
                        @php $i = 10; @endphp
                        @foreach(array_slice($posts,$i,4) as $post)
                           
                        <div class="single-post-area style-2">
                            <div class="row align-items-center flex-row-reverse">
                                <div class="col-12 col-md-6">
                                   <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}"> <div class="post-thumbnail">
                                                <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                                <!-- Video Duration -->
                                                <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                       </div>   </a>   
                                </div>
                                <div class="col-12 col-md-6">
                                     <div class="postContent container">
                                           <div class="row flex-row-reverse">  
                                              @foreach($post->Tag as $tag)
                                                <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                              @endforeach
                                            </div>
                                            <div class="row flex-row-reverse">
                                             <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title"><b><pre dir="rtl">{{$post->title}}</pre></b></a>
                                            </div> 
                                      </div>  
                                </div>

                            </div>
                         </div>
                         @php $i = $i + 2; if($i == 18) break; @endphp
                            @endforeach
                    </div> 
                    </div> 
     <div class="row col-12 justify-content-center more-bnt-row">
                    <a class="col-12" href="/More/{{$club->clubName}}"><button type="button" class="btn btn-primary col-12">المزيد</button></a>
                 </div>
        </div>
    </section>
    <div class="col-lg-3  right-remove">
                   
             <div class="ad mb-30">
                       <script data-cfasync="false" type="text/javascript" src="http://www.predictivdisplay.com/a/display.php?r=2604431"></script>

            </div>
    </div>
  </div>
</div>
     </div>
@endsection

@endif