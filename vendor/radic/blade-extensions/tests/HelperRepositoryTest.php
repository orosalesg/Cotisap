<?php
/**
 * Copyright (c) 2017. Robin Radic.
 *
 * The license can be found in the package and online at https://radic.mit-license.org.
 *
 * @copyright 2017 Robin Radic
 * @license   https://radic.mit-license.org MIT License
 * @version   7.0.0
 */

namespace Radic\Tests\BladeExtensions;

use Illuminate\Contracts\Container\Container;
use Laradic\Testing\Native\AbstractTestCase;
use Radic\BladeExtensions\HelperRepository;
use Radic\BladeExtensions\Helpers\DumpHelper;
use Radic\BladeExtensions\Helpers\Embed\EmbedHelper;
use Radic\BladeExtensions\Helpers\Loop\LoopHelper;
use Radic\BladeExtensions\Helpers\Markdown\MarkdownHelper;
use Radic\BladeExtensions\Helpers\Minifier\MinifierHelper;

class HelperRepositoryTest extends AbstractTestCase
{
    public function test_can_create_instance()
    {
        $this->assertInstanceOf(HelperRepository::class, new HelperRepository($this->container));
    }

    /**
     * @var \Mockery\MockInterface
     */
    protected $container;

    /**
     * @var
     */
    protected $helperMocks;

    protected $helperClasses;

    protected function setUp()
    {
        parent::setUp();

        $this->helperMocks = [];

        $this->helperClasses = [
            'loop'     => LoopHelper::class,
            'embed'    => EmbedHelper::class,
            'markdown' => MarkdownHelper::class,
            'minifier' => MinifierHelper::class,
            'dump'     => DumpHelper::class,
        ];

        $this->container = \Mockery::mock('Illuminate\Contracts\Container\Container');
    }

    protected function _createHelperRepository()
    {
        $h = new HelperRepository($this->container);

        foreach ($this->helperClasses as $name => $class) {
            $this->helperMocks[ $name ] = \Mockery::mock($class);
            $h->put($name, $this->helperMocks[ $name ]);
        }

        return $h;
    }

    public function testGetHelperClassInstances()
    {
        $repository = $this->_createHelperRepository();
        foreach ($this->helperMocks as $name => $m) {
            $helper = $repository->get($name, false);
            $this->assertNotFalse($helper);
            $this->assertInstanceOf($this->helperClasses[ $name ], $helper);
            $this->assertTrue($repository->has($name));
        }
        $repository->put('test', 'testClass');
        $this->assertEquals('testClass', $repository->get('test'));
    }
}
