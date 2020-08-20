<div class="LeftMainPostsDiv">  
<div class="col-12">
                            <div class="main-big">
                                <!-- Single Feature Post -->
                               
                                   <div class="single-feature-post video-post bg-img" >
                                    <a href="/ViewPost/{{$posts[0]->id}}/{{$club->clubName}}">
                                        <img style="width:100%;height:100%"  class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $posts[0]->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $posts[0]->img }}">
                                    </a>

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
                                 
                            </div>     
                </div>
                <div class="col-12 main-4sm">
                        @php $count = 1 @endphp
                        @foreach(array_chunk(array_slice($posts,1,4),2) as $tpost)
                        <div class="row container col-12 main-4bsm">
                            @foreach($tpost as $post)
                            <div class="col-6">
                                    <div class="single-feature-post video-post bg-img">
                                        <div class="post-thumbnail imgslid">
                                            <a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">
                                            <img class="lazy"src="{{asset('imgs')}}/Korasquad.png" data-src="{{ asset('uploads') }}/post/{{ $post->img }}" data-srcset="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                                            </a>
                                        </div>
                                         <div class="post-content">
                                            <h6 class="post-title"><pre dir="rtl">{{$post->title}}</pre></h6>
                                        </div>
                                    </div>
                                
                            </div>
                            @endforeach
                        </div>
                        @php $count++ @endphp
                        @endforeach
                </div>
</div>