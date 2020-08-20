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
      @include('userViews.MatchesNav',[$matches=$matches])
      @include('userViews.MainWelcomeDiv',[$posts=$posts])
    <div class="trending-posts-area margin-bottom container">
        
            <div class="row col-12 justify-content-center" style="margin:0px;">
                        <div class="section-heading style-2 col-12 col-lg-4 col-md-6 col-sm-12 row justify-content-center">
                            <h4>فيديوهات</h4>
                        </div>
            </div>
            
             <div class="row col-12 flex-row-reverse" style="margin:0px;">
                 <div class="col-12 col-md-7 col-lg-7">
                            <div class="main-big">                               
                                   <div class="single-feature-post video-post bg-img" >
                                    <a href="/ViewViedo/{{$videos[0]->id}}">
                                        <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/video/{{ $videos[0]->img }}" data-srcset="{{ asset('uploads') }}/video/{{ $videos[0]->img }}" alt="" style="width:100%;height:100%">
                                     </a>

                                    <div class="post-content">
                                        <div class="row flex-row-reverse">
                                        <a href="/ViewViedo/{{$videos[0]->id}}" class="post-title">
                                            <pre dir="rtl">{{$videos[0]->title}}</pre>
                                        </a>
                                        </div>
                                        <div class="row flex-row-reverse">
                                        @foreach($videos[0]->Tag as $tag)
                                            <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        @endforeach
                                        </div>
                                    </div>

                                    <!-- Video Duration -->
                                    <span class="video-duration">{{$videos[0]->created_at->toDateString()}}</span>
                                   </div>
                            </div>     
                </div>
                 <div class="col-12 col-md-5 col-lg-5 main-4sm">
                            @php $count = 1 @endphp
                            @foreach(array_chunk(array_slice($videos,1),2) as $row)
                            <div class="row flex-row-reverse container col-12 main-4bsm">
                                @foreach($row as $video)
                                <div class="col-6">
                                        <div class="single-feature-post video-post bg-img">
                                            <div class="post-thumbnail imgslid">
                                                <a href="/ViewViedo/{{$video->id}}">
                                                <img  class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/video/{{ $video->img }}" data-srcset="{{ asset('uploads') }}/video/{{ $video->img }}"  alt="" >
                                                </a>
                                            </div>
                                             <div class="post-content">
                                                <h6 class="post-title"><pre dir="rtl">{{$video->title}}</pre></h6>
                                            </div>
                                        </div>

                                </div>
                                @endforeach
                            </div>
                            @php $count++ @endphp
                            @endforeach
                  </div>
              </div>
             <div class="row col-12 justify-content-center more-bnt-row">
                    <a href="/MoreVideos/{{$club->clubName}}"><button type="button" class="btn btn-secondary">المزيد</button></a>
                 </div>
             
         
    </div>
<div class=" container">
  <div class="row ndSecRow">
    <div class="col-lg-4 col-md-4 order-first left-remove">
                    <div class="sidebar-area">
                          <!-- ***** ads ***** -->
                          <div class="row justify-content-center mb-10">
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
                               <a href="/ViewPost/{{$posts[18]->id}}/{{$club->clubName}}"> 
                                   <div class="post-thumbnail">
                                    <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[18]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[18]->img }}" alt="">
                                    <span class="video-duration">{{$posts[18]->created_at->toDateString()}}</span>
                                   </div>
                                </a>
                                <div class="postContent container">
                                    <div class="row flex-row-reverse">  
                                       @foreach($posts[18]->Tag as $tag)
                                         <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                       @endforeach
                                    </div>
                                    <div class="row flex-row-reverse">
                                      <a href="/ViewPost/{{$posts[18]->id}}/{{$club->clubName}}" class="post-title">
                                          <pre dir="rtl">{{$posts[18]->title}}</pre>
                                      </a>
                                    </div>      
                                </div>
                            </div>
                        </div>


                        <div class="single-post-area mb-30">
                            <div class="single-post-area mb-30 container">
                                <a href="/ViewPost/{{$posts[19]->id}}/{{$club->clubName}}">
                                    <div class="post-thumbnail">
                                        <img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[19]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[19]->img }}"  alt="">
                                        <span class="video-duration">{{$posts[19]->created_at->toDateString()}}</span>
                                    </div>
                                </a>
                                <div class="postContent container">
                                   <div class="row flex-row-reverse">    
                                      @foreach($posts[19]->Tag as $tag)
                                         <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                      @endforeach
                                   </div>
                                   <div class="row flex-row-reverse">
                                      <a href="/ViewPost/{{$posts[19]->id}}/{{$club->clubName}}" class="post-title">            <pre dir="rtl">{{$posts[19]->title}}</pre>
                                      </a>
                                   </div>      
                                </div>
                            </div>
                        </div>
                 </div>
                    </div>
    </div>
    <section class="vizew-post-area mb-50 col-12 col-lg-8 col-md-8 ">
                <div class="col-12 container">
                    <div class="all-posts-area">
                        <div class="section-heading style-2">
                            <h4 style="text-align: right;">الاخبار</h4>
                        </div>
                        <div class="featured-post-slides owl-carousel mb-30 ">
                           @php $sposts = array_slice($posts,19,2); @endphp
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
                                <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="row flex-row-reverse style-2 WelcNewsDiv"> 
                            @php $i = 21; @endphp
                            @foreach(array_slice($posts,$i,16) as $post)
                            <div class="single-post-area style-2 col-12 col-lg-6 col-md-12 col-sm-12">
                                <div class="row align-items-center flex-row-reverse">
                                    <div class="col-6 PostImgDiv">
                                       <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}"> 
                                           <div class="post-thumbnail">
                                             <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                              <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                           </div>   
                                        </a>   
                                    </div>
                                    <div class="col-6 PostcontentDiv">
                                         <div class="postContent container">
                                               <div class="row flex-row-reverse  hide-tags">  
                                                  @foreach($post->Tag->take(3) as $tag)
                                                    <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                                  @endforeach
                                                </div>
                                                <div class="row flex-row-reverse">
                                                 <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title">
                                                     <b><pre dir="rtl">{{$post->title}}</pre></b>
                                                 </a>
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
                    <a class="col-12" href="/More/{{$club->clubName}}"><button type="button" class="btn btn-primary col-12">المزيد</button>
                    </a>
                 </div>
                </div>
    </section>
  </div>
</div>
@endsection

@endif