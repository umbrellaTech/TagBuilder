<?php

namespace Umbrella\Tests\TagBuilder\Html;

use Umbrella\TagBuilder\Html\ButtonBuilder;
use Umbrella\TagBuilder\Html\HtmlButtonType;
use Umbrella\Tests\TagBuilder\TagBuilderTestCase;

class ButtonBuilderTest extends TagBuilderTestCase
{

    public function testSubmitRender()
    {
        $inputSubmit = ButtonBuilder::submitButton('submit-test', 'Submit');
        $buttonSubmit = ButtonBuilder::button('submit-test', 'Submit', HtmlButtonType::SUBMIT, 'onClick',
                                              array(
                'id' => 'test'
        ));

        $this->assertEquals($inputSubmit, "<input type = 'submit' name = 'submit-test' value = 'Submit'>");
        $this->assertEquals($buttonSubmit,
                            "<button name = 'submit-test' onclick = 'onClick' type = 'submit' id = 'test'>Submit</button>");
    }
}
