<?php

namespace <%= root_namespace %>\Controllers;

use werx\Messages\Messages;

class Home extends Base
{
    public function __construct()
    {
        parent::__construct();

        // Set some variables for all views.
        $this->template->page_title = 'Werx Skeleton';
    }

    public function index()
    {
        Messages::success('Werx Installation Successful!');
        $this->template->output('home/index', ['heading' => 'Congratulations, it worked!']);
    }
}