<?php

namespace Umbrella\Tests\TagBuilder;

use InvalidArgumentException;
use Umbrella\TagBuilder\TagBuilder;
use Umbrella\TagBuilder\TagRenderMode;

class TagBuilderTest extends TagBuilderTestCase
{
    /**
     * @var TagBuilder
     */
    private $builder;

    protected function setUp()
    {
        $this->builder = new TagBuilder('a');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNewInvalidInstance()
    {
        $this->assertNotNull(new TagBuilder(false));
    }

    public function testNewInstance()
    {
        $this->assertNotNull($this->builder);
    }

    public function testTagRender()
    {
        $this->assertEquals((string) $this->builder, '<a ></a>');
        $this->assertEquals($this->builder->toString(TagRenderMode::NORMAL), '<a ></a>');
        $this->assertEquals($this->builder->toString(TagRenderMode::START_TAG), '<a >');
        $this->assertEquals($this->builder->toString(TagRenderMode::END_TAG), '</a>');
        $this->assertEquals($this->builder->toString(TagRenderMode::SELF_CLOSING), '<a >');
    }

    public function testMergeAttributes()
    {
        $this->builder->mergeAttributes(array(
            'id' => 'test',
            'required' => true
        ));
        $tagString = $this->builder->toString(TagRenderMode::NORMAL);
        $this->assertInstanceOf('Easy\Collections\Dictionary', $this->builder->getAttributes());
        $this->assertEquals($tagString, "<a id = 'test' required = 'required'></a>");
    }

    public function testCssClass()
    {
        $this->builder->addCssClass('test');
        $this->builder->addCssClass('test2');

        $tagString = $this->builder->toString(TagRenderMode::NORMAL);
        $this->assertEquals($tagString, "<a class = 'test2 test'></a>");
    }

    public function testInnerHtml()
    {
        $this->builder->setInnerHtml('test');
        $tagString = $this->builder->toString(TagRenderMode::NORMAL);
        $this->assertEquals($this->builder->getInnerHtml(), "test");
        $this->assertEquals($tagString, "<a >test</a>");
    }

    public function testTagName()
    {
        $this->builder->setTagName('i');
        $tagString = $this->builder->toString(TagRenderMode::NORMAL);
        $this->assertEquals($this->builder->getTagName(), "i");
        $this->assertEquals($tagString, "<i ></i>");
    }
}
