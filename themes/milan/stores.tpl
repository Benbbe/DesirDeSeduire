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

{capture name=path}{l s='Our stores'}{/capture}
{capture name=pageTitle}{l s='Our stores'}{/capture}
<div class="container">
    <div class="gap-70 hidden-xs"></div>
    <div class="row">
        <div class="{if !$hide_left_column || !$hide_right_column}{if !$hide_left_column && !$hide_right_column}col-md-6{else}col-md-9{/if}{else}col-md-12{/if} {if !$hide_left_column}col-md-push-3{/if} cat-content">
{if $simplifiedStoresDiplay}
	{if $stores|@count}
		<p class="store-title">
			<strong class="dark">
				{l s='Here you can find our store locations. Please feel free to contact us:'}
			</strong>
		</p>
                <div class="table-container">
	    <table class="table table-bordered">
	    	<thead>
            	<tr>
                	<th class="logo">{l s='Logo'}</th>
                    <th class="name">{l s='Store name'}</th>
                    <th class="address">{l s='Store address'}</th>
                    <th class="store-hours">{l s='Working hours'}</th>
                </tr>
            </thead>
			{foreach $stores as $store}
				<tr class="store-small">
					<td class="logo">
						{if $store.has_picture}
							<div class="store-image">
								<img src="{$img_store_dir}{$store.id_store}.jpg" alt="" />
							</div>
						{/if}
					</td>
					<td class="name">
						{$store.name|escape:'html':'UTF-8'}
					</td>
		            <td class="address">
		            {assign value=$store.id_store var="id_store"}
		            {foreach from=$addresses_formated.$id_store.ordered name=adr_loop item=pattern}
	                    {assign var=addressKey value=" "|explode:$pattern}
	                    {foreach from=$addressKey item=key name="word_loop"}
	                        <span {if isset($addresses_style[$key])} class="{$addresses_style[$key]}"{/if}>
	                            {$addresses_formated.$id_store.formated[$key|replace:',':'']|escape:'html':'UTF-8'}
	                        </span>
	                    {/foreach}
	                {/foreach}
	                	<br/>
						{if $store.phone}<br/>{l s='Phone:'} {$store.phone|escape:'html':'UTF-8'}{/if}
						{if $store.fax}<br/>{l s='Fax:'} {$store.fax|escape:'html':'UTF-8'}{/if}
						{if $store.email}<br/>{l s='Email:'} {$store.email|escape:'html':'UTF-8'}{/if}
						{if $store.note}<br/><br/>{$store.note|escape:'html':'UTF-8'|nl2br}{/if}
					</td>
		            <td class="store-hours">
						{if isset($store.working_hours)}{$store.working_hours}{/if}
		            </td>
				</tr>
			{/foreach}
	    </table>
        </div>
	{/if}
{else}
	<div id="map"></div>
	<p class="store-title">
		<strong class="dark">
			{l s='Enter a location (e.g. zip/postal code, address, city or country) in order to find the nearest stores.'}
		</strong>
	</p>
    <div class="store-content row">
        <div class="loading" id="stores_loader"></div>
        <div class="col-sm-7">
            <div class="address-input">
                <label for="addressInput" class="type-text">{l s='Your location:'}
                    <input class="form-control grey" type="text" name="location" id="addressInput" value="{l s='Address, zip / postal code, city, state or country'}" />
                </label>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="row ovh">
                <div class="col-sm-5">
                    <div class="radius-input">
                        <label for="radiusSelect" class="type-text">{l s='Radius:'}
                        <select name="radius" id="radiusSelect" class="s-styled form-control">
                            <option value="15">15</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        </label> 
                    </div>
                </div>
                <div class="col-sm-7">
                    <label class="type-text">
                        &nbsp;
                        <button name="search_locations" class="btn-sm btn-third-col button btn btn-block button-small">
                            <span>
                                    {l s='Search'}
                            </span>
                        </button>
                    </label>
                </div>
            </div>
            
        </div>
        <div>
            
        </div>
    </div>   
    <div class="row gap-15 ovh">
        <div class="col-sm-12">
            <div class="store-content-select selector3">
                <select id="locationSelect" class="form-control select s-styled">
                        <option>-</option>
                </select>
            </div>
            <div class="table-container gap-15">
                <table id="stores-table" class="table table-bordered resp-tbl">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>{l s='Store'}</th>
                        <th>{l s='Address'}</th>
                        <th>{l s='Distance'}</th>
                    </tr>		
                </thead>
                <tbody>
                    <tr class="empty">
                        <td class="num">
                            <div class="resp-tbl-head">#</div>
                            <div class="resp-tbl-cnt"></div>
                        </td>
                        <td class="store">
                            <div class="resp-tbl-head">{l s='Store'}</div>
                            <div class="resp-tbl-cnt"></div>
                        </td>
                        <td class="address">
                            <div class="resp-tbl-head">{l s='Address'}</div>
                            <div class="resp-tbl-cnt"></div>
                        </td>
                        <td class="distance">
                            <div class="resp-tbl-head">{l s='Distance'}</div>
                            <div class="resp-tbl-cnt"></div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    {if !$hide_left_column}
    <div class="col-md-3 {if !$hide_left_column && !$hide_right_column}col-md-pull-6{else}col-md-pull-9{/if} cat-sidebar">
        <aside>
            {hook h="displayLeftColumn"}
        </aside>
    </div>
    {/if}
    {if !$hide_right_column}
    <div class="col-md-3 cat-sidebar">
        <aside>
            {hook h="displayRightColumn"}
        </aside>
    </div>
    {/if}                  
</div>
	
{strip}
{addJsDef map=''}
{addJsDef markers=array()}
{addJsDef infoWindow=''}
{addJsDef locationSelect=''}
{addJsDef defaultLat=$defaultLat}
{addJsDef defaultLong=$defaultLong}
{addJsDef hasStoreIcon=$hasStoreIcon}
{addJsDef distance_unit=$distance_unit}
{addJsDef img_store_dir=$img_store_dir}
{addJsDef img_ps_dir=$img_ps_dir}
{addJsDef searchUrl=$searchUrl}
{addJsDef logo_store=$logo_store}
{addJsDefL name=translation_1}{l s='No stores were found. Please try selecting a wider radius.' js=1}{/addJsDefL}
{addJsDefL name=translation_2}{l s='store found -- see details:' js=1}{/addJsDefL}
{addJsDefL name=translation_3}{l s='stores found -- view all results:' js=1}{/addJsDefL}
{addJsDefL name=translation_4}{l s='Phone:' js=1}{/addJsDefL}
{addJsDefL name=translation_5}{l s='Get directions' js=1}{/addJsDefL}
{addJsDefL name=translation_6}{l s='Not found' js=1}{/addJsDefL}
{/strip}
{/if}
</div>