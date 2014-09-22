# TagBuilder

[![Build Status](http://img.shields.io/travis/umbrellaTech/TagBuilder.svg?style=flat-square)](https://travis-ci.org/umbrellaTech/TagBuilder)
[![Scrutinizer Code Quality](http://img.shields.io/scrutinizer/g/umbrellaTech/TagBuilder.svg?style=flat-square)](https://scrutinizer-ci.com/g/umbrellaTech/TagBuilder/)
[![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/umbrellaTech/TagBuilder.svg?style=flat-square)](https://scrutinizer-ci.com/g/umbrellaTech/TagBuilder/)
[![Latest Stable Version](http://img.shields.io/packagist/v/umbrella/tag-builder.svg?style=flat-square)](https://packagist.org/packages/umbrella/tag-builder)
[![Downloads](https://img.shields.io/packagist/dt/umbrella/tag-builder.svg?style=flat-square)](https://packagist.org/packages/umbrella/tag-builder)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f1f2ba72-484b-4880-a64e-19dff0f94adb/small.png)](https://insight.sensiolabs.com/projects/f1f2ba72-484b-4880-a64e-19dff0f94adb)

What is it?
----------

TagBuilder is a component to help you to build html tags. But why use it to render tags instead of just write them? Well the tag builder sets a pattern of how we need to handle html elements, this avoids html errors and copy and paste code.

## Install

``` json
{
    "require": {
        "umbrella/tag-builder": "~1.0"
    }
}
```

## Usage

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

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/umbrellaTech/TagBuilder/blob/master/CONTRIBUTING.md) for details.

## Credits

- [italolelis](https://github.com/italolelis)
- [All Contributors](https://github.com/umbrellaTech/TagBuilder/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/umbrellaTech/TagBuilder/blob/master/LICENSE) for more information.
