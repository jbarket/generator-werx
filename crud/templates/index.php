<h1><%= controller_name %></h1>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>
            <a class="btn btn-primary btn-block" href="<?= $this->url()->action('<%= inflector.underscore(controller_name) %>/add') ?>">New <%= model_name %></a>
        </th>
        <th>ID</th>
    </tr>
    </thead>

    <?php foreach($this-><%= inflector.underscore(controller_name) %> as $<%= inflector.underscore(model_name) %>) { ?>

        <tr>
            <td style="white-space: nowrap; width: 1em;">
                <a class="btn btn-default" href="<?= $this->url()->action('<%= inflector.underscore(controller_name) %>/edit', $<%= inflector.underscore(model_name) %>['id']) ?>">Edit</a>
                <a class="btn btn-danger" href="<?= $this->url()->action('<%= inflector.underscore(controller_name) %>/destroy', $<%= inflector.underscore(model_name) %>['id']) ?>" onclick="return confirm('Are you sure? This cannot be undone');">Delete</a>
            </td>
            <td><?= $<%= inflector.underscore(model_name) %>['id'] ?></td>
        </tr>

    <?php } ?>
</table>
