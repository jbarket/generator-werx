<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Controllers;
<% } %>
use <%= root_namespace %>\Models;
use <%= root_namespace %>\Managers

use werx\Forms\Form;


/**
 * Class <%= name %>
 */
class <%= name %> extends Base
{
    public function __construct()
    {
        parent::__construct();

        // Set some variables for all views.
        $this->template->page_title = 'Werx Skeleton';
    }
}

