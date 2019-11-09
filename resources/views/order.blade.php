
<div class="innerPageSection">
    <div class="containerWrapper">
        <div class="breadcrumbs">
            <ul>
                <p><b>{{ __('message.Welcome') }}, {{ Auth::user()->name }}</b></p>
                <li><a href="index.php"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                <li>{{ __('message.Order Confirmation') }}</li>
            </ul>
        </div>
        <div class="space10"></div>
         @if(session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                    @endif
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif
        <div class="row">
            @include('user-sidebar')
            <div class="col-md-10 col-sm-10">
                <h3 class="headingFull"><span>{{ __('message.My Orders') }}</span></h3>
                <div class="buyerOrderPage">
                     <!--cartBlockRowHead--> 
                    <div class="cartBlockRowHead">
                        <div class="cartBlockDesc">
                            <h3>{{ __('message.Item Description') }}</h3>
                        </div>
                        <div class="cartBlockRate">
                            <h3>{{ __('message.Price') }} ($)</h3>
                        </div>
                        <div class="cartBlockQty">
                            <h3>{{ __('message.Quantity') }}</h3>
                        </div>
                        <div class="cartBlockTotal">
                            <h3>{{ __('message.Total') }}</h3>
                        </div>
                    </div>

                    
                     <!--cartBlockRow--> 
                    <div class="cartBlockRow">
                        <table class="OrderTable table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('message.Order Id') }}</th>
                                            <th>{{ __('message.Order Date') }}</th>
                                            <!--<th>{{ __('message.Invoice') }}</th>-->
                                            <th>{{ __('message.Item Description') }}</th>
                                            <th>{{ __('message.Product Image') }}</th>
                                            <th>{{ __('message.Order Status') }}</th>
                                            <th>{{ __('message.Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php foreach($orders as $order){?>
                                        <tr>
                                            <td>{{ __('message.Order Id') }}- {{ $order['id'] }} </td>
                                            <td>{{ __('message.Created') }}- {{ $order['created_at'] }}</td>
<!--                                            <td><center><a href="orderinvoice/{{ $order['id'] }}" ><i class="fa fa-download"></i></a></center></td>-->
                                            <td>
                                                @foreach($order->cart->items as $item)
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                      
<!--                                                        <a href="public/images/{{ $item['item']['product_image'] }}" data-lightbox="roadtrip"> {{ $item['item']['product_name'][$language] }} </a>| {{ $item['qty'] }} {{ __('message.Units') }} -->
                                                    {{ $item['item']['product_name'][$language] }} | {{ $item['qty'] }} {{ __('message.Units') }}    
                                                    <div class="clear"></div>
                                                        <span class="badge">
                                                            ${{ $item['price'] }} 
                                                        </span> 
                                                    </li>

                                                </ul>
                                                @endforeach
                                            </td>
                                              <td>
                                                  <?php // if($order['over_img']) { ?>
                                                  <!--<img src="public/images/order_img/{{ $order['over_img'] }}"  height="90px" width="90px" alt="">-->
                                                  <?php // } ?>
                                                @foreach($order->cart->items as $item)
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                      <a href="public/images/{{ $item['item']['product_image'] }}" data-lightbox="roadtrip"> <img src="public/images/{{ $item['item']['product_image'] }}"  height="90px" width="90px" alt=""></a>
                                                    </li>
                                                </ul> 
                                                @endforeach
                                            </td>
                                            <td>
                                                <?php 
                                                if(!empty($order['order_status'])){ ?>
                                                    <span class="badge badge-success">{{ $order['order_status'] }}</span>
                                                <?php }  else { ?>
                                                       <span class="badge badge-danger">Status Pending</span>
                                                            <?php }   
                                                ?>
                                                </td>
                                            <td> 
                                            <ul class="list-group">
                                                    <li class="list-group-item">
                                                          ${{ $order->cart->totalPrice }}
                                               <?php  if($order->payment_status =='Cash on delivery'){ ?>
<!--                                                  <span class="badge badge-primary">
                                                        <a href="cancelorder/{{ $order['id'] }}">Cancel</a>
                                                    </span>-->
                                                    <span class="badge badge-primary" style="background: yellow">
                                                        <a href="orderinvoice/{{ $order['id'] }}" ><i class="fa fa-download"></i></a>
                                                    </span>
                                                 <?php } else { ?>
                                                    <span class="badge badge-primary" style="background: red">
                                                       <?php echo 'Order &nbsp'.$order->payment_status; ?>
                                                    </span>
                                                  <?php  }?> 
                                                         </li>
                                                </ul> 
                                            
                                            </td>
                                             
                                                        
                                        </tr>
                                    <?php } 
                                    ?>
                                     </tbody>
                                </table>
                        <div class="orderpagination"><center>{!! $orders->links() !!}</center></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
