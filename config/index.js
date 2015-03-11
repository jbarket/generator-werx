'use strict';
var yeoman = require('yeoman-generator');

module.exports = yeoman.generators.Base.extend({
    prompting: function () {
        var done = this.async();

        var prompts = [
            { type: 'input', name: 'root_namespace', message: "Root Namespace:", default: this.config.get('root_namespace') }
        ];

        this.prompt(prompts, function (props) {
            this.config.set('root_namespace', props.root_namespace);
            done();
        }.bind(this));

        this.config.save();
    }
});
