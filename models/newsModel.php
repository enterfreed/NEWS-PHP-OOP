<?php

class NewsModel extends BaseModal
{
    public function getCountNews(string $sql, int $limit): int
    {
        $query = $this->db->prepare($sql);
        $query->execute();
        Database::dbCheckError($query);
        $rowCount = (int)$query->fetchColumn();
        return ceil($rowCount / $limit);
    }
}
