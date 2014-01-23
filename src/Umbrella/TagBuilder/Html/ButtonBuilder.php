<?php

// Copyright (c) Umbrella Tech. All rights reserved. See License.txt in the project root for license information.

namespace Umbrella\TagBuilder\Html;

use Umbrella\TagBuilder\TagBuilder;
use Umbrella\TagBuilder\TagRenderMode;

class ButtonBuilder
{

    public static function submitButton($name, $buttonText, array $htmlAttributes = array())
    {
        $buttonTag = new TagBuilder("input");

        $buttonTag->mergeAttribute("type", "submit");

        if (!empty($name)) {
            $buttonTag->mergeAttribute("name", $name);
        }

        if (!empty($buttonText)) {
            $buttonTag->mergeAttribute("value", $buttonText);
        }

        $buttonTag->mergeAttributes($htmlAttributes);
        return $buttonTag->toString(TagRenderMode::SELF_CLOSING);
    }

    public static function submitImage($name, $sourceUrl, array $htmlAttributes = array())
    {
        $buttonTag = new TagBuilder("input");

        $buttonTag->mergeAttribute("type", "image");

        if (!empty($name)) {
            $buttonTag->mergeAttribute("name", $name);
        }

        if (!empty($sourceUrl)) {
            $buttonTag->mergeAttribute("src", $sourceUrl);
        }

        $buttonTag->mergeAttributes($htmlAttributes);
        return $buttonTag->toString(TagRenderMode::SELF_CLOSING);
    }

    public static function button($name, $buttonText, $type = HtmlButtonType::SUBMIT, $onClickMethod = null, $htmlAttributes = array())
    {
        $buttonTag = new TagBuilder("button");

        if (!empty($name)) {
            $buttonTag->mergeAttribute("name", $name);
        }

        if (!empty($onClickMethod)) {
            $buttonTag->mergeAttribute("onclick", $onClickMethod);
        }

        $buttonTag->mergeAttribute("type", $type);
        $buttonTag->setInnerHtml($buttonText);
        $buttonTag->mergeAttributes($htmlAttributes);

        return $buttonTag->toString(TagRenderMode::NORMAL);
    }

}
