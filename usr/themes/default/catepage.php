<?php
/**
 * 分类
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 $db = Typecho_Db::get();
 $select = $db->select()->from('table.metas')
    ->where('type = ?', 'category')
    ->where('table.metas.slug = ?', $this->slug);
 $cate = $db->fetchRow($select);
 ?>
<?php $this->widget('Widget_Archive@index', 'type=category', 'mid='.$cate['mid'])->to($categoryPosts); ?>
<div class="col-mb-12 col-8" id="main" role="main">
	<?php while($categoryPosts->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
			<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $categoryPosts->permalink() ?>"><?php $categoryPosts->title() ?></a></h2>
			<ul class="post-meta">
				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $categoryPosts->author->permalink(); ?>" rel="author"><?php $categoryPosts->author(); ?></a></li>
				<li><?php _e('时间: '); ?><time datetime="<?php $categoryPosts->date('c'); ?>" itemprop="datePublished"><?php $categoryPosts->date('F j, Y'); ?></time></li>
				<li><?php _e('分类: '); ?><?php $categoryPosts->category(','); ?></li>
				<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $categoryPosts->permalink() ?>#comments"><?php $categoryPosts->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
            <div class="post-content" itemprop="articleBody">
    			<?php $categoryPosts->content('- 阅读剩余部分 -'); ?>
            </div>
        </article>
	<?php endwhile; ?>

    <?php $categoryPosts->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
