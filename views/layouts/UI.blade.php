
<!DOCTYPE html>
<html lang="ar">
 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="كورة سكواد الموقع الجماهيري الاول في تاريخ الرياضة المصرية">
    <meta name="keywords" content="كورة سكواد,سكواد,كورة,الدوري المصري,الزمالك,مصر,الاهلي">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('imgs')}}/favicon.png">
    <!-- Title -->
    <title>كورة سكواد</title>


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6714771678490406",
    enable_page_level_ads: true
  });
</script>
    
    
<script>
'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd &&
(window._trfd=[]),_trfd.push(

{'tccl.baseHost':'$BASEHOST'}),_trfd.push(

{'ap':'$AP'},{'server':'$HOSTNAME'})
// Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147230010-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-147230010-1');
</script>




    <!-- Stylesheet -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('MainCss')}}/style.css">
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css')}}/touches.css">
    
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/classy-nav.css">
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('MainCss')}}/css/magnific-popup.css">
</head>

<body class="{{$club->class}}">
    
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-area d-flex align-items-center">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    @php $count = 1; @endphp
                                    @foreach($posts as $post)
                                        <li><a href="/ViewPost/{{$post->id}}/{{$club->clubName}}">{{$post->title}}</a></li>
                                        @if($count == 4)
                                            @break;
                                        @endif
                                       @php $count++ @endphp
                                    @endforeach
                                </ul>
                            </div>
                            <div class="news-title">
                                <p>:أهم الاخبار</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="top-meta-data d-flex align-items-center justify-content-end">
                            <!-- Top Social Info -->
                            <div class="top-social-info">
                                <a href="http://facebook.com/korasquad" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://twitter.com/korasquad" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.youtube.com/channel/UCYrp6hpl7tMmqFNF6Lxq9-w" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="http://instagram.com/korasquad" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="{{ route('Search',[$club->clubName]) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    <input type="input" name="token" id="topSearch" placeholder="...بحث" required>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
    <div class="vizew-main-menu"  id="sticker">
        <div class="classy-nav-container breakpoint-off" style="background-image: url('{{ asset('core') }}/bars/{{ $club->bar }}');">
          <div class="container">
               <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="vizewNav">
                <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                    <div class="classy-menu">
                           <div class="classycloseIcon">
                           <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                           </div>
                           <div class="classynav">
                                    <ul>
                                            <li class="megamenu-item li"  >
                                                <a href="#"> <i class="fas fa-x fa-bars" style="color:#eeb300"></i></a> 
                                                <div class="megamenu" >
                                                    @foreach($comps->chunk(5) as $chunck)
                                                    <ul class="single-mega cn-col-4">
                                                        <h6 class="single-mega-title">بطولات</h6>
                                                     @foreach($chunck as $comp)
                                                        <li ><a href="/Competation/{{$comp->compName}}">{{$comp->compName}}</a></li>
                                                     @endforeach
                                                    </ul>
                                                    @endforeach
                                                    <ul class="single-mega cn-col-4">
                                                        <h6 class="single-mega-title">أقسام</h6>
                                                        <li><a href="/Competation/الدوري المصري">الدوري المصري</a></li>
                                                        <li><a href="/Main/0/مصر">مصر</a></li>
                                                        <li><a href="/Main/0/أوروبا">أوروبا</a></li>
                                                        <li><a href="/Main/0/أفريقيا">أفريقيا</a></li>
                                                        <!-- <li><a href="index.html">منتخب مصر</a></li>
                                                        <li><a href="index.html">المحترفون</a></li>
                                                        <li><a href="index.html">السعودية</a></li>
                                                        <li><a href="index.html">الوطن العربي</a></li>-->
                                                       
                                                    </ul>
                                                    <ul class="single-mega cn-col-4">
                                                        <h6 class="single-mega-title">أقسام</h6>
                                                        <li><a href="/MoreVideos/">فديوهات رائجة</a></li>
                                                    </ul>
                                                   <!-- <ul class="single-mega cn-col-4">
                                                        <h6 class="single-mega-title"> أقسام خاصة</h6>
                                                        <li><a href="index.html">تحليل كورة فلاش</a></li>
                                                        <li><a href="index.html">وثائقي</a></li>
                                                        <li><a href="index.html">كورة فلاش كلاسيك</a></li>
                                                        <li><a href="index.html">حكايات كورة فلاش</a></li>
                                                    </ul>-->
                                                </div>
                                                </li>  
                                     <div class="ClubsUl"> 
                                        <a href="/Main/1/الاهلي"><img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-srcset="{{ asset('imgs/logos/ahly.png') }}" data-src="{{ asset('imgs/logos/ahly.png') }}"></a>
                                        <a href="/Main/1/الاسماعيلي"><img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('imgs/logos/ismailly.png') }}"data-srcset="{{ asset('imgs/logos/ismailly.png') }}"></a>
                                        <a href="/Main/1/الاتحاد السكندري"><img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('imgs/logos/ittahad.png') }}" data-srcset="{{ asset('imgs/logos/ittahad.png') }}"></a>
                                        <a href="/Main/1/المصري"><img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('imgs/logos/masry.png') }}"data-srcset="{{ asset('imgs/logos/masry.png') }}"></a>
                                        <a href="/Main/1/الزمالك"><img class="lazy" src="{{ asset('imgs') }}/Korasquad.png" data-src="{{ asset('imgs/logos/zamalek.png') }}"data-srcset="{{ asset('imgs/logos/zamalek.png') }}"></a>
                                     </div>
                                            <li class="li"><a href="/Competation/الدوري المصري">الدوري المصري</a></li>
                                            <li class="li"><a href="/More">أخبار</a></li>
                                            <li class="li"><a href="/matches">مباريات</a></li>
                                            <li class="li"><a href="/Main/0/مصر">مصر</a></li>
                                            
                                     </ul>
        </div>

</div>
                    
                      <a href="/Main" class="nav-brand"><img src="{{ asset('imgs') }}/Korasquad.png" alt=""></a>
                   
            </div>
          </div>
    </div>
    </header>
        <div class="container mb-10">
          <div class="row justify-content-center">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- mainTopFixed -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:728px;height:90px"
                     data-ad-client="ca-pub-4008898419355748"
                     data-ad-slot="1138082420"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
          </div>
          
    @yield('content')

 
    <footer class="footer-area" style="padding-top:15px;">
             <div class="container">
                <div class="row">
                <div class="row col-12">
                    <p>جميع الحقوق محفوظه لموقع كورة سكواد</p>
                    <p><a href="/privacy">سياسة الخصوصية</a></p>
                    <p><a class=" "  href="/aboutUs">من نحن</a></p>
                    <p><a href="/contcatUs">تواصل معنا</a></p>
                </div>
                <div class=" fotter-social row col-12">
                     <div class="top-social-info col-12 "style="padding-top:5px;">
                            <a href="http://facebook.com/korasquad" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://twitter.com/korasquad" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCYrp6hpl7tMmqFNF6Lxq9-w" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="http://instagram.com/korasquad" target="_blank"><i class="fab fa-instagram"></i></a>
                     </div>
                </div>
                </div>
            </div>
    </footer>        
     <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('MainJS')}}/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{asset('MainJS')}}/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('MainJS')}}/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{asset('MainJS')}}/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{asset('MainJS')}}/active.js"></script>
        
    <script src="{{asset('js')}}/touches.js"></script>
        <script type="text/javascript">
           document.addEventListener("DOMContentLoaded", function() {
                      var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

                      if ("IntersectionObserver" in window) {
                        let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                          entries.forEach(function(entry) {
                            if (entry.isIntersecting) {
                              let lazyImage = entry.target;
                              lazyImage.src = lazyImage.dataset.src;
                              lazyImage.srcset = lazyImage.dataset.srcset;
                              lazyImage.classList.remove("lazy");
                              lazyImageObserver.unobserve(lazyImage);
                            }
                          });
                        });

                        lazyImages.forEach(function(lazyImage) {
                        lazyImageObserver.observe(lazyImage);
                        });
                      } else {
                        // Possibly fall back to a more compatible method here
                      }
                    });
        </script>

</body>