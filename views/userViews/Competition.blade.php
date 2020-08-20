@extends('layouts.UI')

@section('content')
<div class="container">
        @include('userViews.navPartial',[$Comp=$club])
</div>
<div class="container">
        @include('userViews.MainWelcomeDiv',[$posts=$posts])
</div>
<section class="trending-posts-area margin-bottom">
        <div class="container">
               <div class="section-heading">
                     <h4>فيديوهات</h4>
               </div>
            @if(count($videos) >= 5)
               <div class="container">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7 col-lg-8">

                            <div class="tab-content">
                                @php $count = 1 @endphp
                                @foreach($videos as $video)

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
                                     @if($count == 7)
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
            @endif
         </div>
    </section>

@endsection