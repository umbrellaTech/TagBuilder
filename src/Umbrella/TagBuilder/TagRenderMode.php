<?php

// Copyright (c) Umbrella Tech. All rights reserved. See License.txt in the project root for license information.

namespace Umbrella\TagBuilder;

abstract class TagRenderMode
{

    const NORMAL = 0;
    const START_TAG = 1;
    const END_TAG = 2;
    const SELF_CLOSING = 3;

}
