<h1>Editing <%= model_name %></h1>

<form action="<?= $this->url()->action('<%= inflector.underscore(controller_name) %>/update', $this-><%= inflector.underscore(model_name) %>['id']) ?>" role="form" method="post" class="form-horizontal">

    <?php $this->insert('<%= inflector.underscore(controller_name) %>/partials/form') ?>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Update <%= model_name %></button>
        </div>
    </div>

</form>
