<?php

namespace _vendor\_package\FuncTest\_ns;

use Xpmock\TestCase;

/**
 * Tests {@see _vendor\_package\_ns\MyClass}.
 *
 * @TODO Search and replace tokens that begin with underscore.
 *
 * @since [*next-version*]
 */
class MyClassTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = '_vendor\\_package\\_ns\\MyClass';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return _vendor\_package\_ns\MyClass
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->new();

        return $mock;
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
            static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject is not a valid instance.'
        );
    }
}
