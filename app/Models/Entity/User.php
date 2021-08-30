<?php

namespace Models\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Table,
    Doctrine\ORM\Mapping\Column,
    Doctrine\ORM\Mapping\Entity;
/**
 * @Entity()
 * @Table(name="user")
 */
class User extends BaseEntity {

    /**
     * @Column(name="usuario", type="string", length=255, nullable=false)
     */
    protected string $username;

    /**
     * @Column(name="senha", length=400,  type="string", nullable=false)
     */
    protected string $password;

    /**
     * @Column(name="email", type="string", length=255, nullable=false)
     */
    protected string $email;

    /**
     * @Column(name="nivel_de_acesso", type="integer", length=255,nullable=false)
     */
    protected string $acessLevel;

    /**
     * @Column(name="cpf", type="integer", length=11, nullable=false)
     */
    protected int $cpf;

    /**
     * @Column(name="rg", type="integer", length=15, nullable=false)
     */
    protected int $rg;

    /**
     * @Column(name="nascimento", type="datetime", nullable=false)
     */
    protected DateTime $birthday;

    /**
     * @Column(name="verificado", type="boolean", nullable=false)
     */
    protected bool $verified;

    /**
     * @Column(name="banido", type="boolean", nullable=false, options={"default" : false})
     */
    protected bool $banned;

    /**
     * @Column(name="ativo", type="boolean", nullable=false, options={"default" : false})
     */
    protected $active;

    /**
     * @Column(name="razao_banimento", type="text", nullable=true, length=500)
     */

    protected string $banReason;

    public function __construct(DateTime $created, DateTime $modified = null)
    {
        parent::__construct($created, $modified);
        $this->banned =   false;
        $this->active =   false;
        $this->verified = false;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAcessLevel(): string
    {
        return $this->acessLevel;
    }

    public function setAcessLevel(string $acessLevel): void
    {
        $this->acessLevel = $acessLevel;
    }

    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function setCpf(int $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getRg(): int
    {
        return $this->rg;
    }


    public function setRg(int $rg): void
    {
        $this->rg = $rg;
    }


    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * @param bool $verified
     */
    public function setVerified(bool $verified): void
    {
        $this->verified = $verified;
    }

    public function isBanned(): bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): void
    {
        $this->banned = $banned;
    }


    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getBanReason(): string
    {
        return $this->banReason;
    }

    public function setBanReason(string $banReason): void
    {
        $this->banReason = $banReason;
    }

}