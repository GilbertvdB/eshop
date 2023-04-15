<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if ($search === 'completed') {
            $search = 1;
        } else if ($search === 'not completed') {
            $search = 0;
        }

        $orders = Order::where('order_number', 'like', '%'.$search.'%')
                    ->orWhere('status', 'like', '%'.$search.'%')
                    ->orWhere('payment_status', 'like', '%'.$search.'%')
                    ->paginate(10);

        $pageTitle = 'Orders';
        $pageDescription = 'List of all orders';

        return view('admin.orders.index', compact('orders', 'pageTitle', 'pageDescription'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', ['order' => $order]);
    }
}
