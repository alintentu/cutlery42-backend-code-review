<?php
declare(strict_types=1);

namespace App\Controller;

use App\Message\SendMessage;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller for handling message-related operations.
 *
 * @see MessageControllerTest
 */
class MessageController extends AbstractController
{
    /**
     * Retrieves a list of messages based on request filters.
     * 
     * @param Request $request
     * @param MessageRepository $messageRepository
     * @return JsonResponse
     */
    #[Route('/messages', methods: ['GET'])]
    public function list(Request $request, MessageRepository $messageRepository): JsonResponse
    {
        $messages = $messageRepository->findByRequestFilters($request);
  
        $formattedMessages = array_map(fn($message) => [
            'uuid' => $message->getUuid(),
            'text' => $message->getText(),
            'status' => $message->getStatus(),
        ], $messages);
        
        return $this->json(['messages' => $formattedMessages]);
    }

    /**
     * Sends a message by dispatching it to the message bus.
     * 
     * @param Request $request
     * @param MessageBusInterface $bus
     * @return JsonResponse
     */
    #[Route('/messages/send', methods: ['POST'])]
    public function send(Request $request, MessageBusInterface $bus): JsonResponse
    {
        $text = $request->request->get('text');
        
        if (!$text) {
            return new JsonResponse(['error' => 'Text is required'], 400);
        }

        $bus->dispatch(new SendMessage($text));
        
        return new JsonResponse(['message' => 'Successfully sent'], 200);
    }
}
