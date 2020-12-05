{**
 * This source file is subject to a commercial license from AZELAB
 *
 * @package   Tabbed Featured Categories Subcategories on Home
 * @author    AZELAB
 * @copyright Copyright (c) 2014 AZELAB (http://www.azelab.com)
 * @license   Commercial license
 * Support by mail:  support@azelab.com
*}
<div>
	<form class="form-horizontal setting-form" method="POST">
		<input type="submit" class="btn btn-success pull-right" name="save-mmsettings" value="Save">
		<h3>{l s='Basic Settings' mod='megamenu'}</h3>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Bootstrap Theme' mod='megamenu'}</label>
			
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" name="mmsettings[is_bootstrap]" id="is_bootstrap_on" value="1" {if isset($mmsettings['is_bootstrap']) && $mmsettings['is_bootstrap'] == 1}checked="chekced"{/if}>
					<label for="is_bootstrap_on" class="radioCheck">
						{l s='Yes' mod='megamenu'}
					</label>
					<input type="radio" name="mmsettings[is_bootstrap]" id="is_bootstrap_off" value="1" {if isset($mmsettings['is_bootstrap']) && $mmsettings['is_bootstrap'] == 0}checked="chekced"{/if}>
					<label for="is_bootstrap_off" class="radioCheck">
						{l s='No' mod='megamenu'}
					</label>
					<a class="slide-button btn"></a>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Dropdown hover' mod='megamenu'}</label>
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" name="mmsettings[is_hover]" id="is_hover_on" value="1" {if isset($mmsettings['is_hover']) && $mmsettings['is_hover'] == 1}checked="chekced"{/if}>
					<label for="is_hover_on" class="radioCheck">
						{l s='Enable' mod='megamenu'}
					</label>
					<input type="radio" name="mmsettings[is_hover]" id="is_hover_off" value="0" {if isset($mmsettings['is_hover']) && $mmsettings['is_hover'] == 0}checked="chekced"{/if}>
					<label for="is_hover_off" class="radioCheck">
						{l s='Disable' mod='megamenu'}
					</label>
					<a class="slide-button btn"></a>
				</span>
			</div>
		</div>
		<h3>{l s='Effects' mod='megamenu'}</h3>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Dropdown hover' mod='megamenu'}</label>
			<div class="col-lg-3">
				<select name="mmsettings[effect]" id="megamenu-effect">
					<option value="">no effect</option>
					<optgroup label="Attention Seekers">
						<option value="bounce">bounce</option>
						<option value="flash">flash</option>
						<option value="pulse">pulse</option>
						<option value="rubberBand">rubberBand</option>
						<option value="shake">shake</option>
						<option value="swing">swing</option>
						<option value="tada">tada</option>
						<option value="wobble">wobble</option>
					</optgroup>

					<optgroup label="Bouncing Entrances">
						<option value="bounceIn">bounceIn</option>
						<option value="bounceInDown">bounceInDown</option>
						<option value="bounceInLeft">bounceInLeft</option>
						<option value="bounceInRight">bounceInRight</option>
						<option value="bounceInUp">bounceInUp</option>
					</optgroup>

					<optgroup label="Bouncing Exits">
						<option value="bounceOut">bounceOut</option>
						<option value="bounceOutDown">bounceOutDown</option>
						<option value="bounceOutLeft">bounceOutLeft</option>
						<option value="bounceOutRight">bounceOutRight</option>
						<option value="bounceOutUp">bounceOutUp</option>
					</optgroup>

					<optgroup label="Fading Entrances">
						<option value="fadeIn">fadeIn</option>
						<option value="fadeInDown">fadeInDown</option>
						<option value="fadeInDownBig">fadeInDownBig</option>
						<option value="fadeInLeft">fadeInLeft</option>
						<option value="fadeInLeftBig">fadeInLeftBig</option>
						<option value="fadeInRight">fadeInRight</option>
						<option value="fadeInRightBig">fadeInRightBig</option>
						<option value="fadeInUp">fadeInUp</option>
						<option value="fadeInUpBig">fadeInUpBig</option>
					</optgroup>

					<optgroup label="Fading Exits">
						<option value="fadeOut">fadeOut</option>
						<option value="fadeOutDown">fadeOutDown</option>
						<option value="fadeOutDownBig">fadeOutDownBig</option>
						<option value="fadeOutLeft">fadeOutLeft</option>
						<option value="fadeOutLeftBig">fadeOutLeftBig</option>
						<option value="fadeOutRight">fadeOutRight</option>
						<option value="fadeOutRightBig">fadeOutRightBig</option>
						<option value="fadeOutUp">fadeOutUp</option>
						<option value="fadeOutUpBig">fadeOutUpBig</option>
					</optgroup>

					<optgroup label="Flippers">
						<option value="flip">flip</option>
						<option value="flipInX">flipInX</option>
						<option value="flipInY">flipInY</option>
						<option value="flipOutX">flipOutX</option>
						<option value="flipOutY">flipOutY</option>
					</optgroup>

					<optgroup label="Lightspeed">
						<option value="lightSpeedIn">lightSpeedIn</option>
						<option value="lightSpeedOut">lightSpeedOut</option>
					</optgroup>

					<optgroup label="Rotating Entrances">
						<option value="rotateIn">rotateIn</option>
						<option value="rotateInDownLeft">rotateInDownLeft</option>
						<option value="rotateInDownRight">rotateInDownRight</option>
						<option value="rotateInUpLeft">rotateInUpLeft</option>
						<option value="rotateInUpRight">rotateInUpRight</option>
					</optgroup>

					<optgroup label="Rotating Exits">
						<option value="rotateOut">rotateOut</option>
						<option value="rotateOutDownLeft">rotateOutDownLeft</option>
						<option value="rotateOutDownRight">rotateOutDownRight</option>
						<option value="rotateOutUpLeft">rotateOutUpLeft</option>
						<option value="rotateOutUpRight">rotateOutUpRight</option>
					</optgroup>

					<optgroup label="Specials">
						<option value="hinge">hinge</option>
						<option value="rollIn">rollIn</option>
						<option value="rollOut">rollOut</option>
					</optgroup>

					<optgroup label="Zoom Entrances">
						<option value="zoomIn">zoomIn</option>
						<option value="zoomInDown">zoomInDown</option>
						<option value="zoomInLeft">zoomInLeft</option>
						<option value="zoomInRight">zoomInRight</option>
						<option value="zoomInUp">zoomInUp</option>
					</optgroup>

					<optgroup label="Zoom Exits">
						<option value="zoomOut">zoomOut</option>
						<option value="zoomOutDown">zoomOutDown</option>
						<option value="zoomOutLeft">zoomOutLeft</option>
						<option value="zoomOutRight">zoomOutRight</option>
						<option value="zoomOutUp">zoomOutUp</option>
					</optgroup>

				</select>
			</div>
		</div>
		<h3>{l s='Colors' mod='megamenu'}<small>{l s='leave blank to use default color' mod='megamenu'}</small></h3>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Menu Background' mod='megamenu'}</label>
			<div class="col-lg-3">
				<input class="form-controll" name="mmsettings[menu_bg]" type="text" value="{if isset($mmsettings['menu_bg'])}{$mmsettings['menu_bg']|escape:'htmlall':'UTF-8'}{/if}">
				<span class="help">{l s='eg' mod='megamenu'}: #FFFFFF(<a href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">{l s='click here' mod='megamenu'}</a> {l s='for color codes' mod='megamenu'})</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Menu Active Background' mod='megamenu'}</label>
			<div class="col-lg-3">
				<input class="form-controll" name="mmsettings[menu_active_bg]" type="text" value="{if isset($mmsettings['menu_active_bg'])}{$mmsettings['menu_active_bg']|escape:'htmlall':'UTF-8'}{/if}">
				<span class="help">{l s='eg' mod='megamenu'}: #FFFFFF(<a href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">{l s='click here' mod='megamenu'}</a> {l s='for color codes' mod='megamenu'})</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Menu Active Font' mod='megamenu'}</label>
			<div class="col-lg-3">
				<input class="form-controll" name="mmsettings[menu_active_font]" type="text" value="{if isset($mmsettings['menu_active_font'])}{$mmsettings['menu_active_font']|escape:'htmlall':'UTF-8'}{/if}">
				<span class="help">{l s='eg' mod='megamenu'}: #FFFFFF(<a href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">{l s='click here' mod='megamenu'}</a> {l s='for color codes' mod='megamenu'})</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Menu Font' mod='megamenu'}</label>
			<div class="col-lg-3">
				<input class="form-controll" name="mmsettings[menu_font]" type="text" value="{if isset($mmsettings['menu_font'])}{$mmsettings['menu_font']|escape:'htmlall':'UTF-8'}{/if}">
				<span class="help">{l s='eg' mod='megamenu'}: #FFFFFF(<a href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">{l s='click here' mod='megamenu'}</a> {l s='for color codes' mod='megamenu'})</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Dropdown background' mod='megamenu'}</label>
			<div class="col-lg-3">
				<input class="form-controll" name="mmsettings[drop_bg]" type="text" value="{if isset($mmsettings['drop_bg'])}{$mmsettings['drop_bg']|escape:'htmlall':'UTF-8'}{/if}">
				<span class="help">{l s='eg' mod='megamenu'}: #FFFFFF(<a href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">{l s='click here' mod='megamenu'}</a> {l s='for color codes' mod='megamenu'})</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Dropdown Font' mod='megamenu'}</label>
			<div class="col-lg-3">
				<input class="form-controll" name="mmsettings[drop_font]" type="text" value="{if isset($mmsettings['drop_font'])}{$mmsettings['drop_font']|escape:'htmlall':'UTF-8'}{/if}">
				<span class="help">{l s='eg' mod='megamenu'}: #FFFFFF(<a href="http://www.w3schools.com/tags/ref_colorpicker.asp" target="_blank">{l s='click here' mod='megamenu'}</a> {l s='for color codes' mod='megamenu'})</span>
			</div>
		</div>
		<h3>{l s='Custom CSS' mod='megamenu'}</h3>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Custom CSS' mod='megamenu'}</label>
			<div class="col-lg-8">
				<textarea rows="10" class="form-controll" name="mmsettings[custom_css]">{if isset($mmsettings['custom_css'])}{$mmsettings['custom_css']|escape:'htmlall':'UTF-8'}{/if}</textarea>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#megamenu-effect').val("{if isset($mmsettings['effect'])}{$mmsettings['effect']|escape:'htmlall':'UTF-8'}{/if}");
	});
</script>