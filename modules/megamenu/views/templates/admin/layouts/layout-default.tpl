{**
 * This source file is subject to a commercial license from AZELAB
 *
 * @package   Tabbed Featured Categories Subcategories on Home
 * @author    AZELAB
 * @copyright Copyright (c) 2014 AZELAB (http://www.azelab.com)
 * @license   Commercial license
 * Support by mail:  support@azelab.com
*}
<div id="megamenu-admin">
	<div class="container1">
		{if !empty($flashMessage) && !empty($flashMessageType)}
			<div class="alert alert-{$flashMessageType|escape:'htmlall':'UTF-8'}">
				{$flashMessage|escape:'htmlall':'UTF-8'}
			</div>
		{/if}
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="{$baseURL|escape:'htmlall':'UTF-8'}">{l s='Megamenu' mod='megamenu'}</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a data-toggle="dropdown" href="#">
								{l s='Menus' mod='megamenu'}
								<span class="caret"></span>
							</a>
							
							<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
								<li><a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=edit">{l s='Add Menu' mod='megamenu'}</a></li>
								<li><a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Menus&mm-action=index">{l s='List Menus' mod='megamenu'}</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" href="#">
								{l s='Custom Links' mod='megamenu'}
								<span class="caret"></span>
							</a>
							<ul role="menu" class="dropdown-menu">
								<li><a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Links&mm-action=edit">{l s='Add Link' mod='megamenu'}</a></li>
								<li><a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Links&mm-action=index">{l s='List Links' mod='megamenu'}</a></li>
							</ul>
						</li>
						<li><a href="{$baseURL|escape:'htmlall':'UTF-8'}&mm-controller=Pages&mm-action=settings" >{l s='Settings' mod='megamenu'}</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="content">
			{$template}{*HTML CONTENT*}
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.confirm-delete').click(function(){
		var didConfirm = confirm("Are you sure you want to delete this?");
		return didConfirm;
	});
</script>