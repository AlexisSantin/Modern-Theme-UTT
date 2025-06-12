<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../module/scripts/BeforeInstall.php';

class BeforeInstallTest extends TestCase
{
    public function testRunCallsClearCache()
    {
        $dataManager = $this->getMockBuilder(stdClass::class)
            ->addMethods(['clearCache'])
            ->getMock();
        $dataManager->expects($this->once())
            ->method('clearCache');

        $container = $this->getMockBuilder(stdClass::class)
            ->addMethods(['get'])
            ->getMock();
        $container->expects($this->once())
            ->method('get')
            ->with('dataManager')
            ->willReturn($dataManager);

        $script = new BeforeInstall();
        $script->run($container);
    }
}
