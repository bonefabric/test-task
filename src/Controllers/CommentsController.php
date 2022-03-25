<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Comment;
use App\Repositories\CommentRepository;

class CommentsController
{

    /**
     * @throws \JsonException
     */
    public function get(): string
    {
        return json_encode((new CommentRepository())->all(), JSON_THROW_ON_ERROR);
    }

    /**
     * Сохранение комментария
     * @return string
     * @throws \JsonException
     */
    public function store(): string
    {
        $data = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
        if (!$data['email'] || !$data['title'] || !$data['comment'] || !$data['date']) {
            return 'ERROR';
        }
        $comment = new Comment();
        $comment->setEmail($data['email'])
            ->setTitle($data['title'])
            ->setComment($data['comment'])
            ->setCreated(new \DateTime($data['date']));
        return (new CommentRepository())->save($comment) ? 'OK' : 'ERROR';
    }
}
