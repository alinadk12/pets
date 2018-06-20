<div class="row navbar-background min-width">
    <div class="col-md-8 col-md-offset-2">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="tabs">
                    <ul class="nav navbar-nav text16">
                        <li><a href="{{ url('/') }}" id="home">{!! __('navbar.main') !!}</a></li>
                        <li class="dropdown">
                            <a href="{{ url('/breeds') }}" class="dropdown-toggle" data-toggle="dropdown"
                               id="breeds">{!! __('navbar.breed') !!}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/breeds/terrier') }}">{!! __('navbar.terrier') !!}</a></li>
                                <li><a href="{{ url('/breeds/beagle') }}">{!! __('navbar.beagle') !!}</a></li>
                                <li><a href="{{ url('/breeds/goldenretriever') }}">{!! __('navbar.retriever') !!}</a>
                                </li>
                                <li><a href="{{ url('/breeds/chihuahua') }}">{!! __('navbar.chihuahua') !!}</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/dogs') }}" class="dropdown-toggle" data-toggle="dropdown"
                               id="dogs">{!! __('navbar.dogs') !!}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/dogs/terrier') }}">{!! __('navbar.terrier') !!}</a></li>
                                <li><a href="{{ url('/dogs/beagle') }}">{!! __('navbar.beagle') !!}</a></li>
                                <li><a href="{{ url('/dogs/goldenretriever') }}">{!! __('navbar.retriever') !!}</a></li>
                                <li><a href="{{ url('/dogs/chihuahua') }}">{!! __('navbar.chihuahua') !!}</a></li>
                                @if (Auth::check())
                                    @if (Auth::user()->hasRole('Сотрудник'))
                                        <br>
                                        <li><a href="{{ url('dogs/create') }}">{!! __('navbar.add_dog') !!}</a></li>
                                    @endif
                                    @if (Auth::user()->hasRole('Администратор'))
                                        <br>
                                        <li><a href="{{ url('dogs/deleted') }}">{!! __('navbar.deleted_dog') !!}</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/puppies') }}" class="dropdown-toggle" data-toggle="dropdown"
                               id="puppies">{!! __('navbar.puppies') !!}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/puppies/terrier') }}">{!! __('navbar.terrier') !!}</a></li>
                                <li><a href="{{ url('/puppies/beagle') }}">{!! __('navbar.beagle') !!}</a></li>
                                <li><a href="{{ url('/puppies/goldenretriever') }}">{!! __('navbar.retriever') !!}</a>
                                </li>
                                <li><a href="{{ url('/puppies/chihuahua') }}">{!! __('navbar.chihuahua') !!}</a></li>
                                @if (Auth::check())
                                    <br>
                                    @if (Auth::user()->hasRole('Сотрудник'))
                                        <li><a href="{{ url('puppies/create') }}">{!! __('navbar.add_puppy') !!}</a>
                                        </li>
                                        <li><a href="{{ url('puppies/sell') }}">{!! __('navbar.sell_puppy') !!}</a></li>
                                        <li><a href="{{ url('puppies/forSale') }}">{!! __('navbar.sale_puppies') !!}</a>
                                        </li>
                                        <li><a href="{{ url('puppies/sold') }}">{!! __('navbar.sold_puppies') !!}</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->hasRole('Администратор'))
                                        <li>
                                            <a href="{{ url('puppies/deleted') }}">{!! __('navbar.deleted_puppies') !!}</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/goods') }}" class="dropdown-toggle" data-toggle="dropdown"
                               id="goods">{!! __('navbar.goods') !!}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/goods/feed') }}">{!! __('navbar.feed') !!}</a></li>
                                <li><a href="{{ url('/goods/bowls') }}">{!! __('navbar.bowls') !!}</a></li>
                                <li><a href="{{ url('/goods/toys') }}">{!! __('navbar.toys') !!}</a></li>
                                <li><a href="{{ url('/goods/accessories') }}">{!! __('navbar.accessories') !!}</a></li>
                                <li><a href="{{ url('/goods/carriers') }}">{!! __('navbar.carrying') !!}</a></li>
                                @if(Auth::check())
                                    <br>
                                    @if (Auth::user()->hasRole('Сотрудник'))
                                        <li><a href="{{ url('goods/create') }}">{!! __('navbar.add_good') !!}</a></li>
                                        <li><a href="{{ url('goods/sell') }}">{!! __('navbar.sell_good') !!}</a></li>
                                    @endif
                                    @if (Auth::user()->hasRole('Администратор'))
                                        <li>
                                            <a href="{{ url('goods/deleted') }}">{!! __('navbar.deleted_goods') !!}</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('Сотрудник') || Auth::user()->hasRole('Администратор'))
                                <li class="dropdown">
                                    <a href="{{ url('/news') }}" class="dropdown-toggle "
                                       data-toggle="dropdown" id="news">{!! __('navbar.news') !!}</a>
                                    <ul class="dropdown-menu">
                                        @if (Auth::user()->hasRole('Сотрудник'))
                                            <li>
                                                <a href="{{ url('news/create') }}">{!! __('navbar.add_new') !!}</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->hasRole('Администратор'))
                                            <li>
                                                <a href="{{ url('news/deleted') }}">{!! __('navbar.deleted_news') !!}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ url('/news') }}" id="news">{!! __('navbar.news') !!}</a></li>
                            @endif
                        @else
                            <li><a href="{{ url('/news') }}" id="news">{!! __('navbar.news') !!}</a></li>
                        @endif
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('Администратор'))
                                <li class="dropdown">
                                    <a href="/reviews/admin/{{Auth::user()->id}}" class="dropdown-toggle"
                                       data-toggle="dropdown" id="reviews">{!! __('navbar.reviews') !!}</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/reviews/deleted">{!! __('navbar.deleted_reviews') !!}</a></li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="/reviews/{{Auth::user()->id}}"
                                       id="reviews">{!! __('navbar.reviews') !!}</a></li>
                            @endif
                        @else
                            <li><a href="{{ url('/reviews/')}}" id="reviews">{!! __('navbar.reviews') !!}</a></li>
                        @endif
                        <li><a href="{{ url('/contacts') }}" id="contacts">{!! __('navbar.contacts') !!}</a></li>
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('Сотрудник'))
                                <li class="dropdown"><a href="{{ url('/request/showAll/')}}" class="dropdown-toggle"
                                                        data-toggle="dropdown"
                                                        id="request">{!! __('navbar.requests') !!}</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/request/showNoReply/') }}">{!! __('navbar.no_reply_requests') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/request/showReply/') }}">{!! __('navbar.reply_requests') !!}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if(Auth::user()->hasRole('Администратор'))
                                <li class="dropdown"><a href="{{ url('/users/')}}" class="dropdown-toggle"
                                                        data-toggle="dropdown" id="users">{!! __('navbar.users') !!}</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/users/deleted/') }}">{!! __('navbar.deleted_users') !!}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>



