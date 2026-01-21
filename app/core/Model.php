<?php
namespace App\Core;

use App\Core\Database;
use PDO;

abstract class Model
{
    protected PDO $db;
    protected string $table;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id AND estado = 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function all(array $filters = [])
    {
        $sql = "SELECT * FROM {$this->table} WHERE estado = 1";
        $params = [];
        foreach ($filters as $field => $value) {
            $sql .= " AND {$field} = :{$field}";
            $params[$field] = $value;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function create(array $data)
    {
        $data['estado'] = $data['estado'] ?? 1;
        $columns = array_keys($data);
        $fields = implode(',', $columns);
        $placeholders = ':' . implode(',:', $columns);
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($id, array $data)
    {
        $sets = [];
        foreach ($data as $field => $value) {
            $sets[] = "$field = :$field";
        }
        $data['id'] = $id;
        $sql = "UPDATE {$this->table} SET " . implode(',', $sets) . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function disable($id)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET estado = 0 WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
