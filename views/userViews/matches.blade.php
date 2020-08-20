@extends('layouts.UI')

@section('content')
   
   @include('userViews.MatchesNav',[$matches=$matches])
<section class="hero--area section-padding-80 container">
    @if($comp != null)
        @include('userViews.navPartial',[$Comp=$comp])
    @endif
    <div class="row flex-row-reverse">
        <div class="  col-lg-8 col-md-8 col-sm-12 justify-content-end">
            @if(count($matchesGroups) >0)
          <div class="dates col-12">
              <div id="DatesCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                            @php 
                                $i = 4; 
                            @endphp
                         @foreach($matchesGroups->chunk(4) as $dates)
                            <div class="MatchesdatesRow carousel-item col-12 row justify-content-center <?php 
                                        if($i-4 <= $key and $key < $i+1){echo 'active';}?>" >
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                   @php $h=0; @endphp
                                   @foreach($dates as $date)
                                    <li class="nav-item col-3">
                                        <a class="nav-link <?php if(($h == $key) and ($i-4 <= $key and $key < $i+1)){echo 'active';}?>" id="x{{$date[0]->date}}-tab" data-toggle="tab" href="#ref{{$date[0]->date}}" role="tab" aria-controls="{{$date[0]->date}}" aria-selected=" <?php if($i == 0){echo 'true';}else{echo 'flase';}?>">{{$date[0]->date}}</a>
                                    </li>
                                    @php $h++ @endphp
                                   @endforeach
                                </ul>
                            </div>
                            @php $i=$i + 4; @endphp
                         @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#DatesCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#DatesCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>
          </div>
          <div class="tab-content col-12 justify-content-right mb-30 dates-matches" id="myTabContent">
                @php $h = 0; @endphp
            @foreach($matchesGroups as $matchesArr)
                    <div class="tab-pane fade show <?php if($h == $key){echo 'active';}?>"          id="ref{{$matchesArr[0]->date}}" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($matchesArr->groupBy('Competition_id') as $comp)
                            <div class="M-competition">
                                <div class="row">
                                    <div class="CompName col-12 row">
                                        <img src="{{ asset('core') }}/logos/{{$comp[0]->Competition->logo}}"/>
                                        <h2>{{$comp[0]->Competition->compName}}</h2>
                                    </div>
                                </div>
                                <div class="CompMatches container">
                                    @foreach($comp as $match)
                                   <div class="match col-12">
                                    <p class="fc detail">
                                        <img class="clubImg" src="{{ asset('core') }}/logos/{{$match->FC->logo}}" />

                                       <span class="clubName">{{$match->FC->clubName}}</span>
                                    </p>
                                    <div class="comp detail ">
                                        <p><b>{{$match->Competition->compName}} </b></p>
                                        <p class="m-time" style="margin-bottom:3px;"><b>{{$match->time}}</b><i class="far fa-clock"></i></p>
                                        <p class="m-result" ><b>{{$match->SCGoals}}</b>  <b>-</b>  <b>{{$match->FCGoals}}</b></p>
                                        <p>{{$match->location}}</p>
                                    </div>
                                    <p class="sc detail">
                                        <img  class="clubImg" src="{{ asset('core') }}/logos/{{$match->SC->logo}}" />

                                       <span class="clubName">{{$match->SC->clubName}}</span>
                                    </p>
                                  </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                @php $h++; @endphp
            @endforeach
        </div>
            @else
                <h1 style="text-align: center;margin: 122px 0px  0px 0px;color: #e2a55d;">لا توجد مباريات</h1>
            @endif
            
        </div>
        <div class="col-12 col-md-4 col-lg-4 zright-remove">
                    
        </div>       
    </div>
</section>
@endsection