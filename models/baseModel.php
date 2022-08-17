<?php

class BaseModal
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::dbInstance();
    }

    public function getData(string $sql, string $method = 'fetch', array $params = []): array
    {
        $query = $this->db->prepare($sql);
        $query->execute($params);
        Database::dbCheckError($query);
        if ($method === 'fetchAll') {
            return $query->fetchAll();
        }
        return $query->fetch();
    }

    public function render(array $params): string
    {
        return (new Template())->renderTemplate($params);
    }
}
