<section>
    <div class="best-product">
    <div class="col-xs-12"><h6>{l s='BEST PRODUCTS OF THE WEEK'}</h6></div>
       <div class="gap-70"></div>
       
       <div class="products-list pl-carousel">
          <ul class="pl-pages">
             {include file="$tpl_dir./product-slider.tpl" class='' products=$specials}
          </ul>
          <div class="pl-controls">
             <a href="#" class="pl-ctl-left"></a>
             <a href="#" class="pl-ctl-right"></a>
          </div>
       </div>
    </div>
 </section>