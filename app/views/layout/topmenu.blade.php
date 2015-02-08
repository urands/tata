<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav navbar-left">
            <li><a class="navbar-brand" href="/projects">НИИ ВСиСУ</a></li>
            @if (isset($page['header'])) 
              @if (is_array($page['header']))
                @foreach ($page['header'] as $link)
                <li> <a class="navbar-brand" href="/projects">{{$link}}</a></li>
                @endforeach
              @else
              <li><a class="navbar-brand" href="/projects">{{$page['header']}}</a></li>
              @endif
            @endif
            </ul>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/projects">Проекты</a></li>
                <li><a href="#">Настройки</a></li>
                <li><a href="#">Профиль</a></li>
                <li><a href="#">Справка</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>