<?php

namespace Models\Entity;


use DateTime;
use Doctrine\ORM\Mapping\MappedSuperclass,
    Doctrine\ORM\Mapping\Id,
    Doctrine\ORM\Mapping\Column,
    Doctrine\ORM\Mapping\GeneratedValue;

/**
 * @MappedSuperclass()
 */
abstract class BaseEntity {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected int $id;

    /**
     * @Column(name="data_criacao", type="datetime" ,nullable=false)
     */
    protected DateTime $created;

    /**
     * @Column(name="data_modificacao",type="datetime" ,nullable=true)
     */
    protected DateTime $modified;


    public function __construct(DateTime $created, DateTime $modified = null) {
        $this->created = $created;
        if (!is_null($modified)):
            $this->modified = $modified;
        endif;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }
    /**
     *
     */
    public function getModified(): DateTime
    {
        return $this->modified;
    }

    public function setModified(DateTime $modified): void
    {
        $this->modified = $modified;
    }




}