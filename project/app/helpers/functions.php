<?php
	
    function arrStatusActive(){
        return array('Y' => __('main.active'), 'N' => __('main.non-active'));
    }

    function arrStatusActiveLabel(){
        return array('Y' => 'info', 'N' => 'danger');
    }

    function arrGender() {
        return array('male' => __('main.male'), 'female' => __('main.female'));
    }