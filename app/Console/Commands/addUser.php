<?php

namespace App\Console\Commands;

use App\Interfaces\RepositoryInterface;
use Illuminate\Console\Command;

class addUser extends Command
{

    private RepositoryInterface $repository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data = $this->arguments();
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            throw new \Exception('Email not valid');
        }

        $user = $this->repository->findByEmail($data['email']);
        if($user)
        {
            echo 'User with email : "' .$data['email'] . '" exists!' . PHP_EOL;
            return 0;
        }

        $this->repository->add($data);
        return 1;
    }
}
