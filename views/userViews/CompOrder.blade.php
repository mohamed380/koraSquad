@extends('layouts.UI')

@section('content')

<div class="container">
        @include('userViews.navPartial',[$Comp=$club])
</div>
<div class="container">
    <section class="hero--area ">
        <div class="row  flex-row-reverse">
            <div class="col-lg-8 col-md-12 col-sm-12">
                
                  
                    <table class="table">
                      <thead>
                        <tr>
                         
                          <th scope="col">نقاط</th>
                          <th scope="col">عليه</th>
                          <th scope="col">له</th>
                          <th scope="col">تعادل</th>
                          <th scope="col">هزيمه</th>
                          <th scope="col">فوز</th>
                          <th scope="col">خارج</th>
                          <th scope="col">داخل</th>
                          <th scope="col">لعب</th>
                          <th scope="col" >الفريق</th>
                          <th scope="col">ألمركز</th>
                        </tr>
                      </thead>
                      <tbody style="direction: rtl;">
                          @php $i = 1; @endphp
                      @foreach($compOrder as $row)
                        <tr>
                          <td>{{$row->points}}</td>
                          <td>{{$row->ingoals}}</td>
                          <td>{{$row->outgoals}}</td>
                          <td>{{$row->draw}}</td>
                          <td>{{$row->defeat}}</td>
                          <td>{{$row->win}}</td>
                          <td>{{$row->out}}</td>
                          <td>{{$row->in}}</td>
                          <td>{{$row->played}}</td>
                            <td class="clubNameOrder" ><p>{{$row->Club->clubName}}</p><img src="{{ asset('core') }}/logos/{{$row->Club->logo}}"/></td>
                          <th scope="row">{{$i}}</th>
                        </tr>
                          @php $i++; @endphp
                      @endforeach
                      </tbody>
                    </table>
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12" style="padding:0px;">
                @include('userViews.LeftMainPostsDiv',[$posts=$posts])
            <div class="col-12 row justify-content-center" style="margin-right:0px;margin-left:0px">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CompOrderLeftAd -->
<ins class="adsbygoogle"
     style="display:inline-block;width:258px;height:320px"
     data-ad-client="ca-pub-4008898419355748"
     data-ad-slot="3322537848"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </div>
            </div>
        </div>
    </section>
</div>

@endsection