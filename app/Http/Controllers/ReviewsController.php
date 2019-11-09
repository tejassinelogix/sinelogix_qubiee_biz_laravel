<?php

namespace App\Http\Controllers;

use App\Models\user\product;

use Illuminate\Http\Request;
use App\Review;
use View;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Storage;
use Mail;
use Illuminate\Support\Facades\Gate;

class ReviewsController extends Controller
{
   
     public function store(Request $request)
    {
        Review::create($request->all() + ['user_id' => auth()->id()]);
        // return redirect()->route('admin.products.show', $request->product_id);
        return redirect()->back();
    }
}
