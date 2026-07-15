<?php
namespace App\Core;

abstract class Model {
    protected static string $table;
    protected static string $primaryKey = 'id';
    protected static array $fillable = [];
    protected static array $hidden = [];
    protected static bool $timestamps = true;

    public static function getTable(): string {
        return static::$table;
    }

    public static function find(int $id): ?array {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        if ($result) {
            // Remove hidden fields
            foreach (static::$hidden as $field) {
                unset($result[$field]);
            }
        }
        return $result ?: null;
    }

    public static function all(array $order = []): array {
        global $pdo;
        $sql = "SELECT * FROM " . static::$table;
        if (!empty($order)) {
            $sql .= " ORDER BY " . key($order) . " " . current($order);
        }
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function create(array $data): int {
        global $pdo;
        $filtered = array_intersect_key($data, array_flip(static::$fillable));
        if (static::$timestamps) {
            $now = date('Y-m-d H:i:s');
            $filtered['created_at'] = $now;
            $filtered['updated_at'] = $now;
        }
        $columns = implode(', ', array_keys($filtered));
        $placeholders = implode(', ', array_fill(0, count($filtered), '?'));
        $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_values($filtered));
        return (int) $pdo->lastInsertId();
    }

    public static function update(int $id, array $data): void {
        global $pdo;
        $filtered = array_intersect_key($data, array_flip(static::$fillable));
        if (static::$timestamps) {
            $filtered['updated_at'] = date('Y-m-d H:i:s');
        }
        $set = implode(', ', array_map(fn($col) => "$col = ?", array_keys($filtered)));
        $sql = "UPDATE " . static::$table . " SET $set WHERE " . static::$primaryKey . " = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([...array_values($filtered), $id]);
    }

    public static function delete(int $id): void {
        global $pdo;
        $sql = "DELETE FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    protected static function query(string $sql, array $params = []): \PDOStatement {
        global $pdo;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
