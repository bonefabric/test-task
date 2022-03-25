<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Comment;
use Core\Utility\DB;

class CommentRepository
{

    /**
     * @param Comment $comment
     * @return bool
     */
    public function save(Comment $comment): bool
    {
        $query = DB::getInstance()->prepare('INSERT INTO comments(email, title, comment, created) VALUES (?, ?, ?, ?)');
        return $query->execute([$comment->getEmail(), $comment->getTitle(), $comment->getComment(), $comment->getCreated()->format('Y-m-d H:i:s')]);
    }

    /**
     * @return array
     */
    public function all(): array
    {
        $query = DB::getInstance()->query('SELECT * FROM comments');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
