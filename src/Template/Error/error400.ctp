<?php
use Cake\Core\Configure;

if (Configure::read('debug')){
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();

?>
<h2><?= h($message) ?></h2>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= sprintf(
        __d('cake', 'The requested address %s was not found on this server.'),
        "<strong>'{$url}'</strong>"
    ) ?>
</p>
<?php } else {
$this->layout = 'custom_error'; ?>

<?php echo $this->Element('front/sidebar'); ?>
	<div class="wrapper" id="bg-color">
			
			<?php echo $this->Element('front/header'); ?>			
	<div class="content-layout">
		 <div class="banner-section page-404">
			 <div class="inner-404">
				<div class="page-header">
					  <h1>LAWN SERVICE APP by<span> Terra</span></h1>
					  <hr>
					  <div class="clear"></div>
				</div> <!-- 404_inner -->

				<div class="error-blank"></div>

				<div class="error-redirections">
					<h2>Visit our website for a look at our on demand services. </h2>
					<p>You can go to</p>
					<a href="/about-us"><i><img src="/img/images/open-book.png" alt="" /></i>ABOUT US</a>
					<span>or</span>
					<a href="/checkout"><i><img src="/img/images/rocket.png" alt="" /></i>BOOK LAWN SERVICE</a>
				</div>

			 </div>
		  </div>
	</div>
		
		<div class="clear"></div>
		<?php echo $this->Element('front/footer'); ?>
	</div>

<?php } ?>
