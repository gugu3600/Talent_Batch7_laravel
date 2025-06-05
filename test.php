<?php 

interface Something
{
    public function index();
}

class Anything implements Something
{
    public function index()
    {
        $abc = "Hello";
        return $abc;
    }
}

class Hi
{
    protected $something;

    public function __construct(Something $something)
    {
        $this->something  = $something;
    }

    public function index()
    {
        $bat = $this->something->index();
        return $bat;
    }
}


$hey = new Hi(new Anything);

$abc = $hey->index();

print_r($abc);