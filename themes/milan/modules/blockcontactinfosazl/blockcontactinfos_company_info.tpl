<div class="detail">
    <h6 class="upcs">{l s='Contact details' mod='blockcontactinfosazl'}</h6>
    
    {if $blockcontactinfosazl_phone != ''}
        <div class="phone"><i class="icon-call-end"></i><span>{$blockcontactinfosazl_phone|escape:'html':'UTF-8'}</span></div>
    {/if}
    {if $blockcontactinfosazl_mobile != ''}
        <div class="smart-phone"><i class="icon-screen-smartphone"></i><span>{$blockcontactinfosazl_mobile|escape:'html':'UTF-8'}</span></div>
    {/if}
    {if $blockcontactinfosazl_email != ''}
        <div class="email"><i class="icon-envelope-open"></i>{mailto address=$blockcontactinfosazl_email|escape:'html':'UTF-8' encode="hex"}</div>
    {/if}
    {if $blockcontactinfosazl_skype != ''}
    <div class="skype"><i class="social_skype"></i><span>{$blockcontactinfosazl_skype|escape:'html':'UTF-8'}</span></div>
    {/if}
 </div>