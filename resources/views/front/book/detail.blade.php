@extends('front.layouts.app')
@section('title')
    E-book Shop-book detail
@endsection
@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
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
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
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
                        <input type="text" class="form-control bg-secondary text-center" value="1">
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
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Reviews (0)</a>
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
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                            at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>                                
                                @if(Auth::check())
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form action="{{route('books.review')}}" method="POST" id="book_review">
                                        @csrf
                                        <input type="hidden" name="book" value="{{$bookDetail->id}}">
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" name="comments" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                @else
                                    <a href="">Write Your Review</a>                                       
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
