<?

require_once 'Paginator.php';
function Paginate($delta,$page,$size,$searchTag,$bottomPart){
/*
	Function paginates input List of obhect stored in $inList
*/
$pageIterator = new Paginator($delta,$page,$size,$searchTag);

$cur_page_number = $pageIterator->getCurrentPageNumber();
$itemsQuantity = $pageIterator->getItemsQuantity();
$delta = $pageIterator->getDelta();
$total_pages = $itemsQuantity/$delta+1;

	$beg_itemNumber = ($cur_page_number - 1)  * $delta + 1;
	if ($beg_itemNumber + $delta > $itemsQuantity){
		$end_itemNumber = $itemsQuantity + 1;
	}else{
		$end_itemNumber = $beg_itemNumber + $delta;
	}
?>

<div class="ui-paginator">
	<div class="pag-header"> <!--navbar-fixed-top-->
	<?php if (!$bottomPart) 
	{ ?>
			<div class="search-tag">
				<span>
					<?php echo $pageIterator->getSearchTag()." (".$itemsQuantity.")";?>					
				</span>
			</div><?php
	} ?>
			<div class="pag-header-menu">
			<form class="pag-form">
				<select size="1" name="delta" class="pag-delta" style="visibility:hidden;">
					<option>10</option>
					<option>25</option>
					<option>50</option>
					<option>100</option>
				</select>
			</form>
		
				<div class="pag-numbers">
					<?php 
						echo "<span style='margin-right:10px;'>с ".$beg_itemNumber." по ".$end_itemNumber."  </span>";
						if ($cur_page_number < 3)
							$beginPageNumber = 1;
						else
							$beginPageNumber = $cur_page_number -2 ;
							
						/*if ($cur_page > 1){
							?>
							<a href="<?php echo "/".($beginPageNumber-1); ?>"> < Prev </a>
							<?php
						}*/
						$count_params = explode('/',$_GET["param"]);
						
						$params = urldecode($_SERVER['REQUEST_URI']);//$_GET["param"];
						if (count($count_params) > 2){
							$temp_slash_pos = strrpos($params, '/', -1);
							$cur_page =  substr($params, 0, $temp_slash_pos);
						}else{
							$temp_slash_pos = count($params);
							$cur_page = $params;
						}
						
						for ($i = max(1, $beginPageNumber - 2) ; $i <= min($beginPageNumber + 5, $total_pages ); $i++)
						{
							if ( $cur_page_number == $i ){
							
							?>	
								<span>
								<?php echo $i;?>
								</span>
							<?php
								continue;
							}
							
							$next_page = $cur_page."/".$i;
							
							if ( $i == 1 ){
								$next_page = $cur_page;
							}
							?>
							<a href="<?php echo $next_page?>"> <?php echo $i;?> </a>
							<?php
						}
						
						/*
						if ($cur_page +1 <= $itemsQuantity/$delta){
							?>
							<a href="<?php echo $ROOT."/".$next_page?>"> > Next </a>
							<?php
						}
						*/
					?>
				</div>
			</div>
	</div>
</div>
<?php
}
?>