<?php

class Person
{
    private int $id;
    private string $fullname;
    private string $email;
    private int $age;

    public function __construct(
        int $id,
        string $fullname,
        string $email,
        int $age
    ) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->age = $age;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of fullname
     *
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * Set the value of fullname
     *
     * @param string $fullname
     *
     * @return self
     */
    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of age
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param int $age
     *
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }
}
