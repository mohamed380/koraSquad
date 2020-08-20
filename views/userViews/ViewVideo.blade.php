@extends('layouts.UI')

@section('content')
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row justify-content-center" style="height: 450px;">
                <div class="col-12 col-lg-8">
                    <div class="post-details-thumb mb-30 videoDetails">
                         <iframe  width="100%" style="height: -webkit-fill-available;" src="{{$MainVideo->frame}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
             
                                
                                <h3  class="post-title mb-2">{{$MainVideo->title}}</h3>
                                
                                <div class="d-flex mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <p class="post-date"></p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="post-tags mt-30">
                                <ul>
                                    @foreach($MainVideo->Tag as $tag)
                                    
                                   <li><a href="/More/{{$tag->tagName}}">{{$tag->tagName}}</a></li>
                                    
                                    @endforeach
                                </ul>
                            </div>

                            

                            <!-- Related Post Area -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>ذات صلة</h4>
                                    
                                </div>

                                <div class="row flex-row-reverse">
                                     @foreach($videos as $video)
                                            <a href="../ViewViedo/{{$video->id}}">
                                                     <div class="single-post-area  col-6 videoTop">
                                                        <div class="post-thumbnail">
                                                            <img  src="{{ asset('uploads') }}/video/{{ $video->img }}" alt="" style="width: 18rem; height:7rem">
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
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                      

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ##### Post Details Area End ##### -->

  @endsection