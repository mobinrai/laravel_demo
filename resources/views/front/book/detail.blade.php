@extends('front.layouts.app')
@section('title')
    E-book Shop-book detail
@endsection
@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                @include('front.includes.success_error_message')
            </div>
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-item active">
                        <img class="w-100 h-500p" src="{{asset('assets/images/books/'.$bookDetail->image)}}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$bookDetail->title}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        @if($bookDetail->reviews->count()>0)
                            @php $stars=getTotalBookStars($bookDetail->reviews) @endphp
                            @for($i=1; $i<=5; $i++)     
                                @php $class="fas fa-star"; @endphp
                                @if($stars > $i && $stars < ($i+1) && ($i+1) < 6)
                                    @php $class="fas fa-star-half-alt"; @endphp
                                @elseif($stars < $i)
                                    @php $class="far fa-star"; @endphp
                                @endif
                                <small class="{{$class}}"></small>
                            @endfor
                        @endif        
                    </div>
                    <small class="pt-1">({{$bookDetail->reviews->count()}} Reviews)</small>
                </div>
                <p class="text-dark font-weight-medium mb-1 mr-3">Price: </p><span class="mb-3">{{$bookDetail->sale_price}}</span>
                <p class="text-dark font-weight-medium mb-1 mr-3">Author: </p><span class="mb-3">{{$bookDetail->getBookAuthorAttribute()}}</span>
                <p class="text-dark font-weight-medium mb-1 mr-3">Edition:</p><span class="mb-3">{{$bookDetail->edition}}</span>
                <p class="text-dark font-weight-medium mb-1 mr-3">Genre:</p><span class="mb-3">{{$bookDetail->getBookGenreAttribute()}}</span>
                <p class="text-dark font-weight-medium mb-1 mr-3">Pages: </p><span class="mb-3">{{$bookDetail->pages}}</span>
                <p class="text-dark font-weight-medium mb-1 mr-3">Stock:</p><span class="mb-3">{{$bookDetail->stock_quantity}}</span>
                <div class="d-flex align-items-center mb-2 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1" style="top: 20px !important;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>                
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Infromation</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Reviews ({{$bookDetail->reviews->count()}})</a>
                    @if($bookDetail->faqs->count()>0)
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Book Faq</a>
                    @endif
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Category: </span>{{$bookDetail->getBookCategoryAttribute()}}
                                    </li>
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Publication: </span>{{Str::ucfirst($bookDetail->publication->title)}}
                                    </li>
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Published Date: </span>{{$bookDetail->published_date}}
                                    </li>
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Isbn Number: </span>{{$bookDetail->isbn}}
                                    </li>
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Isbn 13 Number: </span>{{$bookDetail->isbn_13}}
                                    </li>
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Serial Number: </span>{{$bookDetail->serial_number}}
                                    </li>  
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">Description: </span><p>{{$bookDetail->description}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                    
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">Review for {{$bookDetail->title}}</h4>
                                @forelse ($bookDetail->reviews as $item)
                                    <div class="media mb-4">                                    
                                        {{-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> --}}
                                        <div class="media-body">
                                            <h6><small>{{getUserName($item->user_id)}}- <i>{{$item->created_at}}</i></small></h6>
                                            {{-- starts --}}
                                            <p>{{$item->review}}</p>
                                        </div>
                                    </div>
                                @empty
                                    Be first to review....
                                @endforelse
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>                                
                                @if(Auth::check())
                                    <small>Your email address will not be published. Required fields are marked *</small>                                    
                                    <form action="{{route('books.review')}}" method="POST" id="book_review">
                                        @if ($errors->any())
                                            <div class="alert alert-outline-danger d-flex align-items-center rounded-0" role="alert">
                                                @foreach ($errors->all() as $error)
                                                        <span class="fas fa-times-circle text-danger me-1"></span>
                                                        <p class="mb-0 flex-1">{{$error}}</p>
                                                        <br>
                                                @endforeach
                                            </div>
                                        @endif
                                        @csrf
                                        <input type="hidden" name="book" value="{{$bookDetail->id}}">
                                        <div class="form-group rating mb-0">
                                            <p class="mb-0 mr-2">Your Rating * :</p>                                            
                                            <input type="radio" id="star5" name="rating" value="10"/>
                                            <label for="star5" title="Rocks!">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4"/>
                                            <label for="star4" title="Pretty good">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3"/>
                                            <label for="star3" title="Meh">3 stars</label>                                            
                                            <input type="radio" id="star2" name="rating" value="2"/>
                                            <label for="star2" title="Kinda bad">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1"/>
                                            <label for="star1" title="Sucks big time">1 star</label>                                           
                                        </div>
                                        <br>                                        
                                        <div class="form-group mb-1" style="float: left;">
                                            <label>Your Review * :</label>
                                            <textarea id="message" cols="30" name="comment" rows="5" class="form-control" required></textarea>
                                        </div>                                        
                                        <div class="form-group mb-0" style="float: left;">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                @else
                                    <a href="{{route('login')}}">Write Your Review</a>                                       
                                @endif    
                            </div>
                        </div>
                    </div>
                    @if($bookDetail->faqs->count()>0)
                        <div class="tab-pane fade" id="tab-pane-3">
                            <ul class="list-group list-group-flush">
                                @foreach($bookDetail->faqs as $faq)
                                    <li class="list-group-item px-0">
                                        <span class="text-dark font-weight-medium mb-0 mr-3">{{$faq->question}}</span><br>
                                        {{$faq->answer}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
@endsection
