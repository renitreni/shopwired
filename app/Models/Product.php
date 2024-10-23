<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        "product_api_id",
        "title",
        "description",
        "description2",
        "description3",
        "description4",
        "description5",
        "active",
        "bundle",
        "sortOrder",
        "deliveryPrice",
        "freeDelivery",
        "singleDeliveryPrice",
        "weight",
        "metaTitle",
        "metaKeywords",
        "metaDescription",
        "slug",
        "url",
        "videoCode",
        "sku",
        "stock",
        "comparePrice",
        "gtin",
        "mpn",
        "new",
        "twoForOne",
        "threeForTwo",
        "vatExclusive",
        "warehouseNotes",
        "price",
        "costPrice",
        "salePrice",
        "excludedFromTradeDiscounts",
        "searchKeywords",
        "hasRandomRelatedProducts",
        "shippingAddressNotRequired",
        "googleIsBundle",
        "googleNoIdentifierExists",
        "eBayBestOffer",
        "eBayCondition",
        "fileUploadsAllowed",
        "rewardPoints",
        "salesTaxCode",
        "salesTaxExempt",
        "subscription",
    ];
}
