<div class="container matchesDiv">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link " id="tommorow-tab" data-toggle="tab" href="#tommorow" role="tab" aria-controls="tommorow" aria-selected="true">غدا</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="today-tab" data-toggle="tab" href="#today" role="tab" aria-controls="today" aria-selected="false">أليوم</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="yasterday-tab" data-toggle="tab" href="#yasterday" role="tab" aria-controls="yasterday" aria-selected="false">أمس</a>
              </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="tommorow" role="tabpanel" aria-labelledby="tommorow-tab">   
            @if(!empty($matches[0]))
          
                  @php $ci = 0 @endphp
                  <div class="matches container <?php if($ci == 0){echo 'active';}?>" style="display: flex;overflow-x: scroll;" >
                      @foreach($matches[0]  as $match)
                                 <div class="match">
                                    <p class="fc detail">
 <img  class="clubImg lazy" src="{{asset('imgs')}}/Korasquad.png"  data-src="{{ asset('core') }}/logos/{{$match->FC->logo}}" data-srcset="{{ asset('core') }}/logos/{{$match->FC->logo}}" />
                                       <span class="clubName">{{$match->FC->clubName}}</span>
                                    </p>
                                    <div class="comp detail ">
                                        <p><b>{{$match->Competition->compName}} </b></p>
                                        <p class="m-time" style="margin-bottom:3px;"><i class="far fa-clock"></i><b>{{$match->time}}</b></p>
                                        <p class="m-result" ><b>{{$match->SCGoals}}</b>  <b>-</b>  <b>{{$match->FCGoals}}</b></p>
                                    </div>
                                    <p class="sc detail">
                                        <img  class="clubImg lazy" src="{{asset('imgs')}}/Korasquad.png"  data-src="{{ asset('core') }}/logos/{{$match->SC->logo}}" data-srcset="{{ asset('core') }}/logos/{{$match->SC->logo}}" />

                                       <span class="clubName">{{$match->SC->clubName}}</span>
                                    </p>
                                  </div>
                      
                         @php $ci++ @endphp
                      @endforeach
                  </div>
          
           
            @else
                  <div class="matchesAlert " style="text-align: center;"><h2>لا توجد مباريات</h2></div>
            @endif
        </div>
            <div class="tab-pane fade active show" id="today" role="tabpanel" aria-labelledby="today-tab">   
            @if(!empty($matches[1]))
          
                  @php $ci = 0 @endphp
                  <div class="matches container <?php if($ci == 0){echo 'active';}?>" style="display: flex;overflow-x: scroll;">
                      @foreach($matches[1]  as $match)
                                 <div class="match">
                                    <p class="fc detail">
                                    <img  class="clubImg lazy" src="{{asset('imgs')}}/Korasquad.png"  data-src="{{ asset('core') }}/logos/{{$match->FC->logo}}" data-srcset="{{ asset('core') }}/logos/{{$match->FC->logo}}" />
                                       <span class="clubName">{{$match->FC->clubName}}</span>
                                    </p>
                                    <div class="comp detail ">
                                        <p><b>{{$match->Competition->compName}} </b></p>
                                        <p class="m-time" style="margin-bottom:3px;"><i class="far fa-clock"></i><b>{{$match->time}}</b></p>
                                        <p class="m-result" ><b>{{$match->SCGoals}}</b>  <b>-</b>  <b>{{$match->FCGoals}}</b></p>
                                    </div>
                                    <p class="sc detail">
                                    <img  class="clubImg lazy" src="{{asset('imgs')}}/Korasquad.png"  data-src="{{ asset('core') }}/logos/{{$match->SC->logo}}" data-srcset="{{ asset('core') }}/logos/{{$match->SC->logo}}" />
                                       <span class="clubName">{{$match->SC->clubName}}</span>
                                    </p>
                                  </div>
                      
                         @php $ci++ @endphp
                      @endforeach
                  </div>
          
           
            @else
                  <div class="matchesAlert " style="text-align: center;"><h2>لا توجد مباريات</h2></div>
            @endif
        </div>
            <div class="tab-pane fade" id="yasterday" role="tabpanel" aria-labelledby="yasterday-tab">   
            @if(!empty($matches[2]))
          
                  @php $ci = 0 @endphp
                  <div class="matches container <?php if($ci == 0){echo 'active';}?>" style="display: flex;overflow-x: scroll;">
                      @foreach($matches[2]  as $match)
                                 <div class="match">
                                    <p class="fc detail">
                                <img  class="clubImg lazy" src="{{asset('imgs')}}/Korasquad.png"  data-src="{{ asset('core') }}/logos/{{$match->FC->logo}}" data-srcset="{{ asset('core') }}/logos/{{$match->FC->logo}}" />
                                       <span class="clubName">{{$match->FC->clubName}}</span>
                                    </p>
                                    <div class="comp detail ">
                                        <p><b>{{$match->Competition->compName}} </b></p>
                                        <p class="m-time" style="margin-bottom:3px;"><i class="far fa-clock"></i><b>{{$match->time}}</b></p>
                                        <p class="m-result" ><b>{{$match->SCGoals}}</b>  <b>-</b>  <b>{{$match->FCGoals}}</b></p>
                                    </div>
                                    <p class="sc detail">
                                    <img  class="clubImg lazy" src="{{asset('imgs')}}/Korasquad.png"  data-src="{{ asset('core') }}/logos/{{$match->SC->logo}}" data-srcset="{{ asset('core') }}/logos/{{$match->SC->logo}}" />
                                       <span class="clubName">{{$match->SC->clubName}}</span>
                                    </p>
                                  </div>
                      
                         @php $ci++ @endphp
                      @endforeach
                  </div>
          
           
            @else
                  <div class="matchesAlert " style="text-align: center;"><h2>لا توجد مباريات</h2></div>
            @endif
        </div>
        </div>
</div>