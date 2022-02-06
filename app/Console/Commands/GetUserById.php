<?php

namespace App\Console\Commands;

use App\Interfaces\RepositoryInterface;
use Illuminate\Console\Command;

class GetUserById extends Command
{

    private RepositoryInterface $repository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:getById {id}'; // user:get-by-id {id}

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get user by ID';

    /**
     * Create a new command instance.
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $user = $this->repository->get($id);

        if($user)
        {
            echo 'ID: ' . $user->id . PHP_EOL;
            echo 'Name: ' . $user->name . PHP_EOL;
            echo 'Email: ' . $user->email . PHP_EOL;
        } else {
            echo 'User not found' . PHP_EOL;
        }
        return 0;
    }
}
