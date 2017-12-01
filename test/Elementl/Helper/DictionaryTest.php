<?php

namespace Elementl\Helper;

use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
    public function testGetSetHas()
    {
        $dict = new Dictionary(['key' => 'value']);
        $this->assertSame('value', $dict->get('key'));

        $dict->set('key1', 'value1');
        $this->assertSame('value1', $dict->get('key1'));

        $dict->set('key', 'value1');
        $this->assertSame('value1', $dict->get('key'));

        $this->assertSame(null, $dict->get('notset'));
        $this->assertSame('default', $dict->get('notset', 'default'));

        $this->assertFalse($dict->has('key2'));
        $this->assertTrue($dict->has('key'));
    }

    public function testIterates()
    {
        $input = [
            'key1' => 'value1',
            'key2' => 'value2',
        ];
        $dict = new Dictionary($input);

        $output = [];
        foreach ($dict as $key => $value) {
            $output[$key] = $value;
        }

        $this->assertCount(2, $output);
        $this->assertEquals('value1', $output['key1']);
        $this->assertEquals('value2', $output['key2']);
    }
}
