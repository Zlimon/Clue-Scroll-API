<?php
	header('Content-type: application/json');

	$getClueScroll = file_get_contents('https://oldschool.runescape.wiki/api.php?action=browsebysubject&format=json&subject=Reward_casket_('.$_GET["difficulty"].')');

	$clueScroll = json_decode($getClueScroll);

	$rewards = $clueScroll->query->sobj;

	foreach ($rewards as $reward) {
		$items[] = array(
			/* $reward->data[3]->property) */ 'item' => $reward->data[3]->dataitem[0]->item,
			/* $reward->data[6]->property) */ 'quantity-low' => $reward->data[6]->dataitem[0]->item,
			/* $reward->data[5]->property) */ 'quantity-high' => $reward->data[5]->dataitem[0]->item,
			/* $reward->data[7]->property) */ 'rarity' => $reward->data[7]->dataitem[0]->item,
			/* $reward->data[9]->property) */ 'rolls' => $reward->data[9]->dataitem[0]->item,
		);
	}

	echo json_encode($items);
?>