<?php

namespace Bago;

class Console
{
    protected $command = '';
    protected $parsedParams = [];
    protected $params = [];
    protected $flags = [];

    protected $commands = [];

    public static function run($argv)
    {
        $console = new self();
        $console->parse($argv);
        $console->execute();
    }

    public function parse($argv)
    {
        $this->command = $argv[1];
        $this->parsedParams = array_slice($argv, 2);

        foreach ($this->parsedParams as $param) {
            if (strpos($param, '--') === 0) {
                $this->flags[] = substr($param, 2);
            } else {
                $this->params[] = $param;
            }
        }
    }

    public function register($command, $callback)
    {
        if ($this->command === $command) {
            $callback($this->params, $this->flags);
        }
    }

    public function execute()
    {
        if (isset($this->commands[$this->command])) {
            $method = $this->commands[$this->command];
            $this->$method();
        }
    }
}
