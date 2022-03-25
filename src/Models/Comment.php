<?php
declare(strict_types=1);

namespace App\Models;

use Core\Utility\DB;

class Comment
{
    /**
     * @var string
     */
    private string $email = '';

    /**
     * @var string
     */
    private string $title = '';

    /**
     * @var string
     */
    private string $comment = '';

    /**
     * @var \DateTimeInterface|\DateTime
     */
    private \DateTimeInterface $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Comment
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Comment
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Comment
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return \DateTime|\DateTimeInterface
     */
    public function getCreated(): \DateTime|\DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param \DateTime|\DateTimeInterface $created
     * @return Comment
     */
    public function setCreated(\DateTime|\DateTimeInterface $created): self
    {
        $this->created = $created;
        return $this;
    }
}
