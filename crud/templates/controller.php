<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Controllers;
<% } %>
use werx\Core\Controller;
use werx\Core\Database as DB;
use <%= root_namespace %>\Validators as Validators;
use <%= root_namespace %>\Models as Models;
use werx\Messages\Messages;
use werx\Forms\Form;


/**
 * Class <%= controller_name %>
 */
class <%= controller_name %> extends Controller
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

        // Initialize messages.
        Messages::getInstance($this->session);
    }

    public function index()
    {
        $this->template->output('<%= inflector.underscore(controller_name) %>/index', ['<%= inflector.underscore(controller_name) %>' => Models\<%= model_name %>::all()->toArray()]);
    }

    public function edit($id)
    {
        $<%= inflector.underscore(model_name) %> = Models\<%= model_name %>::findOrFail($id)->toArray();

        Form::setData($<%= inflector.underscore(model_name) %>);
        $this->template->output('<%= inflector.underscore(controller_name) %>/edit', ['<%= inflector.underscore(model_name) %>' => $<%= inflector.underscore(model_name) %>]);
    }

    public function update($id)
    {
        $<%= inflector.underscore(model_name) %> = Models\<%= model_name %>::findOrFail($id);
        $validator = new \werx\Validation\Engine();
        $validator->addRuleset(new Validators\<%= model_name %>);
        $valid = $validator->validate($this->input->post());

        if ($valid) {
            $<%= inflector.underscore(model_name) %>->fill($this->input->post());
            $<%= inflector.underscore(model_name) %>->save();

            $this->redirect('<%= inflector.underscore(controller_name) %>/index');
        }
        else
        {
            foreach ($validator->getErrorSummary() as $message) {
                Messages::error($message);
            }

            Form::setData($this->input->post());
            $this->template->output('<%= inflector.underscore(controller_name) %>/edit', ['<%= inflector.underscore(model_name) %>' => $<%= inflector.underscore(model_name) %>]);
        }

    }

    public function add()
    {
        $this->template->output('<%= inflector.underscore(controller_name) %>/add');
    }

    public function create()
    {
        $validator = new \werx\Validation\Engine();
        $validator->addRuleset(new Validators\<%= model_name %>);
        $valid = $validator->validate($this->input->post());

        if ($valid) {
            $<%= inflector.underscore(model_name) %> = new Models\<%= model_name %>;
            $<%= inflector.underscore(model_name) %>->fill($this->input->post());
            $<%= inflector.underscore(model_name) %>->save();

            Messages::success("New <%= inflector.underscore(model_name) %> was successfully created.");
            $this->redirect('<%= inflector.underscore(controller_name) %>/index');
        }
        else
        {
            foreach ($validator->getErrorSummary() as $message) {
                Messages::error($message);
            }

            Form::setData($this->input->post());
            $this->template->output('<%= inflector.underscore(controller_name) %>/add');
        }
    }

    public function destroy($id)
    {
        $<%= inflector.underscore(model_name) %> = Models\<%= model_name %>::findOrFail($id);
        $<%= inflector.underscore(model_name) %>->destroy($id);

        Messages::success("<%= model_name %> was successfully deleted.");
        $this->redirect('<%= inflector.underscore(controller_name) %>/index');
    }

}
