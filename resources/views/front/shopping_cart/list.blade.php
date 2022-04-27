@extends('front.layouts.app')
@section('title')  E-book Shop-cart list @endsection
@section('content')
    @include('front.layouts.page_header', ['pageTitle'=>'Shopping Cart','page_name'=>'Shopping Cart'])
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            @if($shoppingCartItems->count()>0)
                @php $row = '8' @endphp
            @else
            @php $row = '12' @endphp
            @endif
            <div class="col-lg-{{$row}} table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Books</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($shoppingCartItems as $item)
                        <tr>                            
                            <td class="align-middle">
                                <img src="{{asset('assets/images/books/'.$item->model->image)}}" alt="" style="width: 50px;">
                                {{$item->name}}
                            </td>
                            <td class="align-middle">{{$item->price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                            value="{{$item->quantity}}" style="position: inherit; top: 20px !important;">
                                    <div class="input-group-btn">                                        
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{$item->rowPrice}}</td>
                            <td class="align-middle">
                                <form action="{{route('cart.remove')}}" id="removeItem_{{$loop->iteration}}" method="post">
                                    @csrf
                                    <input type="hidden" name="book" value="{{$item->id}}">
                                </form>
                                <button class="btn btn-sm btn-primary" onclick="submitCartForm(event,'removeItem_{{$loop->iteration}}')" role="submit">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>                        
                        @empty
                        <tr>
                            <td colspan="5">
                                No items in the cart.
                                <a href="{{route('books.all')}}">Continue Shopping</a>
                            </td>
                        </tr>
                        @endforelse
                        @if($shoppingCartItems->count()>0)
                            <tr>
                                <td colspan="5">
                                    <form action="{{route('cart.clear')}}" id="clearAllItems" method="post">
                                        @csrf
                                    </form>                                
                                    <button class="btn btn-primary" onclick="submitCartForm(event,'clearAllItems')" role="submit">Remove All Items</button>
                                </td>
                            </tr>
                        @endif    
                    </tbody>
                </table>
            </div>
            @if($shoppingCartItems->count()>0)
                <div class="col-lg-4">
                    <form class="mb-5" action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">{{Darryldecode\Cart\Facades\CartFacade::getSubTotal()}}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{Darryldecode\Cart\Facades\CartFacade::getTotal()}}</h5>
                            </div>
                            <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                        </div>
                    </div>
                </div>
            @endif    
        </div>
    </div>
    <!-- Cart End -->
@endsection