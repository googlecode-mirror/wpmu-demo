<?php
function undr_checked($haystack, $current) {
	if(is_array($haystack) && in_array($current, $haystack)) {
		$current = $haystack = 1;
	}
	checked($haystack, $current);
}