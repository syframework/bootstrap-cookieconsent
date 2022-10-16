<?php
namespace Sy\Component\Web;

use Sy\Component\WebComponent;

class CookieConsent extends WebComponent {

	/**
	 * @var array
	 */
	private $config;

	public function __construct($config = array()) {
		parent::__construct();
		$this->config = $config;
		if (empty($config)) {
			$this->setBackgroundColor('#252e39');
			$this->setButtonBackgroundColor('#14a7d0');
		}
		$this->mount(function () {
			$this->init();
		});
	}

	/**
	 * Set the pop up background color
	 *
	 * @param string $color #000
	 * @return void
	 */
	public function setBackgroundColor($color) {
		$this->config['palette']['popup']['background'] = $color;
	}

	/**
	 * Set the pop up text color
	 *
	 * @param string $color #000
	 * @return void
	 */
	public function setTextColor($color) {
		$this->config['palette']['popup']['text'] = $color;
	}

	/**
	 * Set the button style
	 *
	 * @param array $button Associative array with 3 keys: background, text, border
	 * @return void
	 */
	public function setButton(array $button) {
		$this->config['palette']['button'] = $button;
	}

	/**
	 * Set the button background color
	 *
	 * @param string $color #000
	 * @return void
	 */
	public function setButtonBackgroundColor($color) {
		$this->config['palette']['button']['background'] = $color;
	}

	/**
	 * Set the button text color
	 *
	 * @param string $color #000
	 * @return void
	 */
	public function setButtonTextColor($color) {
		$this->config['palette']['button']['text'] = $color;
	}

	/**
	 * 2 themes are available: 'classic' or 'edgeless'
	 *
	 * @param string $theme
	 * @return void
	 */
	public function setTheme($theme) {
		$this->config['theme'] = $theme;
	}

	/**
	 * 4 positions are available: 'bottom' (default) | 'top' | 'bottom-left' | 'bottom-right'
	 *
	 * @param string $position
	 * @return void
	 */
	public function setPosition($position) {
		$this->config['position'] = $position;
	}

	/**
	 * Set static to true with the 'top' position for having a banner on top with pushdown
	 *
	 * @param bool $static
	 * @return void
	 */
	public function setStatic($static) {
		$this->config['static'] = $static;
	}

	/**
	 * 2 compliance types are available: 'opt-in' or 'opt-out'
	 * By default if type is not set, just tell users that we use cookies
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType($type) {
		$this->config['type'] = $type;
	}

	/**
	 * Set the content
	 *
	 * @param array $content Associative array with up to 5 keys: message, dismiss, deny, link, href
	 * @return void
	 */
	public function setContent(array $content) {
		$this->config['content'] = $content;
	}

	/**
	 * Set the message
	 *
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->config['content']['message'] = $message;
	}

	/**
	 * Set the dismiss button text
	 *
	 * @param string $text
	 * @return void
	 */
	public function setDismiss($text) {
		$this->config['content']['dismiss'] = $text;
	}

	/**
	 * Set the deny button text
	 *
	 * @param string $text
	 * @return void
	 */
	public function setDeny($text) {
		$this->config['content']['deny'] = $text;
	}

	/**
	 * Set the allow button text
	 *
	 * @param string $text
	 * @return void
	 */
	public function setAllow($text) {
		$this->config['content']['allow'] = $text;
	}

	/**
	 * Set the policy link text
	 *
	 * @param string $text
	 * @return void
	 */
	public function setLinkText($text) {
		$this->config['content']['link'] = $text;
	}

	/**
	 * Set the policy link url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setLinkHref($url) {
		$this->config['content']['href'] = $url;
	}

	private function init() {
		$this->addCssLink('https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css');
		$this->addJsLink('https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js');
		$this->setTemplateContent('');

		$cookiejs = new WebComponent();
		$cookiejs->setTemplateFile(__DIR__ . '/cookieconsent.js');
		$cookiejs->setVar('CONFIG', json_encode($this->config));
		$this->addJsCode($cookiejs);
	}

}