'use strict';
var yeoman = require('yeoman-generator');
var inflector = require('inflected');

module.exports = yeoman.generators.Base.extend({
    config: function () {
        this.argument('controller_name', { type: String, desc: 'Controller name (plural)' });

        if (this.config.get('root_namespace') == null) {
            this.composeWith('werx:config');
        }
    },

    prompts: function () {
        var done = this.async();

        var prompts = [];

        if (!this.controller_name) {
            prompts.push({ type: 'input', name: 'controller_name', message: 'Controller Name:' });
        }

        this.prompt(prompts, function (props) {
            if (!this.controller_name) { this.controller_name = props.controller_name; }
            this.model_name = inflector.singularize(this.controller_name);
            done();
        }.bind(this));

    },
    model: function() {
        this.composeWith('werx:model', { options: { 'name': this.model_name }});
    },
    validator: function() {
        this.composeWith('werx:validator', { options: { 'name': this.model_name }});
    },
    writing: function () {
        this.log('Generating CRUD controller for ' + this.controller_name);

        this.fs.copyTpl(
            this.templatePath('controller.php'),
            this.destinationPath('src/controllers/' + this.controller_name + '.php'),
            { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name, root_namespace: this.config.get('root_namespace')}
        );

        this.fs.copyTpl(
            this.templatePath('manager.php'),
            this.destinationPath('src/managers/' + this.model_name + 'Manager.php'),
            { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name, root_namespace: this.config.get('root_namespace')}
        );

        this.fs.copyTpl(
            this.templatePath('add.php'),
            this.destinationPath('src/views/' + inflector.underscore(this.controller_name) + '/add.php'),
            { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name }
        );

        this.fs.copyTpl(
            this.templatePath('edit.php'),
            this.destinationPath('src/views/' + inflector.underscore(this.controller_name) + '/edit.php'),
            { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name }
        );

        this.fs.copyTpl(
            this.templatePath('index.php'),
            this.destinationPath('src/views/' + inflector.underscore(this.controller_name) + '/index.php'),
            { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name }
        );

        this.fs.copyTpl(
            this.templatePath('form.php'),
            this.destinationPath('src/views/' + inflector.underscore(this.controller_name) + '/partials/form.php'),
            { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name }
        );
    }
});
