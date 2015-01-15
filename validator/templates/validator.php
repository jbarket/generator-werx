<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Validators;
<% } %>
use werx\Validation\Ruleset;

class <%= name %> extends Ruleset
{
    public function __construct()
    {
        $this->addRule('name', 'Name', 'required');
        $this->addRule('phone', 'Phone Number', 'required|phone');
        $this->addRule('email', 'Email Address', 'required|email');
    }
}
