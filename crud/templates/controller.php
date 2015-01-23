<?php
<% if (root_namespace) { %>
namespace <%= root_namespace %>\Controllers;
<% } %>
use <%= root_namespace %>\Models as Models;
use <%= root_namespace %>\Managers as Managers;

use werx\Forms\Form;


/**
 * Class <%= controller_name %>
 */
class <%= controller_name %> extends Base
{
    public function __construct()
    {
        parent::__construct();

        // Set some variables for all views.
        $this->template->page_title = 'Werx Skeleton';
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
        $valid = Managers\<%= model_name %>Manager::Validate($this->input->post());

        if ($valid) {
            Managers\<%= model_name %>Manager::Update<%= model_name %>($<%= inflector.underscore(model_name) %>, $this->input->post());
            $this->redirect('<%= inflector.underscore(controller_name) %>/index');
        }
        else
        {
            $this->template->output('<%= inflector.underscore(controller_name) %>/edit', ['<%= inflector.underscore(model_name) %>' => $<%= inflector.underscore(model_name) %>]);
        }

    }

    public function add()
    {
        $this->template->output('<%= inflector.underscore(controller_name) %>/add');
    }

    public function create()
    {
        $valid = Managers\<%= model_name %>Manager::Validate($this->input->post());

        if ($valid) {
            Managers\<%= model_name %>Manager::Create<%= model_name %>($this->input->post());
            $this->redirect('<%= inflector.underscore(controller_name) %>/index');
        }
        else
        {
            $this->template->output('<%= inflector.underscore(controller_name) %>/add');
        }
    }

    public function destroy($id)
    {
        Managers\<%= model_name %>Manager::Destroy<%= model_name %>($id);
        $this->redirect('<%= inflector.underscore(controller_name) %>/index');
    }

}
