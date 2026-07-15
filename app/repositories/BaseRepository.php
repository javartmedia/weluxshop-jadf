<?php
namespace App\Repositories;

abstract class BaseRepository {
    protected string $modelClass;
    protected string $table;

    public function all(): array {
        $class = $this->modelClass;
        return $class::all();
    }

    public function find(int $id): ?array {
        $class = $this->modelClass;
        return $class::find($id);
    }

    public function create(array $data): int {
        $class = $this->modelClass;
        return $class::create($data);
    }

    public function update(int $id, array $data): void {
        $class = $this->modelClass;
        $class::update($id, $data);
    }

    public function delete(int $id): void {
        $class = $this->modelClass;
        $class::delete($id);
    }
}
