# sy/cookieconsent

A javascript component for for alerting users about the use of cookies on your website

## Installation

Install the latest version with

```bash
$ composer require sy/cookieconsent
```

## Basic Usage

```php
<?php

use Sy\Component\Html\Page;
use Sy\Component\Web\CookieConsent;

$popup = new CookieConsent();

$page = new Page();

$page->addBody($popup);

echo $page;
```

Output:
```html
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" defer></script>
</head>
<body>
<script type="module">
(function() {
	window.cookieconsent.initialise({"palette":{"popup":{"background":"#252e39"},"button":{"background":"#14a7d0"}}});
})();</script>
</body>
</html>
```