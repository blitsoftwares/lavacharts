<?php namespace Khill\Lavacharts\Tests\Charts;

use Khill\Lavacharts\Tests\DataProviders;
use Khill\Lavacharts\Charts\DonutChart;
use Mockery as m;

class DonutChartTest extends DataProviders
{
    public function setUp()
    {
        parent::setUp();

        $this->dc = new DonutChart('MyTestChart');
    }

    public function testInstanceOfDonutChartWithType()
    {
    	$this->assertInstanceOf('Khill\Lavacharts\Charts\DonutChart', $this->dc);
    }

    public function testTypeDonutChart()
    {
    	$this->assertEquals('DonutChart', $this->dc->type);
    }

    public function testLabelAssignedViaConstructor()
    {
    	$this->assertEquals('MyTestChart', $this->dc->label);
    }

    public function testPieHole()
    {
        $this->dc->pieHole(0.23);

        $this->assertEquals(0.23, $this->dc->options['pieHole']);
    }

    /**
     * @dataProvider nonFloatProvider
     * @expectedException Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testPieHoleWithBadType($badTypes)
    {
        $this->dc->pieHole($badTypes);
    }
}
