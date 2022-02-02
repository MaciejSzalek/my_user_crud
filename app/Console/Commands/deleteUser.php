<?php

namespace App\Console\Commands;

use App\Interfaces\RepositoryInterface;
use Illuminate\Console\Command;

class deleteUser extends Command
{

    private RepositoryInterface $repository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:user {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command delete user by id';

    /**
     * Create a new command instance.
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

        echo 'Command: delete user ID = ' . $id . PHP_EOL;
        $result = $this->repository->delete($id);
        if(!$result)
        {
            echo 'Command: user:' .$id. ' not found'. PHP_EOL;
            return 0;
        } else {
            echo 'Command: user:' . $id . ' deleted successfully'. PHP_EOL;
            return 1;
        }
    }
}
