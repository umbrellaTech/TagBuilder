<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Umbrella\Tests\TagBuilder;

use Umbrella\TagBuilder\TagBuilder;

/**
 * @author italo
 */
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

    public function testNewInstance()
    {
        $this->assertNotNull($this->builder);
    }
}
