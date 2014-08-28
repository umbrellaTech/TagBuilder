<?php

// Copyright (c) Umbrella Tech. All rights reserved. See License.txt in the project root for license information.
namespace Umbrella\TagBuilder;

/**
 * Enumerates the modes that are available for rendering HTML tags.
 * @author Ítalo Lelis de Vietro <italolelis@gmail.com>
 */
abstract class TagRenderMode
{
    /**
     * Represents normal mode.
     */
    const NORMAL = 0;

    /**
     * Represents the start-tag mode.
     */
    const START_TAG = 1;

    /**
     * Represents end-tag mode.
     */
    const END_TAG = 2;

    /**
     * Represents self-closing-tag mode.
     */
    const SELF_CLOSING = 3;

}
