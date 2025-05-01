<?php

namespace App\Controller\Api;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/tasks', name: 'api_tasks_')]
class TaskController extends AbstractController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $tasks = $em->getRepository(Task::class)->findAll();
        $json = $serializer->serialize($tasks, 'json');
        return JsonResponse::fromJsonString($json, 200);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Task $task, SerializerInterface $serializer): JsonResponse
    {
        $json = $serializer->serialize($task, 'json');
        return JsonResponse::fromJsonString($json);
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $task = new Task();
        $task->setTitle($data['title']);
        $task->setDescription($data['description'] ?? '');
        $date = new \DateTime($data['date']);
        $task->setDate($date);
        $task->setStatus($data['status'] ?? 'à faire');

        $em->persist($task);
        $em->flush();

        $json = $serializer->serialize($task, 'json');
        return JsonResponse::fromJsonString($json, 201);
    }

    #[Route('/{id}', name: 'update', methods: ['PUT', 'PATCH'])]
    public function update(Task $task, Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['title'])) $task->setTitle($data['title']);
        if (isset($data['description'])) $task->setDescription($data['description']);
        if (isset($data['date'])) {
            $date = new \DateTime($data['date'], new \DateTimeZone('UTC'));
            $task->setDate($date);
        }
        if (isset($data['status'])) $task->setStatus($data['status']);

        $em->flush();

        $json = $serializer->serialize($task, 'json');
        return JsonResponse::fromJsonString($json);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Task $task, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($task);
        $em->flush();
        return new JsonResponse(null, 204);
    }
}