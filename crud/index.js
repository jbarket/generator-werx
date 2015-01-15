'use strict';
var yeoman = require('yeoman-generator');
var inflector = require('inflected');

module.exports = yeoman.generators.Base.extend({
  initializing: function () {
    this.argument('controller_name', {
      required: false,
      type: String,
      desc: 'Controller name (plural)'
    });
  },

  prompting: function () {
    var done = this.async();

    var prompts = [{
      type: 'input',
      name: 'root_namespace',
      message: "What's the root namespace for this application?",
      default: this.config.get('root_namespace')
    }];

    if (!this.controller_name) {

      prompts.push({
        type: 'input',
        name: 'controller_name',
        message: 'What should we call this controller?'
      });

    }

    this.prompt(prompts, function (props) {

      if (!this.controller_name) {
        this.controller_name = props.controller_name;
      }

      this.model_name = inflector.singularize(this.controller_name);
      this.root_namespace = props.root_namespace;
      this.config.set('root_namespace', this.root_namespace);
      this.log(this.config.get('root_namespace'));
      done();
    }.bind(this));

    this.config.save();

  },

  writing: function () {
    this.log('Generating CRUD controller for ' + this.controller_name);

    this.fs.copyTpl(
        this.templatePath('controller.php'),
        this.destinationPath('src/controllers/' + this.controller_name + '.php'),
        { inflector: inflector, controller_name: this.controller_name, model_name: this.model_name, root_namespace: this.root_namespace}
    );

    this.fs.copyTpl(
        this.templatePath('model.php'),
        this.destinationPath('src/models/' + this.model_name + '.php'),
        { model_name: this.model_name, root_namespace: this.root_namespace}
    );

    this.fs.copyTpl(
        this.templatePath('validator.php'),
        this.destinationPath('src/validators/' + this.model_name + '.php'),
        { model_name: this.model_name, root_namespace: this.root_namespace}
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
