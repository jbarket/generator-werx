<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Managers;
<% } %>

use <%= root_namespace %>\Validators;
use <%= root_namespace %>\Models;

use werx\Messages\Messages;
use werx\Forms\Form;

class <%= model_name %>Manager {

    public $config;

    public function __construct(\werx\Core\Config $config) {
        $this->config = $config;
    }

    public function Validate($data)
    {
        $validator = new \werx\Validation\Engine();
        $validator->addRuleset(new Validators\<%= model_name %>);
        $valid = $validator->validate($data);

        if (!$valid) {
            foreach ($validator->getErrorSummary() as $message) {
                Messages::error($message);
            }

            Form::setData($data);
        }

        return $valid;
    }

    public function Create<%= model_name %>($data)
    {
        $<%= inflector.underscore(model_name) %> = new Models\<%= model_name %>;
        $<%= inflector.underscore(model_name) %>->fill($data);
        $<%= inflector.underscore(model_name) %>->save();

        Messages::success("New <%= model_name %> was successfully created.");
    }

    public function Update<%= model_name %>(Models\<%= model_name %> $<%= inflector.underscore(model_name) %>, $data)
    {
        $<%= inflector.underscore(model_name) %>->fill($data);
        $<%= inflector.underscore(model_name) %>->save();

        Messages::success("<%= model_name %> was successfully updated.");
    }

    public function Destroy<%= model_name %>($id)
    {
        Models\<%= model_name %>::destroy($id);
        Messages::success("<%= model_name %> was successfully deleted.");
    }

}
