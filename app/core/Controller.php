<?php
namespace App\Core;

abstract class Controller {
    protected function view(string $view, array $data = []): void {
        View::render($view, $data);
    }

    protected function json(array $data, int $status = 200): void {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function validate(array $data, array $rules): array {
        // Simple validation implementation
        $errors = [];
        foreach ($rules as $field => $ruleSet) {
            $value = $data[$field] ?? '';
            $rules = explode('|', $ruleSet);
            foreach ($rules as $rule) {
                if ($rule === 'required' && empty($value)) {
                    $errors[$field] = ucfirst($field) . ' is required.';
                }
                if (str_starts_with($rule, 'min:')) {
                    $min = explode(':', $rule)[1];
                    if (strlen($value) < $min) {
                        $errors[$field] = ucfirst($field) . " must be at least $min characters.";
                    }
                }
                if (str_starts_with($rule, 'max:')) {
                    $max = explode(':', $rule)[1];
                    if (strlen($value) > $max) {
                        $errors[$field] = ucfirst($field) . " may not exceed $max characters.";
                    }
                }
                if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = 'Invalid email format.';
                }
            }
        }
        return $errors;
    }
}
