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
        $coupon = Coupon::find($id);
        if($coupon)
            return response()->json($coupon);
        else
            return response(['error'=>'no coupon here']);
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

            $save = Coupon::create([
                'name'=> $name,
                'description'=> $description,
                'isCoupon'=> $isCoupon,
                'active'=> $active,
                'productGroups'=> $productGroups,
                'tags'=> $tags,
                'isTake'=> $isTake,
                'isDelivery'=> $isDelivery,
            ]);
            $res = $save;
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res = "we had an error";
            return response($res, 500);
        }
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
