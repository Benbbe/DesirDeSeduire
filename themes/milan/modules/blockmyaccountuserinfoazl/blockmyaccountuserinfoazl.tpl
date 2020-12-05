<table class="user-info">
    <tr>
       <td>
          <div class="col-xs-12 wellcome">
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h4>{l s='Welcome'} <span>{$customerName}</span></h4>
                <p>{l s='Welcome to your account. Here you can manage all of your personal information.'}</p>
             </div>
             <div class="col-lg-5 col-xs-12 col-sm-6 pull-right">
                {if $cartQty}
                <div class="row">
                   <div class="col-xs-12 col-sm-6">
                      <p class="my-orders">{l s='My Orders'}:</p>
                      <p>{l s='You have'} {$cartQty} {if $cartQty == 1} {l s='item'} {else} {l s='items'} {/if} {l s='in your cart'}</p>
                   </div>
                   <div class="col-xs-12 col-sm-6 view-cart">
                      <a href="{$link->getPageLink("order", true)|escape:"html":"UTF-8"}" class="btn btn-sec-col"><i class="icon-bag"></i>&nbsp;&nbsp;{l s='View cart'}</a>
                   </div>
                </div>
                {/if}
             </div>
          </div>
          <div class="col-xs-12 last">
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 {if $lastLoginTime}
                <p>{l s='Last loged on'}:<span>   {$lastLoginTime}</span></p>
                {/if}
             </div>
              {if $lastProduct}
              <div class="col-lg-5 col-xs-12 col-sm-6 pull-right">
                <div class="row">
                   <p class="col-xs-12">{l s='Last item ordered'}:<span> {$lastProduct.name|strip_tags:'UTF-8'|truncate:36:'...'}</span>  <span class="price">{convertPrice price=$lastProduct.price}</span></p>
                </div>
              </div>
              {/if}
       </td>
    </tr>
 </table>