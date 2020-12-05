<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:35:20
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\blocksearchazl\views\templates\hook\blocksearch-instantsearch_azl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3208358978c88baa243-57138930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aca48ea605c7f1b59551967773416f5b85a21a0f' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\blocksearchazl\\views\\templates\\hook\\blocksearch-instantsearch_azl.tpl',
      1 => 1486326787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3208358978c88baa243-57138930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'instantsearch' => 0,
    'blocksearch_type' => 0,
    'search_ssl' => 0,
    'link' => 0,
    'cookie' => 0,
    'ajaxsearch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978c88c03fe7_52941265',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978c88c03fe7_52941265')) {function content_58978c88c03fe7_52941265($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['instantsearch']->value) {?>
	<script type="text/javascript">
	// <![CDATA[
		function tryToCloseInstantSearch() {
			if ($('#old_center_column').length > 0)
			{
				$('#center_column').remove();
				$('#old_center_column').attr('id', 'center_column');
				$('#center_column').show();
				return false;
			}
		}
		
		instantSearchQueries = new Array();
		function stopInstantSearchQueries(){
			for(i=0;i<instantSearchQueries.length;i++) {
				instantSearchQueries[i].abort();
			}
			instantSearchQueries = new Array();
		}
		
		$("#search_query_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocksearch_type']->value, ENT_QUOTES, 'UTF-8', true);?>
").keyup(function(){
			if($(this).val().length > 0){
				stopInstantSearchQueries();
				instantSearchQuery = $.ajax({
					url: '<?php if ($_smarty_tpl->tpl_vars['search_ssl']->value==1) {?><?php echo htmlspecialchars(addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true)), ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars(addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink('search')), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>',
					data: {
						instantSearch: 1,
						id_lang: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cookie']->value->id_lang, ENT_QUOTES, 'UTF-8', true);?>
,
						q: $(this).val()
					},
					dataType: 'html',
					type: 'POST',
					success: function(data){
						if($("#search_query_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocksearch_type']->value, ENT_QUOTES, 'UTF-8', true);?>
").val().length > 0)
						{
							tryToCloseInstantSearch();
							$('#center_column').attr('id', 'old_center_column');
							$('#old_center_column').after('<div id="center_column" class="' + $('#old_center_column').attr('class') + '">'+data+'</div>');
							$('#old_center_column').hide();
							// Button override
							ajaxCart.overrideButtonsInThePage();
							$("#instant_search_results a.close").click(function() {
								$("#search_query_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocksearch_type']->value, ENT_QUOTES, 'UTF-8', true);?>
").val('');
								return tryToCloseInstantSearch();
							});
							return false;
						}
						else
							tryToCloseInstantSearch();
					}
				});
				instantSearchQueries.push(instantSearchQuery);
			}
			else
				tryToCloseInstantSearch();
		});
	// ]]>
	</script>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ajaxsearch']->value) {?>
	<script type="text/javascript">
	// <![CDATA[
		$('document').ready( function() {
			$("#search_query_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocksearch_type']->value, ENT_QUOTES, 'UTF-8', true);?>
")
				.autocomplete(
					'<?php if ($_smarty_tpl->tpl_vars['search_ssl']->value==1) {?><?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true));?>
<?php } else { ?><?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'));?>
<?php }?>', {
						minChars: 3,
						max: 10,
						width: 500,
						selectFirst: false,
						scroll: false,
						dataType: "json",
						formatItem: function(data, i, max, value, term) {
							return value;
						},
						parse: function(data) {
							var mytab = new Array();
							for (var i = 0; i < data.length; i++)
								mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
							return mytab;
						},
						extraParams: {
							ajaxSearch: 1,
							id_lang: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cookie']->value->id_lang, ENT_QUOTES, 'UTF-8', true);?>

						}
					}
				)
				.result(function(event, data, formatted) {
					$('#search_query_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocksearch_type']->value, ENT_QUOTES, 'UTF-8', true);?>
').val(data.pname);
					document.location.href = data.product_link;
				})
		});
	// ]]>
	</script>
<?php }?><?php }} ?>
