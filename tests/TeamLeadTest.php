 <?php

 use App\Observers\ObserverInterface;
 use App\States\HappyState;
 use App\States\NormalState;
 use App\States\StateEvent;
 use App\TeamLead;
 use PHPUnit\Framework\TestCase;

class TeamLeadTest extends TestCase
{
    public function testHappyToNormalTransition()
    {
        $subject = new TeamLead(new HappyState());

        $subject->evaluateResult(0);

        $this->assertEquals('Normal', $subject->getState()->getName());
    }

    public function testNormalToHappyTransition()
    {
        $subject = new TeamLead(new NormalState());

        $subject->evaluateResult(1);

        $this->assertEquals('Happy', $subject->getState()->getName());
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testObserverReceivesHappyEvent(): void {
        $subject = new TeamLead(new HappyState());

        $observer = $this->createMock(ObserverInterface::class);
        $observer->expects($this->once())
            ->method('update')
            ->with($subject);

        $subject->attach(StateEvent::HAPPY, $observer);

        $subject->notify(StateEvent::HAPPY);
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testObserverIgnoresUnsubscribedEvent(): void {
        $observer = $this->createMock(ObserverInterface::class);
        $observer->expects($this->never())->method('update');

        $context = new TeamLead(new HappyState());
        $context->attach(StateEvent::TERRIBLE, $observer);

        $context->notify(StateEvent::HAPPY);
    }

    public function testNotifyWithoutObservers(): void {
        $context = new TeamLead(new HappyState());

        $context->notify(StateEvent::TERRIBLE);
        $this->assertTrue(true);
    }
}
