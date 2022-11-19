<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Cart Controller
 *
 * @package Controller
 * @author  Panelki
 */
class CartController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    function cartAdd(Request $request): RedirectResponse
    {
        session_start();

        $panel = new Panel();
        $catalog = $panel->all();

        if (!isset($_SESSION['order_array'])) {
            $_SESSION['order_array'] = [];
            $_SESSION['order_array'][] = ['name' => $request->name, 'quantity' => 1];
            $_SESSION['cart_cost'] = $request->price;
            if (str_starts_with($request->pageName, 'selected_issues')) {
                return redirect()->route(
                    "selected_issue",
                    ['id' => substr($request->pageName, strpos($request->pageName, "/") + 1)]
                );
            }
            return redirect()->route("{$request->pageName}", ['panels' => $catalog, 'cartClass' => 'cart-active']);
        } else {
            foreach ($_SESSION['order_array'] as $key => $item_arr) {
                if ($item_arr['name'] == $request->name) {
                    $_SESSION['order_array'][$key]['quantity'] = $item_arr['quantity'] + 1;
                    $_SESSION['cart_cost'] += $request->price;
                    if (str_starts_with($request->pageName, 'selected_issues')) {
                        return redirect()->route(
                            "selected_issue",
                            ['id' => substr($request->pageName, strpos($request->pageName, "/") + 1)]
                        );
                    }
                    return redirect()->route(
                        "{$request->pageName}",
                        ['panels' => $catalog, 'cartClass' => 'cart-active']
                    );
                }
            }
            $_SESSION['order_array'][] = ['name' => $request->name, 'quantity' => 1];
            $_SESSION['cart_cost'] += $request->price;
            if (str_starts_with($request->pageName, 'selected_issues')) {
                return redirect()->route(
                    "selected_issue",
                    ['id' => substr($request->pageName, strpos($request->pageName, "/") + 1)]
                );
            }
            return redirect()->route('issues', ['panels' => $catalog, 'cartClass' => 'cart-active']);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    function removeCart(Request $request): RedirectResponse
    {
        session_start();

        $panel = new Panel();
        $catalog = $panel->all();

        foreach ($_SESSION['order_array'] as $key => $item_arr) {
            if ($item_arr['name'] == $request->name) {
                if ($item_arr['quantity'] > 1) {
                    $_SESSION['order_array'][$key]['quantity'] = $item_arr['quantity'] - 1;
                    $_SESSION['cart_cost'] -= $request->price;
                } else {
                    $cart_cost = $_SESSION['cart_cost'] - $request->price;
                    unset($_SESSION['order_array'][$key]);
                    $order_array = $_SESSION['order_array'];
                    session_destroy();
                    session_start();
                    if ($cart_cost) {
                        $_SESSION['cart_cost'] = $cart_cost;
                    }
                    if ($order_array) {
                        $_SESSION['order_array'] = $order_array;
                    }

                }
            }
        }
        if (str_starts_with($request->pageName, 'selected_issues')) {
            return redirect()->route(
                "selected_issue",
                ['id' => substr($request->pageName, strpos($request->pageName, "/") + 1)]
            );
        }
        return redirect()->route("{$request->pageName}", ['panels' => $catalog, 'cartClass' => 'cart-active']);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    function deleteCart(Request $request): RedirectResponse
    {
        session_start();
        session_destroy();

        $panel = new Panel();
        $catalog = $panel->all();

        if (str_starts_with($request->pageName, 'selected_issues')) {
            return redirect()->route(
                "selected_issue",
                ['id' => substr($request->pageName, strpos($request->pageName, "/") + 1)]
            );
        }
        return redirect()->route("{$request->pageName}", ['panels' => $catalog]);
    }
}
