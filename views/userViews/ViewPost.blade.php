@extends('layouts.UI')

@section('content')
    <!-- ##### Pager Area Start ##### -->
    <div class="vizew-pager-area">
        @if(count($posts)>=2)
        <div class="vizew-pager-prev">
            <p>الخبر السابق</p>

            <!-- Single Feature Post -->
            
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url('{{ asset('uploads') }}/post/{{ $posts[1]->img }}'); background-position-y:top">
                <!-- Post Content -->
                <div class="post-content">
                            @foreach($posts[1]->Tag as $tag)
                                    
                                        <a href="/More/{{$tag->tagName}}" class="post-cata cata-sm ">{{$tag->tagName}}</a>
                                    
                            @endforeach
                    <a href="/ViewPost/{{$posts[1]->id}}" class="post-title">{{$posts[1]->title}}</a>
                </div>
                <!-- Video Duration -->
                                <span class="video-duration">{{$posts[1]->created_at->toDateString()}}</span>
            </div>
        </div>
          @endif
            @if(count($posts)>=1)
        <div class="vizew-pager-next">
            <p>الخبر التالي</p>

             <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url('{{ asset('uploads') }}/post/{{ $posts[0]->img }}');background-position-y:top">
                <!-- Post Content -->
                <div class="post-content">
                            @foreach($posts[0]->Tag as $tag)
                                    @if($tag->postID == $posts[0]->id)
                                        <a href="/More/{{$tag->tagName}}" class="post-cata cata-sm">{{$tag->tagName}}</a>
                                    @endif
                            @endforeach
                    <a href="/ViewPost/{{$posts[0]->id}}" class="post-title">{{$posts[0]->title}}</a>
                </div>
                <!-- Video Duration -->
                                <span class="video-duration">{{$posts[0]->created_at->toDateString()}}</span>
            </div>
        </div>
         @endif
    </div>
    <!-- ##### Pager Area End ##### -->
    
    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row flex-row-reverse">
                <!-- Post Details Content Area -->
                
                <div class="col-12 col-lg-8  mb-50">
                    <div class="col-12">
                        <div class="post-details-thumb mb-50">
                            <img class="col-12 lazy" src="{{asset('imgs')}}/Korasquad.png" data-srcset="{{ asset('uploads') }}/post/{{ $MainPost->img }}"  data-src="{{ asset('uploads') }}/post/{{ $MainPost->img }}" alt="">
                        </div>
                    </div>
                    <div class="post-details-content" style="padding: 0px 50px;">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="postContent mt-0">
             
                                
                                <h3 class="viewPostTitle mb-2"><pre dir="rtl">{{$MainPost->title}}</pre></h3>
                                
                          
                                        <p class="post-date container">{{$MainPost->created_at->toDateString()}}</p>
                                    
                            </div>

                            <pre dir="rtl" class="postText container">{{$MainPost->content}}</pre>
                            <!-- Post Tags -->
                            @if(count($MainPost->Tag) > 0)
                            <div class="post-tags mt-30">
                                <div class="row flex-row-reverse container">
                                    @foreach($MainPost->Tag as $tag)
                                        <a href="/More/{{$tag->tagName}}" class="post-cata" style="font-size:13px;">    {{$tag->tagName}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="post-writer" style="border-top: 1px solid;padding: 28px 15px 0px 0px;display: flex;flex-direction: row-reverse">
                                <h3 dir="rtl">كتب</h4>
                                <h3 dir="rtl" class="writer" style="margin-right:10px;color: #55abe0;">
                                    {{$MainPost->User->name}}
                                </h3>
                            </div>
                            <!-- Related Post Area -->
                            <div class="related-post-area ">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>ذات صلة</h4>
                                    
                                </div>

                                <div class="row flex-row-reverse relatedPostsRow">

                                    <!-- Single Blog Post -->
                                    
                                        @foreach($Relatedposts as $post)
                                            @if($post != null)
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area  touch">
                                            <!-- Post Thumbnail -->
                                            <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}"><div class="post-thumbnail">
                                            <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                            <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                            </div>
                                                    </a>
                                            <!-- Post Content -->
                                            <div class="postContent container">
                                                <div class="row flex-row-reverse">
                                                    @foreach($post->Tag as $tag)
                                                            <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                                    @endforeach
                                                </div>
                                                <div class="row flex-row-reverse">
                                                    <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title"><b>{{$post->title}}</b></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                     </div>
                                    @endif
                                        @endforeach
                                    
                                @if(count($Relatedposts)!=0)    
                            <div class="row justify-content-center col-12 bntDiv">
                                     <input type="hidden" class="c"  value="{{count($Relatedposts)}}"/>
                                <input type="hidden" class="mpid"  value="{{$MainPost->id}}"/>
                                <div class="row justify-content-center">
                                 <button type="button" class="btn btn-primary col-12 moreRelatedPosts">المزيد</button>
                                </div>
                            </div>@else
                                    <div class="row justify-content-center col-12 bntDiv">
                             
                                <h1>لا يوجد</h1>
                            </div>
                                    
                                    @endif
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="row justify-content-center mb-30">
                      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- postFstAd -->
                        <ins class="adsbygoogle"
                             style="display:inline-block;width:380px;height:300px"
                             data-ad-client="ca-pub-4008898419355748"
                             data-ad-slot="3567098350"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                         <div class="sidebar-area">

            
                        
                        
                        <!-- ***** ads ***** -->
                       
                    <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>موضوعات هامة</h4>
                               <hr/>
                            </div>
                        @foreach(array_slice($posts,4,4) as $post)
                            <div class="single-post-area mb-30 container">
                               <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}"> <div class="post-thumbnail">
                                    <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                    <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                   </div></a>
                                    <div class="postContent container">
                                       
                                        <div class="row flex-row-reverse">  
                                            
                                        @foreach($post->Tag as $tag)
                                        
                                        <a href="/More/{{$tag->tagName}}" class="post-cata">{{$tag->tagName}}</a>
                                        
                                        @endforeach
                                        </div>
                                        <div class="row flex-row-reverse">
                                          
                                         <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}" class="post-title"><pre dir="rtl">{{$post->title}}</pre>
                                            </a>
                                        </div>   
                                    </div>
                              </div>
                       @endforeach
                 </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ##### Post Details Area End ##### -->

  @endsection