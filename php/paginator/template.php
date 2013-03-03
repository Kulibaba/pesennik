	
<?
require 'php/paginator/paginator.php';
function Paginate($inList){
/*
	Function paginates input List of obhect stored in $inList
*/
$pageIterator = new Paginator();

$cur_page = $pageIterator->getCurrentPageNumber();
$itemsQuantity = $pageIterator->getItemsQuantity();
$delta = $pageIterator->getDelta();

$beg_itemNumber = $cur_page * $delta;
	if ($beg_itemNumber + $delta > $itemsQuantity){
		$end_itemNumber = $itemsQuantity;
	}else{
		$end_itemNumber = $beg_itemNumber + $delta;
	}

?>
<div class="ui-paginator">
	<div class="pag-header"> <!--navbar-fixed-top-->
			<div class="search-tag">
				<span>
					<?php echo $pageIterator->getSearchTag()."(".$itemsQuantity.")";?>					
				</span>
			</div>
			<div class="pag-header-menu">
			<form>
				<select size="1" name="delta">
					<option>10</option>
					<option>25</option>
					<option>50</option>
					<option>100</option>
				</select>
			</form>
				<?php 
					echo "с ".$beg_itemNumber." по ".$end_itemNumber;
					if ($cur_page < 3)
						$beginPageNumber = 1;
					else
						$beginPageNumber = $cur_page -2 ;
						
					if ($cur_page > 1){
						?>
						<a href="<?php echo ."/".($beginPageNumber-1); ?>"> < Prev </a>
						<?php
					}
					$cur_page = $_GET["param"];
					for ($i = $beginPageNumber; $i < $beginPageNumber +5; $i++)
					{
						$next_page = $cur_page."/".$i;
						?>
						<a href="<?php echo $next_page?>"> <?php echo $i;?> </a>
						<?php
					}
					
					if ($cur_page < $itemsQuantity/$delta){
						?>
						<a href="<?php echo $next_page?>"> > Next </a>
						<?php
					}
				?>
				
			</div>
	</div>
	
	<div class="pag-body"> <!--navbar-fixed-top-->
	
	</div>
	
	<div class="pag-footer"> <!--navbar-fixed-top-->
	</div>
</div>
<?php
}
?>