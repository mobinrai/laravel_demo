<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ShoppingCartRequest;
use App\Models\Book;
use Darryldecode\Cart\Facades\CartFacade as ShoppingCart;
use Illuminate\Support\Facades\URL;

class ShoppingCartController extends Controller
{
    /**
     * list all the items from cart class
     */
    public function cartList(){
        $shoppingCartItems = ShoppingCart::getContent()->map(function($items) {
            $items['rowPrice'] = ShoppingCart::get($items->id)->getPriceSum();
            // $bookImage = Book::whereId($items->id)->pluck('image');
            // $items['image'] = null;
            // if($bookImage->count()>0){
            //     $items['image'] = $bookImage[0];
            // }
            return $items;
        });
        return view('front.shopping_cart.list', compact('shoppingCartItems'));
    }
    /**
     * @param  App\Http\Requests\Front\ShoppingCartRequest $request
     * 
     * @return \Illuminate\Http\Response
     * 
     * add new item to cart 
     */
    public function addToCart(ShoppingCartRequest $request)
    {
        $data = $request->validated();
        $book = Book::whereId($data['book'])->firstOrFail();
        $quantity = 1;
        ShoppingCart::add([
            'id' => $book->id,
            'name' => $book->title,
            'price' => $book->sale_price,
            'quantity' => $quantity,
            'attributes' => array(),
            'associatedModel' => Book::class
        ]);
        return redirect(URL::previous())->with('success', 'Book is added to cart successfully');
    }
    /**
     * @param  App\Http\Requests\Front\ShoppingCartRequest $request
     * 
     * @return \Illuminate\Http\Response
     * 
     * update exists item to cart 
     */
    public function updateCart(ShoppingCartRequest $request)
    {
        $data = $request->validated();

        ShoppingCart::update(
            $data['book'],
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect(route('cart.list'))->with('success', 'Book is updated successfully');;
    }
    /**
     * @param  App\Http\Requests\Front\ShoppingCartRequest $request
     * 
     * @return \Illuminate\Http\Response
     * 
     * delete single item from cart 
     */
    public function removeCart(ShoppingCartRequest $request)
    {
        $data = $request->validated();

        ShoppingCart::remove($data['book']);

        return redirect(route('cart.list'))->with('success', 'Book remove Successfully');
    }
    /**
     *
     * @return \Illuminate\Http\Response
     * 
     * delete all item from cart
     */
    public function clearAllCart()
    {
        ShoppingCart::clear();

        return redirect(route('cart.list'))->with('success', 'All Item Cart Clear Successfully !');;
    }
}
