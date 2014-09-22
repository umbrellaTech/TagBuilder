<?php

// Copyright (c) Umbrella Tech. All rights reserved. See License.txt in the project root for license information.
namespace Umbrella\TagBuilder;

interface TagBuilderInterface
{

    public function getAttributes();

    public function setAttributes($attributes);

    public function getInnerHtml();

    public function setInnerHtml($innerHtml);

    public function getTagName();

    public function setTagName($tagName);

    public function addCssClass($value);

    public function mergeAttribute($key, $value, $replaceExisting = true);

    public function mergeAttributes($attributes, $replaceExisting = true);

    public function toString($renderMode);
}
