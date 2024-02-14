<?php

interface IPersonDAO
{
    function getAllPersons(): array;
    function createPerson(
        string $fullname,
        string $email,
        int $age
    );
    function getPersonById(int $id);
    function deletePerson(int $id);

    function editPerson(
        int $id,
        string $fullname,
        string $email,
        int $age
    );
}
