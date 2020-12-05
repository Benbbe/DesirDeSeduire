{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="row">
    <div class="{if $nbEmployees > 0}col-md-9{else}col-md-12{/if} col-sm-12">
        <div class="google-maps">
            <div id="map-canvas"></div>
        </div>
    </div>
    {if $nbEmployees > 0}
    <div class="col-sm-12 col-md-3">
        <h6 class="upcs">{l s='Contact person' mod='blockcontactinfosazl'}</h6>
       {foreach from=$employees item=employee name=employee}
           <div class="person">
                {if $employee.image != ''}<div class="img-cover">{$employee.image}{*HTML CONTENT*}</div>{/if}
               <div class="name">{$employee.name} {if $employee.role}
                       <span> – {$employee.role|escape:'html':'UTF-8'}</span>{/if}</div>
               {if $employee.phone}<div class="smart-phone"><i class="icon-screen-smartphone"></i><span>{$employee.phone|escape:'html':'UTF-8'}</span></div>{/if}
               {if $employee.email}<div class="email"><i class="icon-envelope-open"></i>{mailto address=$employee.email|escape:'html':'UTF-8' encode="hex"}</div>{/if}
           </div>
       {/foreach}
    </div>
    {/if}
 </div>
{addJsDefL name='contact_address'}{$blockcontactinfosazl_address|escape:'html':'UTF-8'}{/addJsDefL}
{literal}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script type="text/javascript">  
    var geocoder;
    var map;
    function initialize() {
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(-34.397, 150.644);
      var mapOptions = {
        zoom: 14,
        center: latlng
      };
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      codeAddress();
    }

    function codeAddress() {
      var address = contact_address;
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

{/literal}