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

        $coupon = Coupon::find($id);

        if($coupon){            
            $coupon->name= $request->input('name');
            $coupon->description= $request->input('description');
            $coupon->isCoupon = $request->input('isCoupon');
            $coupon->active = $request->input('active');
            $coupon->productGroups= $request->input('productGroups');
            $coupon->tags= $request->input('tags');
            $coupon->isTake = $request->input('isTake');
            $coupon->isDelivery= $request->input('isDelivery');
            
        
            $coupon->save();

            return response()->json($coupon, 200);
        }
        else 
            return response()->json(["error"=>"Coupon Not Found !"]);
        

    }

    public function delete($id)
    {
        $coupon = Coupon::find($id); 
        
        if($coupon){
            $coupon->delete();
            return response('Deleted Successfully', 200);
        }
        else
            return response('Coupon Not Found', 404);


    }
}
