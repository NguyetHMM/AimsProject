<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
    <div class="categories-menu mrg-xs">
        <div class="category-heading">
            <h3> Product Categories</h3>
        </div>
        <div class="category-menu-list">
            <ul>
                <li>
                    <a href="{{ Route('showBook') }}"><img alt="" src="{{ asset('images/icons/book.png') }}"> Books <i
                            class="zmdi zmdi-chevron-right"></i></a>
                    <div class="category-menu-dropdown">
                        <div class="category-part-1 category-common mb--30">
                            <h4 class="categories-subtitle"> Books</h4>
                            <ul>
                                @foreach($bookKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="category-part-2 category-common mb--30">
                            <h4 class="categories-subtitle"> E-books</h4>
                            <ul>
                                @foreach($bookKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </li>
                <li>
                    <a href="{{ Route('showCDs') }}"><img alt="" src="{{ asset('images/icons/CD.png') }}"> CDs <i
                            class="zmdi zmdi-chevron-right"></i></a>
                    <div class="category-menu-dropdown">
                        <div class="category-part-1 category-common mb--30">
                            <h4 class="categories-subtitle"> CDs</h4>
                            <ul>
                                @foreach($cdKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="category-part-2 category-common mb--30">
                            <h4 class="categories-subtitle"> E-CDs</h4>
                            <ul>
                                @foreach($cdKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ Route('showDVDs') }}"><img alt="" src="{{ asset('images/icons/DVD.png') }}"> DVDs <i
                            class="zmdi zmdi-chevron-right"></i></a>
                    <div class="category-menu-dropdown">
                        <div class="category-part-1 category-common mb--30">
                            <h4 class="categories-subtitle"> DVDs</h4>
                            <ul>
                                @foreach($dvdKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="category-part-2 category-common mb--30">
                            <h4 class="categories-subtitle"> E-DVDs</h4>
                            <ul>
                                @foreach($dvdKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ Route('showLPs') }}"><img alt="" src="{{ asset('images/icons/lp.png') }}"> Long-Player
                        Record <i class="zmdi zmdi-chevron-right"></i></a>
                    <div class="category-menu-dropdown">
                        <div class="category-part-1 category-common mb--30">
                            <h4 class="categories-subtitle"> Long-Player</h4>
                            <ul>
                                @foreach($lpKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="category-part-2 category-common mb--30">
                            <h4 class="categories-subtitle"> E-Long-Player</h4>
                            <ul>
                                @foreach($lpKinds as $key=>$kind)
                                <li><a href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>