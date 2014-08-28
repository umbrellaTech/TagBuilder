TagBuilder
==========

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f1f2ba72-484b-4880-a64e-19dff0f94adb/small.png)](https://insight.sensiolabs.com/projects/f1f2ba72-484b-4880-a64e-19dff0f94adb)

What is it?
----------

TagBuilder is a component to help you to build html tags. But why use it to render tags instead of just write them? Well the tag builder sets a pattern of how we need to handle html elements, this avoids html errors and copy and paste code.

Installation
----------

```shell
  require: { "umbrella/tag-builder": "~1.0" }
  
  $ composer install
``` 

Usage
----------

Build a link tag.

```php
  $linkTag = new \Umbrella\TagBuilder\TagBuilder('a');
  
  //Adds a href attribute to the tag
  $linkTag->mergeAttribute('href', '#');
  
  //Adds a css class to the tag
  $linkTag->addCssClass('your-custom-css-class');
  
  //Adds a text or a html to some tag
  $linkTag->setInnerHtml('Your link text');
  
  //Renders the tag...
  echo $linkTag->toString(\Umbrella\TagBuilder\TagRenderMode::NORMAL);
  
  
  // ... or render like this
  echo $linkTag;
  
  //Both will print <a href="#" class="your-custom-css-class">Your link text</a>
```

We have many render modes available like:

```php

\Umbrella\TagBuilder\TagRenderMode::NORMAL

\Umbrella\TagBuilder\TagRenderMode::START_TAG

\Umbrella\TagBuilder\TagRenderMode::END_TAG

\Umbrella\TagBuilder\TagRenderMode::SELF_CLOSING

```
