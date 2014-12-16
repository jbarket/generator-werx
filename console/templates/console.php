<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Controllers;
<% } %>
use werx\Core\Console;

/**
 * Class <%= name %>
 */
class <%= name %> extends Console
{
    public function __construct()
    {
        parent::__construct();

        if (php_sapi_name() != 'cli') {
            // Only allowing from the command line.
            die('Not Authorized');
        }

    }
}
