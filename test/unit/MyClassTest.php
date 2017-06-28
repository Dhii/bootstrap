<?php

namespace _vendor\_package\FuncTest\_ns;

use Xpmock\TestCase;

/**
 * Tests {@see _vendor\_package\_ns\MyClass}.
 *
 * @since [*next-version*]
 */
class MyClassTest extends TestCase
{
    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return _vendor\_package\_ns\MyClass
     */
    public function createInstance()
    {
        // @TODO Change this to the real test subject.
        return new MyClass();
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(
            '_vendor\\_package\\_ns\\MyClass', $subject, 'Subject is not a valid instance.'
        );
    }
}
