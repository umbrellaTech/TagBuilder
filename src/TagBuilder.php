<?php

// Copyright (c) Umbrella Tech. All rights reserved. See License.txt in the project root for license information.
namespace Umbrella\TagBuilder;

use Easy\Collections\Dictionary;
use InvalidArgumentException;

/**
 * Represents a class that is used by HTML helpers to build HTML elements.
 * @author Ítalo Lelis de Vietro <italolelis@gmail.com>
 */
class TagBuilder implements TagBuilderInterface
{
    const ATTRIBUTE_FORMAT = "%s = '%s'";
    const ELEMENT_FORMAT_END_TAG = "</%s>";
    const ELEMENT_FORMAT_NORMAL = "<%s %s>%s</%s>";
    const ELEMENT_FORMAT_SELF_CLOSING = "<%s %s>";
    const ELEMENT_FORMAT_START_TAG = "<%s %s>";

    /**
     *
     * @var \Easy\Collections\MapInterface 
     */
    protected $attributes;
    protected $innerHtml;
    protected $tagName;

    /**
     * Initializes a new instance of the TagBuilder class.
     * @param string $tagName The name of thee tag.
     * @throws InvalidArgumentException
     */
    public function __construct($tagName)
    {
        if (empty($tagName)) {
            throw new InvalidArgumentException(_("Invalid Argument passed"));
        }
        $this->tagName = $tagName;
        $this->attributes = new Dictionary();
    }

    /**
     * Sets the collection of attributes for the tag.
     * @return \Easy\Collections\MapInterface 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Gets the inner text of the tag (element).
     * @return string
     */
    public function getInnerHtml()
    {
        return $this->innerHtml;
    }

    /**
     * Sets the inner text of the tag (element).
     * @param string $innerHtml
     * @return TagBuilder
     */
    public function setInnerHtml($innerHtml)
    {
        $this->innerHtml = $innerHtml;
        return $this;
    }

    /**
     * Gets the name of the tag.
     * @return string
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * Sets the name of the tag.
     * @param string $tagName
     * @return TagBuilder
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
        return $this;
    }

    /**
     * Adds the specified CSS class to the tag-builder attributes.
     * @param string $value
     * @return TagBuilder
     */
    public function addCssClass($value)
    {
        if ($this->attributes->containsKey('class')) {
            $value .= " " . $this->attributes->get('class');
        }

        $this->attributes->set('class', $value);

        return $this;
    }

    private function getAttributesString()
    {
        $attributes = array();
        foreach ($this->attributes as $key => $value) {
            if ($value === true) {
                $value = $key;
            }
            $attributes[] = sprintf(self::ATTRIBUTE_FORMAT, $key, $value);
        }
        return join(' ', $attributes);
    }

    /**
     * Adds an attribute to the tag by using the specified key/value pair.
     * @param string $key The key.
     * @param string $value The value.
     * @param bool $replaceExisting true to replace the existing attribute.
     * @return TagBuilder
     */
    public function mergeAttribute($key, $value, $replaceExisting = true)
    {
        if ($replaceExisting || !$this->attributes->contains($key)) {
            $this->attributes->set($key, $value);
        }
        return $this;
    }

    /**
     * Adds an attribute to the specified collection of attributes for the tag.
     * @param mixed $attributes The attributes.
     * @param bool $replaceExisting true to replace the existing attribute.
     * @return TagBuilder
     */
    public function mergeAttributes($attributes, $replaceExisting = true)
    {
        if ($attributes !== null) {
            foreach ($attributes as $key => $value) {
                $this->mergeAttribute($key, $value, $replaceExisting);
            }
        }
        return $this;
    }

    public function __toString()
    {
        return $this->toString(TagRenderMode::NORMAL);
    }

    /**
     * Returns a string that represents the current object by using the specified tag-render mode.
     * @param TagRenderMode $renderMode
     * @return string
     */
    public function toString($renderMode)
    {
        switch ($renderMode) {
            case TagRenderMode::START_TAG:
                return sprintf(self::ELEMENT_FORMAT_START_TAG, $this->tagName, $this->getAttributesString());
            case TagRenderMode::END_TAG:
                return sprintf(self::ELEMENT_FORMAT_END_TAG, $this->tagName);
            case TagRenderMode::SELF_CLOSING:
                return sprintf(self::ELEMENT_FORMAT_SELF_CLOSING, $this->tagName, $this->getAttributesString());
            default:
                return sprintf(self::ELEMENT_FORMAT_NORMAL, $this->tagName, $this->getAttributesString(),
                               $this->innerHtml, $this->tagName);
        }
    }
}
