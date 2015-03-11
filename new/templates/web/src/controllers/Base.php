<?php

namespace <%= root_namespace %>\Controllers;

use werx\Core\Controller;
use werx\Core\Database as DB;
use werx\Messages\Messages;

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Set our default template.
        $this->template->layout('layouts/default');

        // Set some variables for all views.
        $this->template->page_title = 'Werx Skeleton';

        // Load our primary config file.
        $this->config->load('config');

        // Initialize error handling.
        $this->initializeErrorHandler();

        // Load the messages library, passing in an instance of the session.
        Messages::getInstance($this->session);

        // Set the default decorator to twitter bootstrap.
        Messages::setDecorator(new \werx\Messages\Decorators\Bootstrap);

        // Load our database config file. Don't forget to edit config/database with your connection info.
        #$this->config->load('database', true);

        // Initialize our database.
        #DB::init($this->config->database('default'));
    }

    public function initializeErrorHandler()
    {
        $whoops = new \Whoops\Run;

        if ($this->config->get('debug', false) === true) {
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        } else {
            $template = $this->template;
            $whoops->pushHandler(function($exception, $inspector, $run) use ($template) {
                $template->output('common/error');
            });
        }

        $whoops->register();
    }
}