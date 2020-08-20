    <section class="hero--area mb-10 containera" >
 
        <div class="row flex-row-reverse mb-10" >
            <div class="row flex-row-reverse no-gutters  col-md-9 col-lg-9 col-12 mb-10">
                <div class="col-12 col-md-7 col-lg-7">
                            <div class="main-big">
                                <!-- Single Feature Post -->
                               <a href="/ViewPost/{{$posts[0]->id}}/{{$club->clubName}}">
                                   <div class="single-feature-post video-post bg-img" >
                                    
                                        <img style="width:100%;height:100%"  class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[0]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[0]->img }}">
                                    

                                    <div class="post-content">
                                        <div class="row flex-row-reverse">
                                        <a href="/ViewPost/{{$posts[0]->id}}/{{$club->clubName}}" class="post-title">
                                            <pre dir="rtl">{{$posts[0]->title}}</pre>
                                        </a>
                                        </div>
                                        <div class="row flex-row-reverse">
                                        @foreach($posts[0]->Tag as $tag)

                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>

                                        @endforeach
                                        </div>
                                    </div>

                                    <!-- Video Duration -->
                                    <span class="video-duration">{{$posts[0]->created_at->toDateString()}}</span>
                                   </div>
                                 </a>
                            </div>     
                </div>
                <div class="col-12 col-md-5 col-lg-5 main-4sm">
                        @php $count = 1 @endphp
                        @foreach(array_chunk(array_slice($posts,1,4),2) as $tpost)
                        <div class="row container col-12 main-4bsm">
                            @foreach($tpost as $post)
                            <div class="col-6" style="">
                                <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">
                                    <div class="single-feature-post video-post bg-img">
                                        <div class="post-thumbnail imgslid">
                                            <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                        </div>
                                         <div class="post-content">
                                            <h6 class="post-title"><pre dir="rtl">{{$post->title}}</pre></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @php $count++ @endphp
                        @endforeach
                </div>
                <div class="col-12 main-4sm row container" style="margin-left: 0px;margin-right: 0px;">
                    @php $count = 1 @endphp
                        @foreach(array_chunk(array_slice($posts,5,4),2) as $tpost)
                        <div class="row  col-lg-6 col-md-6 col-sm-12 container">
                            @foreach($tpost as $post)
                            <div class="col-6" style="">
                                <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">
                                    <div class="single-feature-post video-post bg-img">
                                        <div class="post-thumbnail imgslid">
                                            <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                        </div>
                                         <div class="post-content">
                                            <h6 class="post-title"><pre dir="rtl">{{$post->title}}</pre></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @php $count++ @endphp
                        @endforeach
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-12 row justify-content-center" style="margin-right:0px;margin-left:0px">
               <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- mainLeftSquareAd -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:258px;height:507px"
                     data-ad-client="ca-pub-4008898419355748"
                     data-ad-slot="3039025874"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="row flex-row-reverse">
            <div class=" style-2 WelcNewsDiv col-md-9 col-lg-9 col-12" style="padding-right: 0px;"> 

                                @foreach(array_slice($posts,9,5) as $post)
                                <div class="single-post-area style-2 col-12">
                                    <div class="row align-items-center flex-row-reverse">
                                        <div class="col-3 PostImgDiv col-sm-4 col-lg-3 col-md-3">
                                           <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}"> 
                                               <div class="post-thumbnail">
                                                 <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                                  <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                               </div>   
                                            </a>   
                                        </div>
                                        <div class="col-9 PostcontentDiv col-sm-8">
                                             <div class="postContent container">
                                                   <div class="row flex-row-reverse">  
                                                      @foreach($post->Tag->take(3) as $tag)
                                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                                      @endforeach
                                                    </div>
                                                    <div class="row flex-row-reverse">
                                                     <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title">
                                                         <pre dir="rtl">{{$post->title}}</pre>
                                                     </a>
                                                    </div> 
                                              </div>  
                                        </div>
                                    </div>
                                 </div>
                                @endforeach
            </div>
           <div class="col-md-3 col-lg-3 col-12 welUlDiv ">
                <h2 style="text-align: center;background: gray;margin-bottom: 0px;color: white;padding: 10px;">موضوعات هامه</h2>
                <ul class="welcUl">
                    @foreach(array_slice($posts,12,5) as $postli)
                        <li>
                            <a href="/ViewPost/{{$postli->id}}/{{$club->clubName}}">
                                {{$postli->title}}
                            </a>
                        </li>
                    @endforeach
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