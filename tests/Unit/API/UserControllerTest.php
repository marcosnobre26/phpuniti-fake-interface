<?php

namespace Tests\Unit\API;

use App\Http\Controllers\API\UserController;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
//use App\DataTransferObject\UserDTO;
use Illuminate\Http\Request;
use Faker\Provider\DateTime;
use Mockery;
use Faker\Factory as Faker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private $userRepositoryMock;
    private $userServiceMock;
    private $userController;
    private $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = \Faker\Factory::create();
        $this->userRepositoryMock = Mockery::mock(UserRepositoryInterface::class);
        $this->userServiceMock = Mockery::mock(UserService::class, [$this->userRepositoryMock]);
        $this->userController = new UserController($this->userServiceMock);
    }

    public function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    public function testCreate()
    {
        $faker = Faker::create();
        $userData = [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail,
            'password' => $faker->password(),
            'created_at' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
        ];


        $this->userServiceMock
            ->shouldReceive('create')
            ->once()
            ->with($userData)
            ->andReturn((object) $userData);

        $request = new Request([], [], [], [], [], [], json_encode($userData));

        $response = $this->userController->create($request);
        $userDataWithoutPassword = collect($userData)->except(['password'])->toArray();
        echo($response->getContent());
        $this->assertEquals(json_encode($userDataWithoutPassword), $response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdate()
    {
        $id = 1;
        $faker = Faker::create();
        $data = [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail,
        ];

        $user = (object) [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail,
            'created_at' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
        ];

        $this->userServiceMock
            ->shouldReceive('update')
            ->withArgs([$data, $id])
            ->andReturn($user);

        $request = new Request([], [], [], [], [], [], json_encode($data));

        $response = $this->userController->update($request, $id);

        $this->assertEquals($user, $response->getData());
    }


}
