<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["created_at","updated_at","name","description","isCoupon","deleteAt","startsAt","expiresAt","active","productGroups","tags","isTake","isDelivery"];
    // "id": 2,
    // "created_at": null,
    // "updated_at": null,
    // "name": "Pizza and Choco",
    // "description": "Pizza and Choco kraft  large with Cola",
    // "isCoupon": 1,
    // "deleteAt": null,
    // "startsAt": "2018-10-10 00:00:00",
    // "expiresAt": "2019-05-31 00:00:00",
    // "active": 0,
    // "productGroups": "\"Pizzas\", \"Nachos\"",
    // "tags": "\"Pizzas\", \"Nachos\" , \"Cola\"",
    // "isTake": 1,
    // "isDelivery": 1
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = [];
}
