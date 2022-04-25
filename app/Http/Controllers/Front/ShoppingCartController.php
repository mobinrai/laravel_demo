<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ShoppingCartRequest;
use Darryldecode\Cart\Facades\CartFacade as ShoppingCart;

class ShoppingCartController extends Controller
{
    /**
     * list all the items from cart class
     */
    public function cartList(){
        $shoppingCartItems = ShoppingCart::getContent();
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
        ShoppingCart::add([
            'id' => $data['book_id'],
            'quantity' => $data['quantity']
        ]);
        return redirect(route('cart.list'))->with('success', 'Book is added to cart successfully');
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
            $data['book_id'],
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

        ShoppingCart::remove($data['book_id']);

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
