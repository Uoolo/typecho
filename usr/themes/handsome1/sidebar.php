  <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

  <!--引入 BufannaoCms 插件。作者：不烦恼。版本：1.0.0-->
  <?php BufannaoCms_Plugin::hotShow()->to($hot); ?>

     <aside class="col w-md bg-white-only b-l bg-auto no-border-xs" role="complementary">
      <section id="tabs-4" class="widget widget_tabs clear">
       <div class="nav-tabs-alt no-js-hide">
        <ul class="nav nav-tabs nav-justified" role="tablist">
         <li class="active" role="presentation"> <a href="#widget-tabs-4-hots" role="tab" aria-controls="widget-tabs-4-hots" aria-expanded="true" data-toggle="tab"> <i class="iconfont icon-fire text-md text-muted wrapper-sm" aria-hidden="true"></i> <span class="sr-only">热门文章</span> </a></li>
         <li role="presentation"> <a href="#widget-tabs-4-comments" role="tab" aria-controls="widget-tabs-4-comments" aria-expanded="false" data-toggle="tab"> <i class="iconfont icon-comments text-md text-muted wrapper-sm" aria-hidden="true"></i> <span class="sr-only">最新评论</span> </a></li>
         <li role="presentation"> <a href="#widget-tabs-4-random" role="tab" aria-controls="widget-tabs-4-random" aria-expanded="false" data-toggle="tab"> <i class="iconfont icon-random text-md text-muted wrapper-sm" aria-hidden="true"></i> <span class="sr-only">随机文章</span> </a></li>
        </ul>
       </div>
       <div class="tab-content">
       <!--热门文章-->
        <div id="widget-tabs-4-hots" class="tab-pane wrapper-md active" role="tabpanel">
         <h3 class="widget-title m-t-none text-md">热门文章</h3>
         <ul class="list-group no-bg no-borders pull-in m-b-none">
            <?php while($hot->next()): ?>
            <li class="list-group-item">
                <a href="<?php $hot->permalink(); ?>" class="pull-left thumb-sm m-r">
                <img style="height: 40px!important;width: 40px!important;" src="<?php echo showThumbnail2($hot) ?>" class="img-circle wp-post-image">
                </a>
                <div class="clear">
                    <h4 class="h5 l-h"> <a href="<?php $hot->permalink(); ?>" title="<?php $hot->title(); ?>"> <?php $hot->title(); ?> </a></h4>
                    <small class="text-muted"> <span class="meta-date"> <i class="iconfont icon-clocko" aria-hidden="true"></i> <span class="sr-only">发布时间：</span> <time class="meta-value" datetime="<?php $hot->date('c'); ?>" itemprop="datePublished"> <?php $hot->date('F j, Y'); ?></time> </span>  </small></div>
            </li>
            <?php endwhile; ?>
         </ul>
        </div>
        <!--最新评论-->
        <div id="widget-tabs-4-comments" class="tab-pane wrapper-md no-js-show" role="tabpanel">
         <h3 class="widget-title m-t-none text-md">最新评论</h3>
         <ul class="list-group no-borders pull-in auto m-b-none">
          <?php $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true&pageSize=5')->to($comments); ?>
          <?php while($comments->next()): ?>
          <li class="list-group-item">
        <?php
        //头像CDN by Rich http://forum.typecho.org/viewtopic.php?f=5&t=6165&p=29961&hilit=gravatar#p29961
            $host = $this->options->CDNURL;//自定义头像CDN服务器
            $url = '/avatar/';//自定义头像目录,一般保持默认即可
            $size = '80';//自定义头像大小
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
        ?>
              <a href="<?php $comments->permalink(); ?>" class="pull-left thumb-sm avatar m-r"> 
                  <img alt="" src="<?php echo $avatar ?>" class="avatar-40 photo img-circle" height="40" width="40"></a>
              </a>
              <a href="<?php $comments->permalink(); ?>" class="text-muted"> 
                  <i class="fa fa-comment-o pull-right m-t-sm text-sm" title="详情" aria-hidden="true" data-toggle="tooltip" data-placement="auto left"></i>        
                  <span class="sr-only">评论详情</span> 
              </a>
              <div class="clear">
                  <div class="text-ellipsis">
                      <a href="<?php $comments->permalink(); ?>" title="noslepums"> <?php $comments->author(false); ?> </a>
                  </div>
                  <span class="sr-only"> 在《<?php $comments->title; ?>》评论道： </span>
                  <small class="text-muted"> <?php $comments->excerpt(34, '...'); ?> </small>
              </div>
          </li>
          <?php endwhile; ?>
         </ul>
        </div>
        <!--随机文章-->
        <div id="widget-tabs-4-random" class="tab-pane wrapper-md no-js-show" role="tabpanel">
         <h3 class="widget-title m-t-none text-md">随机文章</h3>
         <ul class="list-group no-bg no-borders pull-in m-b-none">
           <?php BufannaoCms_Plugin::randomShow()->to($randomShow); ?>
            <?php while($randomShow->next()): ?>
            <li class="list-group-item">
                <a href="<?php $randomShow->permalink(); ?>" class="pull-left thumb-sm m-r">
                <img style="height: 40px!important;width: 40px!important;" src="<?php echo showThumbnail2($randomShow) ?>" class="img-circle wp-post-image">
                </a>
                <div class="clear">
                    <h4 class="h5 l-h"> <a href="<?php $randomShow->permalink(); ?>" title="<?php $randomShow->title(); ?>"> <?php $randomShow->title(); ?> </a></h4>
                    <small class="text-muted"> <span class="meta-date"> <i class="iconfont icon-clocko" aria-hidden="true"></i> <span class="sr-only">发布时间：</span> <time class="meta-value" datetime="<?php $randomShow->date('c'); ?>" itemprop="datePublished"> <?php $randomShow->date('F j, Y'); ?></time> </span>  </small></div>
            </li>
            <?php endwhile; ?>
         </ul>
        </div>
       </div>
      </section>
      <!--循环输出分类列表-->
      <section id="categories-2" class="widget widget_categories wrapper-md clear">
       <h3 class="widget-title m-t-none text-md">分类</h3>
       <ul class="list-group">
        <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li class="list-group-item"> <a href="{permalink}"> <span class="badge pull-right">{count}</span>{name}</a></li>'); ?>
       </ul>
      </section>
      <!--循环输出标签-->
      <section id="tag_cloud-2" class="widget widget_tag_cloud wrapper-md clear">
       <h3 class="widget-title m-t-none text-md">标签云</h3>
       <div class="tags l-h-2x"> 
       <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud','ignoreZeroCount=1&limit=30')->to($tags); ?>
        <?php if($tags->have()): ?>
            <?php while ($tags->next()): ?>
            <a href="<?php $tags->permalink();?>" class="label bg-info" title="<?php $tags->name(); ?>" data-toggle="tooltip"><?php $tags->name(); ?></a> 
            <?php endwhile; ?>
        <?php endif; ?>
       </div>
      </section>
     </aside>