<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages

	$icons_file = get_template_directory()."/framework/assets/css/cs-framework.css";
	$parsed_file = file_get_contents($icons_file);
	preg_match_all("/".$this->prefix."\-([a-zA-z0-9\-]+[^\:\.\,\s])/", $parsed_file, $matches);
	$exclude_icons = array($this->prefix."-lg", $this->prefix."-2x", $this->prefix."-3x", $this->prefix."-4x", $this->prefix."-5x", $this->prefix."-ul", $this->prefix."-li", $this->prefix."-fw", $this->prefix."-border", $this->prefix."-pulse", $this->prefix."-rotate-90", $this->prefix."-rotate-180", $this->prefix."-rotate-270", $this->prefix."-spin", $this->prefix."-flip-horizontal", $this->prefix."-flip-vertical", $this->prefix."-stack", $this->prefix."-stack-1x", $this->prefix."-stack-2x", $this->prefix."-inverse", $this->prefix."-background", $this->prefix."-pull-left", $this->prefix."-pull-right");

	$matches = $this->array_delete($matches[0], $exclude_icons);
	foreach ($matches as $key => $value) {
		$matches[$key] = $this->prefix." ".$matches[$key];
	}

	$icons = (object) array("name" => "Font Awesome", "icons" => $matches);

	//$this->icons = array_merge($this->icons, $icons);