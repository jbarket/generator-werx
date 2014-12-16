<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Controllers;
<% } %>
use werx\Core\Controller;
use werx\Core\Database as DB;

/**
 * Class <%= name %>
 */
class <%= name %> extends Controller
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

        // And our database config file.
        $this->config->load('database', true);

        // Initialize our database.
        DB::init($this->config->database('default'));
    }
}

