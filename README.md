HtmlToText
==========
Convert html to text, filter html tags, purify html.
Best and most advanced html to text conversion library for php.

Used Htmlpurifier https://github.com/ezyang/htmlpurifier

Install
-------

Add
```
"ezyang/htmlpurifier": "dev-master",
"sunra/html_to_text": "dev-master"
```
to required section in you composer.json

Use
---

```

// Total remove tags. br converted to new lines
$plain_text = \Sunra\HtmlToText\HtmlToText::plain_text( $html );

// removed all tags but safest 'br,b,strong,li,ol,ul'
$safe_html = \Sunra\HtmlToText\HtmlToText::plain_text( $html );

// remove unsafe code (XSS attacks) and heals html - close tags etc
$purified_html = \Sunra\HtmlToText\HtmlToText::purify( $html );

// Remove all tags but allowed (coma separated - for example 'br,b')
$purified_html = \Sunra\HtmlToText\HtmlToText::filter( $html, $allowed_tags );

```