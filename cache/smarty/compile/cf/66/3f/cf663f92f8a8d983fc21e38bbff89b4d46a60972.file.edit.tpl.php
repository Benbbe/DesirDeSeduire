<?php /* Smarty version Smarty-3.1.19, created on 2017-02-05 21:41:37
         compiled from "E:\dev\servers\xampp\htdocs\underwears\modules\megamenu\views\templates\admin\menus\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:634358978e017f8368-99600969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf663f92f8a8d983fc21e38bbff89b4d46a60972' => 
    array (
      0 => 'E:\\dev\\servers\\xampp\\htdocs\\underwears\\modules\\megamenu\\views\\templates\\admin\\menus\\edit.tpl',
      1 => 1486326789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '634358978e017f8368-99600969',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'defaultFormLanguage' => 0,
    'menu' => 0,
    'lang' => 0,
    'imagePath' => 0,
    'id_megamenu_menu' => 0,
    'existLinksOptions' => 0,
    'allowedRowSize' => 0,
    'row' => 0,
    'column' => 0,
    'grid' => 0,
    'linkGroups' => 0,
    'linkGroupName' => 0,
    'linkGroup' => 0,
    'linkId' => 0,
    'link' => 0,
    'categories' => 0,
    'id_category' => 0,
    'category' => 0,
    'icons' => 0,
    'icon' => 0,
    'lang_iso' => 0,
    'theme_css' => 0,
    'admin_folder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58978e01ab3846_89610430',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58978e01ab3846_89610430')) {function content_58978e01ab3846_89610430($_smarty_tpl) {?>
<div>
	<form class="form-horizontal" method="POST" id="megamenu-update" enctype="multipart/form-data">
		<input type="submit" class="btn btn-success pull-right" value="Save" id="submit-megamenu" name="submit-megamenu">
		<div class="form-group">
			<label class="control-label col-lg-3">
				<?php echo smartyTranslate(array('s'=>'Label','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
					<div class="translatable-field lang-<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['id_lang'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']!=$_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
				<?php }?>
					<div class="col-lg-3">
						<input value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['label'][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['label'][$_smarty_tpl->tpl_vars['language']->value['id_lang']], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" type="text" name="menu[label][<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['id_lang'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
]" id="label_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['id_lang'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
-name">
					</div>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
					<div class="col-lg-2">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['id_lang'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
);" tabindex="-1"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></li>
							<?php } ?>
						</ul>
					</div>
				<?php }?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
					</div>
				<?php }?>
			<?php } ?>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				<?php echo smartyTranslate(array('s'=>'Icon Type','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-1">
				<input type="radio" name="menu[icon_type]" class="icon_type" id="icon-type-icon" value="icon" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['icon_type'])&&$_smarty_tpl->tpl_vars['menu']->value['icon_type']=='icon') {?>checked="checked"<?php }?>>
				<label for="icon-type-icon">Icon</label>
			</div>
			<div class="col-lg-1">
				<input type="radio" name="menu[icon_type]" class="icon_type" id="icon-type-image" value="image" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['icon_type'])&&$_smarty_tpl->tpl_vars['menu']->value['icon_type']=='image') {?>checked="checked"<?php }?>>
				<label for="icon-type-image">Image</label>
			</div>
			<div class="col-lg-1">
				<input type="radio" name="menu[icon_type]" class="icon_type" id="icon-type-none" value="" <?php if (((isset($_smarty_tpl->tpl_vars['menu']->value['icon_type'])&&$_smarty_tpl->tpl_vars['menu']->value['icon_type']=='')||!isset($_smarty_tpl->tpl_vars['menu']->value['icon_type']))) {?>checked="checked"<?php }?>>
				<label for="icon-type-none">None</label>
			</div>
		</div>
		<div class="form-group icon_type_icon icon_type_group">
			<label class="control-label col-lg-3" for="icon-name">
				<?php echo smartyTranslate(array('s'=>'Icon','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-3">
				<input value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['icon'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['icon'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" type="text" name="menu[icon]" id="icon-name">
			</div>
			<div class="col-lg-3">
				<a class="btn btn-primary" data-toggle="modal" data-target="#iconModal">Select Icons</a>
			</div>
		</div>
		<div class="form-group icon_type_image icon_type_group">
			<label class="control-label col-lg-3" for="icon-image">
				<?php echo smartyTranslate(array('s'=>'Icon Image','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-9">
				<input type="file" name="icon_image" id="icon-image" class="form-controll">
				<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['icon_type'])&&$_smarty_tpl->tpl_vars['menu']->value['icon_type']=='image') {?>
					<div><img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['imagePath']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
/<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id_megamenu_menu']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
.png"></div>
				<?php }?>
			</div>
			
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				<?php echo smartyTranslate(array('s'=>'Status','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" value="1" id="active_on" name="menu[status]" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['status'])&&$_smarty_tpl->tpl_vars['menu']->value['status']==1) {?>checked="checked"<?php }?>>
					<label class="radioCheck" for="active_on">
						<?php echo smartyTranslate(array('s'=>'Yes','mod'=>'megamenu'),$_smarty_tpl);?>

					</label>
					<input type="radio" value="0" id="active_off" name="menu[status]" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['status'])&&$_smarty_tpl->tpl_vars['menu']->value['status']==0) {?>checked="checked"<?php }?>>
					<label class="radioCheck" for="active_off">
						<?php echo smartyTranslate(array('s'=>'No','mod'=>'megamenu'),$_smarty_tpl);?>

					</label>
					<a class="slide-button btn"></a>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				<?php echo smartyTranslate(array('s'=>'Link','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-3">
				<select class="form-controller customlink-options" name="menu[is_customlink]">
					<option value="1" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['is_customlink'])&&$_smarty_tpl->tpl_vars['menu']->value['is_customlink']==1) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'URL','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
					<option value="0" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['is_customlink'])&&$_smarty_tpl->tpl_vars['menu']->value['is_customlink']==0) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Exist Links','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
				</select>
				<input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['custom_link'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['custom_link'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" class="form-controller menulink-custom" name="menu[custom_link]" placeholder="Custom Url">
				<select name="menu[link_object_id]" class="form-controller menulink-exist">
					<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['existLinksOptions']->value);?>

				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">
				<?php echo smartyTranslate(array('s'=>'Make Megamenu','mod'=>'megamenu'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" value="1" id="is_megamenu_on" name="menu[is_megamenu]" class="is_megamenu" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['is_megamenu'])&&$_smarty_tpl->tpl_vars['menu']->value['is_megamenu']==1) {?>checked="checked"<?php }?>>
					<label class="radioCheck" for="is_megamenu_on">
						<?php echo smartyTranslate(array('s'=>'Yes','mod'=>'megamenu'),$_smarty_tpl);?>

					</label>
					<input type="radio" value="0" id="is_megamenu_off" name="menu[is_megamenu]" class="is_megamenu" <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['is_megamenu'])&&$_smarty_tpl->tpl_vars['menu']->value['is_megamenu']==0)||!isset($_smarty_tpl->tpl_vars['menu']->value['is_megamenu'])) {?>checked="checked"<?php }?>>
					<label class="radioCheck" for="is_megamenu_off">
						<?php echo smartyTranslate(array('s'=>'No','mod'=>'megamenu'),$_smarty_tpl);?>

					</label>
					<a class="slide-button btn"></a>
				</span>
			</div>
		</div>
		<input type="hidden" name="rowcount" id="rowcount" value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'])&&count($_smarty_tpl->tpl_vars['menu']->value['content'])) {?><?php echo count($_smarty_tpl->tpl_vars['menu']->value['content']);?>
<?php } else { ?>1<?php }?>">
		<div class="megamenu-panelcontroll">
			<div class="form-group">
				<label class="control-label col-lg-3">
					<?php echo smartyTranslate(array('s'=>'Full width','mod'=>'megamenu'),$_smarty_tpl);?>

				</label>
				<div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" value="1" id="is_fullwidth_on" name="menu[is_fullwidth]" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['is_fullwidth'])&&$_smarty_tpl->tpl_vars['menu']->value['is_fullwidth']==1) {?>checked="checked"<?php }?>>
						<label class="radioCheck" for="is_fullwidth_on">
							<?php echo smartyTranslate(array('s'=>'Yes','mod'=>'megamenu'),$_smarty_tpl);?>

						</label>
						<input type="radio" value="0" id="is_fullwidth_off" name="menu[is_fullwidth]" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['is_fullwidth'])&&$_smarty_tpl->tpl_vars['menu']->value['is_fullwidth']==0) {?>checked="checked"<?php }?>>
						<label class="radioCheck" for="is_fullwidth_off">
							<?php echo smartyTranslate(array('s'=>'No','mod'=>'megamenu'),$_smarty_tpl);?>

						</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
			<a href="#" class="btn btn-default row-addbtn pull-right"><?php echo smartyTranslate(array('s'=>'Add Row','mod'=>'megamenu'),$_smarty_tpl);?>
</a>
			<div class="megamenu-panel">
				<?php $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['row']->step = 1;$_smarty_tpl->tpl_vars['row']->total = (int) ceil(($_smarty_tpl->tpl_vars['row']->step > 0 ? $_smarty_tpl->tpl_vars['allowedRowSize']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['allowedRowSize']->value)+1)/abs($_smarty_tpl->tpl_vars['row']->step));
if ($_smarty_tpl->tpl_vars['row']->total > 0) {
for ($_smarty_tpl->tpl_vars['row']->value = 1, $_smarty_tpl->tpl_vars['row']->iteration = 1;$_smarty_tpl->tpl_vars['row']->iteration <= $_smarty_tpl->tpl_vars['row']->total;$_smarty_tpl->tpl_vars['row']->value += $_smarty_tpl->tpl_vars['row']->step, $_smarty_tpl->tpl_vars['row']->iteration++) {
$_smarty_tpl->tpl_vars['row']->first = $_smarty_tpl->tpl_vars['row']->iteration == 1;$_smarty_tpl->tpl_vars['row']->last = $_smarty_tpl->tpl_vars['row']->iteration == $_smarty_tpl->tpl_vars['row']->total;?>
					<div class="megamenu-row" id="megamenu-row-<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
">
						<input type="hidden" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][is_active]" value="1" id="active-row-<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
" class="row_isactive">
						<div class="megamenu-rowcontroll">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label col-lg-4">
											<?php echo smartyTranslate(array('s'=>'Row Size','mod'=>'megamenu'),$_smarty_tpl);?>

										</label>
										<div class="col-lg-6">
											<select class="form-controller grid_size" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][grid_size]" data-row="<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
">
												<option value="1" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])&&count($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])==1) {?>selected="selected"<?php }?>>1</option>
												<option value="2" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])&&count($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])==2) {?>selected="selected"<?php }?>>2</option>
												<option value="3" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])&&count($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])==3) {?>selected="selected"<?php }?>>3</option>
												<option value="4" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])&&count($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])==4) {?>selected="selected"<?php }?>>4</option>
												<option value="6" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])&&count($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])==6) {?>selected="selected"<?php }?>>6</option>
												<option value="12" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])&&count($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value])==12) {?>selected="selected"<?php }?>>12</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-md-8">
									<a href="#" class="btn btn-danger row-removebtn pull-right" data-row="<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
"><?php echo smartyTranslate(array('s'=>'Remove Row','mod'=>'megamenu'),$_smarty_tpl);?>
</a>
								</div>
							</div>
						</div>
						<div class="row megamenu-item-row">
							<?php $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['column']->step = 1;$_smarty_tpl->tpl_vars['column']->total = (int) ceil(($_smarty_tpl->tpl_vars['column']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['column']->step));
if ($_smarty_tpl->tpl_vars['column']->total > 0) {
for ($_smarty_tpl->tpl_vars['column']->value = 1, $_smarty_tpl->tpl_vars['column']->iteration = 1;$_smarty_tpl->tpl_vars['column']->iteration <= $_smarty_tpl->tpl_vars['column']->total;$_smarty_tpl->tpl_vars['column']->value += $_smarty_tpl->tpl_vars['column']->step, $_smarty_tpl->tpl_vars['column']->iteration++) {
$_smarty_tpl->tpl_vars['column']->first = $_smarty_tpl->tpl_vars['column']->iteration == 1;$_smarty_tpl->tpl_vars['column']->last = $_smarty_tpl->tpl_vars['column']->iteration == $_smarty_tpl->tpl_vars['column']->total;?>
								<div class="megamenu-item-column col-md-1">
									<input type="hidden" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][is_active]" value="1" id="active-column-<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
-<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
" class="column_isactive">
									<div class="megamenu-column">
										<div class="form-group">
											<label class="control-label col-lg-4">
												<?php echo smartyTranslate(array('s'=>'Title','mod'=>'megamenu'),$_smarty_tpl);?>

											</label>
											<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
												<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
													<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']!=$_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
												<?php }?>
													<div class="col-lg-6">
														<input type="text" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][title][<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
]" value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['title'][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['title'][$_smarty_tpl->tpl_vars['language']->value['id_lang']], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>">
													</div>
												<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
													<div class="col-lg-2">
														<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
															<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

															<span class="caret"></span>
														</button>
														<ul class="dropdown-menu">
															<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
																<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></li>
															<?php } ?>
														</ul>
													</div>
												<?php }?>
												<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
													</div>
												<?php }?>
											<?php } ?>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">
												<?php echo smartyTranslate(array('s'=>'Custom Class','mod'=>'megamenu'),$_smarty_tpl);?>

											</label>
											<div class="col-lg-8">
												<input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['custom_class'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['custom_class'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][custom_class]" class="form-controller">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">
												<?php echo smartyTranslate(array('s'=>'Grid Size','mod'=>'megamenu'),$_smarty_tpl);?>

											</label>
											<div class="col-lg-8">
												<select class="form-controller column_grid_size" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][grid]">
													<?php $_smarty_tpl->tpl_vars['grid'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['grid']->step = 1;$_smarty_tpl->tpl_vars['grid']->total = (int) ceil(($_smarty_tpl->tpl_vars['grid']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['grid']->step));
if ($_smarty_tpl->tpl_vars['grid']->total > 0) {
for ($_smarty_tpl->tpl_vars['grid']->value = 1, $_smarty_tpl->tpl_vars['grid']->iteration = 1;$_smarty_tpl->tpl_vars['grid']->iteration <= $_smarty_tpl->tpl_vars['grid']->total;$_smarty_tpl->tpl_vars['grid']->value += $_smarty_tpl->tpl_vars['grid']->step, $_smarty_tpl->tpl_vars['grid']->iteration++) {
$_smarty_tpl->tpl_vars['grid']->first = $_smarty_tpl->tpl_vars['grid']->iteration == 1;$_smarty_tpl->tpl_vars['grid']->last = $_smarty_tpl->tpl_vars['grid']->iteration == $_smarty_tpl->tpl_vars['grid']->total;?>
														<option value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['grid']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['grid'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['grid']==$_smarty_tpl->tpl_vars['grid']->value) {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['grid']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
													<?php }} ?>
												</select>
											</div>
										
										</div>
										<div>
											<div class="form-group">
												<label class="control-label col-lg-4">
													<?php echo smartyTranslate(array('s'=>'Type','mod'=>'megamenu'),$_smarty_tpl);?>

												</label>
												<div class="col-lg-8">

													<select class="form-controller megamenu-optiontype" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][type]">
														<option value=""><?php echo smartyTranslate(array('s'=>'Hide This','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
														<option value="LNK" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='LNK') {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Link','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
														<option value="CUS" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='CUS') {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Custom HTML','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
														<option value="PRO" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='PRO') {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Product','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
														<option value="SLI" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='SLI') {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Slider','mod'=>'megamenu'),$_smarty_tpl);?>
</option>
													</select>
												</div>
											</div>
											<div class="megamenu-iteminput">
												<div class="megamenu-itemoption LNK" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='LNK') {?>style="display:block;"<?php }?>>
													<select class="form-controller" multiple="multiple" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][LNK][]">
														<?php  $_smarty_tpl->tpl_vars['linkGroup'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linkGroup']->_loop = false;
 $_smarty_tpl->tpl_vars['linkGroupName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['linkGroups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['linkGroup']->key => $_smarty_tpl->tpl_vars['linkGroup']->value) {
$_smarty_tpl->tpl_vars['linkGroup']->_loop = true;
 $_smarty_tpl->tpl_vars['linkGroupName']->value = $_smarty_tpl->tpl_vars['linkGroup']->key;
?>
															<optgroup label="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['linkGroupName']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
																<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_smarty_tpl->tpl_vars['linkId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['linkGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
 $_smarty_tpl->tpl_vars['linkId']->value = $_smarty_tpl->tpl_vars['link']->key;
?>
																	<option value="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['linkId']->value);?>
" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['LNK'][$_smarty_tpl->tpl_vars['linkId']->value])) {?>selected="selected"<?php }?>><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['link']->value);?>
</option>
																<?php } ?>
															</optgroup>
														<?php } ?>
													</select>
												</div>
												<div class="megamenu-itemoption text-center CUS" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='CUS') {?>style="display:block;"<?php }?>>
													<a class="btn btn-default edit_customhtml" href="#" data-row="<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
" data-column="<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
">
													 	<i class="icon-pencil"></i> <?php echo smartyTranslate(array('s'=>'View/Edit Html','mod'=>'megamenu'),$_smarty_tpl);?>
 
													</a>
													<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
														<textarea class="customhtml_hidden hidden" data-lang="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][CUS][<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
]" id="customhtml-<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
-<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
-CUS_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
"><?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['custom_html'][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['custom_html'][$_smarty_tpl->tpl_vars['language']->value['id_lang']], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?></textarea>
														
													<?php } ?>
												</div>
												<div class="megamenu-itemoption PRO" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='PRO') {?>style="display:block;"<?php }?>>
													<input value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['id_product'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['id_product'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" type="text" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][PRO]" placeholder="<?php echo smartyTranslate(array('s'=>'Product ID','mod'=>'megamenu'),$_smarty_tpl);?>
">
												</div>
												<div class="megamenu-itemoption SLI" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['type']=='SLI') {?>style="display:block;"<?php }?>>
													<label class="control-label">
														<?php echo smartyTranslate(array('s'=>'Category To slide','mod'=>'megamenu'),$_smarty_tpl);?>

													</label>
													
													<select class="form-controller slider" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][SLI][id_category]">
														<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_smarty_tpl->tpl_vars['id_category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['id_category']->value = $_smarty_tpl->tpl_vars['category']->key;
?>
															<option value="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['id_category']->value);?>
" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['SLI']['id_category'])&&$_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['SLI']['id_category']==$_smarty_tpl->tpl_vars['id_category']->value) {?>selected="selected"<?php }?>><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['category']->value);?>
</option>
														<?php } ?>
													</select>
													<label class="control-label">
														<?php echo smartyTranslate(array('s'=>'Number of products','mod'=>'megamenu'),$_smarty_tpl);?>

													</label>
													<input class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['SLI']['count'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['content'][$_smarty_tpl->tpl_vars['row']->value][$_smarty_tpl->tpl_vars['column']->value]['SLI']['count'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" type="number" name="content[<?php echo intval($_smarty_tpl->tpl_vars['row']->value);?>
][item][<?php echo intval($_smarty_tpl->tpl_vars['column']->value);?>
][SLI][count]" placeholder="<?php echo smartyTranslate(array('s'=>'Count','mod'=>'megamenu'),$_smarty_tpl);?>
">
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php }} ?>
						</div>
					</div>
				<?php }} ?>
			</div>
		</div>
	</form>
</div>

<!-- Modal -->
<div class="modal fade" id="customHTMLText" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo smartyTranslate(array('s'=>'Custom Html','mod'=>'megamenu'),$_smarty_tpl);?>
</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
						<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
							<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']!=$_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
						<?php }?>
							<div class="col-lg-11">
								<textarea data-actual="" rows="7" id="customhtml-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="customhtml-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" class="form-control rte customhtml_input"></textarea>
							</div>
						<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
							<div class="col-lg-1">
								<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
									<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
										<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></li>
									<?php } ?>
								</ul>
							</div>
						<?php }?>
						<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
							</div>
						<?php }?>
					<?php } ?>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" type="button" class="btn btn-primary close-customhtml"><?php echo smartyTranslate(array('s'=>'Save changes','mod'=>'megamenu'),$_smarty_tpl);?>
</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="iconModal">Icon List</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php  $_smarty_tpl->tpl_vars['icon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['icon']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['icons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['icon']->key => $_smarty_tpl->tpl_vars['icon']->value) {
$_smarty_tpl->tpl_vars['icon']->_loop = true;
?>
						<div class="col-md-3">

							<div class="icons-item" data-icon-name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['icon']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
								<span class="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['icon']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" aria-hidden="true"></span>&nbsp;<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['icon']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">	
	var iso = "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang_iso']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
";
	var pathCSS = "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['theme_css']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
";
	var ad = "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['admin_folder']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
";
	//tinySetup();
	$("#megamenu-admin").on("change", ".megamenu-optiontype", function(event){
	 	changeOptionType($(this));
	});

	$('#iconModal .icons-item').click(function(){
		var icon = $(this).data('icon-name');
		$('#icon-name').val(icon);
		$('#iconModal').modal('hide');
	});

	$('.edit_customhtml').click(function(){
		$(this).parent().find('.customhtml_hidden').each(function(){
			var langId = $(this).attr('data-lang');
			$('#customhtml-'+langId).val($(this).val());
			$('#customhtml-'+langId).attr('data-actual',$(this).attr('id'));
		});
		tinySetup();
		$('#customHTMLText').modal('show');
		return false;
	});

	$('.close-customhtml').click(function(){
		$('#customHTMLText').modal('hide');
		tinyMCE.remove();

		$('.customhtml_input').each(function(){
			var inputvalue = $(this).attr('data-actual');
			$('#'+inputvalue).val($(this).val());
		});
		$('#customHTMLText').modal('hide');
		return false;
	});

	
	$(document).ready(function(){
		$('.grid_size').each(function(){
			changeColumnSize($(this));
			//$('#megamenu-row'+rowCount).
		});
		switchMegamenu();
		hideAndDisplayRow();
		changeMenuURL();
		checkAddNewRow();
		switchIconOption();
	});
	$('.is_megamenu').click(function(){
		switchMegamenu();
	});

$('.icon_type').click(function(){
		switchIconOption();
	});

	$('.column_grid_size').change(function(){
		var gridSize = $(this).val();
		$(this).parent().parent().parent().parent().attr('class','megamenu-item-column col-md-'+gridSize);
	});
	

	$('.row-removebtn').click(function(){
		var rowCount = $(this).attr('data-row');
		var didconfirm = confirm("<?php echo smartyTranslate(array('s'=>'Are you sure? Do you want to delete this row?','mod'=>'megamenu'),$_smarty_tpl);?>
");
		if(didconfirm){
			$('#megamenu-row-'+rowCount).hide();
		}
		checkAddNewRow();
		return false;
	});

	$("#megamenu-admin").on("change", ".grid_size", function(event){
	 	changeColumnSize($(this));
	});	

	$('#megamenu-update').submit(function(){
		var ISfilled = $('input[required=required]').val();
		changeRowSize();
		if(ISfilled == ''){
			//alert("<?php echo smartyTranslate(array('s'=>'Please give lable for menu','mod'=>'megamenu'),$_smarty_tpl);?>
"");
			//return false;
		}
		
		return true;
	});
	$('.customlink-options').change(function(){
		changeMenuURL();
	});

	$('.row-addbtn').click(function(){
		$('.megamenu-row:visible').next().show();
		checkAddNewRow();
		return false;
	});

	function changeMenuURL(){
		var isCustomHtml = $('.customlink-options').val();
		if(isCustomHtml == 1){
			$('.menulink-exist').hide();
			$('.menulink-custom').show();
		} else {
			$('.menulink-exist').show();
			$('.menulink-custom').hide();
		}
	}

	function checkAddNewRow(){
		var rowCount = $('.megamenu-row:visible').length;
		if(rowCount >= '<?php echo $_smarty_tpl->tpl_vars['allowedRowSize']->value;?>
'){
			$('.row-addbtn').hide();
		} else {
			$('.row-addbtn').show();
		}
	}

	function hideAndDisplayRow(){
		var rowCount = $('#rowcount').val();
		var currentCount = 1;
		$('.megamenu-row').each(function(){
			$(this).hide();
			if(currentCount <= rowCount){
				$(this).show();
			}
			currentCount++;
		});


	}

	function switchMegamenu(){
		var isMegamenu = $('.is_megamenu:checked').val();
			
		$('.megamenu-panelcontroll').hide();
		if(isMegamenu == 1){
			$('.megamenu-panelcontroll').show();
		}
	}

	function changeColumnSize(currentOption){
		
		var gridSize = currentOption.val();
		var rowCount = currentOption.attr('data-row');
		var eachColumnSize = 12/gridSize;
		var currentColumn = 1;
		$('#megamenu-row-'+rowCount).find('.megamenu-item-row .megamenu-item-column').each(function(){
			var $column = $(this);
			
			$column.hide();
			$column.find('.column_isactive').val('0');
			var gridExistVal = $column.find('.column_grid_size option[selected]').attr('value');
			//alert(gridExistVal);
			if(!gridExistVal){

				$column.find('.column_grid_size').val(eachColumnSize);
			}
			gridExistVal = $column.find('.column_grid_size').val()
			$column.attr('class','megamenu-item-column col-md-'+gridExistVal);
			if(currentColumn <= gridSize){
				$column.show();
				$column.find('.column_isactive').val('1');
			}
			currentColumn++;
		});
	}

	function changeOptionType($this){
		var selectedValue = $this.val();
		var optionElements = $this.parent().parent().parent().find('.megamenu-itemoption');
		optionElements.each(function(){
			$(this).hide();
		});
		$this.parent().parent().parent().find('.megamenu-itemoption.'+selectedValue).show();
	}

	function changeRowSize(){
		$('.megamenu-panel .megamenu-row').each(function(){
			var $this = $(this);
			if($this.is(":visible")){
				$(this).find('.row_isactive').val('1');
			} else {
				$(this).find('.row_isactive').val('0');
			}
		});
	}
	$(document).on('focusin', function(e) {
		if ($(e.target).closest(".mce-window").length) {
			e.stopImmediatePropagation();
		}
	});
	function switchIconOption(){
		var icontype = $('.icon_type:checked').val();
		$('.icon_type_group').each(function(){
			$(this).hide();
		});
		$('.icon_type_'+icontype).show();
	}
</script><?php }} ?>
