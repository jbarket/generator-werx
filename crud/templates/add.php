<h1>New <%= model_name %></h1>

<form action="<?= $this->url()->action('/<%= inflector.underscore(controller_name) %>/create') ?>" role="form" method="post" class="form-horizontal">

    <?php $this->insert('<%= inflector.underscore(controller_name) %>/partials/form') ?>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Create <%= model_name %></button>
        </div>
    </div>

</form>