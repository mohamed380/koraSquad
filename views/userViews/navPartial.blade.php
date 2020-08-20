<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light flex-row-reverse">
          <a class="navbar-brand" href="/Competation/{{$Comp->compName}}">{{$Comp->compName}}</a>
          
            <div class="navbar-nav flex-row-reverse edited-nav">
              
                <a class="nav-link" href="/matches/{{$Comp->compName}}">مباريات</a>
              
              
                <a class="nav-link" href="/More/{{$Comp->compName}}/1">أخبار</a>
              
                <a class="nav-link" href="/CompetitionOrder/{{$Comp->compName}}">ترتيب</a>
              
                <a class="nav-link" href="/MoreVideos/{{$Comp->compName}}">فيديوهات</a>
          </div>
        </nav>
</div>