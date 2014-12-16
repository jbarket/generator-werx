'use strict';
var yeoman = require('yeoman-generator');

module.exports = yeoman.generators.Base.extend({
  initializing: function () {
    this.argument('name', {
      required: false,
      type: String,
      desc: 'Console Controller name (plural)'
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

    if (!this.name) {

      prompts.push({
        type: 'input',
        name: 'name',
        message: 'What should we call this console controller?'
      });

    }

    this.prompt(prompts, function (props) {

      if (!this.name) {
        this.name = props.name;
      }

      this.root_namespace = props.root_namespace;
      this.config.set('root_namespace', this.root_namespace);
      this.log(this.config.get('root_namespace'));
      done();
    }.bind(this));

    this.config.save();


  },

  writing: function () {
    this.log('Generating console controller for ' + this.name);

    this.fs.copyTpl(
        this.templatePath('console.php'),
        this.destinationPath('src/controllers/' + this.name + '.php'),
        { name: this.name, root_namespace: this.root_namespace}
    );
  }
});
