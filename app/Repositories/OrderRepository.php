<?php

namespace App\Repositories;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderContract
{
    protected $model;

    public function __construct(Order $model)
    {
        // parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {   
        $userId = Auth::id();

        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>  auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::session($userId)->getSubTotal(),
            'item_count'        =>  Cart::session($userId)->getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes']
        ]);

        if ($order) {

            $items = Cart::session($userId)->getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);

                $order->items()->save($orderItem);
            }
        }

        return $order;
    }

    public function listOrder(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model->orderBy($order, $sort)->get($columns);
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        $search = "";

        $orders = Order::where('name', 'like', '%'.$search.'%')
                    ->orWhere('slug', 'like', '%'.$search.'%')
                    ->orWhereHas('parent', function($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })
                    ->paginate(10);

        return $orders;
    }

    public function findOrderByNumber($orderNumber): ?Order
    {
        return $this->model->where('order_number', $orderNumber)->first();
    }
}