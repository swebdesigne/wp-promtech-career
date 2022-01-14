<section class="index-search">
	<div class="container">
		<div class="search-form">
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>"  class="search-container">
				<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="index-search-input" placeholder="Введите желаемую вакансию">
				<input type="submit" class="btn orange-btn" id="searchsubmit" value="Искать">
			</form>
		</div>
	</div>
</section>