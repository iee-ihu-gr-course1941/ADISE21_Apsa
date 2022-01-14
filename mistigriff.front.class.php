<?php
    class Mistigriff_Front {
	protected $_cards = array();
	
	public function addCard(Mistigriff_Card $card){
		array_unshift($card,$this->_cards);
	}
	
	public function getCards(){
		return $this->_cards;
	}
	
}


