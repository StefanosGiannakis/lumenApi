<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponController extends Controller
{
    public function showAllCoupons()
    {
        return response()->json(Coupon::all());
    }

    public function showOneCoupon($id)
    {
        return response()->json(Coupon::find($id));
    }

    public function create(Request $request)
    {
        try {
            $name = $request->input('name');
            $description = $request->input('description');
            $isCoupon = $request->input('isCoupon');
            $active = $request->input('active');
            $productGroups = $request->input('productGroups');
            $tags = $request->input('tags');
            $isTake = $request->input('isTake');
            $isDelivery = $request->input('isDelivery');

            $save = m_menu::create([
                'name'=> $name,
                'description'=> $description,
                'isCoupon'=> $isCoupon,
                'active'=> $active,
                'productGroups'=> $productGroups,
                'tags'=> $tags,
                'isTake'=> $isTake,
                'isDelivery'=> $isDelivery,
            ]);
            $res = "coupon is created";
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res = "we had an error";
            return response($res, 500);
        }

        //     "name"=> "Pizza and Choco",
        //     "description"=> "Club Sandwich with Cola",
        //     "isCoupon"=> 1,
        //     "active"=> 0,
        //     "productGroups"=> "\"Pizzas\", \"Nachos\"",
        //     "tags"=> "\"Pizzas\", \"Cheese\" , \"Club Sandwich\"",
        //     "isTake"=> 0,
        //     "isDelivery"=> 1
        // return response()->json($coupon, 201);
    }

    public function update($id, Request $request)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());

        return response()->json($coupon, 200);
    }

    public function delete($id)
    {
        Coupon::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
