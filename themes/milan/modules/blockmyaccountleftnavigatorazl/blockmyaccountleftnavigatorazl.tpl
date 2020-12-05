<a href="{$link->getPageLink('identity', true)|escape:'html':'UTF-8'}"><div {if $active=='identity'}class="active"{/if}><i class="icon-user"></i><br><span class="upcs">{l s='Your profile'}</span></div></a>

<a href="{$link->getPageLink('history', true)|escape:'html':'UTF-8'}">
    <div {if $active=='history'}class="active"{/if}>
        <i class="icon-clock"></i><br>
        <span class="upcs">{l s='History'}</span>
    </div>
</a>
<a href="{$link->getPageLink('addresses', true)|escape:'html':'UTF-8'}">
    <div {if $active=='addresses'}class="active"{/if}>
        <i class="icon-map"></i><br>
        <span class="upcs">{l s='My addresses'}</span>
    </div>
</a>
{if $returnAllowed}
<a href="{$link->getPageLink('order-follow', true)|escape:'html':'UTF-8'}">
    <div {if $active=='order-follow'}class="active"{/if}>
        <i class="icon-action-undo"></i><br>
        <span class="upcs">{l s='My merchandise returns'}</span>
    </div>
</a>
{/if}
<a href="{$link->getPageLink('order-slip', true)|escape:'html':'UTF-8'}">
    <div {if $active=='order-slip'}class="active"{/if}>
        <i class="icon-ban"></i><br>
        <span class="upcs">{l s='My credit slips'}</span>
    </div>
</a>
{if $voucherAllowed || isset($HOOK_CUSTOMER_ACCOUNT) && $HOOK_CUSTOMER_ACCOUNT !=''}
    {if $voucherAllowed}
    <a href="{$link->getPageLink('discount', true)|escape:'html':'UTF-8'}">
        <div {if $active=='discount'}class="active"{/if}>
            <i class="icon-list"></i><br>
            <span class="upcs">{l s='My vouchers'}</span>
        </div>
    </a>
    {/if}
    {$HOOK_CUSTOMER_ACCOUNT}
{/if}