<?php

namespace App\Tests\Message;

use App\Entity\Message;
use App\Message\SendMessage;
use App\Message\SendMessageHandler;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class SendMessageHandlerTest extends TestCase
{
    public function testSendMessageHandler(): void
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);

        $entityManager->expects($this->once())
            ->method('persist')
            ->with($this->callback(function ($message) {
                return $message instanceof Message &&
                       Uuid::isValid($message->getUuid()) &&
                       $message->getText() === 'Test message' &&
                       $message->getStatus() === 'sent' &&
                       $message->getCreatedAt() instanceof \DateTime;
            }));

        $entityManager->expects($this->once())
            ->method('flush');

        $handler = new SendMessageHandler($entityManager);

        $sendMessage = new SendMessage();
        $sendMessage->text = 'Test message';

        $handler($sendMessage);
    }
}
