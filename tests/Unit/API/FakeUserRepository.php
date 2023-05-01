<?php


namespace Tests\Unit\API;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;

class FakeUserRepository implements UserRepositoryInterface
{
private $users = [];

public function getById(string $id, ?array $with = null): ?User
{
    return $this->users[$id] ?? null;
}

public function getByEmail(string $email, ?array $with = null): ?User
{
foreach ($this->users as $user) {
if ($user->email === $email) {
return $user;
}
}
return null;
}

public function getByTenantId(int $tenant_id, array $select = ['*'], string $with = null): Collection
{
$result = collect();
foreach ($this->users as $user) {
if ($user->tenant_id === $tenant_id) {
$result->add($user);
}
}
return $result;
}

public function create(array $attributes): User
{
$user = new User($attributes);
$user->id = uniqid(); // gera um ID único
$this->users[$user->id] = $user;
return $user;
}

public function existsByEmail(string $email): bool
{
foreach ($this->users as $user) {
if ($user->email === $email) {
return true;
}
}
return false;
}
}
