<?php

use PHPUnit\Framework\TestCase;
use Uid\Uid;
use function PHPUnit\Framework\assertEquals;
/*
 * The MIT License
 *
 * Copyright 2020 Everton.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Tests for Uid\Uid class.
 *
 * @author Everton
 */
class UidTest extends TestCase
{
    public function __construct($name = null, $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        Uid::resetIntSequence();
    }
    
    public function testIntSequence()
    {
        $this->assertEquals(0, Uid::intSequence());
        $this->assertEquals(1, Uid::intSequence());
        $this->assertEquals(2, Uid::intSequence());
        $this->assertEquals(3, Uid::intSequence());
    }
    
    public function testResetIntSequence()
    {
        Uid::resetIntSequence();
        $this->assertEquals(0, Uid::intSequence());
        Uid::resetIntSequence();
        $this->assertEquals(0, Uid::intSequence());
    }
    
    public function testIntSequenceWithStart()
    {
        Uid::resetIntSequence();
        $this->assertEquals(10, Uid::intSequence(10));
        $this->assertEquals(11, Uid::intSequence());
        $this->assertEquals(12, Uid::intSequence());
        $this->assertEquals(13, Uid::intSequence());
        $this->assertEquals(14, Uid::intSequence());
        $this->assertEquals(15, Uid::intSequence());
    }
    
    public function testText()
    {
        $this->assertEquals(1, preg_match('/[a-z0-9]{32}/i', Uid::text()));
    }
    
    public function testTextWithLength()
    {
        $this->assertEquals(1, preg_match('/[a-z0-9]{16}/i', Uid::text(16)));
    }
}
