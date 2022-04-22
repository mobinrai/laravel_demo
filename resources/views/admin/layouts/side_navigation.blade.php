@php $route = Request::route()->getName()
@endphp
<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item"><a class="nav-link @if($route=='admin.dashboard') active @endif"
                        href="{{route('admin.dashboard')}}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span data-feather="cast"></span></span>
                            <span class="nav-link-text">Dashbboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <p class="navbar-vertical-label">Menus</p>
                    {{-- Link for general --}}
                    <a class="nav-link dropdown-indicator {{getCssClassForGeneral('active')}}" href="#general"
                        role="button" data-bs-toggle="collapse" aria-expanded="{{getCssClassForGeneral('true')}}" 
                        aria-controls="general">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center"><span
                                    class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                    data-feather="file-text"></span></span><span class="nav-link-text">General</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent {{getCssClassForGeneral('show')}}" id="general">
                        <li class="nav-item">
                            <a class="nav-link @if(str_contains($route, 'admin.authors')) active @endif" href="{{route('admin.authors.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">author</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(str_contains($route, 'admin.categories')) active @endif" 
                                href="{{route('admin.categories.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">categories</span>
                                </div>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link @if(str_contains($route, 'admin.genres')) active @endif" 
                                href="{{route('admin.genres.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">genre</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('admin/publications/*')) active @endif" href="{{route('admin.publications.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">publications</span>
                                </div>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('admin/sliders/*')) active @endif" href="{{route('admin.sliders.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">sliders</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    {{-- Link for book --}}
                    <a class="nav-link dropdown-indicator {{getCssClassForBook('active')}}" href="#book"
                        role="button" data-bs-toggle="collapse" aria-expanded="{{getCssClassForBook('true')}}" 
                        aria-controls="general">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center"><span
                                    class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                    data-feather="file-text"></span></span><span class="nav-link-text">Books</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent {{getCssClassForBook('show')}}" id="book">
                        <li class="nav-item">
                            <a class="nav-link @if(str_contains($route, 'admin.books')) active @endif" href="{{route('admin.books.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Book</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('admin/books-faq/*')) active @endif" href="{{route('admin.categories.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Faq</span>
                                </div>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.book-sales.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Sales</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.book-types.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Types</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    {{-- Link for orders --}}
                    <a class="nav-link dropdown-indicator" href="#orders" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="orders">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center"><span
                                    class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                    data-feather="columns"></span></span><span class="nav-link-text">Orders</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent" id="orders">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.orders.new')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">New Orders</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.orders.pending')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Pending Orders</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.orders.refund')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Refund Orders</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    {{-- Link for world --}}
                    <a class="nav-link dropdown-indicator {{getCssClassForWorld('active')}}" href="#world" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{getCssClassForWorld('true')}}" aria-controls="world">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center"><span
                                    class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                    data-feather="columns"></span></span><span class="nav-link-text">World</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent {{getCssClassForWorld('show')}}" id="world">
                        <li class="nav-item">
                            <a class="nav-link @if(str_contains($route, 'admin.countries')) active @endif" href="{{route('admin.countries.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Country</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(str_contains($route, 'admin.languages')) active @endif" href="{{route('admin.languages.index')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text">Languages</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#components" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center"><span
                                    class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                    data-feather="package"></span></span><span class="nav-link-text">Components</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent" id="components">
                        <li class="nav-item"><a class="nav-link" href="modules/components/accordion.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Accordion</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/avatar.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Avatar</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/alerts.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Alerts</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/badge.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Badge</span></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/breadcrumb.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Breadcrumb</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/button.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Buttons</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/card.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Card</span></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/carousel.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Carousel</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/collapse.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Collapse</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/dropdown.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Dropdown</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/list-group.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">List group</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/modal.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Modals</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/offcanvas.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Offcanvas</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="modules/components/progress-bar.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Progress
                                        bar</span></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="modules/components/placeholder.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Placeholder</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/pagination.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Pagination</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/popovers.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Popovers</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/scrollspy.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Scrollspy</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/spinners.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Spinners</span>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/toast.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Toast</span></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="modules/components/tooltips.html"
                                data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Tooltips</span>
                                </div>
                            </a></li>
                    </ul>
                    
        </div>
        <div class="navbar-vertical-footer"><a class="btn btn-link border-0 fw-semi-bold d-flex ps-0" href="#!"><span
                    class="navbar-vertical-footer-icon" data-feather="log-out"></span><span>Settings</span></a></div>
    </div>
</nav>
