'use strict';
var yeoman = require('yeoman-generator');

module.exports = yeoman.generators.Base.extend({
  initializing: function () {

    this.argument('name', {
      required: false,
      type: String,
      desc: 'Model name (singular)'
    });

    this.option('name');
    this.option('root_namespace');
    this.option('ignore_config');

    if (this.options.name) {
      this.name = this.options.name;
    }

    if (this.options.root_namespace) {
      this.root_namespace = this.options.root_namespace;
    }
  },

  prompting: function () {
    var done = this.async();

    var prompts = [];

    if (!this.root_namespace) {
      prompts.push({
        type: 'input',
        name: 'root_namespace',
        message: "What's the root namespace for this application?",
        default: this.config.get('root_namespace')
      });
    }

    if (!this.name) {

      prompts.push({
        type: 'input',
        name: 'name',
        message: 'What should we call this model?'
      });

    }

    this.prompt(prompts, function (props) {

      if (!this.name) {
        this.name = props.name;
      }

      if (!this.root_namespace) {
        this.root_namespace = props.root_namespace;
      }

      this.config.set('root_namespace', this.root_namespace);
      done();
    }.bind(this));

    if (!this.options.ignore_config) {
      this.config.save();
    }


  },

  writing: function () {
    this.log('Generating model for ' + this.name);

    this.fs.copyTpl(
      this.templatePath('model.php'),
      this.destinationPath('src/models/' + this.name + '.php'),
        { name: this.name, root_namespace: this.root_namespace}
    );
  }
});
