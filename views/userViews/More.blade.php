@extends('layouts.UI')

@section('content')
    @if($comp != null)
        @include('userViews.navPartial',[$Comp=$comp]);
    @endif
    <div class="vizew-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
        
                <div class="col-12 col-lg-8 md-div">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex justify-content-end">
                        <!-- Catagory -->
                        
                        <div class="archive-catagory">
                          
                            <h1>
                            @if($comp != null)
                                <input type="hidden" class="about" value="{{$comp->compName}}"/>
                                {{$comp->compName}}
                        
                            @else @if($MainTag != null)
                              <input type="hidden" class="about" value="{{$MainTag}}"/>
                                {{$MainTag}}
                            @else
                            <input type="hidden" class="about" value="{{0}}"/>
                                أخبار
                            @endif
                            @endif
                            </h1>
                        </div>
                        <!-- View Options -->

                    </div>

                    <div class="row justify-content-end posts">
                        <!-- Single Blog Post -->
                        @foreach($posts as $post)
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">

                                    <!-- Video Duration -->
                                    <span class="video-duration">{{$post->created_at->toDateString()}}</span>
                                </div>

                                <!-- Post Content -->
                                
                            <div class="postContent container">
                                <div class="row flex-row-reverse">
                                    @foreach($post->Tag as $tag)
                                        <a href="/More/{{$tag->tagName}}" class="post-cata cata-sm">{{$tag->tagName}}</a>
                                    @endforeach
                                </div>
                                    <div class="row flex-row-reverse">
                                        <a href="../ViewPost/{{$post->id}}" class="post-title"><b>{{$post->title}}</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endforeach
                        
                            <div class="row justify-content-center col-12 bntDiv">
                                <input type="hidden" class="c"  value="{{count($posts)}}"/>
                                <div class="row justify-content-center">
                                 <button type="button" class="btn btn-primary col-12 morexPosts">المزيد</button>
                                </div>
                            </div>
                    </div>

                    <!-- Pagination -->
                
                </div>
                   <div class="col-12 col-md-4 col-lg-3 right-remove">
                       <div class="fixed-ad">
                           <script data-cfasync="false" type="text/javascript" src="http://www.predictivdisplay.com/a/display.php?r=2604423"></script>
                       </div>
                   
                   </div>
               
            </div>
        </div>
    </div>
  @endsection