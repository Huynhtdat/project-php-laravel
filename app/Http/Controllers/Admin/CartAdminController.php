<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartAdminController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Cart List',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Cart Detail: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
