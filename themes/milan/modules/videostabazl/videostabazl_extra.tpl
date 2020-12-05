{if $videos}
<a href="#" class="btn btn-yet-col" id="product-video-button" data-target="#product-video-box" data-toggle="modal"><span class="social_youtube"></span></a>
<div aria-hidden="true" aria-labelledby="product-added" role="dialog" tabindex="-1" id="product-video-box" class="modal fade" style="display: none;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
         <a aria-hidden="true" data-dismiss="modal" class="modal-close" href="#"><i class="icon_close"></i></a>
         <h4 class="modal-title">{l s='Product video'}</h4>
      </div>
      <div class="modal-body modal-body-info">
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
         </div>
      </div>
    </div>
</div>
{/if}