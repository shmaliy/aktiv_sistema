<?php // Do not delete these lines
 if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  die ('Пожалуйста, не загружайте эту страницу напрямую. Спасибо!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_'.$cookiehash] != $post->post_password) {  // and it doesn't match the cookie
    ?>
    
    <p class="nocomments"><?php _e("Эта публикация защищена паролем. Пожалуйста, введите его для просмотра комментариев."); ?><p>
    
    <?php
    return;
            }
        }

  /* This variable is for alternating comment background */
  $oddcomment = "graybox";
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
 <a name="comments"></a><h2><?php comments_number('Отзывов нет','Один отзыв','Отзывов (%)' );?></h2>

 <ol class="commentlist">

 <?php foreach ($comments as $comment) : ?>

  <li class="<?=$oddcomment;?>">
   <a name="comment-<?php comment_ID() ?>"></a><cite><?php comment_author_link() ?></cite> пишет:<br />
   <!--<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="<?php comment_date('j F Y
') ?> в <?php comment_time() ?>"><?php /* $entry_datetime = abs(strtotime($post->post_date)); $comment_datetime = abs(strtotime($comment->comment_date)); echo time_since($entry_datetime, $comment_datetime) */ ?></a> с момента публикации. <?php edit_comment_link('править','',''); ?></small>-->
   <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F Y
') ?> в <?php comment_time() ?></a> <?php edit_comment_link('править','',''); ?></small>
   
   <?php comment_text() ?>
   
  </li>
  
  <?php /* Changes every other comment to a different class */ 
   if("graybox" == $oddcomment) {$oddcomment="";}
   else { $oddcomment="graybox"; }
  ?>

 <?php endforeach; /* end for each comment */ ?>

 </ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?>
  <!-- If comments are open, but there are no comments. -->
  
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  <p class="nocomments">Комментарии закрыты.</p>
  
 <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post-> comment_status) : ?>

<a name="respond"></a><h3>Оставьте свой комментарий</h3>
<form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<p><input type="text" name="author" id="author" class="styled" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
<label for="author"><small>Имя</small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Почта (скрыта)</small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Сайт</small></label></p>

<!--<p><small><strong>XHTML:</strong> Вы можете использовать следующие теги: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<?php if ('none' != get_settings("comment_moderation")) { ?>
 <p><small><strong>Внимание:</strong> Осуществляется проверка комментариев, это может отсрочить публикацию, отправлять сообщение повторно нет необходимости.</small></p>
<?php } ?>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></p>


</form>

<?php // if you delete this the sky will fall on your head
endif; ?>