<?php
namespace App;
use DB;
use Session;

class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $giftcart = 0;
    public $giftboxtotal = 0;
    public $dilverycharge= 0;
    public $coupon_name = array();
    
    
    // for sender details for send as gift
    public $senderfullname = 0;
    public $senderphone= 0;
    public $senderemailid = 0;
    public $sendergiftevent = 0;
    public $senderaddress = 0;
    public $shippingmark = 0;

    // protected $daynamic_attr = [];
    
    
    // public function __set($field,$value){
    //     $this->daynamic_attr[$field] = $value;
    // }

    // public function __get($field){
    //     if(array_key_exists($field,$this->daynamic_attr))
    //         return $this->daynamic_attr[$field];
    //     else
    //         return null;
    // }

    public function __construct($oldCart){
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
                $this->giftcart = $oldCart->giftcart;
                $this->giftboxtotal = $oldCart->giftboxtotal;
                $this->dilverycharge=$oldCart->dilverycharge;
                
                // for sender details for send as gift
                $this->senderfullname = $oldCart->senderfullname;
    		$this->senderphone = $oldCart->senderphone;
                $this->senderemailid = $oldCart->senderemailid;
                $this->sendergiftevent = $oldCart->sendergiftevent;
                $this->senderaddress=$oldCart->senderaddress;
                $this->shippingmark=$oldCart->shippingmark;
                
                
    	}
        if( Session::has('locale') ){
            $this->language = Session::get('locale');
        } 
    }

     public function add($item, $id){
        $over_img = Session::get('over_img');
        $send_gift = Session::get('send_as_gift');
        Session::forget('over_img');
        Session::forget('send_as_gift');
        Session::save();
        $giftwraping=0;
//        echo "send_gift :",$send_gift;
//        die;
     	// $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
     	// if($this->items){
     	// 	if(array_key_exists($id, $this->items)){
     	// 		$storedItem = $this->items[$id];
     	// 	}
     	// }
     	// $storedItem['qty']++;
     	// $storedItem['price'] = $item->price * $storedItem['qty'];
     	// $this->items[$id] = $storedItem;
     	// $this->totalQty++;
     	// $this->totalPrice += $item->price;
        
        $pro_qty = DB::table('stocks')->where('product_id', $id )->latest()->first();
        $r_qty = $pro_qty->remained_qty; 
//        $s_qty = $pro_qty->sale_qty; 
//        $p_id = $pro_qty->id; 
//        
//        $r_qty = $r_qty - 1;
//        $s_qty = $s_qty + 1;
//        
//        $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
                
        $storedItem = ['qty' => 0, 'product_name'=>$item->product_name,'price' => $item->product_price,'over_img' => $over_img,'item' => $item, 'send_gift' => $send_gift,'giftwraping'=>$giftwraping,'dilverycharges'=>$item->dilverycharges];
        $users = freedeilvery::where('status', '=', 1)->first();
        
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        if($r_qty > 1)
        {
            $storedItem['qty']++;
            $storedItem['price'] = $item->product_price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice += $item->product_price;
            if($this->totalPrice > $users->deilveriescharges){
               $this->dilverycharge = 0;
            }else{
                $this->dilverycharge += $item->dilverycharges;
            }
            
            $storedItem['product_namef'] =  $storedItem['product_name'];
//            $this->giftcart = 0;
            
            alert()->success('Item Name :- '.$storedItem['product_namef']['en']."\n".'Quantity :- '.$storedItem['qty']."\n".'Price :- $ '.$storedItem['price'],'Product Added to Cart ')->autoclose(3000);                
        }
        else{
            alert()->warning('Not Available!');
            // Session::flash('qty_message', 'Not Available!'); 
        }
     }
     // for buy now same like add function different is removed alert rediret to shopping cart
      public function addbuynow($item, $id){
        $over_img = Session::get('over_img');
        $send_gift = Session::get('send_as_gift');
        Session::forget('over_img');
        Session::forget('send_as_gift');
        Session::save();
        $giftwraping=0;
//        echo "send_gift :",$send_gift;
//        die;
     	// $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
     	// if($this->items){
     	// 	if(array_key_exists($id, $this->items)){
     	// 		$storedItem = $this->items[$id];
     	// 	}
     	// }
     	// $storedItem['qty']++;
     	// $storedItem['price'] = $item->price * $storedItem['qty'];
     	// $this->items[$id] = $storedItem;
     	// $this->totalQty++;
     	// $this->totalPrice += $item->price;
        
        $pro_qty = DB::table('stocks')->where('product_id', $id )->latest()->first();
        $r_qty = $pro_qty->remained_qty; 
//        $s_qty = $pro_qty->sale_qty; 
//        $p_id = $pro_qty->id; 
//        
//        $r_qty = $r_qty - 1;
//        $s_qty = $s_qty + 1;
//        
//        $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
                
        $storedItem = ['qty' => 0, 'product_name'=>$item->product_name,'price' => $item->product_price,'over_img' => $over_img,'item' => $item, 'send_gift' => $send_gift,'giftwraping'=>$giftwraping,'dilverycharges'=>$item->dilverycharges];
       $users = freedeilvery::where('status', '=', 1)->first();
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        if($r_qty > $this->totalQty)
        {
            $storedItem['qty']++;
            $storedItem['price'] = $item->product_price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice += $item->product_price;  
             if($this->totalPrice > $users->deilveriescharges){
               $this->dilverycharge = 0;
            }else{
                $this->dilverycharge += $item->dilverycharges;
            }
            $storedItem['product_namef'] =  $storedItem['product_name'];
//            $this->giftcart = 0;
            
            //alert()->success('Item Name :- '.$storedItem['product_namef']['en']."\n".'Quantity :- '.$storedItem['qty']."\n".'Price :- $ '.$storedItem['price'],'Product Added to Cart ')->autoclose(5000);                
        }
        else{
            alert()->warning('Not Available!');
            // Session::flash('qty_message', 'Not Available!'); 
        }
     }
     
     public function addgift($item, $id){
        $over_img = Session::get('over_img');
        $send_gift = Session::get('send_as_gift');
        Session::forget('over_img');
        Session::forget('send_as_gift');
        Session::save();
        $giftwraping=0;
//        echo "send_gift :",$send_gift;
//        die;
     	// $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
     	// if($this->items){
     	// 	if(array_key_exists($id, $this->items)){
     	// 		$storedItem = $this->items[$id];
     	// 	}
     	// }
     	// $storedItem['qty']++;
     	// $storedItem['price'] = $item->price * $storedItem['qty'];
     	// $this->items[$id] = $storedItem;
     	// $this->totalQty++;
     	// $this->totalPrice += $item->price;
        
        $pro_qty = DB::table('stocks')->where('product_id', $id )->latest()->first();
        $r_qty = $pro_qty->remained_qty; 
//        $s_qty = $pro_qty->sale_qty; 
//        $p_id = $pro_qty->id; 
//        
//        $r_qty = $r_qty - 1;
//        $s_qty = $s_qty + 1;
//        
//        $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
                
        $storedItem = ['qty' => 0, 'product_name'=>$item->product_name,'price' => $item->product_price,'over_img' => $over_img,'item' => $item, 'send_gift' => $send_gift,'giftwraping'=>$giftwraping,'dilverycharges'=>$item->dilverycharges];
       $users = freedeilvery::where('status', '=', 1)->first();
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        if($r_qty > $this->totalQty)
        {
            $storedItem['qty']++;
            $storedItem['price'] = $item->product_price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice += $item->product_price;  
             if($this->totalPrice > $users->deilveriescharges){
               $this->dilverycharge = 0;
            }else{
                $this->dilverycharge += $item->dilverycharges;
            }
            $storedItem['product_namef'] =  $storedItem['product_name'];
            $this->giftcart = 1;
            
            //alert()->success('Item Name :- '.$storedItem['product_namef']['en']."\n".'Quantity :- '.$storedItem['qty']."\n".'Price :- $ '.$storedItem['price'],'Product Added to Cart ')->autoclose(5000);                
        }
        else{
            alert()->warning('Not Available!');
            // Session::flash('qty_message', 'Not Available!'); 
        }
     }
     public function reduceByOne($id){
         
//        $pro_qty = DB::table('stocks')->where('product_id', $id )->latest()->first();
//        $r_qty = $pro_qty->remained_qty; 
//        $s_qty = $pro_qty->sale_qty; 
//        $p_id = $pro_qty->id; 
//        
//        $r_qty = $r_qty + 1;
//        $s_qty = $s_qty - 1;
//        
//        $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
         $users = freedeilvery::where('status', '=', 1)->first();
         $this->items[$id]['qty']--;
         $this->items[$id]['price'] -= $this->items[$id]['item']['product_price'];
         $this->totalQty--;
         $this->totalPrice -= $this->items[$id]['item']['product_price'];
         if($this->totalPrice > $users->deilveriescharges){
               $this->dilverycharge = 0;
            }else{
                $this->dilverycharge -= $this->items[$id]['item']['dilverycharges'];
            }
         if($this->items[$id]['qty'] <= 0){
             unset($this->items[$id]);
         }
         //alert()->success('Product Quantity Reduced By 1');
     }
     
     public function increaseByOne($id){
        
         
        $pro_qty = DB::table('stocks')->where('product_id', $id )->latest()->first();
        $users = freedeilvery::where('status', '=', 1)->first();
        $r_qty = $pro_qty->remained_qty; 
//        $s_qty = $pro_qty->sale_qty; 
//        $p_id = $pro_qty->id; 
//        
//        $r_qty = $r_qty - 1;
//        $s_qty = $s_qty + 1;
//        
//        $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
         
        if($r_qty > $this->totalQty)
        {
         $this->items[$id]['qty']++;
         $this->items[$id]['price'] += $this->items[$id]['item']['product_price'];
         $this->totalQty++;
         $this->totalPrice += $this->items[$id]['item']['product_price'];
         if($this->totalPrice > $users->deilveriescharges){
               $this->dilverycharge = 0;
            }else{
                $this->dilverycharge += $this->items[$id]['item']['dilverycharges'];
            }
         //alert()->success('Product Quantity Incresed By 1');
        }
        else{
            alert()->warning('Not Available!');
            // Session::flash('qty_message', 'Not Available!'); 
        }
     }
     
     public function removeItem($id){
//        $pro_qty = DB::table('stocks')->where('product_id', $id )->latest()->first();
//        $r_qty = $pro_qty->remained_qty; 
//        $s_qty = $pro_qty->sale_qty; 
//        $p_id = $pro_qty->id; 
//        
//        $r_qty = $r_qty + $this->items[$id]['qty'];
//        $s_qty = $s_qty - $this->items[$id]['qty'];
//        
//        $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
               $users = freedeilvery::where('status', '=', 1)->first();
         $this->totalQty -= $this->items[$id]['qty'];
         $this->totalPrice -= $this->items[$id]['price'];
         if($this->totalPrice > $users->deilveriescharges){
               $this->dilverycharge = 0;
            }else{
                $this->dilverycharge -= $this->items[$id]['item']['dilverycharges'];
            }
//           if($this->items[$id]['giftwraping'] == 1){
//             $this->giftboxtotal -= $this->items[$id]['item']['wraping_charage'];
//                    }
          if($this->items[$id]['send_gift'] == 1){
             $this->giftcart = 0;
             }
         unset($this->items[$id]);
        
         alert()->success('Product Removed From Cart')->autoclose(3000);;
     }
       public function removeItemAll(){
       
         unset($this->items);
        
         //alert()->success('All Product Removed From Cart')->autoclose(3000);;
     }
        public function addgiftwraping($id){
         $this->items[$id]['giftwraping'] = 1;
//          if($this->totalPrice > $item->wraping_charage){
//               $this->giftboxtotal = 0;
//            }else{
                $this->giftboxtotal = $this->items[$id]['item']['wraping_charage'];
//            }
//         $this->items[$id]['giftcart'] = $sendasgiftvalue;
//      alert()->success('Product updated');
         
     }
        public function removegiftwraping($id){
         $this->items[$id]['giftwraping'] = 0;
         $datafoundcount=0;
         foreach ( $this->items as $dataarray){
            
         if($dataarray['giftwraping'] == 1){
             $datafoundcount=1;
         }
           }
           
     if($datafoundcount==1){
         $this->giftboxtotal = $this->items[$id]['item']['wraping_charage'];
     }else{
         $this->giftboxtotal = 0;
     }
      
                

//      alert()->success('Product updated');
         
     }
     // code for add send as gift
      public function addSendAsGift(){
         $this->giftcart = 1;
     }
       public function removeSendAsGift(){
          
         $this->giftcart = 0;
     }
}
