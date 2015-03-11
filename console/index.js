'use strict';
var yeoman = require('yeoman-generator');

module.exports = yeoman.generators.Base.extend({
    config: function () {
        this.argument('name', { required: false, type: String, desc: 'Console Controller name (plural)' });

        if (this.config.get('root_namespace') == null) {
            this.composeWith('werx:config');
        }
    },

    prompts: function () {
        var done = this.async();

        var prompts = [];

        if (!this.name) {
            prompts.push({ type: 'input', name: 'name', message: 'Console Controller Name:' });
        }

        this.prompt(prompts, function (props) {
            if (!this.name) { this.name = props.name; }
            done();
        }.bind(this));

    },

    writing: function () {
        this.log('Generating console controller for ' + this.name);

        this.fs.copyTpl(
            this.templatePath('console.php'),
            this.destinationPath('src/controllers/' + this.name + '.php'),
            { name: this.name, root_namespace: this.config.get('root_namespace') }
        );
    }
});
