{if $videos}
<section class="page-product-box tab-pane fade" id="videosTab">
    {foreach from=$videos item=video}
        <div class="embed-responsive embed-responsive-16by9">
        {if $video.type ==0}
            <div class="videoWrapper videotab_video">{$video.video|escape:'quotes':'UTF-8'}</div>
        {else}
            <div class="mp4content videotab_video">
            <video style="width:100%;height:100%;" src="{$this_path}uploads/{$video.video|escape:'quotes':'UTF-8'}" type="video/mp4" 
                id="player1" 
                controls="controls" preload="none"></video>
            </div>
        {/if}
        </div>
    {/foreach}
</section>
{/if}